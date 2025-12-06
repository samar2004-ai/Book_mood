<?php
include "config.php";

$name = $_POST["name"];
$email = $_POST["email"];
$password = password_hash($_POST["password"], PASSWORD_BCRYPT);

// NOUVELLES DONNÉES DE PRÉFÉRENCE
$age_range = $_POST["age_range"];
$fav_genre = $_POST["fav_genre"];
$reading_freq = $_POST["reading_freq"];
$user_status = $_POST["user_status"];


$sql = "INSERT INTO users (name, email, password, age_range, fav_genre, reading_freq, user_status) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Erreur de préparation: " . $conn->error);
}

$stmt->bind_param("sssssss", $name, $email, $password, $age_range, $fav_genre, $reading_freq, $user_status);

if ($stmt->execute()) {
    header("Location: ../index.php");
    exit();
} else {
    echo "Erreur lors de l'enregistrement: " . $stmt->error;
}

$stmt->close();
$conn->close();
