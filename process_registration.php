<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération et nettoyage des données pour éviter les failles XSS
    $username = htmlspecialchars(trim($_POST['username']));
    $email = htmlspecialchars(trim($_POST['email']));
    $tournament_id = (int)$_POST['tournament_id'];

    // SPRINT 4: Validation des données côté serveur
    $errors = [];
    if (empty($username)) $errors[] = "Le nom est obligatoire.";

    // Vérification du format de l'email
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Un email valide est obligatoire.";

    if (!empty($errors)) {
        header("Location: details.php?id=$tournament_id&error=" . urlencode($errors[0]));
        exit;
    } else {
        try {
            // SQLite
            $db = new PDO('sqlite:database.sqlite');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Vérification des places disponibles
            // Récupérer le nombre de places maximum
            $jsonData = file_get_contents('data/tournaments.json');
            $tournaments = json_decode($jsonData, true);
            $max_seats = 0;
            foreach ($tournaments as $t) {
                if ($t['id'] === $tournament_id) {
                    $max_seats = (int)$t['seats'];
                    break;
                }
            }

            // Compter le nombre d'inscriptions actuelles dans la base SQLite
            $stmtCount = $db->prepare("SELECT COUNT(*) FROM registrations WHERE tournament_id = :tid");
            $stmtCount->execute([':tid' => $tournament_id]);
            $current_inscriptions = (int)$stmtCount->fetchColumn();

            // S'il n'y a plus de place, on bloque l'inscription
            if ($current_inscriptions >= $max_seats) {
                header("Location: details.php?id=$tournament_id&error=" . urlencode("Désolé, ce tournoi est déjà complet !"));
                exit;
            }
            

            // Préparation de la requête SQL pour éviter les injections SQL
            $stmt = $db->prepare("INSERT INTO registrations (username, email, tournament_id) VALUES (:u, :e, :t)");

            // Exécution de l'insertion
            $save_success = $stmt->execute([
                ':u' => $username,
                ':e' => $email,
                ':t' => $tournament_id
            ]);

            // Si l'enregistrement réussit, redirection vers la page de succès
            if ($save_success) {
                header("Location: confirmation.php?user=$username&tid=$tournament_id");
                exit;
            } else {
                header("Location: details.php?id=$tournament_id&error=db_error");
                exit;
            }
        } catch (PDOException $e) {
            // En cas d'erreur de la base de données affichage du message d'erreur
            header("Location: details.php?id=$tournament_id&error=" . urlencode("Erreur DB : " . $e->getMessage()));
            exit;
        }
    }
}
?>