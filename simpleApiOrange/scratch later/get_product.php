<?php
require '/inc/dbcon.php';
require '/customers/function.php';

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');

// Handle preflight (OPTIONS) request
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    http_response_code(204); // No Content
    exit;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $search_term = isset($data['search_term']) ? "%" . $data['search_term'] . "%" : "%";

    $sql = "SELECT * FROM phones WHERE name LIKE ? OR brand LIKE ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $search_term, $search_term);
    $stmt->execute();
    $result = $stmt->get_result();

    $products = [];
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }

    echo json_encode($products);
} else {
    echo json_encode(['message' => 'Method not allowed']);
}

$conn->close();
