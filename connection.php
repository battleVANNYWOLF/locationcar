<?php 
	$serveur = 'localhost';
	$user = 'root';
	$password = '';
	$database = 'loccar';
	try {
	$con = new PDO("mysql:host=$serveur; dbname=$database",$user,$password);
	//echo "connection reuissi!";
	} catch (Exception $e) {
	 die("Erreur !:".$e->getMessage());	
	}
?>