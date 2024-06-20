<?php
require('../config.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : null;
    $telephone = isset($_POST['telephone']) ? htmlspecialchars($_POST['telephone']) : null;
    $places_reservees = htmlspecialchars($_POST['seats']);
    $reservation_date = htmlspecialchars($_POST['reservation_date']);

    // Insérer les données dans la table reservations
    $sql = "INSERT INTO reservations (nom, prenom, email, telephone, places_reservees, date_reservation) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $nom, $prenom, $email, $telephone, $places_reservees, $reservation_date);

    if ($stmt->execute()) {
        echo "Réservation enregistrée avec succès.";
    } else {
        echo "Erreur: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Méthode de requête non autorisée.";
}
?>
