<?php if (!isset($_SESSION['panier'])) {
    echo "Erreur : panier non trouvé.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nom'], $_POST['increment'])) {
    $nom = $_POST['nom'];
    $increment = intval($_POST['increment']);

    foreach ($_SESSION['panier'] as &$produit) {
        if ($produit['nom'] === $nom) {
            $produit['quantite'] += $increment;
            echo "Quantité mise à jour : " . $produit['quantite'];
            exit;
        }
    }

    echo "Produit introuvable.";
}
?>