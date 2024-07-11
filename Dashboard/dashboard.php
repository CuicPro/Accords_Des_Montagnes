<?php
session_start();
require '../php/config.php';

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('Location: ../index.php');
    exit();
}

// Régénérer l'ID de session pour éviter les attaques de session fixation
session_regenerate_id(true);

// Récupérer les informations de l'utilisateur connecté
$user_id = intval($_SESSION['user_id']);
$sql = "SELECT name, grade FROM users WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $user_id, PDO::PARAM_INT);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    echo "Utilisateur non trouvé.";
    exit();
}

$name = $user['name'] ?? 'Utilisateur';
$grade = $user['grade'] ?? 'basic';

// Générer un jeton CSRF
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
$csrf_token = $_SESSION['csrf_token'];

// Envoyer l'en-tête X-Frame-Options
header('X-Frame-Options: DENY');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Dashboard</h1>
    <p>Bienvenue, <?php echo htmlspecialchars($name); ?>!</p>

    <div class="features">
        <?php if ($grade === 'basic' || $grade === 'premium' || $grade === 'admin'): ?>
            <div class="feature">Fonctionnalité accessible à tous les utilisateurs</div>
        <?php endif; ?>

        <?php if ($grade === 'premium' || $grade === 'admin'): ?>
            <div class="feature">Fonctionnalité réservée aux utilisateurs Premium</div>
        <?php endif; ?>

        <?php if ($grade === 'admin'): ?>
            <div class="feature">Fonctionnalité réservée aux administrateurs</div>
        <?php endif; ?>
    </div>

    <form action="../php/AuthLogic/logout.php" method="POST">
        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrf_token); ?>">
        <button type="submit" class="logout-button">Se déconnecter</button>
    </form>
</body>
</html>
