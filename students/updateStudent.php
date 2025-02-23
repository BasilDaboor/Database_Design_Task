<?php
include '../config.php';
include '../functions.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the POST data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $date_of_birth = $_POST['date_of_birth'];
    $gender = $_POST['gender'];
    $major = $_POST['major'];
    $enrollment_year = $_POST['enrollment_year'];
    $student_id = $_POST['student_id'];
    echo $first_name . "<br>" . $last_name . "<br>" . $email . "<br>" . $date_of_birth . "<br>" . $gender . "<br>" . $major . "<br>" . $enrollment_year . "<br>" . $student_id;
    updateStudent($pdo, $first_name, $last_name, $email, $date_of_birth, $gender, $major, $enrollment_year, $student_id);
    header("Location: displayStu.php");
    exit();
}
