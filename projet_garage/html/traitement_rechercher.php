<?php
session_start();
include "../bdd.php";

$sql = "SELECT * FROM vehicules WHERE 1=1";
if (!empty($_POST['marque'])) {
    $sql .= " AND marque LIKE '%{$_POST['marque']}%'";
}
if (!empty($_POST['modele'])) {
    $sql .= " AND modele LIKE '%{$_POST['modele']}%'";
}
if (!empty($_POST['couleur'])) {
    $sql .= " AND couleur LIKE '%{$_POST['couleur']}%'";
}
if (!empty($_POST['prix'])) {
    $sql .= " AND prix <= '{$_POST['prix']}'";
}
if (!empty($_POST['klm'])) {
    $sql .= " AND klm <= '{$_POST['klm']}'";
}
if (!empty($_POST['date_premiere'])) {
    $sql .= " AND date_premiere <= '{$_POST['date_premiere']}'";
}
if (!empty($_POST['date_entree'])) {
    $sql .= " AND date_entree <= '{$_POST['date_entree']}'";
}
if (!empty($_POST['nb_chevaux'])) {
    $sql .= " AND nb_chevaux <= '{$_POST['nb_chevaux']}'";
}

$result = mysqli_query($connexion, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div>" . $row['marque'] . "</div>";
        echo "<div>" . $row['modele'] . "</div>";
        echo "<div>" . $row['couleur'] . "</div>";
        echo "<div>" . $row['prix'] . "</div>";
        echo "<div>" . $row['klm'] . "</div>";
        echo "<div>" . $row['date_premiere'] . "</div>";
        echo "<div>" . $row['date_rentree'] . "</div>";
        echo "<div>" . $row['nb_chevaux'] . "</div>";

    }
} else {
    echo "Aucun véhicule trouvé avec les critères spécifiés.";
}

mysqli_close($connexion);
?>