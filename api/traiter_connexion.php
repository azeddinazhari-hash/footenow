<?php
session_start();

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// Connexion DB
$db_host = getenv('DB_HOST') ?: "localhost";
$db_user = getenv('DB_USER') ?: "root";
$db_pass = getenv('DB_PASS') ?: "";
$db_name = getenv('DB_NAME') ?: "koranow_db";

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($conn->connect_error) {
    die("Erreur connexion DB: " . $conn->connect_error);
}

// Chercher utilisateur par email
$stmt = $conn->prepare("SELECT id, nom, email, password FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    // Vérifier mot de passe (hash)
    if (password_verify($password, $user['password'])) {
        // Login OK -> session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_nom'] = $user['nom'];

        // Redirect vers accueil
        header("Location: index.php");
        exit;
    }
}

$stmt->close();
$conn->close();

// Login échoué
header("Location: connexion.php?error=1");
exit;
