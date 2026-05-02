<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username      = htmlspecialchars(trim($_POST['username']));
    $email         = htmlspecialchars(trim($_POST['email']));
    $tournament_id = (int)$_POST['tournament_id'];

    $errors = [];

    if (empty($username)) {
        $errors[] = "Le nom est obligatoire.";
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Un email valide est obligatoire.";
    }

    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
        echo "<a href='details.php?id=$tournament_id'>Retour au formulaire</a>";
    } else {
?>
        <!DOCTYPE html>
        <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <title>Inscription confirmée - GEM</title>
            <link rel="stylesheet" href="assets/css/style.css">
            <style>
                .success-container { text-align: center; padding: 100px 20px; }
                .success-card { background: var(--secondary-bg); padding: 40px; border-radius: 20px; display: inline-block; }
            </style>
        </head>
        <body>
            <?php include 'assets/php/components/header.php'; ?>
            <main class="success-container">
                <div class="success-card">
                    <h1>✅ Inscription réussie !</h1>
                    <p>Merci <strong><?php echo $username; ?></strong> !</p>
                    <p>Ton inscription pour le tournoi n°<?php echo $tournament_id; ?> a été validée.</p>
                    <p>Un mail de confirmation sera envoyé à : <em><?php echo $email; ?></em></p>
                    <br>
                    <a href="index.php" class="btn">Retour à l'accueil</a>
                </div>
            </main>
            <?php include 'assets/php/components/footer.php'; ?>
        </body>
        </html>
<?php
    }
} else {
    header("Location: index.php");
    exit;
}
?>