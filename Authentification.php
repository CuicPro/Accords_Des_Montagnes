<?php
session_start();

// Vérifier si une update_avatar est présente dans la variable de session
if (isset($_SESSION['update_avatar'])) {
    $update_avatar = htmlspecialchars($_SESSION['update_avatar'], ENT_QUOTES, 'UTF-8');

    // Supprimer la update_avatar de la variable de session pour éviter de l'afficher à nouveau après un rafraîchissement de la page
    unset($_SESSION['update_avatar']);
}

// Générer un jeton CSRF pour les formulaires
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
$csrf_token = $_SESSION['csrf_token'];
?>

<!-- update_avatar -->
<?php if(isset($update_avatar)): ?>
    <div class="notification"><?php echo $update_avatar; ?></div>
<?php endif; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADM Authentification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .card {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            padding: 20px;
            box-sizing: border-box;
        }

        .card h2 {
            margin: 0 0 20px;
            color: #333;
        }

        .card label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }

        .card input, .card select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .card button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            color: #fff;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .card button:hover {
            background-color: #0056b3;
        }

        .notification {
            z-index: 10000;
            width: 85vw;
            height: 50px;
            position: fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            right: 10px;
            bottom: 20px;
            background-color: white;
            color: var(--black-white);
            padding: 10px 20px;
            border-radius: 10px;
            box-shadow: var(--border);
            animation: toast_slide_off 2.5s forwards;
        }

        @keyframes toast_slide_off {
            90% {transform: translateX(0px); opacity: 100%;}
            100% {transform: translateX(300px); opacity: 0%;}
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <h2>Connexion</h2>
            <form action="php/AuthLogic/login.php" method="POST">
                <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrf_token); ?>">
                <label for="login-email">Email:</label>
                <input type="email" id="login-email" name="email" required>

                <label for="login-password">Mot de passe:</label>
                <input type="password" id="login-password" name="password" required>

                <button type="submit">Se connecter</button>
            </form>
        </div>

        <div class="card">
            <h2>Inscription</h2>
            <form action="php/AuthLogic/register.php" method="POST">
                <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrf_token); ?>">
                <label for="register-name">Nom:</label>
                <input type="text" id="register-name" name="name" required>

                <label for="register-email">Email:</label>
                <input type="email" id="register-email" name="email" required>

                <label for="grade">Grade:</label>
                <select id="grade" name="grade" required>
                    <option value="basic">Basic</option>
                    <option value="premium">Premium</option>
                    <option value="admin">Admin</option>
                </select>

                <label for="register-password">Mot de passe:</label>
                <input type="password" id="register-password" name="password" required>

                <label for="register-confirm-password">Confirmer le mot de passe:</label>
                <input type="password" id="register-confirm-password" name="confirm_password" required>

                <button type="submit">S'inscrire</button>
            </form>
        </div>
    </div>
</body>
</html>
