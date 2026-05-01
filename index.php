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
                <article class="tournament-card">
                <!-- Emplacement pour l'image fournie par le client -->
                    <div class="tournament-banner">
                        <img src="assets/img/cs2.webp" alt="Counter Strike 2">
                    </div>
                
                    <div class="tournament-info">
                        <h3>Counter Strike 2</h3>
                        <p>Date : 2026-05-15</p>
                        <p>Places : 10/16</p>
                        <a href="details.php?id=1" class="btn">Voir les détails</a>
                    </div>
                </article>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2026 BDE Pôle E-Sport - Projet GEM</p>
    </footer>

    <script src="assets/js/main.js"></script>
</body>
</html>