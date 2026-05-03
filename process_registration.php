<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username      = htmlspecialchars(trim($_POST['username']));
    $email         = htmlspecialchars(trim($_POST['email']));
    $tournament_id = (int)$_POST['tournament_id'];

    $errors = [];
    if (empty($username)) $errors[] = "Le nom est obligatoire.";
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Un email valide est obligatoire.";

    if (!empty($errors)) {
        header("Location: details.php?id=$tournament_id&error=" . urlencode($errors[0]));
        exit;
    } else {
        $save_success = true;

        if ($save_success) {
            header("Location: confirmation.php?user=$username&tid=$tournament_id");
            exit;
        } else {
            header("Location: details.php?id=$tournament_id&error=db_error");
            exit;
        }
    }
}
?>