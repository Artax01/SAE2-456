<?php
session_start();

// Ajouter ou retirer un article du panier
if (isset($_GET['add']) && isset($_SESSION['panier'][$_GET['add']])) {
    $_SESSION['panier'][$_GET['add']]['quantite']++;
    header('Location: ?page=panier.php');
    exit;
}
if (isset($_GET['remove']) && isset($_SESSION['panier'][$_GET['remove']])) {
    $id = $_GET['remove'];
    if ($_SESSION['panier'][$id]['quantite'] > 1) {
        $_SESSION['panier'][$id]['quantite']--;
    } else {
        unset($_SESSION['panier'][$id]);
    }
    header('Location: ?page=panier.php');
    exit;
}
if (isset($_GET['delete']) && isset($_SESSION['panier'][$_GET['delete']])) {
    unset($_SESSION['panier'][$_GET['delete']]);
    header('Location: ?page=panier.php');
    exit;
}

// Récupération du panier
$panier = isset($_SESSION['panier']) ? $_SESSION['panier'] : [];
$total = 0;
foreach ($panier as $item) {
    $total += $item['prix'] * $item['quantite'];
}
?>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<div class="relative min-h-screen w-full">
    <!-- Image de fond + filtre opaque -->
    <div class="fixed inset-0 w-full h-full bg-[url('')] bg-cover bg-center bg-no-repeat z-0 ">
        <div class="absolute inset-0 bg-black opacity-55"></div>
    </div>
    <!-- Contenu principal en relatif -->
    <div class="relative z-10 flex h-screen">
        <!-- Sidebar Navigation -->
        <aside class="fixed top-1/2 left-0 transform -translate-y-1/2 flex flex-col items-center py-4 px-2 backdrop-blur dark:bg-neutral-800  h-auto transition-all duration-300 group w-20 hover:w-56 z-20">
            <div class="absolute top-1/2 right-[-12px] transform -translate-y-1/2 flex items-center justify-center w-6 h-6 bg-[#E7E4E0] rounded-full shadow border border-orange-300 z-30 pointer-events-none">
                <svg class="w-4 h-4 text-orange-400 group-hover:scale-x-[-1] transition-transform duration-300" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                    <path d="M9 6l6 6-6 6" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </div>
            <!-- Liens de navigation avec icônes -->
            <div class="flex items-center mb-8 w-full justify-center group-hover:justify-start">
                <a href="?page=accueil.php" class="material-icons text-orange-400 text-7xl transition-all duration-300 mx-auto group-hover:mr-2 group-hover:mx-0 flex items-center justify-center">home</a>
                <a href="?page=accueil.php"
                    class="ml-0 w-full text-left text-lg font-semibold text-white
        transition-all duration-300 whitespace-nowrap
        focus:outline-none
        hover:bg-orange-100 hover:text-orange-500
        active:scale-95
        transition-transform
        rounded-md py-1 px-2
        opacity-0 group-hover:opacity-100
        hidden group-hover:inline">
                    Accueil
                </a>
            </div>
            <div class="flex items-center mb-8 w-full justify-center group-hover:justify-start">
                <a href="?page=menu.php" class="material-icons text-orange-400 text-7xl transition-all duration-300 mx-auto group-hover:mr-2 group-hover:mx-0 flex items-center justify-center">restaurant_menu</a>
                <a href="?page=menu.php"
                    class="ml-0 w-full text-left text-lg font-semibold text-white
        transition-all duration-300 whitespace-nowrap
        focus:outline-none
        hover:bg-orange-100 hover:text-orange-500
        active:scale-95
        transition-transform
        rounded-md py-1 px-2
        opacity-0 group-hover:opacity-100
        hidden group-hover:inline">
                    Nos Menus
                </a>
            </div>
            <div class="flex items-center mb-8 w-full justify-center group-hover:justify-start">
                <a href="?page=plat.php" class="material-icons text-orange-400 text-7xl transition-all duration-300 mx-auto group-hover:mr-2 group-hover:mx-0 flex items-center justify-center">restaurant</a>
                <a href="?page=plat.php"
                    class="ml-0 w-full text-left text-lg font-semibold text-white
        transition-all duration-300 whitespace-nowrap
        focus:outline-none
        hover:bg-orange-100 hover:text-orange-500
        active:scale-95
        transition-transform
        rounded-md py-1 px-2
        opacity-0 group-hover:opacity-100
        hidden group-hover:inline">
                    Nos Plats
                </a>
            </div>
            <div class="flex items-center mb-8 w-full justify-center group-hover:justify-start">
                <a href="?page=panier.php" class="material-icons text-orange-400 text-7xl transition-all duration-300 mx-auto group-hover:mr-2 group-hover:mx-0 flex items-center justify-center">shopping_cart</a>
                <a href="?page=panier.php"
                    class="ml-0 w-full text-left text-lg font-semibold text-white
        transition-all duration-300 whitespace-nowrap
        focus:outline-none
        hover:bg-orange-100 hover:text-orange-500
        active:scale-95
        transition-transform
        rounded-md py-1 px-2
        opacity-0 group-hover:opacity-100
        hidden group-hover:inline
      ">
                    Panier
                </a>
            </div>
        </aside>
    <!-- Titre -->
    <h1 class="text-4xl font-extrabold text-orange-500 mb-8 mt-8 ml-16 tracking-wide uppercase" style="font-family: 'Montserrat', sans-serif;">PANIER</h1>
    <div class="flex flex-wrap gap-10 justify-start ml-16">
        <!-- Liste des articles du panier -->
        <?php if (empty($panier)): ?>
            <div class="text-center text-gray-500 text-xl py-12 w-full">Votre panier est vide.</div>
        <?php else: ?>
            <?php foreach ($panier as $id => $item): ?>
                <div class="bg-neutral-900 rounded-2xl shadow-lg p-8 w-96 flex flex-col items-center mb-8 border border-gray-800">
                    <div class="w-full flex flex-col items-center">
                        <div class="w-40 h-28 border-2 border-orange-400 rounded-xl mb-2 flex items-center justify-center text-gray-500 bg-gray-800 overflow-hidden">
                            <?php if (!empty($item['image'])): ?>
                                <img src="<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['nom']) ?>" class="object-cover w-full h-full">
                            <?php else: ?>
                                <span class="text-white">Pizza</span>
                            <?php endif; ?>
                        </div>
                        <div class="font-extrabold text-2xl text-center mt-2 text-white"><?= htmlspecialchars($item['nom']) ?></div>
                        <div class="text-lg text-gray-300 mb-2"><?= $item['prix'] ?>€</div>
                        <div class="flex items-center justify-center gap-2 mb-4">
                            <a href="?page=panier.php&remove=<?= urlencode($id) ?>" class="border-2 border-orange-400 text-orange-400 rounded-full w-8 h-8 flex items-center justify-center text-2xl font-bold hover:bg-orange-50 transition">-</a>
                            <span class="mx-2 text-xl font-bold text-white"><?= $item['quantite'] ?></span>
                            <a href="?page=panier.php&add=<?= urlencode($id) ?>" class="border-2 border-orange-400 text-orange-400 rounded-full w-8 h-8 flex items-center justify-center text-2xl font-bold hover:bg-orange-50 transition">+</a>
                        </div>
                        <a href="?page=panier.php&delete=<?= urlencode($id) ?>" class="w-full bg-orange-500 hover:bg-orange-600 text-white font-semibold py-2 rounded-full text-lg transition text-center mt-2">Supprimer</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
        <!-- Résumé panier -->
        <div class="bg-neutral-900 rounded-2xl shadow-lg p-8 w-96 h-fit ml-auto border border-gray-800 flex flex-col justify-between">
            <div>
                <div class="text-2xl font-bold text-orange-500 mb-4">Résumé</div>
                <div class="flex justify-between items-center text-lg font-semibold mb-6 text-white">
                    <span>Total :</span>
                    <span><?= $total ?>€</span>
                </div>
            </div>
            <button class="w-full bg-orange-500 hover:bg-orange-600 text-white font-bold py-3 rounded-full text-xl transition mt-2">Commander</button>
        </div>
    </div>
</div>