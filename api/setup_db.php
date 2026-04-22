<?php
// Script de configuration de la base de données
$db_host = getenv('DB_HOST');
$db_user = getenv('DB_USER');
$db_pass = getenv('DB_PASS');
$db_name = getenv('DB_NAME');
$db_port = getenv('DB_PORT') ?: 3306;

if (!$db_host) {
    die("Erreur: Les variables d'environnement ne sont pas encore configurées dans Vercel.");
}

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name, $db_port);

if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Table des utilisateurs
$sql_users = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

// Table des matchs
$sql_matches = "CREATE TABLE IF NOT EXISTS matches (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ville VARCHAR(255) NOT NULL,
    date_match DATE NOT NULL,
    heure_match TIME NOT NULL,
    lieu VARCHAR(255) NOT NULL,
    joueurs INT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

$success = true;
if (!$conn->query($sql_users)) {
    echo "Erreur lors de la création de la table users : " . $conn->error . "<br>";
    $success = false;
}

if (!$conn->query($sql_matches)) {
    echo "Erreur lors de la création de la table matches : " . $conn->error . "<br>";
    $success = false;
}

if ($success) {
    echo "<h2 style='color: green;'>✅ Base de données configurée avec succès !</h2>";
    echo "<p>Toutes les tables nécessaires ont été créées. Vous pouvez maintenant utiliser le site.</p>";
    echo "<a href='index.php'>Retour à l'accueil</a>";
}

$conn->close();
?>
