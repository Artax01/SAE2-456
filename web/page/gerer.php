<?php
// filepath: vsls:/web/page/gerer.php
session_start();

// Exemple de données clients (à remplacer par une vraie BDD)
$clients = [
    [
        'id' => 1,
        'nom' => 'Dupont',
        'prenom' => 'Jean',
        'email' => 'jean.dupont@email.com',
        'commandes' => [
            ['id' => 101, 'date' => '2024-06-01', 'total' => 45.00],
            ['id' => 102, 'date' => '2024-06-10', 'total' => 22.00],
        ]
    ],
    [
        'id' => 2,
        'nom' => 'Martin',
        'prenom' => 'Claire',
        'email' => 'claire.martin@email.com',
        'commandes' => [
            ['id' => 103, 'date' => '2024-06-05', 'total' => 18.00],
        ]
    ]
];

// Traitement suppression (simulation)
if (isset($_GET['delete'])) {
    // Ici, supprimer le client de la BDD
    // ...
    header('Location: ?page=gerer.php');
    exit;
}

// Traitement modification (simulation)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_id'])) {
    // Ici, mettre à jour le client dans la BDD
    // ...
    header('Location: ?page=gerer.php');
    exit;
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
        <div class="flex-1 flex flex-col px-10 py-6 items-center justify-start z-30 text-white overflow-y-auto"
<!-- Bloc Statistiques -->
<div class="bg-neutral-800 bg-opacity-95 rounded-2xl shadow-lg p-10 max-w-3xl w-full mt-10 mb-8">
<h1 class="text-4xl font-extrabold text-orange-400 mb-8 text-center">Statistique du site</h1>
    <div class="flex flex-wrap gap-6 justify-between">
        <div class="flex-1 min-w-[150px] bg-neutral-900 border border-neutral-700 rounded-lg p-6 flex flex-col items-center">
            <div class="text-3xl font-bold text-orange-400">1 245</div>
            <div class="text-neutral-300 mt-2">Utilisateurs inscrits</div>
        </div>
        <div class="flex-1 min-w-[150px] bg-neutral-900 border border-neutral-700 rounded-lg p-6 flex flex-col items-center">
            <div class="text-3xl font-bold text-orange-400">3 578</div>
            <div class="text-neutral-300 mt-2">Commandes passées</div>
        </div>
        <div class="flex-1 min-w-[150px] bg-neutral-900 border border-neutral-700 rounded-lg p-6 flex flex-col items-center">
            <div class="text-3xl font-bold text-orange-400">12 340 €</div>
            <div class="text-neutral-300 mt-2">Chiffre d'affaires</div>
        </div>
        <div class="flex-1 min-w-[150px] bg-neutral-900 border border-neutral-700 rounded-lg p-6 flex flex-col items-center">
            <div class="text-3xl font-bold text-orange-400">4.8/5</div>
            <div class="text-neutral-300 mt-2">Note moyenne</div>
        </div>
    </div>
</div>
<!-- Bloc Envoi de mail -->
<div class="bg-neutral-800 bg-opacity-95 rounded-2xl shadow-lg p-10 max-w-3xl w-full mb-8">
<h1 class="text-4xl font-extrabold text-orange-400 mb-8 text-center">Envoi d'un mail à tous les clients</h1>
    <form method="post" action="">
        <div class="mb-4">
            <label class="block mb-2 text-neutral-200" for="mail_subject">Sujet</label>
            <input class="w-full p-2 rounded bg-neutral-900 border border-neutral-700 text-white" type="text" id="mail_subject" name="mail_subject" required>
        </div>
        <div class="mb-4">
            <label class="block mb-2 text-neutral-200" for="mail_message">Message</label>
            <textarea class="w-full p-2 rounded bg-neutral-900 border border-neutral-700 text-white" id="mail_message" name="mail_message" rows="5" required></textarea>
        </div>
        <button type="submit" name="send_mail" class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-6 rounded transition">Envoyer</button>
    </form>
</div>
<div class="bg-neutral-800 bg-opacity-95 rounded-2xl shadow-lg p-10 max-w-3xl w-full mb-8">
    <h1 class="text-4xl font-extrabold text-orange-400 mb-8 text-center">Gestion des clients</h1>
    <table class="w-full mb-8 border border-neutral-700">
        <thead>
            <tr class="bg-neutral-700">
                <th class="py-2 px-4 border border-neutral-700 text-white">Nom</th>
                <th class="py-2 px-4 border border-neutral-700 text-white">Prénom</th>
                <th class="py-2 px-4 border border-neutral-700 text-white">Email</th>
                <th class="py-2 px-4 border border-neutral-700 text-white">Commandes</th>
                <th class="py-2 px-4 border border-neutral-700 text-white">Actions</th>
            </tr>
        </thead>
                                 
<tbody>
    <?php foreach ($clients as $client): ?>
    <tr class="border-b border-neutral-700">
        <td class="py-2 px-4 border border-neutral-700"><?= htmlspecialchars($client['nom']) ?></td>
        <td class="py-2 px-4 border border-neutral-700"><?= htmlspecialchars($client['prenom']) ?></td>
        <td class="py-2 px-4 border border-neutral-700"><?= htmlspecialchars($client['email']) ?></td>
        <td class="py-2 px-4 border border-neutral-700">
            <?php if (count($client['commandes'])): ?>
                <button type="button"
                    class="show-commandes bg-neutral-700 text-white px-3 py-1 rounded hover:bg-neutral-600 mb-1"
                    data-client="<?= $client['id'] ?>"
                    data-nom="<?= htmlspecialchars($client['nom']) ?>"
                    data-prenom="<?= htmlspecialchars($client['prenom']) ?>"
                    data-commandes='<?= htmlspecialchars(json_encode($client['commandes']), ENT_QUOTES) ?>'>
                    Voir commandes
                </button>
            <?php else: ?>
                <span class="text-neutral-400">Aucune</span>
            <?php endif; ?>
        </td>
        <td class="py-2 px-4 border border-neutral-700 flex gap-2">
            <!-- Modifier -->
            <button onclick="showEditForm(<?= $client['id'] ?>, '<?= htmlspecialchars($client['nom'], ENT_QUOTES) ?>', '<?= htmlspecialchars($client['prenom'], ENT_QUOTES) ?>', '<?= htmlspecialchars($client['email'], ENT_QUOTES) ?>')" class="material-icons text-blue-300 hover:text-blue-500 bg-neutral-700 rounded-full p-1">edit</button>
            <!-- Supprimer -->
            <a href="?page=gerer.php&delete=<?= $client['id'] ?>" onclick="return confirm('Supprimer ce client ?')" class="material-icons text-red-400 hover:text-red-600 bg-neutral-700 rounded-full p-1">delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</tbody>


<!-- Pop-up commandes -->
<div id="popup-commandes" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-70 hidden">
    <div class="bg-neutral-900 rounded-xl shadow-xl p-8 max-w-md w-full text-white relative">
        <button onclick="closePopupCommandes()" class="absolute top-2 right-2 text-2xl text-white hover:text-orange-400">&times;</button>
        <h2 id="popup-client-name" class="text-2xl font-bold mb-4"></h2>
        <div id="popup-commandes-list"></div>
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