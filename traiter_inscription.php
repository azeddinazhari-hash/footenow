<?php
$nom = $_POST['nom'];
$email = $_POST['email'];
$password = $_POST['password'];

$conn = new mysqli("localhost", "root", "", "koranow_db");
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
