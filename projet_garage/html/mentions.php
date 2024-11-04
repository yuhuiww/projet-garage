<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Mentions Légales - Garage</title>
    <link rel="stylesheet" href="CSS/mentions.css">
    <script src="menu.js" defer></script>


</head>

<body>

    <div class="menu">

        <a href="accueil.php">Accueil</a>
        <a href="a_propos.php">A propos</a>
        <a href="voitures.php">Véhicules</a>


        <form method="post" action="traitement_rechercher.php">
            <button type="submit">Rechercher</button>
            <input type="search" name="q" placeholder="Rechercher">

            <?php
            session_start();

            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
                //Vérifiez son rôle
                if ($_SESSION['role'] === 'admin') {
                    // Si admin
                    echo '<a href="ajouter.html">Ajouter</a>';
                } else {

                }

                echo '<a href="../deconnexion.php">Déconnexion</a>';
            } else {
                echo '<a href="inscription.html" class="button">S\'inscrire</a>';
                echo '<a href="connexion.html" class="button">Connexion</a>';
            }
            ?>

        </form>
    </div>

    <br />
    <br />
    <br />
    <br />

    <header>
        <h1>Mentions Légales</h1>
        <div class="separator"></div>

    </header>

    <br />
    <br />

    <div class="content">

        <h2>Informations générales</h2>
        <p>Raison sociale : Garage </p>
        <p>Adresse : __________</p>
        <p>Téléphone : _________</p>
        <p>Email : contact@garage.com</p>

        <br />
        <br />

        <h2>Droits d'auteur</h2>
        <p>Tous les éléments constituant ce site (textes, images, etc.) sont la propriété exclusive du Garage 
            ou de ses partenaires. Toute reproduction ou utilisation sans autorisation préalable est strictement
            interdite.</p>

        <br />
        <br />

        <h2>Liens externes</h2>
        <p>Le site peut contenir des liens vers des sites externes. 
            Le Garage ne peut être tenu responsable du
            contenu
            de ces sites externes.</p>

        <br />
        <br />

        <h2>Modification des mentions légales</h2>
        <p>Le Garage se réserve le droit de modifier les présentes mentions légales à tout moment. 
            Les utilisateurs du
            site sont donc invités à les consulter régulièrement.</p>
    </div>

    <br />
    <br />
    <br />

    <footer>
        <p>© 2024 Mon Site Web</p>
        <a href="mentions.php">Mentions légales</a>
        <a href="politique.php">Politique de confidentialité</a>
    </footer>

</body>

</html>