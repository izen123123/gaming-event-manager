<?php
session_start();
$username = htmlspecialchars($_GET['user'] ?? 'Joueur');
$tournament_id = htmlspecialchars($_GET['tid'] ?? '0');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription confirmée - GEM</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php include 'assets/php/components/header.php'; ?>
    <main class="success-container" style="text-align: center; padding: 100px 20px;">
        <div class="success-card" style="background: var(--secondary-bg); padding: 40px; border-radius: 20px; display: inline-block;">
            <h1>Inscription réussie !</h1>
            <p>Merci <strong><?php echo $username; ?></strong> !</p>
            <p>Ton inscription pour le tournoi n°<?php echo $tournament_id; ?> a été validée.</p>
            <br>
            <a href="index.php" class="btn">Retour à l'accueil</a>
        </div>
    </main>
    <?php include 'assets/php/components/footer.php'; ?>
</body>
</html>