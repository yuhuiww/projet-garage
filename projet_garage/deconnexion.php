<?php
session_start();
if (isset($_SESSION['logged_in'])) {
    unset($_SESSION['logged_in']);
}
header("Location: html/accueil.php");
exit();
?>