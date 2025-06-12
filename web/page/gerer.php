<?php
include("../../php/connexion.php");
require_once '../component/supp.php';

// 1. Nombre de clients inscrits
$sql = "SELECT COUNT(*) AS NB FROM RAP_CLIENT";
$tab = [];
LireDonneesPDO1($conn, $sql, $tab);
$nb_clients = $tab[0]['NB'];

// 2. Nombre de commandes
$sql = "SELECT COUNT(*) AS NB FROM RAP_COMMANDE";
$tab = [];
LireDonneesPDO1($conn, $sql, $tab);
$nb_commandes = $tab[0]['NB'];

// 3. Chiffre d'affaires total (COM_PRIX_TOTAL)
$sql = "SELECT SUM(COM_PRIX_TOTAL) AS TOTAL FROM RAP_COMMANDE";
$tab = [];
LireDonneesPDO1($conn, $sql, $tab);
$chiffre_affaires = $tab[0]['TOTAL'];
if ($chiffre_affaires === null) $chiffre_affaires = 0;
$chiffre_affaires = str_replace(',', '.', $chiffre_affaires);
$chiffre_affaires = floatval($chiffre_affaires);

// 4. Moyenne du montant des commandes
$sql = "SELECT AVG(COM_PRIX_TOTAL) AS MOY FROM RAP_COMMANDE";
$tab = [];
LireDonneesPDO1($conn, $sql, $tab);
$moyenne_commande = $tab[0]['MOY'];
if ($moyenne_commande === null) $moyenne_commande = 0;
$moyenne_commande = str_replace(',', '.', $moyenne_commande);
$moyenne_commande = floatval($moyenne_commande);

$sql = "SELECT * FROM RAP_CLIENT ORDER BY CLI_NOM, CLI_PRENOM";
$clients = [];
LireDonneesPDO1($conn, $sql, $clients);

$sql = "
    SELECT C.CLI_NOM, C.CLI_PRENOM, SUM(COM.COM_PRIX_TOTAL) AS TOTAL
    FROM RAP_CLIENT C
    JOIN RAP_COMMANDE COM ON C.CLI_NUM = COM.CLI_NUM
    GROUP BY C.CLI_NOM, C.CLI_PRENOM
    ORDER BY TOTAL DESC
    FETCH FIRST 3 ROWS ONLY
";
$meilleurs_clients = [];
LireDonneesPDO1($conn, $sql, $meilleurs_clients);

$sql = "
    SELECT TO_CHAR(COM_DATE, 'YYYY-MM') AS PERIODE, COUNT(*) AS NB
    FROM RAP_COMMANDE
    GROUP BY TO_CHAR(COM_DATE, 'YYYY-MM')
    ORDER BY NB DESC
    FETCH FIRST 3 ROWS ONLY
";
$meilleures_periodes = [];
LireDonneesPDO1($conn, $sql, $meilleures_periodes);

if (isset($_POST['send_mail'])) {
    $subject = trim($_POST['mail_subject'] ?? '');
    $message = trim($_POST['mail_message'] ?? '');

    if ($subject === '' || $message === '') {
        echo "<script>alert('Le sujet et le message sont obligatoires.');</script>";
    } else {
        // Récupérer tous les emails valides
        $sql = "SELECT CLI_COURRIEL FROM RAP_CLIENT WHERE CLI_COURRIEL IS NOT NULL AND CLI_COURRIEL <> ''";
        $emails = [];
        LireDonneesPDO1($conn, $sql, $emails);

        $emails = array_map(fn($e) => $e['CLI_COURRIEL'], $emails);

        if (count($emails) === 0) {
            echo "<script>alert('Aucun email valide trouvé.');</script>";
        } else {
            $successCount = 0;
            $failCount = 0;
            foreach ($emails as $email) {
                $result = @mail(
                    $email,
                    $subject,
                    $message,
                    "From: no-reply@tondomaine.com\r\nReply-To: no-reply@tondomaine.com\r\n"
                );
            
                if ($result) {
                    $successCount++;
                } else {
                    $failCount++;
                }
            
                file_put_contents(
                    'mail_log.txt',
                    date('Y-m-d H:i:s') . " - Envoi à $email : " . ($result ? "OK" : "ÉCHEC") . "\n",
                    FILE_APPEND
                );
            }
        }
    }
    echo "<script>alert('Envois terminés : $successCount succès, $failCount échecs.');</script>";
}

