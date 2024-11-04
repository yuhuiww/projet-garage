<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Politique de confidentialité - Garage</title>
    <link rel="stylesheet" href="CSS/politique.css">
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
    <br />

    <header>
        <h1>Politique de confidentialité</h1>
        <div class="separator"></div>
    </header>

    <br />
    <br />

    <div class="container">

        <h2>Collecte des informations</h2>
        <p>Nous recueillons des informations conformément aux dispositions du Règlement Général sur la Protection des
            Données (RGPD) et à la loi Informatique et Libertés, à partir du site 'Garage' lorsque vous vous inscrivez.
        </p>
        <p>Les informations recueillies incluent votre nom, votre prénom et votre adresse e-mail.</p>

        <br />
        <br />

        <h2>Utilisation des informations</h2>
        <p>Les informations que nous recueillons auprès de vous peuvent être utilisées pour :</p>
        <ul>
            <li>Personnaliser votre expérience et répondre à vos besoins individuels</li>
            <li>Améliorer notre site Web</li>
            <li>Vous contacter par e-mail</li>
        </ul>

        <br />
        <br />

        <h2>Protection des informations</h2>
        <p>Nous mettons en œuvre une variété de mesures de sécurité pour préserver la sécurité de vos informations
            personnelles.</p>

        <br />
        <br />

        <h2>Divulgation à des tiers</h2>
        <p>Nous ne vendons, n'échangeons et ne transférons pas vos informations personnelles identifiables à des tiers.
            Cela n'inclut pas les tierces parties de confiance qui nous aident à exploiter notre site Web ou à mener nos
            affaires, tant que ces parties conviennent de garder ces informations confidentielles.</p>

        <br />
        <br />

        <h2>Consentement</h2>
        <p>En utilisant notre site, vous consentez à notre politique de confidentialité en ligne.</p>

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