<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST, GET, PUT, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');

// Handle preflight (OPTIONS) request
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    http_response_code(204); // No Content
    exit;
}

require '../inc/dbcon.php';
require 'function.php';

if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    $data = json_decode(file_get_contents('php://input'), true);

    if (isset($data['id']) && isset($data['name']) && isset($data['date_of_birth']) && isset($data['address']) && isset($data['email']) && isset($data['phone']) && isset($data['password'])) {
        $id = $data['id'];
        $name = $data['name'];
        $date_of_birth = $data['date_of_birth'];
        $address = $data['address'];
        $email = $data['email'];
        $phone = $data['phone'];
        $password = $data['password'];

        $sql = "UPDATE students SET name=?, date_of_birth=?, address=?, email=?, phone=?, password=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssi", $name, $date_of_birth, $address, $email, $phone, $password, $id);

        if ($stmt->execute()) {
            echo json_encode(['status' => 200, 'message' => 'The updated data was sent']);
        } else {
            echo json_encode(['status' => 500, 'error' => 'Error: ' . $stmt->error]);
        }

        $stmt->close();
    } else {
        echo json_encode(['status' => 400, 'error' => 'Invalid input']);
    }
} else {
    header("HTTP/1.0 405 Method Not Allowed");
    echo json_encode(['status' => 405, 'message' => 'Method Not Allowed']);
}

$conn->close();