$to = "nathanelie.06@gmail.com"; // Mets ici TON email réel
$subject = "Test d'envoi de mail";
$message = "Bonjour,\n\nCeci est un mail de test envoyé depuis mon serveur.";
$headers = "From: no-reply@users.info.unicaen.fr\r\n";

if (mail($to, $subject, $message, $headers)) {
    echo "Mail envoyé avec succès !";
} else {
    echo "Erreur lors de l'envoi du mail.";
}

?>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<div class="relative min-h-screen w-full">
    <div class="fixed inset-0 w-full h-full bg-neutral-900 bg-[url('./web/assets/img/rapidc3.png')] bg-cover bg-center bg-no-repeat z-0 ">
        <div class="absolute inset-0 bg-black opacity-55"></div>
    </div>
    <div class="z-10 flex h-screen">
        <!-- Sidebar Navigation -->

        <!-- Main Content -->
        <div class="flex-1 flex flex-col px-10 py-6 items-center justify-start z-30 text-white overflow-y-auto">

           <!-- Bloc Statistiques du site -->
<div class="bg-neutral-800 bg-opacity-95 rounded-2xl shadow-lg p-10 max-w-5xl w-full mt-10 mb-8 flex flex-col items-center">
    <h1 class="text-4xl font-extrabold text-orange-400 mb-8 text-center">Statistiques</h1>
    <div class="flex flex-wrap gap-6 justify-between w-full">
        <!-- Clients inscrits -->
        <div class="flex-1 min-w-[180px] bg-neutral-900 border border-neutral-700 rounded-lg p-6 flex flex-col items-center">
            <div class="text-3xl font-bold text-orange-400"><?= htmlspecialchars($nb_clients) ?></div>
            <div class="text-neutral-300 mt-2">Clients inscrits</div>
        </div>
        <!-- Commandes passées -->
        <div class="flex-1 min-w-[180px] bg-neutral-900 border border-neutral-700 rounded-lg p-6 flex flex-col items-center">
            <div class="text-3xl font-bold text-orange-400"><?= htmlspecialchars($nb_commandes) ?></div>
            <div class="text-neutral-300 mt-2">Commandes passées</div>
        </div>
        <!-- Montant moyen commande -->
        <div class="flex-1 min-w-[180px] bg-neutral-900 border border-neutral-700 rounded-lg p-6 flex flex-col items-center">
            <div class="text-3xl font-bold text-orange-400"><?= number_format($moyenne_commande, 2, ',', ' ') ?> €</div>
            <div class="text-neutral-300 mt-2">Montant moyen commande</div>
        </div>
        <!-- Chiffre d'affaires -->
        <div class="flex-1 min-w-[180px] bg-neutral-900 border border-neutral-700 rounded-lg p-6 flex flex-col items-center">
            <div class="text-3xl font-bold text-orange-400"><?= number_format($chiffre_affaires, 2, ',', ' ') ?> €</div>
            <div class="text-neutral-300 mt-2">Chiffre d'affaires</div>
        </div>
    </div>
    <div class="flex flex-wrap gap-6 justify-between w-full mt-6">
        <!-- Meilleurs clients -->
        <div class="flex-1 min-w-[250px] bg-neutral-900 border border-neutral-700 rounded-lg p-6 flex flex-col items-center">
            <div class="text-xl font-bold text-orange-400 mb-2">Meilleurs clients</div>
            <?php foreach ($meilleurs_clients as $cli): ?>
                <div class="text-neutral-200">
                    <?= htmlspecialchars($cli['CLI_NOM'].' '.$cli['CLI_PRENOM']) ?> :
                    <?= number_format(floatval(str_replace(',', '.', $cli['TOTAL'])), 2, ',', ' ') ?> €
                </div>
            <?php endforeach; ?>
        </div>
        <!-- Meilleures périodes de ventes -->
        <div class="flex-1 min-w-[250px] bg-neutral-900 border border-neutral-700 rounded-lg p-6 flex flex-col items-center">
            <div class="text-xl font-bold text-orange-400 mb-2">Meilleures périodes de ventes</div>
            <?php foreach ($meilleures_periodes as $periode): ?>
                <div class="text-neutral-200">
                    <?= htmlspecialchars($periode['PERIODE']) ?> : <?= $periode['NB'] ?> commandes
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- Bloc Envoi de mail -->
<div class="bg-neutral-800 bg-opacity-95 rounded-2xl shadow-lg p-10 max-w-7xl w-full mb-8 flex flex-col items-center">
    <h1 class="text-4xl font-extrabold text-orange-400 mb-8 text-center">Envoi d'un mail à tous les clients</h1>
    <form method="post" action="" class="w-full flex flex-col items-center">
    
    <!-- Sujet -->
    <div class="mb-9 w-full max-w-5xl">
      <label for="mail_subject" class="block mb-2 text-neutral-200 text-lg">
        Sujet
      </label>
      <input 
        type="text" 
        id="mail_subject" 
        name="mail_subject" 
        required
        class="w-full p-2 text-lg rounded bg-neutral-900 border border-neutral-700 text-white"
      >
    </div>

    <!-- Message -->
    <div class="mb-6 w-full max-w-5xl">
      <label for="mail_message" class="block mb-2 text-neutral-200 text-lg">
        Message
      </label>
      <textarea 
        id="mail_message" 
        name="mail_message" 
        rows="5" 
        required
        class="w-full p-2 text-lg rounded bg-neutral-900 border border-neutral-700 text-white"
      ></textarea>
    </div>

    <!-- Bouton -->
    <button 
      type="submit" 
      name="send_mail"
      class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-3 px-8 rounded transition text-lg"
    >
      Envoyer
    </button>

  </form>
