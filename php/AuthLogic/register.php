<?php
session_start();
require '../config.php';

// Générer un jeton CSRF pour le formulaire
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
$csrf_token = $_SESSION['csrf_token'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifier le jeton CSRF
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        $_SESSION['error'] = 'Invalid CSRF token';
        header('Location: ../../Authentification.php');
        exit();
    }

    // Récupérer et assainir les données du formulaire
    $name = trim($_POST['name']);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);
    $grade = trim($_POST['grade']);
    
    // Valider les données
    if (empty($name) || empty($email) || empty($password) || empty($confirm_password) || empty($grade)) {
        $_SESSION['error'] = "Tous les champs sont obligatoires.";
        header('Location: ../../Authentification.php');
        exit();
    }
    
    // Vérifier si les mots de passe correspondent
    if ($password !== $confirm_password) {
        $_SESSION['error'] = "Les mots de passe ne correspondent pas.";
        header('Location: ../../Authentification.php');
        exit();
    }
    
    // Vérifier si l'email est déjà utilisé
    $sql = "SELECT id FROM users WHERE email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        // Email déjà utilisé
        $_SESSION['error'] = "L'email est déjà utilisé.";
        header('Location: ../../Authentification.php');
        exit();
    }

    // Hacher le mot de passe
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Insérer les données dans la base de données
    $sql = "INSERT INTO users (name, email, password, grade) VALUES (:name, :email, :password, :grade)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $hashed_password);
    $stmt->bindParam(':grade', $grade);

    if ($stmt->execute()) {
        // Régénérer l'ID de session pour des raisons de sécurité
        session_regenerate_id(true);
        
        $_SESSION['success'] = "Inscription réussie. Vous pouvez maintenant vous connecter.";
        header('Location: ../../Authentification.php');
        exit();
    } else {
        $_SESSION['error'] = "Une erreur est survenue. Veuillez réessayer.";
        header('Location: ../../Authentification.php');
        exit();
    }
}
?>
