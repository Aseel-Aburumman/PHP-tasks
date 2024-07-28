<?php
require 'dbcon.php';
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Method: GET');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Request-With');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = isset($_GET['id']) ? intval($_GET['id']) : "";
    $sql = "SELECT subject_student.student_id,
                    students.name ,
                    subject_student.subject_id ,
                    subjects.name , 
                    exams.date 
            from 
                subject_student
            INNER JOIN students ON subject_student.student_id = students.id
            INNER JOIN subjects ON subjects.subject_id = subject_student.subject_id
            INNER JOIN exams ON subject_student.subject_id = exams.subject_id
            where subject_student.student_id ='$id'";
    $stmt = $conn->query($sql);
    $result = $stmt->fetch_assoc();
    echo json_encode($result, true);
} else {
    $data = [
        'error' => 'Method Not Allowed',
        'status' => false
    ];
    echo json_encode($data, true);
}
