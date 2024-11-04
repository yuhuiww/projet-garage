<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Garage</title>
    <link rel="stylesheet" href="CSS/accueil.css">
    <script src="menu.js" defer></script>
</head>
<body>
    <div class="menu">
        <a href="accueil.php">Accueil</a>
        <a href="a_propos.php">A propos</a>
        <a href="voitures.php">Véhicules</a>

        <!-- barre de recherche -->
        <form method="post" action="traitement_barre_rechercher.php">
            <button type="submit">Rechercher</button>
            <input type="search" name="q" placeholder="Rechercher">

            <!-- connexion -->
            <?php
            session_start();
            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
                // vérifiez son rôle
                if ($_SESSION['role'] === 'admin') {
                    // si admin
                    echo '<a href="ajouter.php">Ajouter</a>';
                }
                echo '<a href="../deconnexion.php">Déconnexion</a>';
            } else {
                echo '<a href="inscription.html" class="button">S\'inscrire</a>';
                echo '<a href="connexion.html" class="button">Connexion</a>';
            }
            ?>
        </form>
    </div>

    <div class="contenu">
        <img src="image/index.jpg" alt="En-tête" class="header-image">
    </div>

    <div class="links">
        <a href="voitures.php">Nos véhicules</a>
    </div>

    <!-- 1ere partie -->
    <div class="image-text-container">
        <div class="text-content">
            <p>Trouvez votre</p>
            <p>concessionnaire</p>
            <p>le plus proche</p>
        </div>
        <img src="image/nc.jpg" alt="map" class="map-image">
    </div>
    
    <!-- 2eme partie -->
    <div class="image1-text-container">
        <div class="text-content1">
            <p>Peu importe où vous vous trouvez dans le monde,</p>
            <p>nous sommes là pour répondre à toutes </p>
            <p>vos questions ou demandes concernant Garage.</p>
        </div>
        <img src="image/accueil1.jpg" alt="voiture" class="voiture">
    </div>
</body>

<footer>
    <p>© 2024 Mon Site Web</p>
    <a href="mentions.php">Mentions légales</a>
    <a href="politique.php">Politique de confidentialité</a>
</footer>
</html>
