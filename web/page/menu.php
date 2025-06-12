<!-- Menu "Nos Menus" avec effets Tailwind CSS, image de fond et animation navbar -->
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
    </div> -->


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
        <div class="text-black flex flex-col text-center mt-4">
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
        <div class="text-black flex flex-col text-center mt-4">
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
        <div class="text-black flex flex-col text-center mt-4">
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