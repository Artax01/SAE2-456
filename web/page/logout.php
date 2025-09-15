<?php
require_once '../CAS/session.php';
require_once '../../php/connexion.php';

if (!isLoggedIn()) {
    header('Location: ../page/signin.php');
    exit;
}

// Supprimer toutes les variables de session
$_SESSION['client'] = null;

// Détruire la session
// session_destroy();

// Rediriger vers accueil.php
header('Location: ?page=accueil.php');
exit;
?>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
