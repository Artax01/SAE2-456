<?php
require_once './web/session/session.php';
?>

<!DOCTYPE html>

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