</div>

            <!-- Bloc Gestion des clients -->
<div class="bg-neutral-800 bg-opacity-95 rounded-2xl shadow-lg p-10 max-w-7xl w-full mb-8 flex flex-col items-center">
    <h1 class="text-4xl font-extrabold text-orange-400 mb-8 text-center">Gestion des clients</h1>
    <table class="w-full text-left border-collapse">
        <thead>
            <tr>
                <th class="border-b border-neutral-700 pb-2">Nom</th>
                <th class="border-b border-neutral-700 pb-2">Prénom</th>
                <th class="border-b border-neutral-700 pb-2">Email</th>
                <th class="border-b border-neutral-700 pb-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clients as $client): ?>
            <tr>
                <td class="py-2"><?= htmlspecialchars($client['CLI_NOM'] ?? '') ?></td>
                <td class="py-2"><?= htmlspecialchars($client['CLI_PRENOM'] ?? '') ?></td>
                <td class="py-2">
                    <?php
                        if (array_key_exists('CLI_COURRIEL', $client) && $client['CLI_COURRIEL'] !== null && $client['CLI_COURRIEL'] !== '') {
                            echo htmlspecialchars($client['CLI_COURRIEL']);
                        } else {
                            echo "Pas d'adresse mail renseignée";
                        }
                    ?>
                </td>
                <td class="py-2 flex gap-2">
                    <!-- Bouton Modifier (redirige vers une page de modification) -->
                    <?php $cli_id = $client['CLI_NUM'] ?? ''; ?>
                    <a href="modifier_client.php?id=<?= $cli_id !== '' ? urlencode($cli_id) : '' ?>" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded">Modifier</a>
                    <!-- Bouton Supprimer (formulaire POST) -->
                    <form method="post" action="/sae2-456-grp2/web/component/supp.php" onsubmit="return confirm('Supprimer ce client ?');" style="display:inline;">
    <input type="hidden" name="delete_id" value="<?= htmlspecialchars($cli_id) ?>">
    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">Supprimer</button>
</form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
            </div>

            

        </div>
    </div>
</div>



<script>
function closePopupCommandes() {
    document.getElementById('popup-commandes').classList.add('hidden');
    document.getElementById('popup-commandes-list').innerHTML = '';
    document.getElementById('popup-client-name').textContent = '';
}

document.querySelectorAll('.show-commandes').forEach(btn => {
    btn.addEventListener('click', function() {
        const nom = this.getAttribute('data-nom');
        const prenom = this.getAttribute('data-prenom');
        const commandes = JSON.parse(this.getAttribute('data-commandes'));
        let html = '';
        if (commandes.length === 0) {
            html = '<div class="text-neutral-400">Aucune commande</div>';
        } else {
            html = '<ul class="divide-y divide-neutral-700">';
            commandes.forEach(cmd => {
                html += `<li class="py-2">
                    <span class="font-bold">#${cmd.id}</span>
                    <span class="ml-2">(${cmd.date}, ${parseFloat(cmd.total).toFixed(2).replace('.', ',')} €)</span>
                </li>`;
            });
            html += '</ul>';
        }
        document.getElementById('popup-client-name').textContent = `Commandes de ${prenom} ${nom}`;
        document.getElementById('popup-commandes-list').innerHTML = html;
        document.getElementById('popup-commandes').classList.remove('hidden');
    });
});

// Fermer la popup si on clique en dehors
document.getElementById('popup-commandes').addEventListener('click', function(e) {
    if (e.target === this) closePopupCommandes();
});
</script>