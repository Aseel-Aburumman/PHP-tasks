<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');

// Handle preflight (OPTIONS) request
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    http_response_code(204); // No Content
    exit;
}

require '../inc/dbcon.php';
require '../customers/function.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    if (isset($data['email']) && isset($data['password'])) {
        $email = $data['email'];
        $password = $data['password'];

        $sql = "SELECT id, password FROM customers WHERE email = ?";
        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            echo json_encode(['message' => 'Statement prepare failed: ' . htmlspecialchars($conn->error)]);
            exit;
        }
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $stored_password);
            $stmt->fetch();

            if ($password === $stored_password) {
                echo json_encode(['message' => 'Login successful', 'id' => $id]);
            } else {
                echo json_encode(['message' => 'Invalid password']);
            }
        } else {
            echo json_encode(['message' => 'User not found']);
        }

        $stmt->close();
    } else {
        echo json_encode(['message' => 'Invalid input']);
    }
} else {
    echo json_encode(['message' => 'Method not allowed']);
}

$conn->close();
