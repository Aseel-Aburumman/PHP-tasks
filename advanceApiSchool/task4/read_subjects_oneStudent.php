<?php
header("Content-Type: application/json");
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Method:GET');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Request-With');
require '../inc/dbcon.php';

// Get the studentId from the URL
if (isset($_GET['studentId'])) {
    $studentId = $_GET['studentId'];

    // Prepare and execute the SQL query
    $sql = "SELECT 
                students.name AS student_name, 
                subject1.name AS subject1_name, 
                subject2.name AS subject2_name, 
                subject3.name AS subject3_name 
            FROM 
                students 
            JOIN 
                subjects AS subject1 ON students.subject1 = subject1.subject_id 
            JOIN 
                subjects AS subject2 ON students.subject2 = subject2.subject_id 
            JOIN 
                subjects AS subject3 ON students.subject3 = subject3.subject_id 
            WHERE 
                students.id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $studentId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $response = [
            'status' => 200,
            'data' => [
                'student_name' => $row['student_name'],
                'subjects' => [
                    $row['subject1_name'],
                    $row['subject2_name'],
                    $row['subject3_name']
                ]
            ]
        ];
        echo json_encode($response);
    } else {
        http_response_code(404);
        echo json_encode(['status' => 404, 'message' => 'Student not found']);
    }
} else {
    http_response_code(400);
    echo json_encode(['status' => 400, 'message' => 'studentId parameter is required']);
}

$conn->close();
