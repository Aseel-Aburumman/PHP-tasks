<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');

// Handle preflight (OPTIONS) request
// الاسايمنت مو كلو قت او شسمو 
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

    if (isset($data['name']) && isset($data['description']) && isset($data['teacherId'])) {
        $name = $data['name'];
        $description  = $data['description'];
        $teacherId = $data['teacherId'];

        $sql = "INSERT INTO subjects (name, description, teacherId) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $name, $description, $teacherId);

        if ($stmt->execute()) {
            $subject_id = $conn->insert_id;  // Corrected variable name
            echo json_encode(['subject_id' => $subject_id, 'name' => $name, 'description' => $description, 'teacherId' => $teacherId]);
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
