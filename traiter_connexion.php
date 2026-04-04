<?php
session_start();

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// Connexion DB
$conn = new mysqli("localhost", "root", "", "koranow_db");
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
        header("Location: daccueil.php");
        exit;
    }
}

$stmt->close();
$conn->close();

// Login échoué
header("Location: connexion.php?error=1");
exit;
