<?php
include "../bdd.php";

// Vérifier si l'ID de la voiture est passé dans l'URL
if (isset($_GET['id'])) {
    // Récupérer l'ID de la voiture depuis l'URL
    $idvehicule = $_GET['id'];

    // Requête SQL pour récupérer les informations de la voiture à modifier
    $sql_select = "SELECT * FROM vehicules WHERE IDvehicule = $idvehicule";
    $result = mysqli_query($connexion, $sql_select);

    // Vérifier si la requête s'est exécutée avec succès
    if ($result) {
        // Vérifier si des données ont été trouvées
        if (mysqli_num_rows($result) > 0) {
            // Récupérer les données de la voiture
            $row = mysqli_fetch_assoc($result);
        }
    }
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Modifier une voiture</title>
    <link rel="stylesheet" href="CSS/modifier.css">
</head>

<body>
<div class="container">

    <h1>Modifier une voiture</h1>

    <form action="traitement_modifier.php" method="post" enctype="multipart/form-data">

        <!--champ caché pour stocker l'ID de la voiture-->
        <input type="hidden" name="IDvehicule" value="<?php echo $idvehicule; ?>">

        <label for="marque">Marque :</label>
        <input type="text" id="marque" name="marque" value="<?php echo $row["marque"]; ?>" required><br><br>

        <label for="modele">Modèle :</label>
        <input type="text" id="modele" name="modele" value="<?php echo $row["modele"]; ?>" required><br><br>


        <label for="prix">Prix :</label>
        <input type="text" id="prix" name="prix" value="<?php echo $row["prix"]; ?>" required><br><br>

        <label for="couleur">Couleur :</label>
        <input type="text" id="couleur" name="couleur" value="<?php echo $row["couleur"]; ?>" required><br><br>


        <label for="num_imma">Numéro d'immatriculation :</label>
        <input type="text" id="num_imma" name="num_imma" value="<?php echo $row["num_imma"]; ?>" required><br><br>

        <label for="klm">Kilométrage :</label>
        <input type="text" id="klm" name="klm" value="<?php echo $row["klm"]; ?>" required><br><br>

        <label for="date_premiere">Date de première mise en circulation :</label>
        <input type="date" id="date_premiere" name="date_premiere" value="<?php echo $row["date_premiere"]; ?>"
            required><br><br>

        <label for="date_rentree">Date d'entrée en stock :</label>
        <input type="date" id="date_rentree" name="date_rentree" value="<?php echo $row["date_rentree"]; ?>"
            required><br><br>

        <label for="nb_chevaux">Nombre de chevaux :</label>
        <input type="text" id="nb_chevaux" name="nb_chevaux" value="<?php echo $row["nb_chevaux"]; ?>" required><br><br>

        <label for="description">Description :</label><br><br>
        <textarea id="description" name="description" rows="4" cols="50"
            required><?php echo $row["description"]; ?></textarea><br><br>

        <label for="image">Image :</label>
        <input type="file" id="image" name="image" accept="image/*"><br><br>

        <input type="submit" value="Modifier">
        <button type="button" onclick="window.location.href='accueil.php';">Annuler</button>
        <br><br><br><br><br><br><br><br><br><br><br><br>
        
    </form>
</div>

</body>

</html>