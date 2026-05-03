<?php
// Sprint 3
session_start();
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

    <?php include 'assets/php/components/header.php'; ?>

    <main>
        <section id="tournaments">
            <h2>Tournois à venir</h2>
            <div class="tournament-list">
                <?php foreach ($tournaments as $t): ?>
                    <!-- Sprint 3: Boucle PHP pour générer les cartes de tournois -->
                    <article class="tournament-card">
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

    <?php include 'assets/php/components/footer.php'; ?>
</body>
</html>