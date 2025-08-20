<?php
session_start();
require_once('../config/db.php');
$errors = [];
$result = "";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $level = filter_input(INPUT_POST, 'level', FILTER_SANITIZE_STRING);
    $institution = filter_input(INPUT_POST, 'institution', FILTER_SANITIZE_STRING);
    $faculty = filter_input(INPUT_POST, 'faculty', FILTER_SANITIZE_STRING);
    $board = filter_input(INPUT_POST, 'board', FILTER_SANITIZE_STRING);
    $gpa = filter_input(INPUT_POST, 'gpa', FILTER_SANITIZE_STRING);
    $completion = filter_input(INPUT_POST, 'completion', FILTER_SANITIZE_STRING);


    $validOptions = ["see", "+2", "bachelor"];

    if (empty($level)) {
        $errors[] = "Educational level is required.";
    } elseif (!in_array($level, $validOptions)) {
        $errors[] = "Invalid educational level selected.";
    }
    if (empty($institution)) {
        $errors[] = "Institution Name is required.";
    }

    $validOptions = ["management", "science", "bca", "bba", "bit"];

    if (empty($faculty)) {
        $errors[] = "Faculty is required.";
    } elseif (!in_array($faculty, $validOptions)) {
        $errors[] = "Invalid faculty selected.";
    }
    $validOptions = ["neb", "tu", "pu", "ku", "fboard"];

    if (empty($board)) {
        $errors[] = "Board is required.";
    } elseif (!in_array($board, $validOptions)) {
        $errors[] = "Invalid board selected.";
    }
    $grade = filter_input(INPUT_POST, 'grade', FILTER_VALIDATE_FLOAT);

    if ($grade === false) {
        $errors[] = "Grade must be a valid number.";
    } elseif ($grade < 0 || $grade > 4) {
        $errors[] = "Grade must be between 0.00 and 4.00.";
    } elseif (round($grade, 2) != $grade) {
        $errors[] = "Grade can only have up to 2 decimal places.";
    }

    if (
        !preg_match('/^\d{4}-\d{2}$/', $completion) ||
        ($d = DateTime::createFromFormat('Y-m', $completion)) > new DateTime() ||
        $d < (new DateTime())->modify('-25 years')
    ) {
        $errors[] = "Completion date invalid or out of range.";
    }
}

if (empty($errors)) {
    $user_id = $_SESSION['user_id'];
    $query = "INSERT INTO academic (level, institution, board,faculty,grade,completion,user_id) VALUES ('$level', '$institution', '$board', '$faculty','$gpa','$completion', '$user_id')";
    if (mysqli_query($conn, $query)) {
        header("location:../index.php?success=academic");
        // session_unset();
        exit();
    } else {
        $errors[] = "Failed to Register: " . mysqli_error($conn);
    }
}

$_SESSION['errors'] = $errors;
header("location:../index.php?page=academic");
exit();
