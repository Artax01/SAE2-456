

<?php
require_once './web/session/session.php';
$isLoggedIn = getClient();

if (!isset($_SESSION["panier"])) {
    $_SESSION["panier"] = []; // Initialisation du panier s'il n'existe pas
}
?>

<head>

    <!DOCTYPE html>
    <meta name="robots" content="index, follow">
    <meta name="author" content="RapidC3">
    <meta name="language" content="fr">
    <meta name="keywords" content="restaurant, vente Ã  emporter, RapidC3, plats, menus, fidÃ©litÃ©">
    <meta name="description" content="RapidC3 vous permet de commander en ligne, de gÃ©rer vos points de fidÃ©litÃ© et de profiter de plats dÃ©licieux Ã  rÃ©cupÃ©rer en magasin." inertia="description">
    <meta name="twitter:card" content="summary_large_image" inertia="twitter:card">
    <meta name="twitter:site" content="@rapidc3" inertia="twitter:site">
    <meta name="twitter:title" content="RapidC3 - Commande en ligne et fidÃ©litÃ© client" inertia="twitter:title">
    <meta name="twitter:description" content="Commandez vos plats prÃ©fÃ©rÃ©s, gagnez des points et profitez d'offres exclusives avec RapidC3, la solution en ligne pour la vente Ã  emporter." inertia="twitter:description">
    <meta name="twitter:creator" content="@rapidc3" inertia="twitter:creator">
    <meta property="og:locale" content="fr_FR">
    <meta property="og:type" content="website" inertia="og:type">
    <meta property="og:site_name" content="RapidC3">
    <meta property="og:title" content="RapidC3 - Plats Ã  emporter et programme fidÃ©litÃ©" inertia="og:title">
    <meta property="og:description" content="DÃ©couvrez RapidC3 : restaurants Ã  emporter avec commandes en ligne, points de fidÃ©litÃ© et promotions personnalisÃ©es." inertia="og:description">
    <link rel="stylesheet" href="assets/css/root.css">
</head>

<?php require_once './web/component/meta.php'; ?>
<!-- style commun de l'application -->
<link rel="stylesheet" href="./web/assets/css/root.css">

<body>

    <?php require_once './web/component/navbar.php'; ?>

    <div id="content">
        <!-- Le contenu se charge ici -->
    </div>

    <?php require_once './web/component/dialog.php';?>
    <?php require_once './web/component/footer.php';?>

</body>

</html>