<?php

include('./verif_panier.php');

function addProduit() {
    // ...
}

function addMenu() {
    if (isset($_SESSION['panier']['menu'])) {
        $_SESSION['panier']['menu'];
    }
}

?>