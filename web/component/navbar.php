<<<<<<< HEAD
=======

<?php 
require_once './web/session/session.php';
?>

>>>>>>> web
<link rel="stylesheet" href="./web/assets/css/navbar.css">

<!-- ========== NAVBAR MOBILE ========== -->
<div class="navbar">
  <button id="btn-accueil" onclick="loadPage('accueil.php', this)">
    <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 24 24" fill="gray">
      <path d="M3 9.75L12 3l9 6.75v10.5A1.75 1.75 0 0 1 19.25 22h-3.5A1.75 1.75 0 0 1 14 20.25V15a1 1 0 0 0-2 0v5.25A1.75 1.75 0 0 1 10.25 22h-3.5A1.75 1.75 0 0 1 5 20.25V9.75z" />
    </svg>
    <small>Accueil</small>
  </button>
  <button id="btn-commander" onclick="loadPage('commander.php', this)">
    <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 24 24" fill="gray">
      <path d="M5.25 3A2.25 2.25 0 0 0 3 5.25v13.5c0 .621.504 1.125 1.125 1.125.248 0 .49-.082.683-.232L6 18.25l1.192 1.393c.193.15.435.232.683.232.248 0 .49-.082.683-.232L10 18.25l1.192 1.393c.193.15.435.232.683.232s.49-.082.683-.232L14 18.25l1.192 1.393a1.125 1.125 0 0 0 1.683 0L18 18.25l1.192 1.393c.193.15.435.232.683.232.621 0 1.125-.504 1.125-1.125V5.25A2.25 2.25 0 0 0 18.75 3H5.25z" />
    </svg>
    <small>Commander</small>
  </button>
  <!-- <button id="btn-commander" onclick="showMenu('commander.php')">Commander</button> -->

  <button id="btn-compte" onclick="loadPage('compte.php', this)">
      <svg fill="gray" viewBox="0 0 24 24"><path d="M12 12c2.7 0 5-2.3 5-5s-2.3-5-5-5-5 2.3-5 5 2.3 5 5 5zm0 2c-3.3 0-10 1.7-10 5v3h20v-3c0-3.3-6.7-5-10-5z"/></svg>
      <small>Compte</small>
  </button>
</div>
<!-- ========== END NAVBAR MOBILE ========== -->



<!-- ========== NAVBAR DESKTOP ========== -->
<!-- bg-neutral-800/80 -->
<body class="bg-neutral-900 text-white">
<header id="top-navbar"
  class="sticky top-0 inset-x-0 z-50 w-full text-white">
<<<<<<< HEAD
  <nav class="relative max-w-[85rem] w-full mx-auto flex items-center justify-between sm:px-6 lg:px-8 py-2">


    
=======
  <nav class="w-full flex items-center justify-between px-0 py-2"> <!-- retire mx-auto et max-w-[85rem] -->

>>>>>>> web
    <!-- logo centré sur mobile -->
    <div class="flex items-center ml-4">
      <button id="btn-title" class="text-white font-semibold focus:outline-hidden focus:opacity-80" onclick="loadPage('accueil.php', this)">
        <img src="./web/assets/img/logoC3.png" class="h-20 w-23">
      </button>
    </div>
    <!-- end logo -->

<<<<<<< HEAD

    <!-- buttons -->
    <div id="hs-header-scrollspy" class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow md:block" aria-labelledby="hs-header-scrollspy-collapse">
      <div class="overflow-hidden overflow-y-auto max-h-[75vh] [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500">
        <div data-hs-scrollspy="#scrollspy" class="text-xl py-2 md:py-0 [--scrollspy-offset:220] md:[--scrollspy-offset:70] flex flex-col md:flex-row md:items-center md:justify-end gap-0.5 md:gap-1">

          <?php if ($isLoggedInAdmin): ?>
            <button id="btn-signup" onclick="loadPage('gerer.php', this)" class="py-2 px-6 flex items-center text-white hover:bg-orange-600 !bg-orange-400 !hover:bg-orange-600 rounded-full">
            gerer
            </button>
          <?php endif; ?>

          <?php if (!isLoggedIn()): ?>
=======
    <?php require_once './php/connexion.php'; ?>

    <!-- buttons -->
  <div id="hs-header-scrollspy" class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow md:block" aria-labelledby="hs-header-scrollspy-collapse">
   <div class="overflow-hidden overflow-y-auto max-h-[75vh] [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500">
    <div data-hs-scrollspy="#scrollspy" class="text-xl py-2 md:py-0 [--scrollspy-offset:220] md:[--scrollspy-offset:70] flex flex-col md:flex-row md:items-center md:justify-end gap-0.5 md:gap-1 mr-4">
        <?php if (!isLoggedIn()): ?>
>>>>>>> web
            <button id="btn-signup" onclick="loadPage('signup.php', this)"
              class="py-2 px-6 flex items-center text-white hover:bg-orange-600 !bg-orange-400 !hover:bg-orange-600 rounded-full">
              Inscription
            </button>
<<<<<<< HEAD
          
=======

>>>>>>> web
            <button id="btn-signin" onclick="loadPage('signin.php', this)" class="py-2 px-6 flex items-center text-white hover:bg-orange-600 !bg-orange-400 !hover:bg-orange-600 rounded-full">

              Connexion
            </button>
<<<<<<< HEAD

          <?php else: ?>
            <button id="btn-compte" onclick="loadPage('compte.php', this)" class="py-2 px-6 !bg-orange-400 !hover:bg-orange-600 flex items-center text-gray-800 hover:bg-gray-100 rounded-full focus:outline-hidden focus:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-200 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700 hs-scrollspy-active:bg-gray-100">
              Mon Compte
=======
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
>>>>>>> web
            </button>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <!-- end buttons -->
<<<<<<< HEAD

=======
>>>>>>> web
  </nav>
</header>
<!-- ========== END NAVBAR DESKTOP ========== -->

<<<<<<< HEAD
<script src="./web/assets/js/navbar.js"></script>
=======
<script src="./web/assets/js/navbar.js"></script>
<script src="./web/assets/js/commander.js"></script>
>>>>>>> web
