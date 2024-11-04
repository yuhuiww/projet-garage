<?php
include "../bdd.php";

if (isset($_POST['IDvehicule'])) {
    // Récupérer l'ID de la voiture
    $idvehicule = $_POST['IDvehicule'];

    $sql_delete = "DELETE FROM vehicules WHERE IDvehicule = $idvehicule";

    if (mysqli_query($connexion, $sql_delete)) {
        header("Location: accueil.php");
    } else {
        echo "Erreur " . mysqli_error($connexion);
    }
} else {
    echo "ID de la voiture non spécifié.";
}
exit();
?>
