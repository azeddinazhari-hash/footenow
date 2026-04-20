<?php
$nom = $_POST['nom'];
$email = $_POST['email'];
$password = $_POST['password'];

$db_host = getenv('DB_HOST') ?: "localhost";
$db_user = getenv('DB_USER') ?: "root";
$db_pass = getenv('DB_PASS') ?: "";
$db_name = getenv('DB_NAME') ?: "koranow_db";

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($conn->connect_error) die("Erreur DB: " . $conn->connect_error);

// Hash password
$hash = password_hash($password, PASSWORD_DEFAULT);

// Insert
$stmt = $conn->prepare("INSERT INTO users (nom, email, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $nom, $email, $hash);

if ($stmt->execute()) {
    header("Location: connexion.php");
    exit;
} else {
    echo "Erreur: " . $stmt->error;
}

$stmt->close();
$conn->close();
