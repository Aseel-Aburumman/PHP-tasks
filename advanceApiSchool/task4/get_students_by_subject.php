<?php
header("Content-Type: application/json");
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Method:GET');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Request-With');
require '../inc/dbcon.php';

// Get the subjectId from the URL
if (isset($_GET['subjectId'])) {
    $subjectId = $_GET['subjectId'];

    // Prepare and execute the SQL query
    $sql = "SELECT 
                students.id AS student_id, 
                students.name AS student_name, 
                students.date_of_birth, 
                students.address, 
                students.email, 
                students.phone 
            FROM 
                students 
            WHERE 
                students.subject1 = ? OR 
                students.subject2 = ? OR 
                students.subject3 = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iii", $subjectId, $subjectId, $subjectId);
    $stmt->execute();
    $result = $stmt->get_result();

    $students = [];
    while ($row = $result->fetch_assoc()) {
        $students[] = $row;
    }

    if (count($students) > 0) {
        echo json_encode(['status' => 200, 'data' => $students]);
    } else {
        http_response_code(404);
        echo json_encode(['status' => 404, 'message' => 'No students found for this subject']);
    }
} else {
    http_response_code(400);
    echo json_encode(['status' => 400, 'message' => 'subjectId parameter is required']);
}

$conn->close();
