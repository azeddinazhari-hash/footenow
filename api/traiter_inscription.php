<?php
$nom = $_POST['nom'];
$email = $_POST['email'];
$password = $_POST['password'];

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "koranow_db";
$db_port = 3306;

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name, $db_port);
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
