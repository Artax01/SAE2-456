<?php
session_start();

function isLoggedIn() {
    return isset($_SESSION['client']);
}

function getClient() {
    echo "getClient";
    return $_SESSION['client'] ?? null;
}
?>