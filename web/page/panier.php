<!-- Panier - Voir les articles ajoutés -->
<?php
session_start();

// Initialisation du panier en session si besoin
if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = [
        ["nom" => "Pizza 4 fromages", "prix" => 25.00, "quantite" => 2],
        ["nom" => "Pizza 2 fromages", "prix" => 22.00, "quantite" => 1],
        ["nom" => "Burger Classique", "prix" => 18.00, "quantite" => 1],
        ["nom" => "Wrap Poulet", "prix" => 12.00, "quantite" => 2]
    ];
}

// Gestion AJAX pour + et - sans rechargement
if (isset($_GET['ajax']) && $_GET['ajax'] == 1 && isset($_GET['action'], $_GET['nom'])) {
    foreach ($_SESSION['panier'] as $i => $produit) {
        if ($produit['nom'] === $_GET['nom']) {
            if ($_GET['action'] === 'plus') {
                $_SESSION['panier'][$i]['quantite']++;
            } elseif ($_GET['action'] === 'moins') {
                $_SESSION['panier'][$i]['quantite']--;
                if ($_SESSION['panier'][$i]['quantite'] <= 0) {
                    array_splice($_SESSION['panier'], $i, 1);
                }
            }
            break;
        }
    }
    // Recalcule le total
    $panier = $_SESSION['panier'];
    $total = 0;
    foreach ($panier as $produit) {
        $total += $produit['prix'] * $produit['quantite'];
    }
    $_SESSION['panier_total'] = $total;

    // Génère le HTML du panier à renvoyer
    ob_start();
    ?>
    <ul class="divide-y divide-gray-200 mb-6">
      <?php foreach ($panier as $produit): 
        $nom = htmlspecialchars($produit['nom']);
        $prix = number_format($produit['prix'], 2, ',', ' ');
        $quantite = (int)$produit['quantite'];
      ?>
        <li class="flex items-center justify-between py-4">
            <div class="flex items-center gap-4">
                <img src="https://images.unsplash.com/photo-1513104890138-7c749659a591?auto=format&fit=crop&w=80&q=80" 
                    alt="<?= $nom ?>" 
                    class="w-20 h-20 rounded-xl object-cover border-2 border-orange-200">
                <div>
                    <div class="font-bold text-black text-lg"><?= $nom ?></div>
                    <div class="text-gray-500 flex items-center gap-2">
                        <button type="button" class="btn-moins text-3xl px-4 py-1 bg-orange-100 rounded hover:bg-orange-200" data-nom="<?= $nom ?>">-</button>
                        <span><?= $quantite ?> × <?= $prix ?>€</span>
                        <button type="button" class="btn-plus text-3xl px-4 py-1 bg-orange-100 rounded hover:bg-orange-200" data-nom="<?= $nom ?>">+</button>
                    </div>
                </div>
            </div>
        </li>
      <?php endforeach; ?>
    </ul>
    <div class="flex justify-between items-center mb-6">
      <span class="text-xl font-bold text-black">Total </span>
      <span class="text-xl font-bold text-orange-500"><?= number_format($total, 2, ',', ' ') ?> €</span>
    </div>
    <a href="?page=payer.php">
      <button class="w-full bg-orange-400 hover:bg-orange-500 text-white font-bold py-3 rounded-full text-xl transition">Payer</button>
    </a>
    <?php
    $html = ob_get_clean();
    echo json_encode(['success' => true, 'html' => $html]);
    exit;
}

