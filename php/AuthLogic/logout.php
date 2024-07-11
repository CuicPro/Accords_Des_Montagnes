<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifier le jeton CSRF
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die('Invalid CSRF token');
    }

    // Détruire toutes les variables de session
    $_SESSION = array();

    // Si vous souhaitez détruire complètement la session, supprimez le cookie de session également
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    // Détruire la session
    session_destroy();

    // Rediriger vers la page d'accueil ou de connexion
    header('Location: ../../Authentification.php');
    exit();
} else {
    // Rediriger vers la page d'accueil ou de connexion si la requête n'est pas POST
    header('Location: ../../index.php');
    exit();
}
?>
