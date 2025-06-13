
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<?php 
require_once './web/session/session.php';
?>

<link rel="stylesheet" href="./web/assets/css/navbar.css">

<!-- ========== NAVBAR MOBILE ========== -->
<div class="navbar">
  <button id="btn-accueil" onclick="loadPage('accueil.php', this)">
  <a href="?page=accueil.php" class="material-icons text-orange-400 text-[4.5rem] mr-4 flex items-center justify-center">home</a>
    <small>Accueil</small>
  </button>
  
  <button id="btn-commander" onclick="loadPage('menu.php', this)">
  <a href="?page=menu.php" class="material-icons text-orange-400 text-[4.5rem] mr-4 flex items-center justify-center">menu_book</a>

    <small>Menus</small>
  </button>

  <button id="btn-commander" onclick="loadPage('plat.php', this)">
  <a href="?page=plat.php" class="material-icons text-orange-400 text-[4.5rem] mr-4 flex items-center justify-center">restaurant</a>

    <small>Plats</small>
  </button>

  <button id="btn-compte" onclick="loadPage('panier.php', this)">
  <a href="?page=panier.php" class="material-icons text-orange-400 text-[4.5rem] mr-4 flex items-center justify-center">shopping_cart</a>

      <small>Panier</small>
  </button>
</div>
<!-- ========== END NAVBAR MOBILE ========== -->



<!-- ========== NAVBAR DESKTOP ========== -->
<!-- bg-neutral-800/80 -->
<body class="bg-neutral-900 text-white">
<header id="top-navbar"
  class="sticky top-0 inset-x-0 z-50 w-full text-white">
  <nav class="w-full flex items-center justify-between px-0 py-2"> <!-- retire mx-auto et max-w-[85rem] -->

    <!-- logo centré sur mobile -->
    <div class="flex items-center ml-4">
      <button id="btn-title" class="text-white font-semibold focus:outline-hidden focus:opacity-80" onclick="loadPage('accueil.php', this)">
        <img src="./web/assets/img/logoC3.png" class="h-20 w-23">
      </button>
    </div>
    <!-- end logo -->

    <?php require_once './php/connexion.php'; ?>

    <!-- buttons -->
  <div id="hs-header-scrollspy" class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow md:block" aria-labelledby="hs-header-scrollspy-collapse">
   <div class="overflow-hidden overflow-y-auto max-h-[75vh] [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500">
    <div data-hs-scrollspy="#scrollspy" class="text-xl py-2 md:py-0 [--scrollspy-offset:220] md:[--scrollspy-offset:70] flex flex-col md:flex-row md:items-center md:justify-end gap-0.5 md:gap-1 mr-4">
        <?php if (!isLoggedIn()): ?>
            <button id="btn-signup" onclick="loadPage('signup.php', this)"
              class="py-2 px-6 flex items-center text-white hover:bg-orange-600 !bg-orange-400 !hover:bg-orange-600 rounded-full">
              Inscription
            </button>

            <button id="btn-signin" onclick="loadPage('signin.php', this)" class="py-2 px-6 flex items-center text-white hover:bg-orange-600 !bg-orange-400 !hover:bg-orange-600 rounded-full">

              Connexion
            </button>
          <?php endif; ?>
          <?php if (isLoggedIn()): ?>
            <p>Connecté en tant que <?php echo getPrenom(); ?></p>

            <?php if (isLoggedInAdmin($conn)): ?>
              <button id="btn-signup" onclick="loadPage('gerer.php', this)" class="py-2 px-6 flex items-center text-white hover:bg-orange-600 !bg-orange-400 !hover:bg-orange-600 rounded-full">
                Gerer
              </button>
            <?php endif; ?>

            <button id="btn-compte" onclick="loadPage('compte.php', this)" class="py-2 px-6 !bg-orange-400 !hover:bg-orange-600 flex items-center text-gray-800 hover:bg-gray-100 rounded-full focus:outline-hidden focus:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-200 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700 hs-scrollspy-active:bg-gray-100">
              Mon compte
            </button>

            <button id="btn-deconnecter" onclick="loadPage('logout.php', this)" class="py-2 px-6 !bg-orange-400 !hover:bg-orange-600 flex items-center text-gray-800 hover:bg-gray-100 rounded-full focus:outline-hidden focus:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-200 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700 hs-scrollspy-active:bg-gray-100">
              Se deconnecter
            </button>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <!-- end buttons -->
  </nav>
</header>
<!-- ========== END NAVBAR DESKTOP ========== -->

<script src="./web/assets/js/navbar.js"></script>
<script src="./web/assets/js/commander.js"></script>
