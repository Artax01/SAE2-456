<link rel="stylesheet" href="./assets/css/navbar.css">

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
    <svg fill="gray" viewBox="0 0 24 24">
      <path d="M12 12c2.7 0 5-2.3 5-5s-2.3-5-5-5-5 2.3-5 5 2.3 5 5 5zm0 2c-3.3 0-10 1.7-10 5v3h20v-3c0-3.3-6.7-5-10-5z" />
    </svg>
    <small>Compte</small>
  </button>
</div>
<!-- ========== END NAVBAR MOBILE ========== -->



<!-- ========== NAVBAR DESKTOP ========== -->
<header id="top-navbar" class="sticky top-0 inset-x-0 bg-black border-b border-gray-200 dark:bg-neutral-800 dark:border-neutral-700 flex flex-wrap md:justify-start md:flex-nowrap z-50 w-full">
  <nav class="relative max-w-[85rem] w-full mx-auto md:flex md:items-center md:justify-between md:gap-3 sm:px-6 lg:px-8 py-2">

    <!-- logo centré sur mobile -->
    <div class="w-full md:w-auto flex justify-center md:justify-start order-1 md:order-none">
      <button id="btn-title" class="text-white font-semibold focus:outline-hidden focus:opacity-80" onclick="loadPage('accueil.php', this)">
        <img src="img/logoC3.png" alt="logo RAPID-C3" class="h-20 w-20">
      </button>
    </div>
    <!-- end logo -->


    <!-- buttons -->
    <div id="hs-header-scrollspy" class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow md:block" aria-labelledby="hs-header-scrollspy-collapse">
      <div class="overflow-hidden overflow-y-auto max-h-[75vh] [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500">
        <div data-hs-scrollspy="#scrollspy" class="text-xl py-2 md:py-0 [--scrollspy-offset:220] md:[--scrollspy-offset:70] flex flex-col md:flex-row md:items-center md:justify-end gap-0.5 md:gap-1">

          <button id="btn-inscription" onclick="loadPage('inscription.php', this)"
              class="py-2 px-6 flex items-center text-white bg-orange-500 hover:bg-orange-600 !bg-orange-500 !hover:bg-orange-600 rounded-full">
            Inscription
          </button>

          <button id="btn-connexion" onclick="loadPage('connexion.php', this)" class="py-2 !bg-orange-500 px-6 flex items-center text-gray-800 hover:bg-gray-100 rounded-full focus:outline-hidden focus:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-200 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700 hs-scrollspy-active:bg-gray-100">
            Connexion
          </button>
          <button id="btn-compte" onclick="loadPage('compte.php', this)" class="py-2 px-6 !bg-orange-500 flex items-center text-gray-800 hover:bg-gray-100 rounded-full focus:outline-hidden focus:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-200 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700 hs-scrollspy-active:bg-gray-100">
            Mon Compte
          </button>
        </div>
      </div>
    </div>
    <!-- end buttons -->

  </nav>
</header>
<!-- ========== END NAVBAR DESKTOP ========== -->

<script src="./assets/js/navbar.js"></script>