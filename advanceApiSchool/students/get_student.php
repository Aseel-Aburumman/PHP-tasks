<?php
require '../inc/dbcon.php';
require 'function.php';

header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
header('Access-Control-Allow-Method:GET');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Request-With');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (isset($_GET['id'])) {
        // The intval() function returns the integer value of a variable.
        $studentId = intval($_GET['id']);

        $stmt = $conn->prepare("SELECT * FROM students WHERE id = ?");
        $stmt->bind_param("i", $studentId);

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $student = $result->fetch_assoc();
                sendJSONResponse(200, $student);
            } else {
                sendJSONResponse(404, ['message' => 'student not found']);
            }
        } else {
            sendJSONResponse(500, ['message' => 'Database query failed']);
        }

        $stmt->close();
    } else {
        sendJSONResponse(400, ['message' => 'student ID is required']);
    }
} else {
    sendJSONResponse(405, ['message' => 'Method Not Allowed']);
}

$conn->close();
