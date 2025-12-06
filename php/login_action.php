<?php
session_start();
include "config.php";

$email = $_POST["email"];
$password = $_POST["password"];

$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();

    if (password_verify($password, $row["password"])) {
        $_SESSION["user"] = $row["name"];
        header("Location: ../home.php");
        exit;
    }
}

echo "Login incorrect.";
