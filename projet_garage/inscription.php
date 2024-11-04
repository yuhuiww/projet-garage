<?php

include 'bdd.php';

if (!$connexion) {
    die("La connexion à la base de données a échoué : " . mysqli_connect_error());
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Récupérer les données du formulaire
    $Nom = $_POST["nom"];
    $Prenom = $_POST["prenom"];
    $Mdp = $_POST["mdp"];
    $mail = $_POST["mail"];
   
    // Requête d'insertion des données dans la table utilisateur
    $requete = "INSERT INTO utilisateur (nom, prenom, mdp, mail) VALUES ('$Nom', '$Prenom', '$Mdp', '$mail')";

    // Exécuter la requête
    if (mysqli_query($connexion, $requete)) {
        header("Location: html/accueil.php");    
    } else {
        echo "Erreur : " . mysqli_error($connexion);
    }
}

    mysqli_close($connexion);

?>
