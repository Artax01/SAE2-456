<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<div class="relative min-h-screen w-full">
    <!-- Image de fond + filtre opaque -->
    <div class="fixed inset-0 w-full h-full bg-[url('img/rapidc3.png')] bg-cover bg-center bg-no-repeat z-0 ">
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

        <div class="absolute inset-0 flex flex-col items-center justify-center z-10">
            <h1 class="text-9xl font-extrabold tracking-tight mb-4 drop-shadow-lg">
                <span class="text-white drop-shadow-[0_4px_4px_rgba(0,0,0,1)]">RAPID</span>
                <span class="text-orange-400 drop-shadow-[0_4px_4px_rgba(0,0,0,1)]">C3</span>
            </h1>
            <p class="text-3xl font-semibold text-white text-center max-w-2xl drop-shadow-lg">
                IUT DE CAEN CAMPUS 3<br> </p>
            <p class="text-2xl font-semibold text-white text-center max-w-2xl drop-shadow-lg">
                <br><i>" Commandez en ligne rapidement et simplement " </i></p>
            </p>
        </div>
    </div>