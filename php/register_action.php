<?php
include "config.php";

$name = $_POST["name"];
$email = $_POST["email"];
$password = password_hash($_POST["password"], PASSWORD_BCRYPT);

$sql = "INSERT INTO users (name,email,password) VALUES ('$name','$email','$password')";

if ($conn->query($sql)) {
    header("Location: ../index.php");
} else {
    echo "Erreur: " . $conn->error;
}
