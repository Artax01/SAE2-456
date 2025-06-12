<head>
  <meta charset="UTF-8">
  <title>Paiement - RapidC3</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/root.css">
</head>
<body>
<div class="relative min-h-screen w-full">
  <!-- Image de fond + filtre opaque -->
  <div class="fixed inset-0 w-full h-full bg-[url('./web/assets/img/rapidc3.png')] bg-cover bg-center bg-no-repeat z-0 ">
        <div class="absolute inset-0 bg-black opacity-55"></div>
    </div>
    
 <!-- NAV BAR GAUCHE -->
    <!-- Contenu principal en relatif -->
    <div class="z-10 flex h-screen">
       
    <!-- Main Content -->
    <div class="flex-1 flex flex-col px-10 py-6 items-center justify-center z-30 text-black">
      <div class="bg-white bg-opacity-95 rounded-2xl shadow-lg p-10 max-w-xl w-full">

<?php
// Ajoute ce bloc PHP tout en haut du fichier payer.php
session_start();
// Exemple : on suppose que le total du panier est stocké dans $_SESSION['panier_total']
// Sinon, adapte ce calcul selon ta logique panier
$prix_total = isset($_SESSION['panier_total']) ? number_format($_SESSION['panier_total'], 2, ',', ' ') : '0,00';
?>
<!-- ...existing code... -->
<h1 class="text-4xl font-extrabold text-orange-400 mb-6 text-center">Paiement</h1>
<p class="text-center text-2xl font-bold mb-6">
    Total à payer : <span class="text-orange-500"><?= $prix_total ?> €</span>
</p>
<!-- ...existing code... -->
        <form action="?page=payer.php" method="POST" class="space-y-6">
          <div>
            <label class="block font-semibold mb-2 text-gray-700 text-2xl p-8">Méthode de paiement</label>
            <div class="flex flex-col gap-4  ">
              <label class="flex items-center gap-3 cursor-pointer">
                <input type="radio" name="payment_method" value="cb" class="accent-orange-400" checked>
                <span class="material-icons text-orange-400">credit_card</span>
                <span>Carte bancaire</span>
            </div>
          </div>
          <!-- Zone CB -->
          <div id="cb-fields" class="text-black space-y-4">
            <div>
              <label class="block text-sm mb-1">Numéro de carte</label>
              <input type="text" name="cb_num" maxlength="19" class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-400" placeholder="1234 5678 9012 3456">
            </div>
            <div class="flex gap-4">
              <div class="flex-1">
                <label class="block text-sm mb-1">Expiration</label>
                <input type="text" name="cb_exp" maxlength="5" class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-400" placeholder="MM/AA">
              </div>
              <div class="flex-1">
                <label class="block text-sm mb-1">CVC</label>
                <input type="text" name="cb_cvc" maxlength="4" class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-400" placeholder="123">
              </div>
            </div>
          </div>
        
          <!-- Bouton payer -->
<<<<<<< HEAD
          <button type="submit" id="btn-payer" onclick="loadPage('finalisation.php', this)" class="w-full bg-orange-400 hover:bg-orange-500 text-white font-bold py-3 rounded-full text-xl transition">Payer</button>
=======
          <button type="submit" class="w-full bg-orange-400 hover:bg-orange-500 text-white font-bold py-3 rounded-full text-xl transition">Payer</button>
>>>>>>> acceuil
          <!-- Bouton retour au panier -->
        <a href="?page=panier.php"
                    class="w-full inline-block text-center bg-white border-2 border-orange-400 text-orange-500 font-bold py-3 rounded-full text-xl transition hover:bg-orange-100 hover:text-orange-600">
             Retour au panier
        </a>
        </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>