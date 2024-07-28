<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Method: POST');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Request-With');
require 'dbcon.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $data = json_decode(file_get_contents('php://input'), true);

    $studentId = isset($data['student_id']) ? $data['student_id'] : "";
    $subjectId = isset($data['subject_id']) ? $data['subject_id'] : "";

    if (empty($studentId) || empty($subjectId)) {
        echo json_encode(['error' => 'Student ID and Subject ID are required']);
        exit;
    }

    // Check if student and subject exist
    $checkStudent = $conn->prepare("SELECT * FROM students WHERE id = ?");
    $checkStudent->bind_param("i", $studentId);
    $checkStudent->execute();
    $resultStudent = $checkStudent->get_result();

    $checkSubject = $conn->prepare("SELECT * FROM subjects WHERE subject_id = ?");
    $checkSubject->bind_param("i", $subjectId);
    $checkSubject->execute();
    $resultSubject = $checkSubject->get_result();

    if ($resultStudent->num_rows === 0) {
        echo json_encode(['error' => 'Student ID does not exist']);
        exit;
    }

    if ($resultSubject->num_rows === 0) {
        echo json_encode(['error' => 'Subject ID does not exist']);
        exit;
    }

    $sql = "INSERT INTO subject_student (subject_id, student_id) VALUES(? ,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $subjectId, $studentId);

    if ($stmt->execute()) {
        echo json_encode(['subject_id' => $subjectId, 'student_id' => $studentId]);
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
