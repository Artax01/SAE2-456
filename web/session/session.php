<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function isLoggedIn() {
    return isset($_SESSION['client']);
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
