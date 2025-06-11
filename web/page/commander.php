<?php
    require_once "../../php/functions.php";
    // getPlats($conn);
    isPlatExist($conn, "P101");
?>

<h1 class=" text-center text-6xl font-extrabold text-orange-400 mb-8 tracking-tight uppercase" style="font-family: 'Montserrat', sans-serif;">Votre commande</h1>
<div class="max-w-2xl mx-auto mt-10 bg-white rounded-xl shadow-lg p-8">
    <h2 class="text-3xl font-bold text-orange-400 mb-6">Détails de la commande</h2>
    <ul class="divide-y divide-gray-200 mb-6">
        <li class="flex justify-between py-3">
            <span class="font-semibold">Pizza 4 fromages</span>
            <span>1 x 25€</span>
        </li>
        <!-- Ajoutez d'autres plats ici si besoin -->
    </ul>
    <div class="flex justify-between items-center mb-6">
        <span class="text-xl font-bold">Total</span>
        <span class="text-xl font-bold text-orange-500">75€</span>
    </div>
    <button class="w-full bg-orange-400 hover:bg-orange-500 text-white font-bold py-3 rounded-full text-xl transition">Payer</button>
</div>