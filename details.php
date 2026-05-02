<?php
    $jsonPath    = 'data/tournaments.json';
    $tournaments = [];
    $tournament  = null;

    if (file_exists($jsonPath)) {
    $jsonData    = file_get_contents($jsonPath);
    $tournaments = json_decode($jsonData, true);
    }

    $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

    if (! empty($tournaments)) {
    foreach ($tournaments as $t) {
        if ($t['id'] === $id) {
            $tournament = $t;
            break;
        }
    }
    }

    if (! $tournament) {
    header("Location: index.php");
    exit;
    }
?>

<!DOCTYPE html>
<html lang="fr" data-theme="light">
<head>
    <meta charset="UTF-8">
    <title>GEM - <?php echo $tournament['title']; ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/details.css">
</head>
<body>
    <?php include 'assets/php/components/header.php'; ?>

    <main class="container detail-container">
        <a href="index.php" class="back-link">← Retour aux tournois</a>

        <section class="detail-content">
            <div class="detail-banner">
                <img src="<?php echo $tournament['image']; ?>" alt="<?php echo $tournament['title']; ?>">
            </div>

            <div class="detail-info">
                <h1><?php echo $tournament['title']; ?></h1>

                <div class="info-grid">
                    <div class="info-item">
                        <strong>Date du tournoi</strong>
                        <p><?php echo $tournament['date']; ?></p>
                    </div>
                    <div class="info-item">
                        <strong>Places disponibles</strong>
                        <p><?php echo $tournament['seats']; ?></p>
                    </div>
                </div>

                <div class="description">
                    <h2>À propos du tournoi</h2>
                    <p>Rejoignez-nous pour une compétition épique sur <strong><?php echo $tournament['title']; ?></strong>.
                    Montrez vos talents et gagnez de nombreux lots !</p>
                </div>



                <button type="button" id="toggle-form-btn" class="btn btn-register">S'inscrire au tournoi</button>

                <div id="registration-area" class="registration-area" style="display: none; margin-top: 20px;">
                    <h3>Formulaire d'Inscription</h3>
                    <form id="enroll-form" action="process_registration.php" method="POST" novalidate>
                        <input type="hidden" name="tournament_id" value="<?php echo $tournament['id']; ?>">

                        <div class="input-group">
                            <label for="username">Nom complet</label>
                            <input type="text" id="username" name="username" placeholder="Votre nom" required>
                            <span class="error-msg" id="name-error"></span>
                        </div>

                        <div class="input-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" placeholder="votre@email.com" required>
                            <span class="error-msg" id="email-error"></span>
                        </div>

                        <button type="submit" class="btn btn-register" style="width: 100%;">Confirmer l'inscription</button>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <?php include 'assets/php/components/footer.php'; ?>
</body>
</html>