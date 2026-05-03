<?php
// Sprint 6
// Cette page permet de visualiser toutes les inscriptions stockées dans la BDD SQLite
session_start();

// Verification d'authentification
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
    <style>
        table { width: 100%; border-collapse: collapse; margin-top: 20px; background: #222; color: #fff; }
        th, td { padding: 12px; border: 1px solid #444; text-align: left; }
        th { background-color: var(--primary-color); }
        tr:nth-child(even) { background-color: #2a2a2a; }
    </style>
</head>

<body>
    <?php include 'assets/php/components/header.php'; ?>

    <main class="container">
        <h1>Bienvenue, <?php echo htmlspecialchars($_SESSION['admin_user']); ?> !</h1>
        <p>Voici la liste des inscriptions aux tournois :</p>
        
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Pseudo du Capitaine</th>
                    <th>Email</th>
                    <th>ID du Tournoi</th>
                    <th>Date d'inscription</th>
                </tr>
            </thead>
            <tbody>
                <?php
                try {
                    // SQLite
                    $db = new PDO('sqlite:database.sqlite');
                    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    // Récupération des inscriptions triées par date
                    $query = "SELECT * FROM registrations ORDER BY registration_date DESC";
                    $result = $db->query($query);

                    $count = 0;
                    foreach ($result as $row) {
                        $count++;
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['username']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['tournament_id']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['registration_date']) . "</td>";
                        echo "</tr>";
                    }

                    // S'il n'y a pas de données dans la table
                    if ($count === 0) {
                        echo "<tr><td colspan='5' style='text-align:center;'>Aucune inscription pour le moment.</td></tr>";
                    }

                } catch (PDOException $e) {
                    echo "<tr><td colspan='5' style='color:red;'>Erreur : " . htmlspecialchars($e->getMessage()) . "</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <br>
        <!-- Bouton de déconnexion -->
        <a href="logout.php" class="btn" style="background-color: #e74c3c;">Déconnexion</a>
    </main>

    <?php include 'assets/php/components/footer.php'; ?>
</body>
</html>