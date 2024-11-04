<?php
// Informations de connexion à la base de données
$server="localhost"; 		
$userdb="root"; 			
$motDePasse = ""; 
$baseDeDonnees = "garage";

// Établir une connexion à la base de données
$connexion = new mysqli($server, $userdb, $motDePasse, $baseDeDonnees);

// Vérifier la connexion
if ($connexion->connect_error) {
    die("La connexion à la base de données a échoué : " . $connexion->connect_error);
}
?>
