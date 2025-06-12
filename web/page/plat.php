<?php require_once("../../php/functions.php"); ?>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<div class="relative min-h-screen w-full">
  <!-- Image de fond -->
 <div class="fixed inset-0 w-full h-full bg-[url('./web/assets/img/fast-food.jpeg')] bg-cover bg-center bg-no-repeat z-0 ">
    <div class="absolute inset-0 bg-black opacity-55"></div>
  </div>

  <!-- NAV BAR GAUCHE -->
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
<!-- ...existing code... -->

  <!-- Main Content -->
  <div class="flex-1 flex flex-col px-10 py-6">
    <!-- Barre de recherche -->
    
    <!--<div class="flex justify-center mb-6">
      <div class="relative w-[600px]">
        <input type="text" placeholder="Rechercher..." class="w-full rounded-full py-2 pl-12 pr-4 bg-gray-200 focus:outline-none focus:ring-2 focus:ring-orange-400 text-lg shadow"/>
        <svg class="absolute left-3 top-2.5 w-6 h-6 text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
      </div>
    </aside> -->
    <!-- Main Content -->
    <div class="flex-1 flex flex-col pl-72 pr-10 py-6 overflow-y-auto">
      <!-- Titre -->
      <h1 class="text-5xl font-extrabold text-orange-400 mb-8 tracking-wide">NOS PLATS</h1>

      <!-- Grille des menus -->
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6 justify-items-center">
        <!-- Menu Card (exemple, duplique-le pour chaque item) -->
        <!-- Menu 1 -->
        <?php $plats = getPlats($conn); ?>
        <?php foreach($plats as $plat): ?>
        <?php $platInfo = getImgInfoPerPlats($conn, $plat["PLA_NUM"]); ?>
        <div class="relative group w-80 h-[380px]">
          <!-- Image + overlay description (s'ouvre vers le haut) -->
          <div class="absolute top-0 left-0 w-full flex flex-col items-center">
            <div class="relative rounded-2xl overflow-hidden h-40 w-full border-4 border-orange-300 shadow-lg">
              <img src="web/<?=$platInfo["CHEMIN_IMG"] ?>"
                   alt="<?=$platInfo["ALT_DESC_IMG"] ?>"
                   class="h-full w-full object-cover transition-all duration-500 group-hover:scale-105">
              <!-- Overlay Description qui s'ouvre VERS LE HAUT -->
              <div class="absolute left-0 top-0 w-full
                          transition-all duration-500 ease-out
                          -translate-y-full group-hover:translate-y-0
                          opacity-0 group-hover:opacity-100
                          bg-gradient-to-b from-black/90 to-transparent
                          text-white rounded-t-2xl p-4 text-center flex flex-col items-center justify-start pointer-events-auto
                          overflow-y-auto max-h-36 scrollbar-thin scrollbar-thumb-orange-400 scrollbar-track-black/40 desc-overlay-scroll"
                   style="will-change: transform, opacity;">
                <div class="font-bold text-lg mb-1 break-words">Description</div>
                <div class="text-sm break-words">
                  <?=$plat["PLA_DESCRIPTION"] ?? '' ?>
                </div>
              </div>
            </div>
          </div>
          <!-- Infos Plat + boutons, toujours en bas -->
          <div class="absolute bottom-0 left-0 w-full flex flex-col items-center">
            <div class="bg-white rounded-full px-8 py-2 font-bold text-lg mb-6 shadow text-black mt-1"><?=$plat["PLA_NOM"] ?><br><span class="font-normal"><?=$plat["PLA_PRIX_VENTE_UNIT_HT"] ?>€</span></div>
            <div class="flex gap-4 mb-4">
              <form action="commander.php" method="POST">
                <input type="text" name="pla_num" value="<?=$plat["PLA_NUM"] ?>" class="hidden">
                <button class="border-2 border-orange-400 text-orange-400 font-semibold px-4 py-2 rounded-full hover:bg-orange-50 transition">Ajouter au panier</button>
                <button class="bg-orange-400 text-white font-semibold px-6 py-2 rounded-full hover:bg-orange-500 transition">Commander</button>
              </form>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>

<script>
  // Cette fonction empêche la propagation du scroll à la page quand la souris est sur la description
  document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.desc-overlay-scroll').forEach(function (el) {
      el.addEventListener('wheel', function (e) {
        // Permet le scroll dans la div seulement si elle peut défiler
        const atTop = el.scrollTop === 0;
        const atBottom = el.scrollHeight - el.scrollTop === el.clientHeight;

        if (
          (e.deltaY < 0 && atTop) ||
          (e.deltaY > 0 && atBottom)
        ) {
          // On est en haut et on veut scroller vers le haut OU en bas et on veut scroller vers le bas -> on laisse la main au parent
          return;
        }
        // Sinon, on scroll la div et on bloque le scroll de la page
        e.stopPropagation();
        e.preventDefault();
      }, { passive: false });
    });
  });
</script>
