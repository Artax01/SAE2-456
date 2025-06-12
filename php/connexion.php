
<?php
include("pdo_agile.php");
include("param_connexion_etu.php");
$db_username = $db_usernameOracle;		
$db_password = $db_passwordOracle;
$db = $dbOracle;

$conn = OuvrirConnexionPDO($db,$db_username,$db_password);

// echo "<script>console.log($conn);</script>";

if (!isset($conn)) {
	echo ("Connexion impossible à la base de données <br/>");
}
?>