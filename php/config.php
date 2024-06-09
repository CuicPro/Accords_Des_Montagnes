<?php
// Connexion à la base de données
$mysqli = new mysqli("localhost", "root", "", "e-arch"); //mdp green

// Vérification de la connexion
if ($mysqli->connect_error) {
    die("Erreur de connexion à la base de données : " . $mysqli->connect_error);
}
?>