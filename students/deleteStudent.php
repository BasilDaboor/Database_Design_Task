<?php
include '../config.php';
include '../functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the POST data
    $data = json_decode(file_get_contents('php://input'), true);
    $studentId = $data['id'];
    deleteStudent($pdo, $studentId);
    echo json_encode(['message' => 'Student deleted']);
}
