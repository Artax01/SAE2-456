<?php require_once './session/session.php'; ?>

<!DOCTYPE html>
<?php require_once './component/meta.php'; ?>
<!-- style commun de l'application -->
<link rel="stylesheet" href="./assets/css/root.css">


<body>


<?php 
    require_once './component/navbar.php';
?>


<div id="content">
    <!-- Le contenu se charge ici -->
</div>

<?php 
    require_once './component/dialog.php';
?>

<?php
    require_once './component/footer.php';
?>


</body>
</html>