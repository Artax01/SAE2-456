<?php
if (!isset($_SESSION["panier"])) {
    $_SESSION["panier"] = []; // Initialisation du panier s'il n'existe pas
}
?>

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