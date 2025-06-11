<!-- Panier - Voir les articles ajoutés -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<div class="relative min-h-screen w-full">
  <!-- Image de fond + filtre opaque -->
  <div class="fixed inset-0 w-full h-full bg-[url('img/fast-food.jpeg')] bg-cover bg-center bg-no-repeat z-0">
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
    <!-- Main Content -->
    <div class="flex-1 flex flex-col px-10 py-6">
      <!-- Titre -->
      <h1 class="text-5xl font-extrabold text-orange-400 mb-8 tracking-wide text-center">VOTRE PANIER</h1>
      <!-- Liste des articles du panier -->
      <div class="bg-white bg-opacity-90 rounded-2xl shadow-lg p-8 max-w-2xl mx-auto">
        <ul class="divide-y divide-gray-200 mb-6">
          <li class="flex items-center justify-between py-4">
            <div class="flex items-center gap-4">
              <img src="https://images.unsplash.com/photo-1513104890138-7c749659a591?auto=format&fit=crop&w=80&q=80" alt="Pizza 4 fromages" class="w-20 h-20 rounded-xl object-cover border-2 border-orange-200">
              <div>
                <div class="font-bold text-lg">Pizza 4 fromages</div>
                <div class="text-gray-500">1 x 25€</div>
              </div>
            </div>
            <button class="material-icons text-red-400 hover:text-red-600 text-3xl transition">delete</button>
          </li>
          <li class="flex items-center justify-between py-4">
            <div class="flex items-center gap-4">
              <img src="https://images.unsplash.com/photo-1513104890138-7c749659a591?auto=format&fit=crop&w=80&q=80" alt="Pizza 2 fromages" class="w-20 h-20 rounded-xl object-cover border-2 border-orange-200">
              <div>
                <div class="font-bold text-lg">Pizza 2 fromages</div>
                <div class="text-gray-500">2 x 22€</div>
              </div>
            </div>
            <button class="material-icons text-red-400 hover:text-red-600 text-3xl transition">delete</button>
          </li>
        </ul>
        <div class="flex justify-between items-center mb-6">
          <span class="text-xl font-bold">Total</span>
          <span class="text-xl font-bold text-orange-500">69€</span>
        </div>
        <button class="w-full bg-orange-400 hover:bg-orange-500 text-white font-bold py-3 rounded-full text-xl transition">Payer</button>
      </div>
    </div>
  </div>
</div>