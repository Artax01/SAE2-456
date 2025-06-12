<!-- Panier - Voir les articles ajoutés -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<div class="relative min-h-screen w-full">
  <!-- Image de fond + filtre opaque -->
  <div class="fixed inset-0 w-full h-full bg-[url('./web/assets/img/fast-food.jpeg')] bg-cover bg-center bg-no-repeat z-0">
    <div class="absolute inset-0 bg-black opacity-55"></div>
  </div>
  <!-- Contenu principal en relatif -->
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
    <!-- Main Content -->
    <div class="flex-1 flex flex-col px-10 py-6">
      <!-- Titre -->
      <h1 class="text-5xl font-extrabold text-orange-400 mb-8 tracking-wide text-center">VOTRE PANIER</h1>
      <!-- Liste des articles du panier -->
      <div class="bg-white bg-opacity-90 rounded-2xl shadow-lg p-8 max-w-2xl mx-auto">
        <ul class="divide-y divide-gray-200 mb-6">
          <?php
          $panier = [
            ["nom" => "Pomme", "prix" => 1.20],
            ["nom" => "Banane", "prix" => 0.80],
            ["nom" => "Orange", "prix" => 1.50],
            ["nom" => "Mangue", "prix" => 2.00]
          ];

          foreach ($panier as $produit) {
            echo <<<HTML
            <li class="flex items-center justify-between py-4">
            <div class="flex items-center gap-4">
              <img src="https://images.unsplash.com/photo-1513104890138-7c749659a591?auto=format&fit=crop&w=80&q=80" alt="Pizza 4 fromages" class="w-20 h-20 rounded-xl object-cover border-2 border-orange-200">
              <div>
                <div class="font-bold text-black text-lg">{$produit['nom']}</div>
                <div class="text-gray-500">{$produit['prix']}€</div>
              </div>
            </div>
            <button class="material-icons text-red-400 hover:text-red-600 text-3xl transition">delete</button>
          </li>
          HTML;

          } ?>
          <li class="flex items-center justify-between py-4">
            <div class="flex items-center gap-4">
              <img src="https://images.unsplash.com/photo-1513104890138-7c749659a591?auto=format&fit=crop&w=80&q=80" alt="Pizza 4 fromages" class="w-20 h-20 rounded-xl object-cover border-2 border-orange-200">
              <div>
                <div class="font-bold text-black text-lg">Pizza 4 fromages</div>
                <div class="text-gray-500">1 x 25€</div>
              </div>
            </div>
            <button class="material-icons text-red-400 hover:text-red-600 text-3xl transition">delete</button>
          </li>
          <li class="flex items-center justify-between py-4">
            <div class="flex items-center gap-4">
              <img src="https://images.unsplash.com/photo-1513104890138-7c749659a591?auto=format&fit=crop&w=80&q=80" alt="Pizza 2 fromages" class="w-20 h-20 rounded-xl object-cover border-2 border-orange-200">
              <div>
                <div class="font-bold text-black text-lg">Pizza 2 fromages</div>
                <div class="text-gray-500">2 x 22€</div>
              </div>
            </div>
            <button class="material-icons text-red-400 hover:text-red-600 text-3xl transition">delete</button>
          </li>
        </ul>
        <div class="flex justify-between items-center mb-6">
          <span class="text-xl font-bold text-black">Total</span>
          <span class="text-xl font-bold text-orange-500">69€</span>
        </div>
        <button class="w-full bg-orange-400 hover:bg-orange-500 text-white font-bold py-3 rounded-full text-xl transition">Payer</button>
      </div>
    </div>
  </div>
</div>