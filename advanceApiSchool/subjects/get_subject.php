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
        $subjectId = intval($_GET['id']);

        $stmt = $conn->prepare("SELECT * FROM subjects WHERE subject_id  = ?");
        $stmt->bind_param("i", $subjectId);

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $subject = $result->fetch_assoc();
                sendJSONResponse(200, $subject);
            } else {
                sendJSONResponse(404, ['message' => 'subject not found']);
            }
        } else {
            sendJSONResponse(500, ['message' => 'Database query failed']);
        }

        $stmt->close();
    } else {
        sendJSONResponse(400, ['message' => 'subject ID is required']);
    }
} else {
    sendJSONResponse(405, ['message' => 'Method Not Allowed']);
}

$conn->close();
