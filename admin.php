<?php
session_start();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin - GEM</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php include 'assets/php/components/header.php'; ?>

    <main class="container">
        <h1>Bienvenue, <?php echo $_SESSION['admin_user']; ?> !</h1>
        <p>C'est ici que tu géreras les inscriptions prochainement (Sprint 6).</p>
        
        <a href="logout.php" class="btn" style="background-color: #e74c3c;">Déconnexion</a>
    </main>

    <?php include 'assets/php/components/footer.php'; ?>
</body>
</html>