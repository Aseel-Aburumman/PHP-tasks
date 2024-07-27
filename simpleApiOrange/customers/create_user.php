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

    if (isset($data['name']) && isset($data['email']) && isset($data['phone']) && isset($data['password'])) {
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $password = $data['password'];

        $sql = "INSERT INTO customers (name, email, phone, password) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssis", $name, $email, $phone, $password);

        if ($stmt->execute()) {
            $id = $conn->insert_id;
            echo json_encode(['id' => $id, 'name' => $name, 'email' => $email, 'phone' => $phone]);
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
