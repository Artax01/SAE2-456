<div class="fixed inset-0 w-full h-full bg-[url('img/rapidc3.png')] bg-cover bg-center bg-no-repeat z-0">
    <!-- Zone invisible pour hover menu latéral -->
    <div class="fixed left-0 top-0 h-full w-10 z-30 group">
        <!-- Fenêtre latérale affichée au hover -->
        <div class="absolute left-0 top-1/2 -translate-y-1/2 bg-white shadow-xl rounded-r-2xl px-6 py-8 flex flex-col items-center gap-8 opacity-0 pointer-events-none group-hover:opacity-100 group-hover:pointer-events-auto transition-all duration-300">
            <a href="?page=accueil.php" class="flex flex-col items-center group">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-orange-400 group-hover:text-orange-500 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l9-9 9 9M4 10v10a1 1 0 001 1h3m10-11v11a1 1 0 01-1 1h-3m-6 0h6" />
                </svg>
                <span class="mt-1 text-xs font-semibold text-gray-700">Accueil</span>
            </a>
            <a href="?page=menu.php" class="flex flex-col items-center group">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-orange-400 group-hover:text-orange-500 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <rect x="4" y="8" width="16" height="12" rx="2" stroke-width="2" stroke="currentColor" fill="none"/>
                    <path d="M9 12h6M9 16h6" stroke-width="2" stroke="currentColor" stroke-linecap="round"/>
                    <circle cx="12" cy="10" r="1" fill="currentColor"/>
                </svg>
                <span class="mt-1 text-xs font-semibold text-gray-700">Menu</span>
            </a>
            <a href="?page=panier.php" class="flex flex-col items-center group">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-orange-400 group-hover:text-orange-500 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.35 2.7A1 1 0 007 17h10a1 1 0 00.95-.68L21 13M7 13V6a1 1 0 011-1h6a1 1 0 011 1v7" />
                </svg>
                <span class="mt-1 text-xs font-semibold text-gray-700">Panier</span>
            </a>
        </div>
    </div>

    <div class="absolute inset-0 bg-white opacity-60"></div>
    <div class="absolute inset-0 flex flex-col items-center justify-center z-10">
        <h1 class="text-7xl font-extrabold tracking-tight mb-4 text-black drop-shadow-lg">RAPID C3</h1>
        <p class="text-2xl font-semibold text-black text-center max-w-2xl drop-shadow-lg">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi a sagittis leo. Aliquam ut nibh ac massa scelerisque pretium non id nisi. Quisque sodales, urna eu tempor mollis, diam nisl porttitor tellus, vitae tempus libero nisi non nulla. Aliquam erat volutpat.
        </p>
    </div>
</div>