<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Nos Voitures</title>
    <link rel="stylesheet" href="CSS/voitures.css">
</head>
<body>

<div class="menu">
    <a href="accueil.php">Accueil</a>
    <a href="a_propos.php">A propos</a>
    <a href="voitures.php">Véhicules</a>

    <!-- Barre de recherche -->
    <form method="post" action="traitement_barre_rechercher.php">
        <button type="submit">Rechercher</button>
        <input type="search" name="q" placeholder="Rechercher">
        <a href="panier.php">Panier</a> <!-- Ajout du lien vers le panier -->

        <!-- Connexion -->
        <?php
        session_start();

        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
            // Vérifiez son rôle
            if ($_SESSION['role'] === 'admin') {
                // Si admin
                echo '<a href="ajouter.php">Ajouter un produit</a>';
                echo '<a href="client.html">Client</a>';
            }
            echo '<a href="../deconnexion.php">Déconnexion</a>';
        } else {
            echo '<a href="inscription.html" class="button">S\'inscrire</a>';
            echo '<a href="connexion.html" class="button">Connexion</a>';
        }
        ?>
    </form>
</div>

<div class="wrapper">
    <div class="container">
        <h1>Nos Voitures</h1>

        <!-- Formulaire de recherche -->
        <?php
        include "../bdd.php";
        function getOptions($connexion, $column)
        {
            $options = [];
            $sql = "SELECT DISTINCT $column FROM vehicules ORDER BY $column ASC";
            $result = mysqli_query($connexion, $sql);

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $options[] = $row[$column];
                }
            }
            return $options;
        }

        $image = getOptions($connexion, 'image');
        $marque = getOptions($connexion, 'marque');
        $modele = getOptions($connexion, 'modele');
        $couleur = getOptions($connexion, 'couleur');
        $prix = getOptions($connexion, 'prix');
        $klm = getOptions($connexion, 'klm');
        $date_premiere = getOptions($connexion, 'date_premiere');
        $date_rentree = getOptions($connexion, 'date_rentree');
        $nb_chevaux = getOptions($connexion, 'nb_chevaux');

        mysqli_close($connexion);
        ?>
        <!-- Filtrage -->

        <div class="liste">
            <form method="post" action="traitement_rechercher.php">

                <div class="liste-row">
                    <select name="marque" id="marque">
                        <option value="" disabled selected hidden>Marque</option>
                        <?php foreach ($marque as $marque): ?>
                            <option value="<?php echo htmlspecialchars($marque); ?>">
                                <?php echo htmlspecialchars($marque); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <select name="modele" id="modele">
                        <option value="" disabled selected hidden>Modele</option>
                        <?php foreach ($modele as $modele): ?>
                            <option value="<?php echo htmlspecialchars($modele); ?>">
                                <?php echo htmlspecialchars($modele); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <select name="couleur" id="couleur">
                        <option value="" disabled selected hidden>Couleur</option>
                        <?php foreach ($couleur as $couleur): ?>
                            <option value="<?php echo htmlspecialchars($couleur); ?>">
                                <?php echo htmlspecialchars($couleur); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <select name="prix" id="prix">
                        <option value="" disabled selected hidden>Prix</option>
                        <?php foreach ($prix as $prix): ?>
                            <option value="<?php echo htmlspecialchars($prix); ?>"><?php echo htmlspecialchars($prix); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <div class="liste-column">
                        <select name="klm" id="klm">
                            <option value="" disabled selected hidden>Kilomètrage</option>
                            <?php foreach ($klm as $klm): ?>
                                <option value="<?php echo htmlspecialchars($klm); ?>"><?php echo htmlspecialchars($klm); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>

                        <select name="date_premiere" id="date_premiere">
                            <option value="" disabled selected hidden>Date de première mise en circulation</option>
                            <?php foreach ($date_premiere as $date_premiere): ?>
                                <option value="<?php echo htmlspecialchars($date_premiere); ?>">
                                    <?php echo htmlspecialchars($date_premiere); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>

                        <select name="date_rentree" id="date_rentree">
                            <option value="" disabled selected hidden>Date d'entrée en stock</option>
                            <?php foreach ($date_rentree as $date_rentree): ?>
                                <option value="<?php echo htmlspecialchars($date_rentree); ?>">
                                    <?php echo htmlspecialchars($date_rentree); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>

                        <select name="nb_chevaux" id="nb_chevaux">
                            <option value="" disabled selected hidden>Nombre de chevaux</option>
                            <?php foreach ($nb_chevaux as $nb_chevaux): ?>
                                <option value="<?php echo htmlspecialchars($nb_chevaux); ?>">
                                    <?php echo htmlspecialchars($nb_chevaux); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="button-row">
                    <button type="submit">Rechercher</button>
                </div>
            </form>
        </div>

        <div class="voitures">
    <?php
    include('../bdd.php');

    // Requête pour obtenir toutes les voitures
    $sql = "SELECT * FROM vehicules";
    $result = mysqli_query($connexion, $sql);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            // Afficher les voitures
            while($row = mysqli_fetch_assoc($result)) {
                echo "<div class='voiture-card'>";
                echo "<img src='" . htmlspecialchars($row["image"]) . "' alt='" . htmlspecialchars($row["marque"]) . " " . htmlspecialchars($row["modele"]) . "'>";
                echo "<div class='voiture-info'>";
                echo "<h2>" . htmlspecialchars($row["marque"]) . " " . htmlspecialchars($row["modele"]) . "</h2>";
                echo "<p>Prix : " . htmlspecialchars($row["prix"]) . " CFP</p>";
                echo "<p>Couleur : " . htmlspecialchars($row["couleur"]) . "</p>";
                echo "<p>Kilomètrage : " . htmlspecialchars($row["klm"]) . "</p>";
                echo "<p>Date de première mise en circulation : " . htmlspecialchars($row["date_premiere"]) . "</p>";
                echo "<p>Date d'entrée en stock : " . htmlspecialchars($row["date_rentree"]) . "</p>";
                echo "<p>Nombre de chevaux : " . htmlspecialchars($row["nb_chevaux"]) . "</p>";
                echo "<p>Description : " . htmlspecialchars($row["description"]) . "</p>";
                echo "</div>";

                if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === 'admin') {
                    echo '<div class="actions">';
                    // Modifier
                    echo '<a href="modifier.php?id=' . htmlspecialchars($row['IDvehicule']) . '">Modifier</a>';
                    // Supprimer
                    echo '<form method="post" action="traitement_supprimer.php" style="display:inline-block;">';
                    echo '<input type="hidden" name="IDvehicule" value="' . htmlspecialchars($row['IDvehicule']) . '">';
                    echo '<input type="submit" value="Supprimer">';
                    echo '</form>';
                    echo '</div>';
                }

                echo '</div>';
            }
        } else {
            echo "Aucune voiture disponible.";
        }
    }

    mysqli_close($connexion);
    ?>
</div>

    </div>

    <footer>
        <p>© 2024 Mon Site Web</p>
        <a href="mentions.php">Mentions légales</a>
        <a href="politique.php">Politique de confidentialité</a>
    </footer>
</div>

</body>
</html>
