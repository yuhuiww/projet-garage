<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Ajouter une voiture</title>
    <link rel="stylesheet" href="CSS/ajout.css">
</head>

<body>


    <div class="container">
        <h1>Ajouter une voiture</h1>

        <form action="traitement_ajouter.php" method="post" enctype="multipart/form-data">

            <label for="marque">Marque :</label>
            <select id="marque" name="marque" required>
                <?php
                // Connexion à la base de données
                $servername = "localhost";
                $userdb = "root";
                $motDePasse = "";
                $baseDeDonnees = "garage";
                $connexion = new mysqli($servername, $userdb, $motDePasse, $baseDeDonnees);
                // Vérifier la connexion
                if ($connexion->connect_error) {
                    die("Erreur de connexion : " . $connexion->connect_error);
                }
                // Récupérer les marques depuis la base de données
                $sql = "SELECT * FROM marque";
                $result = $connexion->query($sql);
                // Afficher les options
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row["nom"] . "'>" . $row["nom"] . "</option>";
                    }
                }
                ?>
            </select><br><br>


            <label for="modele">Modèle :</label>
            <input type="text" id="modele" name="modele" required><br><br>

            <label for="couleur">Couleur :</label>
            <input type="text" id="couleur" name="couleur" required><br><br>

            <label for="prix">Prix :</label>
            <input type="text" id="prix" name="prix" required><br><br>

            <label for="num_imma">Numéro d'immatriculation :</label>
            <input type="text" id="num_imma" name="num_imma" required><br><br>

            <label for="klm">Kilométrage :</label>
            <input type="text" id="klm" name="klm" required><br><br>

            <label for="date_premiere">Date de première mise en circulation :</label>
            <input type="date" id="date_premiere" name="date_premiere" required><br><br>

            <label for="date_rentree">Date d'entrée en stock :</label>
            <input type="date" id="date_rentree" name="date_rentree" required><br><br>

            <label for="nb_chevaux">Nombre de chevaux :</label>
            <input type="text" id="nb_chevaux" name="nb_chevaux" required><br><br>

            <label for="description">Description :</label><br><br>
            <textarea id="description" name="description" rows="4" cols="50"></textarea><br><br>

            <label for="image">Image :</label>
            <input type="file" id="image" name="image" accept="image/*" required><br><br>

            <input type="submit" value="Ajouter">
        </form>
    </div>
</body>

</html>