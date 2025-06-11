<!-- Menu "Nos Menus" avec effets Tailwind CSS, image de fond et animation navbar -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<div class="relative min-h-screen w-full">
  <!-- Image de fond + filtre opaque -->
 <div class="fixed inset-0 w-full h-full bg-[url('img/fast-food.jpeg')] bg-cover bg-center bg-no-repeat z-0 ">
    <div class="absolute inset-0 bg-black opacity-55"></div>
  </div>
  <!-- Contenu principal en relatif -->
  <div class="relative z-10 flex h-screen">
    <!-- Sidebar Navigation -->
<aside class="flex flex-col items-center py-4 px-2 backdrop-blur border-b border-gray-200 dark:bg-neutral-800 dark:border-neutral-700 h-full transition-all duration-300 group w-20 hover:w-56 z-20 relative">
  <!-- Flèche ouverture -->
  <div class="absolute top-1/2 right-[-12px] transform -translate-y-1/2 flex items-center justify-center w-6 h-6 bg-[#E7E4E0] rounded-full shadow border border-orange-300 z-30 pointer-events-none">
    <svg class="w-4 h-4 text-orange-400 group-hover:scale-x-[-1] transition-transform duration-300" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
      <path d="M9 6l6 6-6 6" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
  </div>
  <!-- Liens de navigation avec icônes -->
  <div class="flex items-center mb-8 w-full justify-center group-hover:justify-start">
    <a href="?page=accueil.php" class="material-icons text-orange-400 text-5xl transition-all duration-300 mx-auto group-hover:mr-2 group-hover:mx-0 flex items-center justify-center">home</a>
    <a href="?page=accueil.php"
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
      Accueil
    </a>
  </div>
  <div class="flex items-center mb-8 w-full justify-center group-hover:justify-start">
    <a href="?page=menu.php" class="material-icons text-orange-400 text-5xl transition-all duration-300 mx-auto group-hover:mr-2 group-hover:mx-0 flex items-center justify-center">restaurant_menu</a>
    <a href="?page=menu.php"
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
      Nos Menus
    </a>
  </div>
  <div class="flex items-center mb-8 w-full justify-center group-hover:justify-start">
    <a href="?page=plat.php" class="material-icons text-orange-400 text-5xl transition-all duration-300 mx-auto group-hover:mr-2 group-hover:mx-0 flex items-center justify-center">restaurant</a>
    <a href="?page=plat.php"
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
      Nos Plats
    </a>
  </div>
  <div class="flex items-center mb-8 w-full justify-center group-hover:justify-start">
    <a href="?page=panier.php" class="material-icons text-orange-400 text-5xl transition-all duration-300 mx-auto group-hover:mr-2 group-hover:mx-0 flex items-center justify-center">shopping_cart</a>
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
<!-- ...existing code... -->

  <!-- Main Content -->
  <div class="flex-1 flex flex-col px-10 py-6">
    <!-- Barre de recherche -->
    <div class="flex justify-center mb-6">
      <div class="relative w-[600px]">
        <input type="text" placeholder="Rechercher..." class="w-full rounded-full py-2 pl-12 pr-4 bg-gray-200 focus:outline-none focus:ring-2 focus:ring-orange-400 text-lg shadow"/>
        <svg class="absolute left-3 top-2.5 w-6 h-6 text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
      </div>
    </div>

    <!-- Titre -->
    <h1 class="text-5xl font-extrabold text-orange-400 mb-8 tracking-wide">NOS MENUS</h1>

    <!-- Menus List -->
    <div class="flex gap-10 justify-center">
      <!-- Menu Card -->
      <div class="relative group w-80">
        <div class="relative rounded-2xl overflow-hidden h-40 w-full border-4 border-orange-300 shadow-lg transition-all duration-500 group-hover:h-56">
          <img src="https://images.unsplash.com/photo-1513104890138-7c749659a591?auto=format&fit=crop&w=400&q=80" alt="Pizza 4 fromages" class="h-full w-full object-cover transition-all duration-500 group-hover:scale-105">
          <!-- Description Hover (dans l'image, bulle qui s'agrandit uniquement au hover) -->
          <div class="absolute inset-0 flex items-end pointer-events-none">
            <div class="w-full transition-all duration-500 ease-out transform translate-y-16 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 group-hover:min-h-[96px] pointer-events-auto bg-gradient-to-t from-black/90 to-transparent text-white rounded-b-2xl p-4 text-center min-h-0 flex flex-col items-center justify-end"
              style="will-change: transform, opacity, min-height;">
              <div class="font-bold text-lg mb-1 break-words">Description</div>
              <div class="text-sm break-words">La pizza est une recette de cuisine traditionnelle de la cuisine italienne, originaire de Naples à base de galette de pâte à pain, garnie principalement d'huile d'olive, de sauce tomate, de mozzarella et d'autres ingrédients</div>
            </div>
          </div>
        </div>
        <!-- Infos Plat -->
        <div class="flex flex-col items-center mt-4">
          <div class="bg-white rounded-full px-8 py-2 font-bold text-lg mb-2 shadow">Pizza 4 fromages<br><span class="font-normal">25€</span></div>
          <div class="flex gap-4">
            <button class="border-2 border-orange-400 text-orange-400 font-semibold px-4 py-2 rounded-full hover:bg-orange-50 transition">Ajouter au panier</button>
            <button class="bg-orange-400 text-white font-semibold px-6 py-2 rounded-full hover:bg-orange-500 transition">Commander</button>
          </div>
        </div>
      </div>

      <!-- Menu 2 -->
      <div class="relative group w-80">
        <div class="relative rounded-2xl overflow-hidden h-40 w-full border-4 border-orange-300 shadow-lg transition-all duration-500 group-hover:h-56">
          <img src="https://images.unsplash.com/photo-1513104890138-7c749659a591?auto=format&fit=crop&w=400&q=80" alt="Pizza 2 fromages" class="h-full w-full object-cover transition-all duration-500 group-hover:scale-105">
          <!-- Description Hover (dans l'image, bulle qui s'agrandit uniquement au hover) -->
          <div class="absolute inset-0 flex items-end pointer-events-none">
            <div class="w-full transition-all duration-500 ease-out transform translate-y-16 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 group-hover:min-h-[96px] pointer-events-auto bg-gradient-to-t from-black/90 to-transparent text-white rounded-b-2xl p-4 text-center min-h-0 flex flex-col items-center justify-end"
              style="will-change: transform, opacity, min-height;">
              <div class="font-bold text-lg mb-1 break-words">Description</div>
              <div class="text-sm break-words">La pizza est une recette de cuisine traditionnelle de la cuisine italienne, originaire de Naples à base de galette de pâte à pain, garnie principalement d'huile d'olive, de sauce tomate, de mozzarella et d'autres ingrédients</div>
            </div>
          </div>
        </div>
        <!-- Infos Plat -->
        <div class="flex flex-col items-center mt-4">
          <div class="bg-white rounded-full px-8 py-2 font-bold text-lg mb-2 shadow">Pizza 2 fromages<br><span class="font-normal">25€</span></div>
          <div class="flex gap-4">
            <button class="border-2 border-orange-400 text-orange-400 font-semibold px-4 py-2 rounded-full hover:bg-orange-50 transition">Ajouter au panier</button>
            <button class="bg-orange-400 text-white font-semibold px-6 py-2 rounded-full hover:bg-orange-500 transition">Commander</button>
          </div>
        </div>
      </div>

      <!-- Menu 3 -->
      <div class="relative group w-80">
        <div class="relative rounded-2xl overflow-hidden h-40 w-full border-4 border-orange-300 shadow-lg transition-all duration-500 group-hover:h-56">
          <img src="https://images.unsplash.com/photo-1513104890138-7c749659a591?auto=format&fit=crop&w=400&q=80" alt="Pizza 3 fromages" class="h-full w-full object-cover transition-all duration-500 group-hover:scale-105">
          <!-- Description Hover (dans l'image, bulle qui s'agrandit uniquement au hover) -->
          <div class="absolute inset-0 flex items-end pointer-events-none">
            <div class="w-full transition-all duration-500 ease-out transform translate-y-16 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 group-hover:min-h-[96px] pointer-events-auto bg-gradient-to-t from-black/90 to-transparent text-white rounded-b-2xl p-4 text-center min-h-0 flex flex-col items-center justify-end"
              style="will-change: transform, opacity, min-height;">
              <div class="font-bold text-lg mb-1 break-words">Description</div>
              <div class="text-sm break-words">La pizza est une recette de cuisine traditionnelle de la cuisine italienne, originaire de Naples à base de galette de pâte à pain, garnie principalement d'huile d'olive, de sauce tomate, de mozzarella et d'autres ingrédients</div>
            </div>
          </div>
        </div>
        <!-- Infos Plat -->
        <div class="flex flex-col items-center mt-4">
          <div class="bg-white rounded-full px-8 py-2 font-bold text-lg mb-2 shadow">Pizza 3 fromages<br><span class="font-normal">25€</span></div>
          <div class="flex gap-4">
            <button class="border-2 border-orange-400 text-orange-400 font-semibold px-4 py-2 rounded-full hover:bg-orange-50 transition">Ajouter au panier</button>
            <button class="bg-orange-400 text-white font-semibold px-6 py-2 rounded-full hover:bg-orange-500 transition">Commander</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>