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

function getNom() {
    return $_SESSION['client']['nom'] ?? null;
}

function getPrenom() {
    return $_SESSION['client']['prenom'] ?? null;
}

function getEmail() {
    return $_SESSION['client']['email'] ?? null;
}
?>