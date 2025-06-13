<?php 

if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = [
        'produits' => [],
        'menus' => []
    ];
}

if (!isset($_SESSION['panier']['produits'])) {
    $_SESSION['panier']['produits'] = [];
}

if (!isset($_SESSION['panier']['menus'])) {
    $_SESSION['panier']['menus'] = [];
}

?>