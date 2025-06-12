<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function isLoggedIn() {
    return isset($_SESSION['client']);
}

function isLoggedInAdmin($conn) {
    try {
        $sql = "select cli_num from rap_client
                where cli_num in (
                    select cli_num from rap_administrateur
                ) and cli_num = 1240";
        $res = LireDonneesPDO1($conn,$sql,$donnees);

        if (isset($donnees[0]["CLI_NUM"])) {
            return $donnees[0]["CLI_NUM"] == getId();
        }
        return false;
    }
    catch (PDOException $e) {
        var_dump($e);
        return false;
    }
    return false;
}

function getClient() {
    return $_SESSION['client'] ?? null;
}

function getId() {
    return $_SESSION['client']['id'] ?? null;
}

function getNom() {
    return $_SESSION['client']['nom'] ?? null;
}

function getPrenom() {
    return $_SESSION['client']['prenom'] ?? null;
}

function getTel() {
    return $_SESSION['client']['tel'] ?? null;
}

function getEmail() {
    return $_SESSION['client']['email'] ?? null;
}
?>
