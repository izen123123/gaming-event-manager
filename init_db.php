<?php
// Sprint 6: Initialisation de la BDD
// Ce script permet de créer la base de données SQLite et la table
try {
    // Connexion ou création du fichier de BDD SQLite
    $db = new PDO('sqlite:database.sqlite');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // On stocke username, email, id et date
    $query = "CREATE TABLE IF NOT EXISTS registrations (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        username TEXT NOT NULL,
        email TEXT,
        tournament_id INTEGER NOT NULL,
        registration_date DATETIME DEFAULT CURRENT_TIMESTAMP
    )";
    
    // Exécution de la requête de création
    $db->exec($query);
    echo "La base de données et la table ont été créées avec succès";
} catch (PDOException $e) {
    echo "Erruer: " . $e->getMessage();
}
?>