<?php
session_start();

include 'bdd.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Nom = $_POST["nom"];
    $Prenom = $_POST["prenom"];
    $Mdp = $_POST["mdp"];
   
    // vérifie les informations dans la base de données
    $requete = "SELECT role FROM utilisateur WHERE nom='$Nom' AND prenom='$Prenom' AND mdp='$Mdp'";
    $resultat = mysqli_query($connexion, $requete);

    // vérifie si une ligne correspondante est retournée
    if (mysqli_num_rows($resultat) == 1) {
        $utilisateur = mysqli_fetch_assoc($resultat);

        // créer une variable de session pour indiquer que l'utilisateur est connecté
        $_SESSION['logged_in'] = true; 
        //stocker
        $_SESSION['nom'] = $Nom;
        $_SESSION['prenom'] = $Prenom;
        //prends le role de ce qu'il a trouver
        $_SESSION['role'] = $utilisateur['role']; 

        header("Location: html/accueil.php");
        exit(); 
    } else {
        $erreur_message = "Nom, prénom ou mot de passe incorrect.";
        echo $erreur_message;
    }
}

mysqli_close($connexion);
?>
