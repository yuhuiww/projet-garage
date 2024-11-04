<?php
include "../bdd.php";

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $idvehicule = $_POST["IDvehicule"]; // Récupérer l'ID de la voiture depuis le champ caché du formulaire
    $marque = $_POST["marque"];
    $modele = $_POST["modele"];
    $prix = $_POST["prix"];
    $couleur = $_POST["couleur"];
    $num_imma = $_POST["num_imma"];
    $klm = $_POST["klm"];
    $date_premiere = $_POST["date_premiere"];
    $date_rentree = $_POST["date_rentree"];
    $nb_chevaux = $_POST["nb_chevaux"];
    $description = $_POST["description"];

    // Préparer la requête SQL pour mettre à jour les informations de la voiture
    $sql = "UPDATE vehicules SET marque = '$marque', modele = '$modele',  prix = '$prix', couleur = '$couleur', num_imma = '$num_imma', klm = '$klm', date_premiere = '$date_premiere', date_rentree = '$date_rentree', nb_chevaux = '$nb_chevaux', description = '$description' WHERE IDvehicule = $idvehicule";

    if (mysqli_query($connexion, $sql)) {
        echo "Informations de la voiture modifiées avec succès.";
    } else {
        echo "Erreur : " . mysqli_error($connexion);
    }
} else {
    echo "Le formulaire n'a pas été soumis.";
}

header("Location: accueil.php");

?>
