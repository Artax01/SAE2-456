<<<<<<< HEAD

<?php
include("pdo_agile.php");
include("param_connexion_etu.php");
=======
<?php
require_once("pdo_agile.php");
require_once("param_connexion_etu.php");
>>>>>>> web
$db_username = $db_usernameOracle;		
$db_password = $db_passwordOracle;
$db = $dbOracle;

$conn = OuvrirConnexionPDO($db,$db_username,$db_password);
<<<<<<< HEAD

// echo "<script>console.log($conn);</script>";

if ($conn)
	{
		echo ("Connexion réussie à la base de données <br/>");
		
	}
	else
		echo ("Connexion impossible à la base de données <br/>");

=======
>>>>>>> web
?>