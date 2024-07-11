<?php
session_start();
require('../config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : null;
    $telephone = isset($_POST['telephone']) ? htmlspecialchars($_POST['telephone']) : null;
    $places_reservees = htmlspecialchars($_POST['seats']);
    $reservation_date = htmlspecialchars($_POST['reservation_date']);

    // Insérer les données dans la table reservations
    $sql = "INSERT INTO reservations (nom, prenom, email, telephone, places_reservees, date_reservation) VALUES (:nom, :prenom, :email, :telephone, :places_reservees, :reservation_date)";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':nom', $nom);
    $stmt->bindValue(':prenom', $prenom);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':telephone', $telephone);
    $stmt->bindValue(':places_reservees', $places_reservees);
    $stmt->bindValue(':reservation_date', $reservation_date);

    if ($stmt->execute()) {
        $_SESSION['success-resa'] = 'Votre réservation a été effectuée avec succès. Vous';
        header('Location: ../../index.php');
        exit();
    } else {
        echo "Erreur: " . $stmt->errorInfo()[2];
    }
} else {
    echo "Méthode de requête non autorisée.";
}
?>
