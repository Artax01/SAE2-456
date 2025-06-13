<?php
require_once '../session/session.php';
require_once '../../php/connexion.php';

// Statistiques
$sql = "SELECT COUNT(*) AS NB FROM RAP_CLIENT";
$tab = [];
LireDonneesPDO1($conn, $sql, $tab);
$nb_clients = $tab[0]['NB'];

$sql = "SELECT COUNT(*) AS NB FROM RAP_COMMANDE";
$tab = [];
LireDonneesPDO1($conn, $sql, $tab);
$nb_commandes = $tab[0]['NB'];

$sql = "SELECT SUM(COM_PRIX_TOTAL) AS TOTAL FROM RAP_COMMANDE";
$tab = [];
LireDonneesPDO1($conn, $sql, $tab);
$chiffre_affaires = $tab[0]['TOTAL'];
if ($chiffre_affaires === null) $chiffre_affaires = 0;
$chiffre_affaires = str_replace(',', '.', $chiffre_affaires);
$chiffre_affaires = floatval($chiffre_affaires);

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
    WHERE C.CLI_NOM not like 'NON CLIENT'
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
?>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<div class="relative min-h-screen w-full">
    <div class="fixed inset-0 w-full h-full bg-neutral-900 bg-[url('./web/assets/img/rapidc3.png')] bg-cover bg-center bg-no-repeat z-0 ">
        <div class="absolute inset-0 bg-black opacity-55"></div>
    </div>
    <div class="z-10 flex h-screen">
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

            <!-- Bloc Gestion des clients -->
            <div class="bg-neutral-800 bg-opacity-95 rounded-2xl shadow-lg p-10 w-full mb-8 flex flex-col items-center">
                <h1 class="text-4xl font-extrabold text-orange-400 mb-8 text-center">Gestion des clients</h1>
                <div class="mb-6 w-full max-w-md mx-auto flex items-center gap-2">
    <input 
        type="text" 
        id="search-bar" 
        class="py-2 px-4 w-full border border-gray-300 rounded-lg text-black bg-white focus:border-blue-500 focus:ring-blue-500" 
        placeholder="Rechercher un client par ID, nom, prénom ou email..."
    >
    <button 
        id="search-button" 
        class="py-2 px-4 bg-blue-500 hover:bg-blue-600 text-white rounded-lg flex items-center gap-2"
    >
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 18l6-6m0 0l-6-6m6 6H3" />
        </svg>
        Rechercher
    </button>
</div>
                <div id="table-clients" class="w-full overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr>
                                <th class="border-b border-neutral-700 pb-2">ID</th>
                                <th class="border-b border-neutral-700 pb-2">Nom</th>
                                <th class="border-b border-neutral-700 pb-2">Prénom</th>
                                <th class="border-b border-neutral-700 pb-2">Email</th>
                                <th class="border-b border-neutral-700 pb-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($clients as $client): ?>
                            <tr>
                                <td class="py-2"><?= htmlspecialchars($client['CLI_NUM'] ?? '') ?></td>
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
    <?php $cli_id = $client['CLI_NUM'] ?? ''; ?>
    <button 
            type="button"
            class="btn-modifier bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded"
        >Modifier</button>
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
            <div class="bg-neutral-800 bg-opacity-95 rounded-2xl shadow-lg p-10 w-full mb-8 flex flex-col items-center">
    <h1 class="text-4xl font-extrabold text-orange-400 mb-8 text-center">Envoyer un mail</h1>
    <form id="emailForm" class="w-full max-w-4xl">
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-white mb-2">Adresse mail du destinataire</label>
            <input type="email" id="email" name="email" class="py-3 px-5 block w-4/5 border-gray-200 rounded-lg text-white focus:border-blue-500 focus:ring-blue-500 mx-auto" required>
        </div>
        <div class="mb-4">
            <label for="subject" class="block text-sm font-medium text-white mb-2">Sujet</label>
            <input type="text" id="subject" name="subject" class="py-3 px-5 block w-4/5 border-gray-200 rounded-lg text-white focus:border-blue-500 focus:ring-blue-500 mx-auto" required>
        </div>
        <div class="mb-4">
            <label for="message" class="block text-sm font-medium text-white mb-2">Message</label>
            <textarea id="message" name="message" rows="7" class="py-3 px-5 block w-4/5 border-gray-200 rounded-lg text-white focus:border-blue-500 focus:ring-blue-500 mx-auto" required></textarea>
        </div>
        <button type="submit" class="w-4/5 bg-orange-400 hover:bg-orange-500 text-white font-bold py-4 rounded-lg text-xl transition mx-auto">Envoyer</button>
    </form>
    <div id="emailStatus" class="mt-4 text-white"></div>
</div>

<script>
    // Add event listener for the search button
    document.getElementById('search-button').addEventListener('click', function () {
        const searchValue = document.getElementById('search-bar').value.toLowerCase();
        const rows = document.querySelectorAll('#client-table-body tr');
        
        rows.forEach(row => {
            const cells = row.querySelectorAll('td');
            const match = Array.from(cells).some(cell => cell.textContent.toLowerCase().includes(searchValue));
            row.style.display = match ? '' : 'none';
        });
    });

    // Add event listener for real-time filtering as the user types
    document.getElementById('search-bar').addEventListener('input', function () {
        const searchValue = this.value.toLowerCase();
        const rows = document.querySelectorAll('#client-table-body tr');
        
        rows.forEach(row => {
            const cells = row.querySelectorAll('td');
            const match = Array.from(cells).some(cell => cell.textContent.toLowerCase().includes(searchValue));
            row.style.display = match ? '' : 'none';
        });
    });
</script>