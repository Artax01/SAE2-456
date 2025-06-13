<?php
require_once '../session/session.php';
require_once './verif_panier.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['pla_num'])) {
        $exist = false;
        $item = [
            'id' => $_POST['pla_num'],
            'quantite' => 1,
            'prix' => 0,
            'nom' => 'placeholder',
        ];
        for ($i = 0; $i < count($_SESSION['panier']['produits']); $i = $i + 1) {
            if ($_SESSION['panier']['produits'][$i]['id'] == $item['id']) {
                $exist = true;
                $_SESSION['panier']['produits'][$i]['quantite'] = $_SESSION['panier']['produits'][$i]['quantite'] + 1;
            }
        }
        if (!$exist) {
            array_push($_SESSION['panier']['produits'], $item);
        }
    }

    header('Location: ../../index.php?page=plat.php');
    exit;
}

?>