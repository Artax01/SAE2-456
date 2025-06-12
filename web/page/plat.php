<?php require_once("../../php/functions.php"); ?>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<div class="relative min-h-screen w-full">
  <!-- Image de fond -->
  <div class="fixed inset-0 w-full h-full bg-[url('./web/assets/img/fast-food.jpeg')] bg-cover bg-center bg-no-repeat z-0">
    <div class="absolute inset-0 bg-black opacity-55"></div>
  </div>

  <!-- NAV BAR GAUCHE -->
  <div class="relative z-10 flex">
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
          <?php 
            if (isset($_SERVER['commande']['produits']) && isset($_SERVER['commande']['menus'])) {
                echo count($_SERVER['commande']['produits']) + count($_SERVER['commande']['menus']);
            } else {
                echo 0;
                var_dump($_SERVER['commande']['produits']);
            }
        ?>
        </a>
      </div>
    </aside>

    <!-- Main Content -->
    <!-- Ajout d'une marge à gauche (ml-72) pour décaler le contenu et éviter qu'il soit masqué derrière la navbar -->
    <div class="flex-1 flex flex-col ml-72 pr-10 py-6">
      <!-- Titre -->
      <h1 class="text-5xl font-extrabold text-orange-400 mb-8 tracking-wide">NOS PLATS</h1>

      <?php 
      // On récupère la liste des types de plats (ex: KEBAB, BOISSON, etc.)
      $typesPlats = getNamePlat($conn); 
      ?>
      <?php foreach($typesPlats as $nomPlat): ?>
        <!-- Affichage du type de plat -->
        <h2 class="text-4xl font-extrabold text-white mb-6"><?= strtoupper(htmlspecialchars($nomPlat)) ?></h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6 justify-items-center">
          <?php 
          // Récupération des plats pour chaque type
          $plats = getPlatByType($conn, $nomPlat); 
          ?>
          <?php foreach($plats as $plat): ?>
            <?php $platInfo = getImgInfoPerPlats($conn, $plat["PLA_NUM"]); ?>
            <div class="relative group w-80 h-[380px]">
              <!-- Image + overlay description -->
              <div class="absolute top-0 left-0 w-full flex flex-col items-center">
                <div class="relative rounded-2xl overflow-hidden h-40 w-full border-4 border-orange-300 shadow-lg">
                  <img src="<?= $platInfo["CHEMIN_IMG"] ?? 'web/assets/img/image_non_trouve.jpg' ?>"
                      alt="<?= $platInfo["ALT_DESC_IMG"] ?? '' ?>"
                      class="h-full w-full object-cover transition-all duration-500 group-hover:scale-105">
                  <!-- Overlay Description vers le haut -->
                  <div class="absolute left-0 top-0 w-full transition-all duration-500 ease-out -translate-y-full group-hover:translate-y-0 opacity-0 group-hover:opacity-100 bg-gradient-to-b from-black/90 to-transparent text-white rounded-t-2xl p-4 text-center flex flex-col items-center justify-start pointer-events-auto overflow-y-auto max-h-36 scrollbar-thin scrollbar-thumb-orange-400 scrollbar-track-black/40 desc-overlay-scroll"
                       style="will-change: transform, opacity;">
                    <div class="font-bold text-lg mb-1 break-words">Description</div>
                    <div class="text-sm break-words">
                      <?= $plat["PLA_DESCRIPTION"] ?? '' ?>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Infos du plat + boutons -->
              <div class="absolute bottom-0 left-0 w-full flex flex-col items-center">
                <div class="bg-white rounded-full px-8 py-2 font-bold text-lg mb-6 shadow text-black mt-1 text-center">
                  <?= $plat["PLA_NOM"] ?? '' ?><br>
                  <span class="font-normal"><?= $plat["PLA_PRIX_VENTE_UNIT_HT"] ?? '' ?>€</span>
                </div>
                <div class="flex gap-4 mb-4">
                  <form action="./web/commande/ajout_panier.php" method="POST">
                    <input type="hidden" name="pla_num" value="<?= $plat["PLA_NUM"] ?>">
                    <button type="submit" class="border-2 border-orange-400 text-orange-400 font-semibold px-4 py-2 rounded-full hover:bg-orange-50 transition">Ajouter au panier</button>
                  </form>
                  <form action="./web/commande/commander.php" method="POST">
                    <input type="hidden" name="pla_num" value="<?= $plat["PLA_NUM"] ?>">
                    <button type="submit" class="bg-orange-400 text-white font-semibold px-6 py-2 rounded-full hover:bg-orange-500 transition h-full">Commander</button>
                  </form>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>

<script>
  // Empêche la propagation du scroll à la page quand la souris est sur la description
  document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.desc-overlay-scroll').forEach(function (el) {
      el.addEventListener('wheel', function (e) {
        // Permet le défilement dans la div seulement si elle peut défiler
        const atTop = el.scrollTop === 0;
        const atBottom = el.scrollHeight - el.scrollTop === el.clientHeight;

        if ((e.deltaY < 0 && atTop) || (e.deltaY > 0 && atBottom)) {
          return;
        }
        // Sinon, on scroll la div et on bloque le scroll de la page
        e.stopPropagation();
        e.preventDefault();
      }, { passive: false });
    });
  });
</script>
