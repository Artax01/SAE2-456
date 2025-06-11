
<?php
include("pdo_agile.php");
include("param_connexion_etu.php");
$db_username = $db_usernameOracle;		
$db_password = $db_passwordOracle;
$db = $dbOracle;

$conn = OuvrirConnexionPDO($db,$db_username,$db_password);

if ($conn)
	{
		echo ("Connexion réussie à la base de données <br/>");
		
	}
	else
		echo ("Connexion impossible à la base de données <br/>");

?>