<!-- Menu "Nos Menus" avec effets Tailwind CSS, image de fond et animation navbar -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<div class="relative min-h-screen w-full">
  <!-- Image de fond + filtre opaque -->
 <div class="fixed inset-0 w-full h-full bg-[url('./web/assets/img/fast-food.jpeg')] bg-cover bg-center bg-no-repeat z-0 ">
    <div class="absolute inset-0 bg-black opacity-55"></div>
  </div>
  <!-- Contenu principal en relatif -->
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
          <a href="?page=menu.php" class="material-icons text-orange-400 text-[4.5rem] mr-4 flex items-center justify-center">restaurant_menu</a>
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
    <div class="flex-1 flex flex-col pl-72 pr-10 py-6 overflow-y-auto">
      <!-- Titre -->
      <h1 class="text-5xl font-extrabold text-orange-400 mb-8 tracking-wide">NOS MENUS</h1>

      <!-- Menus List: 2 lignes de 4 colonnes -->
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-10 justify-items-center">
        <!-- Menu 1 -->
        <div class="relative group w-80">
          <div class="relative rounded-2xl overflow-hidden h-40 w-full border-4 border-orange-300 shadow-lg transition-all duration-500 group-hover:h-56">
            <img src="https://images.unsplash.com/photo-1513104890138-7c749659a591?auto=format&fit=crop&w=400&q=80" alt="Pizza 4 fromages" class="h-full w-full object-cover transition-all duration-500 group-hover:scale-105">
            <div class="absolute inset-0 flex items-end pointer-events-none">
              <div class="w-full transition-all duration-500 ease-out transform translate-y-16 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 group-hover:min-h-[96px] pointer-events-auto bg-gradient-to-t from-black/90 to-transparent text-white rounded-b-2xl p-4 text-center min-h-0 flex flex-col items-center justify-end"
                style="will-change: transform, opacity, min-height;">
                <div class="font-bold text-lg mb-1 break-words">Description</div>
                <div class="text-sm break-words">La pizza est une recette de cuisine traditionnelle de la cuisine italienne, originaire de Naples à base de galette de pâte à pain, garnie principalement d'huile d'olive, de sauce tomate, de mozzarella et d'autres ingrédients</div>
              </div>
            </div>
          </div>
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
            <div class="absolute inset-0 flex items-end pointer-events-none">
              <div class="w-full transition-all duration-500 ease-out transform translate-y-16 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 group-hover:min-h-[96px] pointer-events-auto bg-gradient-to-t from-black/90 to-transparent text-white rounded-b-2xl p-4 text-center min-h-0 flex flex-col items-center justify-end"
                style="will-change: transform, opacity, min-height;">
                <div class="font-bold text-lg mb-1 break-words">Description</div>
                <div class="text-sm break-words">La pizza est une recette de cuisine traditionnelle de la cuisine italienne, originaire de Naples à base de galette de pâte à pain, garnie principalement d'huile d'olive, de sauce tomate, de mozzarella et d'autres ingrédients</div>
              </div>
            </div>
          </div>
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
            <div class="absolute inset-0 flex items-end pointer-events-none">
              <div class="w-full transition-all duration-500 ease-out transform translate-y-16 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 group-hover:min-h-[96px] pointer-events-auto bg-gradient-to-t from-black/90 to-transparent text-white rounded-b-2xl p-4 text-center min-h-0 flex flex-col items-center justify-end"
                style="will-change: transform, opacity, min-height;">
                <div class="font-bold text-lg mb-1 break-words">Description</div>
                <div class="text-sm break-words">La pizza est une recette de cuisine traditionnelle de la cuisine italienne, originaire de Naples à base de galette de pâte à pain, garnie principalement d'huile d'olive, de sauce tomate, de mozzarella et d'autres ingrédients</div>
              </div>
            </div>
          </div>
          <div class="text-black flex flex-col text-center mt-4">
            <div class="bg-white rounded-full px-8 py-2 font-bold text-lg mb-2 shadow">Pizza 3 fromages<br><span class="font-normal">25€</span></div>
            <div class="flex gap-4">
              <button class="border-2 border-orange-400 text-orange-400 font-semibold px-4 py-2 rounded-full hover:bg-orange-50 transition">Ajouter au panier</button>
              <button class="bg-orange-400 text-white font-semibold px-6 py-2 rounded-full hover:bg-orange-500 transition">Commander</button>
            </div>
          </div>
        </div>
        <!-- Menu 4 (complète la première ligne) -->
        <div class="relative group w-80">
          <div class="relative rounded-2xl overflow-hidden h-40 w-full border-4 border-orange-300 shadow-lg transition-all duration-500 group-hover:h-56">
            <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=400&q=80" alt="Burger Classique" class="h-full w-full object-cover transition-all duration-500 group-hover:scale-105">
            <div class="absolute inset-0 flex items-end pointer-events-none">
              <div class="w-full transition-all duration-500 ease-out transform translate-y-16 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 group-hover:min-h-[96px] pointer-events-auto bg-gradient-to-t from-black/90 to-transparent text-white rounded-b-2xl p-4 text-center min-h-0 flex flex-col items-center justify-end"
                style="will-change: transform, opacity, min-height;">
                <div class="font-bold text-lg mb-1 break-words">Description</div>
                <div class="text-sm break-words">Un burger classique avec steak, fromage, salade, tomate et sauce maison dans un pain brioché.</div>
              </div>
            </div>
          </div>
          <div class="text-black flex flex-col text-center mt-4">
            <div class="bg-white rounded-full px-8 py-2 font-bold text-lg mb-2 shadow">Burger Classique<br><span class="font-normal">18€</span></div>
            <div class="flex gap-4">
              <button class="border-2 border-orange-400 text-orange-400 font-semibold px-4 py-2 rounded-full hover:bg-orange-50 transition">Ajouter au panier</button>
              <button class="bg-orange-400 text-white font-semibold px-6 py-2 rounded-full hover:bg-orange-500 transition">Commander</button>
            </div>
          </div>
        </div>
        <!-- Menu 5 (ligne 2, colonne 1) -->
        <div class="relative group w-80">
          <div class="relative rounded-2xl overflow-hidden h-40 w-full border-4 border-orange-300 shadow-lg transition-all duration-500 group-hover:h-56">
            <img src="https://images.unsplash.com/photo-1464306076886-debca5e8a6b0?auto=format&fit=crop&w=400&q=80" alt="Salade César" class="h-full w-full object-cover transition-all duration-500 group-hover:scale-105">
            <div class="absolute inset-0 flex items-end pointer-events-none">
              <div class="w-full transition-all duration-500 ease-out transform translate-y-16 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 group-hover:min-h-[96px] pointer-events-auto bg-gradient-to-t from-black/90 to-transparent text-white rounded-b-2xl p-4 text-center min-h-0 flex flex-col items-center justify-end"
                style="will-change: transform, opacity, min-height;">
                <div class="font-bold text-lg mb-1 break-words">Description</div>
                <div class="text-sm break-words">Salade verte, poulet grillé, croutons, parmesan et sauce César maison.</div>
              </div>
            </div>
          </div>
          <div class="text-black flex flex-col text-center mt-4">
            <div class="bg-white rounded-full px-8 py-2 font-bold text-lg mb-2 shadow">Salade César<br><span class="font-normal">16€</span></div>
            <div class="flex gap-4">
              <button class="border-2 border-orange-400 text-orange-400 font-semibold px-4 py-2 rounded-full hover:bg-orange-50 transition">Ajouter au panier</button>
              <button class="bg-orange-400 text-white font-semibold px-6 py-2 rounded-full hover:bg-orange-500 transition">Commander</button>
            </div>
          </div>
        </div>
        <!-- Menu 6 (ligne 2, colonne 2) -->
        <div class="relative group w-80">
          <div class="relative rounded-2xl overflow-hidden h-40 w-full border-4 border-orange-300 shadow-lg transition-all duration-500 group-hover:h-56">
            <img src="https://images.unsplash.com/photo-1502741338009-cac2772e18bc?auto=format&fit=crop&w=400&q=80" alt="Wrap Poulet" class="h-full w-full object-cover transition-all duration-500 group-hover:scale-105">
            <div class="absolute inset-0 flex items-end pointer-events-none">
              <div class="w-full transition-all duration-500 ease-out transform translate-y-16 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 group-hover:min-h-[96px] pointer-events-auto bg-gradient-to-t from-black/90 to-transparent text-white rounded-b-2xl p-4 text-center min-h-0 flex flex-col items-center justify-end"
                style="will-change: transform, opacity, min-height;">
                <div class="font-bold text-lg mb-1 break-words">Description</div>
                <div class="text-sm break-words">Wrap garni de poulet, crudités, sauce yaourt et herbes fraîches.</div>
              </div>
            </div>
          </div>
          <div class="text-black flex flex-col text-center mt-4">
            <div class="bg-white rounded-full px-8 py-2 font-bold text-lg mb-2 shadow">Wrap Poulet<br><span class="font-normal">12€</span></div>
            <div class="flex gap-4">
              <button class="border-2 border-orange-400 text-orange-400 font-semibold px-4 py-2 rounded-full hover:bg-orange-50 transition">Ajouter au panier</button>
              <button class="bg-orange-400 text-white font-semibold px-6 py-2 rounded-full hover:bg-orange-500 transition">Commander</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>