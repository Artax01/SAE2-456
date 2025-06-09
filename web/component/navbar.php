<link rel="stylesheet" href="./assets/css/nav.css">

<!-- ========== NAVBAR ========== -->
<header id="top-navbar" class="sticky top-0 inset-x-0 bg-white border-b border-gray-200 dark:bg-neutral-800 dark:border-neutral-700 flex flex-wrap md:justify-start md:flex-nowrap z-50 w-full">
  <nav class="relative max-w-[85rem] w-full mx-auto md:flex md:items-center md:justify-between md:gap-3 px-4 sm:px-6 lg:px-8 py-2">
    
    <!-- logo centré sur mobile -->
    <div class="w-full md:w-auto flex justify-center md:justify-start order-1 md:order-none">
      <button id="btn-title" class="text-white font-semibold focus:outline-hidden focus:opacity-80" onclick="loadPage('accueil.php', this)">
        <?php echo $titre; ?>
      </button>
    </div>
    <!-- end logo -->

    <!-- buttons -->
    <div id="hs-header-scrollspy" class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow md:block" aria-labelledby="hs-header-scrollspy-collapse">
      <div class="overflow-hidden overflow-y-auto max-h-[75vh] [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500">
        <div data-hs-scrollspy="#scrollspy" class="py-2 md:py-0 [--scrollspy-offset:220] md:[--scrollspy-offset:70] flex flex-col md:flex-row md:items-center md:justify-end gap-0.5 md:gap-1">
          <button id="btn-accueil" onclick="loadPage('accueil.php', this)" class="p-2 flex items-center text-gray-800 hover:bg-gray-100 rounded-lg focus:outline-hidden focus:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-200 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700 hs-scrollspy-active:bg-gray-100">
            Accueil
          </button>
          <button id="btn-commander" onclick="loadPage('commander.php', this)" class="p-2 flex items-center text-gray-800 hover:bg-gray-100 rounded-lg focus:outline-hidden focus:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-200 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700 hs-scrollspy-active:bg-gray-100">
            Commander
          </button>
          <button id="btn-compte" onclick="loadPage('compte.php', this)" class="p-2 flex items-center text-gray-800 hover:bg-gray-100 rounded-lg focus:outline-hidden focus:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-200 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700 hs-scrollspy-active:bg-gray-100">
            Compte
          </button>
        </div>
      </div>
    </div>
    <!-- end buttons -->
    
  </nav>
</header>
<!-- ========== END NAVBAR ========== -->
