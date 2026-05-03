<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion Admin - GEM</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
    <?php include 'assets/php/components/header.php'; ?>

    <main class="container">
        <form action="process_login.php" method="POST" class="login-form">
            <h2>Zone Admin</h2>
            <?php if (isset($_GET['error'])): ?>
                <p style="color: #e74c3c; background: rgba(231, 76, 60, 0.1); padding: 10px; border-radius: 5px; text-align: center; margin-bottom: 20px;">
                Identifiant ou mot de passe incorrect.
                </p>
            <?php endif; ?>
            
            <div class="input-group">
                <label for="username">Identifiant</label>
                <input type="text" name="username" id="username" required>
            </div>
            <div class="input-group">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" required>
            </div>
            <button type="submit" class="btn">Se connecter</button>
        </form>
    </main>

    <?php include 'assets/php/components/footer.php'; ?>
</body>
</html>