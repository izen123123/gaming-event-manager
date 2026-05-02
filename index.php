<?php
// Sprint 3
$jsonData = file_get_contents('data/tournaments.json');
$tournaments = json_decode($jsonData, true);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GEM - Gaming Event Manager</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/index.css">
</head>
<body>

    <!-- En-tête : Logo et bouton de changement de thème -->
    <header>
        <a href="index.php" class="logo">G<span>E</span>M</a>
        </div>

        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="login.php">Connexion</a></li>
            </ul>
        </nav>

        <div class="header-actions">
            <button id="theme-toggle" aria-label="Changer le thème">Dark Mode</button>
        </div>
    </header>

    <main>
        <section id="tournaments">
            <h2>Tournois à venir</h2>
            <div class="tournament-list">
                <?php foreach ($tournaments as $t): ?>
                    <article class="tournament-card">
                    <!-- Emplacement pour l'image fournie par le client -->
                        <div class="tournament-banner">
                            <img src="<?php echo $t['image']; ?>" alt="<?php echo $t['title']; ?>">
                        </div>
                
                        <div class="tournament-info">
                            <h3><?php echo $t['title']; ?></h3>
                            <p>Date : <?php echo $t['date']; ?></p>
                            <p>Places : <?php echo $t['seats']; ?></p>
                            <a href="details.php?id=<?php echo $t['id']; ?>" class="btn">Voir les détails</a>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2026 BDE Pôle E-Sport - Projet GEM</p>
    </footer>

    <script src="assets/js/main.js"></script>
</body>
</html>