// Calcul classique pour affichage initial
$panier = $_SESSION['panier'];
$total = 0;
foreach ($panier as $produit) {
    $total += $produit['prix'] * $produit['quantite'];
}
$_SESSION['panier_total'] = $total;
?>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<div class="relative min-h-screen w-full">
  <!-- Image de fond + filtre opaque -->
  <div class="fixed inset-0 w-full h-full bg-[url('./web/assets/img/fast-food.jpeg')] bg-cover bg-center bg-no-repeat z-0">
    <div class="absolute inset-0 bg-black opacity-55"></div>
  </div>
  <!-- Contenu principal en relatif -->
  <div class="relative z-10 flex h-screen">
    <!-- Sidebar Navigation -->
    <aside class="fixed top-1/2 left-0 transform -translate-y-1/2 flex flex-col items-center py-6 px-4 backdrop-blur dark:bg-neutral-800 h-auto w-64 z-20 rounded-r-3xl shadow-lg">
    <!-- Lien 1 -->
    <div class="flex items-center mb-10 w-full justify-start">
        <a href="?page=accueil.php" class="material-icons text-orange-400 text-[4.5rem] mr-4 flex items-center justify-center">home</a>
        <a href="?page=accueil.php"
           class="w-full text-left text-xl font-bold text-white transition-all duration-300 whitespace-nowrap focus:outline-none hover:bg-orange-100 hover:text-orange-500 active:scale-95 transition-transform rounded-md py-2 px-3">
            Accueil
        </a>
    </div>
    <!-- Lien 2 -->
    <div class="flex items-center mb-10 w-full justify-start">
        <a href="?page=menu.php" class="material-icons text-orange-400 text-[4.5rem] mr-4 flex items-center justify-center">menu_book</a>
        <a href="?page=menu.php"
           class="w-full text-left text-xl font-bold text-white transition-all duration-300 whitespace-nowrap focus:outline-none hover:bg-orange-100 hover:text-orange-500 active:scale-95 transition-transform rounded-md py-2 px-3">
            Nos Menus
        </a>
    </div>
    <!-- Lien 3 -->
    <div class="flex items-center mb-10 w-full justify-start">
        <a href="?page=plat.php" class="material-icons text-orange-400 text-[4.5rem] mr-4 flex items-center justify-center">restaurant</a>
        <a href="?page=plat.php"
           class="w-full text-left text-xl font-bold text-white transition-all duration-300 whitespace-nowrap focus:outline-none hover:bg-orange-100 hover:text-orange-500 active:scale-95 transition-transform rounded-md py-2 px-3">
            Nos Plats
        </a>
    </div>
    <!-- Lien 4 -->
    <div class="flex items-center mb-10 w-full justify-start">
        <a href="?page=panier.php" class="material-icons text-orange-400 text-[4.5rem] mr-4 flex items-center justify-center">shopping_cart</a>
        <a href="?page=panier.php"
           class="w-full text-left text-xl font-bold text-white transition-all duration-300 whitespace-nowrap focus:outline-none hover:bg-orange-100 hover:text-orange-500 active:scale-95 transition-transform rounded-md py-2 px-3">
            Panier
        </a>
    </div>
</aside>
    <!-- Main Content -->
    <div class="flex-1 flex flex-col px-10 py-6">
      <!-- Titre -->
      <h1 class="text-5xl font-extrabold text-orange-400 mb-8 tracking-wide text-center">VOTRE PANIER</h1>
      <!-- Liste des articles du panier -->

      <div class="bg-white bg-opacity-90 rounded-2xl shadow-lg p-8 max-w-2xl mx-auto" id="panier-content">
        <ul class="divide-y divide-gray-200 mb-6">
          <?php
          foreach ($panier as $produit) {
            $nom = htmlspecialchars($produit['nom']);
            $prix = number_format($produit['prix'], 2, ',', ' ');
            $quantite = (int)$produit['quantite'];
            echo '
              <li class="flex items-center justify-between py-4">
                  <div class="flex items-center gap-4">
                      <img src="https://images.unsplash.com/photo-1513104890138-7c749659a591?auto=format&fit=crop&w=80&q=80" 
                          alt="' . $nom . '" 
                          class="w-20 h-20 rounded-xl object-cover border-2 border-orange-200">
                      <div>
                          <div class="font-bold text-black text-lg">' . $nom . '</div>
                          <div class="text-gray-500 flex items-center gap-2">
                              <button type="button" class="btn-moins text-3xl px-4 py-1 bg-orange-100 rounded hover:bg-orange-200" data-nom="' . $nom . '">-</button>
                              <span>' . $quantite . ' × ' . $prix . '€</span>
                              <button type="button" class="btn-plus text-3xl px-4 py-1 bg-orange-100 rounded hover:bg-orange-200" data-nom="' . $nom . '">+</button>
                          </div>
                      </div>
                  </div>
              </li>
            ';
          }
          ?>
        </ul>
        <div class="flex justify-between items-center mb-6">
          <span class="text-xl font-bold text-black">Total :</span>
          <span class="text-xl font-bold text-orange-500"><?php echo number_format($total, 2, ',', ' '); ?> €</span>
        </div>
        <a href="?page=payer.php">
          <button class="w-full bg-orange-400 hover:bg-orange-500 text-white font-bold py-3 rounded-full text-xl transition">Payer</button>
        </a>
      </div>
    </div>
  </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function () {
    function bindPanierButtons() {
        document.querySelectorAll('.btn-plus, .btn-moins').forEach(btn => {
            btn.onclick = function () {
                const nom = this.getAttribute('data-nom');
                const action = this.classList.contains('btn-plus') ? 'plus' : 'moins';
                fetch('?page=panier.php&ajax=1&action=' + action + '&nom=' + encodeURIComponent(nom))
                    .then(r => r.json())
                    .then(data => {
                        if (data.success) {
                            document.getElementById('panier-content').innerHTML = data.html;
                            bindPanierButtons(); // Re-bind sur le nouveau contenu
                        }
                    });
            };
        });
    }
    bindPanierButtons();
});
</script>
