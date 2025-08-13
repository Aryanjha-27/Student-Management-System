<?php
session_start();
require_once('../config/db.php');
$errors = [];
$result = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $c_password = filter_input(INPUT_POST, 'c_password', FILTER_SANITIZE_STRING);
    $agree = filter_input(INPUT_POST, 'agree', FILTER_SANITIZE_STRING);

    if (empty($name)) {
        $errors[] = "Full Name is required.";
    }

    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    } else {
        $result = mysqli_query($conn, "SELECT * FROM users WHERE Email='$email'");
        if (mysqli_num_rows($result) > 0) {
            $errors[] = "Email already exists.";
        }
    }

    if (empty($password)) {
        $errors[] = "Password is required.";
    } elseif (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters.";
    }

    if ($password !== $c_password) {
        $errors[] = "Passwords do not match.";
    }
    if (empty($agree)) {
        $errors[] = "You must agree to the terms.";
    }
}
if (empty($errors)) {
    $password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO users (Name, Email, Password) VALUES ('$name', '$email', '$password')";
    if (mysqli_query($conn, $query)) {
        header("location:../login.php?success=1");
        session_unset();
        exit();
    } else {
        $errors[] = "Failed to Register: " . mysqli_error($conn);
    }
}

$_SESSION['$errors'] = $errors;
header("location:../signup.php");
exit();
?>