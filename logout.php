<?php
session_start();
// se connecter à la base de donnée
include("model/config.php"); 
$_SESSION = array();
session_destroy();
header("Location:login.php");
?>