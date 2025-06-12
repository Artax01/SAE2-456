<?php
<<<<<<< HEAD

=======
>>>>>>> web
require_once '../../php/connexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $id = $_POST['delete_id'];
<<<<<<< HEAD
    var_dump($id);

    try {
=======
    try {
        // 1. Supprimer dans RAP_APPARTENIR
        $sql = "
            DELETE FROM RAP_APPARTENIR 
            WHERE COM_NUM IN (SELECT COM_NUM FROM RAP_COMMANDE WHERE CLI_NUM = :id)
        ";
        $stmt = preparerRequetePDO($conn, $sql);
        ajouterParamPDO($stmt, ":id", $id, 'nombre');
        $stmt->execute();

        // 2. Supprimer dans RAP_COMMANDE
        $sql = "DELETE FROM RAP_COMMANDE WHERE CLI_NUM = :id";
        $stmt = preparerRequetePDO($conn, $sql);
        ajouterParamPDO($stmt, ":id", $id, 'nombre');
        $stmt->execute();

        // 3. Supprimer dans RAP_FIDELISATION
        $sql = "DELETE FROM RAP_FIDELISATION WHERE CLI_NUM = :id";
        $stmt = preparerRequetePDO($conn, $sql);
        ajouterParamPDO($stmt, ":id", $id, 'nombre');
        $stmt->execute();

        // 4. Supprimer dans RAP_CLIENT
>>>>>>> web
        $sql = "DELETE FROM RAP_CLIENT WHERE CLI_NUM = :id";
        $stmt = preparerRequetePDO($conn, $sql);
        ajouterParamPDO($stmt, ":id", $id, 'nombre');
        $stmt->execute();

<<<<<<< HEAD
        // Recharge la page pour voir la liste à jour
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
=======
        header("Location: /sae2-456-grp2/web/page/gerer.php");
        exit;
        
>>>>>>> web
    } catch (PDOException $e) {
        echo "Erreur lors de la suppression : " . $e->getMessage();
    }
}
<<<<<<< HEAD
?>
=======
?>
>>>>>>> web
