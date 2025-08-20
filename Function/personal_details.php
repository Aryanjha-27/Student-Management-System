<?php
session_start();
require_once('../config/db.php');
$errors = [];
$result = "";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
    $contact = filter_input(INPUT_POST, 'contact', FILTER_SANITIZE_STRING);
    $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING);
    $dob = filter_input(INPUT_POST, 'DOB', FILTER_SANITIZE_STRING);
    

    if (empty($address)) {
        $errors[] = "Address is required.";
    }
$pattern = "/^[0-9]{10}$/";
    if (empty($contact)) {
        $errors[] = "Contact is required.";
    } elseif (!preg_match($pattern, $contact)) {
        $errors[] = "Invalid Contact Number.";
    } else {
        $result = mysqli_query($conn, "SELECT contact FROM personal WHERE contact='$contact'");
        if (mysqli_num_rows($result) > 0) {
            $errors[] = "Contact Number already exists.";
        }
    }

    if (empty($gender)) {
        $errors[] = "Gender is required.";
    } 
}
if (empty($dob)) {
    $errors[] = "Date of Birth is required.";
} else {
    $dobDate = DateTime::createFromFormat('Y-m-d', $dob);

    // Check valid format and real date
    if (!$dobDate || $dobDate->format('Y-m-d') !== $dob) {
        $errors[] = "Invalid Date of Birth format.";
    } else {
        $today = new DateTime();
        $age = $today->diff($dobDate)->y;

        if ($dobDate > $today) {
            $errors[] = "Date of Birth cannot be in the future.";
        } elseif ($age < 16) {
            $errors[] = "You must be at least 16 years old.";
        } elseif ($age > 120) {
            $errors[] = "Invalid age entered.";
        }
    }
}
if (empty($errors)) {
    $user_id = $_SESSION['user_id'];
    $query = "INSERT INTO personal (address, contact, gender,dob,user_id) VALUES ('$address', '$contact', '$gender', '$dob', '$user_id')";
    if (mysqli_query($conn, $query)) {
        header("location:../index.php?success=personal");
        // session_unset();
        exit();
    } else {
        $errors[] = "Failed to Register: " . mysqli_error($conn);
    }
}

$_SESSION['errors'] = $errors;
header("location:../index.php?page=personal");
exit();
