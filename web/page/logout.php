<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<?php
require_once '../session/session.php';
require_once '../../php/connexion.php';

if (!isLoggedIn()) {
    header('Location: ../page/signin.php');
    exit;
}

session_start();

// Supprimer toutes les variables de session
$_SESSION = [];

// Détruire la session
session_destroy();

// Rediriger vers accueil.php
header('Location: ?page=accueil.php');
exit;
?>
