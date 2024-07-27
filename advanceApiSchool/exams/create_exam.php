<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');

// Handle preflight (OPTIONS) request
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    http_response_code(204); // No Content
    exit;
}

require '../inc/dbcon.php';
require 'function.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // This function reads the raw POST data from the request body and 
    // the POST data is JSON, so it converts it to an array
    $data = json_decode(file_get_contents('php://input'), true);

    if (isset($data['subject_id']) && isset($data['date']) && isset($data['max_score'])) {
        $subject_id = $data['subject_id'];
        $date  = $data['date'];
        $max_score = $data['max_score'];

        $sql = "INSERT INTO exams (subject_id, date, max_score) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isi", $subject_id, $date, $max_score);

        if ($stmt->execute()) {
            $exam_id = $conn->insert_id;  // Corrected variable name
            echo json_encode(['exam_id' => $exam_id, 'subject_id' => $subject_id, 'date' => $date, 'max_score' => $max_score]);
        } else {
            echo json_encode(['error' => 'Error: ' . $sql . ' ' . $conn->error]);
        }

        $stmt->close();
    } else {
        echo json_encode(['error' => 'Invalid input']);
    }
} else {
    $data = [
        'status' => 405,
        'message' => 'Method Not Allowed',
    ];
    header("HTTP/1.0 405 Method Not Allowed");
    echo json_encode($data);
}

$conn->close();
