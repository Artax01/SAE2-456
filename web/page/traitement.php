<?php
if (isset($_POST['ajouter'])) {
    // Gérer l’ajout au panier puis rediriger
    header('Location: panier.php');
    exit;
} elseif (isset($_POST['commander'])) {
    // Gérer la commande puis rediriger
    header('Location: commander.php');
    exit;
}
?>