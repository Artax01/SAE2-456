<?php

require_once '../../php/connexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $id = $_POST['delete_id'];
    var_dump($id);

    try {
        $sql = "DELETE FROM RAP_CLIENT WHERE CLI_NUM = :id";
        $stmt = preparerRequetePDO($conn, $sql);
        ajouterParamPDO($stmt, ":id", $id, 'nombre');
        $stmt->execute();

        // Recharge la page pour voir la liste à jour
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    } catch (PDOException $e) {
        echo "Erreur lors de la suppression : " . $e->getMessage();
    }
}
?>