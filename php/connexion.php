<?php
require_once("pdo_agile.php");
require_once("param_connexion_etu.php");

// $db_username = $db_usernameOracle;		
// $db_password = $db_passwordOracle;
// $db = $dbOracle;

$db_username = $db_usernameMySQL;		
$db_password = $db_passwordMySQL;
$db = $dbMySQL;

$conn = OuvrirConnexionPDO($db,$db_username,$db_password);
?>