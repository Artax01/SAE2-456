<?php

if (!isset($_SESSION['commande'])) {
    $_SESSION['commande'] = [
        'produits' => [],
        'menus' => []
    ];
}

function addProduit() {
    // ...
}

function addMenu() {
    if (isset($_SESSION['commande']['menu'])) {
        $_SESSION['commande']['menu'];
    }
}

?>