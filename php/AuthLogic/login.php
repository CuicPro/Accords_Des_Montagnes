<?php
session_start();
require '../config.php';

// Générer un jeton CSRF pour le formulaire s'il n'existe pas
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
$csrf_token = $_SESSION['csrf_token'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifier le jeton CSRF
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        $_SESSION['error'] = 'Invalid CSRF token';
        header('Location: ../../index.php');
        exit();
    }

    // Récupérer et assainir les données du formulaire
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = trim($_POST['password']);

    // Valider les données
    if (empty($email) || empty($password)) {
        $_SESSION['error'] = "Tous les champs sont obligatoires.";
        header('Location: ../../index.php');
        exit();
    }

    // Préparer la requête pour vérifier l'utilisateur
    $sql = "SELECT id, password FROM users WHERE email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    // Vérifier si l'utilisateur existe
    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Vérifier le mot de passe
        if (password_verify($password, $user['password'])) {
            // Authentification réussie, régénérer l'ID de session
            session_regenerate_id(true);
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['logged_in'] = true;
            header('Location: ../../Dashboard/dashboard.php'); // Rediriger vers la page d'accueil ou tableau de bord
            exit();
        } else {
            // Mot de passe incorrect
            $_SESSION['error'] = "Mot de passe incorrect.";
        }
    } else {
        // Utilisateur non trouvé
        $_SESSION['error'] = "Utilisateur non trouvé.";
    }

    // Rediriger vers la page de connexion avec un message d'erreur
    header('Location: ../../index.php');
    exit();
}
?>
