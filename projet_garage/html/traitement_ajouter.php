<?php
include "../bdd.php";

$marque = $_POST["marque"];
$modele = $_POST["modele"];
$couleur = $_POST["couleur"];
$prix = $_POST["prix"];
$num_imma = $_POST["num_imma"];
$klm = $_POST["klm"];
$date_premiere = $_POST["date_premiere"];
$date_rentree = $_POST["date_rentree"];
$nb_chevaux = $_POST["nb_chevaux"];
$description = $_POST["description"];

// Vérifier si un fichier a été téléchargé
if(isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    // Déplacer le fichier téléchargé vers un répertoire sur le serveur
    $upload_directory = 'image/';
    $image_path = $upload_directory . basename($_FILES['image']['name']);
    if(move_uploaded_file($_FILES['image']['tmp_name'], $image_path)) {
        // L'image a été téléchargée avec succès, enregistrez le chemin dans la base de données
        $sql = "INSERT INTO vehicules (marque, modele, couleur, prix, num_imma, klm, date_premiere, date_rentree, nb_chevaux, description, image) VALUES ('$marque', '$modele', '$couleur', '$prix', '$num_imma', '$klm', '$date_premiere', '$date_rentree', '$nb_chevaux', '$description', '$image_path')";
        if (mysqli_query($connexion, $sql)) {
            echo "Voiture ajoutée avec succès.";
        } else {
            echo "Erreur : " . mysqli_error($connexion);
        }
        header("Location: accueil.php");
    }
} 
?>
