<!-- Sidebar (optionnelle) -->
<div class="flex">
      
    <main class="flex-1 p-6">
        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
          <h1 class="text-4xl font-extrabold text-orange-500 drop-shadow" style="letter-spacing:2px;">PANIER</h1>
          <div class="flex gap-4">
            <button class="bg-orange-500 text-white px-6 py-2 rounded-full font-semibold hover:bg-orange-600 transition">Inscription</button>
            <button class="bg-orange-500 text-white px-6 py-2 rounded-full font-semibold hover:bg-orange-600 transition">Connexion</button>
          </div>
        </div>
        <!-- Panier Content -->
        <div class="flex flex-col md:flex-row gap-8">
          <!-- Liste Produits -->
          <div class="flex-1">
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
              <!-- Exemple d'article panier -->
              <div class="bg-white bg-opacity-80 rounded-xl shadow-lg flex flex-col items-center p-4">
                <img src="https://images.unsplash.com/photo-1601924582975-7aa6c30a02fa?auto=format&fit=crop&w=500&q=80" alt="Pizza" class="w-40 h-28 object-cover rounded-lg border-4 border-orange-500 mb-3">
                <div class="font-bold text-xl text-center mb-1">Pizza 4 fromages</div>
                <div class="text-gray-700 mb-2">25€</div>
                <div class="flex gap-2 items-center mb-3">
                  <button class="w-8 h-8 rounded-full border border-orange-500 text-orange-500 hover:bg-orange-500 hover:text-white transition font-bold flex items-center justify-center">-</button>
                  <span class="font-semibold text-lg">2</span>
                  <button class="w-8 h-8 rounded-full border border-orange-500 text-orange-500 hover:bg-orange-500 hover:text-white transition font-bold flex items-center justify-center">+</button>
                </div>
                <button class="mt-auto bg-orange-500 text-white px-6 py-2 rounded-full font-semibold hover:bg-orange-600 transition w-full">Supprimer</button>
              </div>
              <!-- Duplique pour d'autres produits -->
              <div class="bg-white bg-opacity-80 rounded-xl shadow-lg flex flex-col items-center p-4">
                <img src="https://images.unsplash.com/photo-1601924582975-7aa6c30a02fa?auto=format&fit=crop&w=500&q=80" alt="Pizza" class="w-40 h-28 object-cover rounded-lg border-4 border-orange-500 mb-3">
                <div class="font-bold text-xl text-center mb-1">Pizza 3 fromages</div>
                <div class="text-gray-700 mb-2">25€</div>
                <div class="flex gap-2 items-center mb-3">
                  <button class="w-8 h-8 rounded-full border border-orange-500 text-orange-500 hover:bg-orange-500 hover:text-white transition font-bold flex items-center justify-center">-</button>
                  <span class="font-semibold text-lg">1</span>
                  <button class="w-8 h-8 rounded-full border border-orange-500 text-orange-500 hover:bg-orange-500 hover:text-white transition font-bold flex items-center justify-center">+</button>
                </div>
                <button class="mt-auto bg-orange-500 text-white px-6 py-2 rounded-full font-semibold hover:bg-orange-600 transition w-full">Supprimer</button>
              </div>
            </div>
          </div>
          <!-- Résumé Panier -->
          <div class="w-full md:w-1/3 bg-white bg-opacity-80 rounded-xl p-6 flex flex-col justify-between shadow-lg h-min">
            <div>
              <h2 class="text-2xl font-bold text-orange-500 mb-4">Résumé</h2>
              <div class="flex justify-between text-lg mb-2 font-semibold">
                <span>Total :</span>
                <span>50€</span>
              </div>
            </div>
            <button class="mt-8 bg-orange-500 text-white px-6 py-3 rounded-full font-bold text-lg hover:bg-orange-600 transition w-full">Commander</button>
          </div>
        </div>
      </main>
    </div>