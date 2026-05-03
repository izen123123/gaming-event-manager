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