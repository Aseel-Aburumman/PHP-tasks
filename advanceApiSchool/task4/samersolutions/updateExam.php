<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Method: PUT');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Request-With');
require 'dbcon.php';

if ($_SERVER['REQUEST_METHOD'] == "PUT") {
    $input = file_get_contents('php://input');
    $result = json_decode($input, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        echo json_encode(['error' => 'Invalid JSON: ' . json_last_error_msg()]);
        exit;
    }

    $id = isset($result['exam_id']) ? $result['exam_id'] : "";
    $subjectId = isset($result['subject_id']) ? $result['subject_id'] : "";
    $examDate = isset($result['date']) ? $result['date'] : "";
    $maxScore = isset($result['maxScore']) ? $result['maxScore'] : "";

    if (empty($id) || empty($subjectId) || empty($examDate) || empty($maxScore)) {
        echo json_encode(['error' => 'All fields are required']);
        exit;
    }

    $sql = "UPDATE exams SET subject_id = ?, date = ?, max_score = ? WHERE exam_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isii", $subjectId, $examDate, $maxScore, $id);

    if ($stmt->execute()) {
        echo json_encode(['subject_id' => $subjectId, 'date' => $examDate, 'maxScore' => $maxScore, 'exam_id' => $id]);
    } else {
        echo json_encode(['error' => 'Error: ' . $stmt->error]);
    }

    $stmt->close();
} else {
    $data = [
        'error' => 'Method Not Allowed',
        'status' => false
    ];
    echo json_encode($data, true);
}
