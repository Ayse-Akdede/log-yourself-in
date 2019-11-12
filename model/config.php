<?php
function openConnection() {
	// Try to figure out what these should be for you
	$dbhost = "remotemysql.com";
	$dbuser = "7c1hcMepnL";
	$dbpass = "6e7ns21xdW";
	$db = "7c1hcMepnL";

	// Try to understand what happens here
	$pdo = new PDO("mysql:host=$dbhost;dbname=$db",$dbuser,$dbpass);

	// Why we do this here
	return $pdo;
}

try{
   $pdo=openConnection();
    
} catch(Exception $e){
    echo "Error". $e -> getMessage();
    die();
}
?>