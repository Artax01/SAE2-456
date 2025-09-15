<?php
	// E.Porcq : TP2 PHP Exo1 et Exo2
	// préparation SAE 2.456 : paramètres de connexion à un SGBD Oracle ou MySQL
	// param_connexion_etu.php 29/05/2021

	/* ===== Oracle ===== */

	$db_usernameOracle = "agile_2";
	$db_passwordOracle = "agile_2";
	$dbOracle = "oci:dbname=harpagon.unicaen.fr:1521/info.harpagon.unicaen.fr;charset=AL32UTF8";  

	//$db_usernameOracle = "system";
	//$db_passwordOracle = "oracle";
	//$dbOracle = "oci:dbname=//localhost:1521/xe;charset=AL32UTF8"; 

	/* ===== MySQL ===== */

	$db_usernameMySQL = "root";
	$db_passwordMySQL = "";
	$db_hostMySQL = "localhost";
	$db_nameMySQL = "rapidc3";
	$dbMySQL = "mysql:host=$db_hostMySQL;dbname=$db_nameMySQL;charset=utf8";  
 ?>
