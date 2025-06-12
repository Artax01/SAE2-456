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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['pla_num'])) {
        array_push($_SESSION['panier']['produits'], $_POST['pla_num']);
    }

    header('Location: ../../index.php?page=plat.php');
    exit;
}

?>