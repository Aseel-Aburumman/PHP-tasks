<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if file was uploaded without errors
    if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
        $file_name = $_FILES['file']['name'];
        $file_type = $_FILES['file']['type'];
        $file_size = $_FILES['file']['size'];
        $file_tmp_name = $_FILES['file']['tmp_name'];

        // Define the allowed file types
        $allowed_types = array('jpg' => 'image/jpeg', 'png' => 'image/png', 'gif' => 'image/gif');
        echo $file_name;
        // Get the file extension
        $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);

        // Validate file type
        if (array_key_exists($file_ext, $allowed_types) && in_array($file_type, $allowed_types)) {
            // Validate file size - 5MB maximum
            if ($file_size < 5 * 1024 * 1024) {
                // Move the uploaded file to a designated directory
                $upload_dir = 'uploads/';
                $new_file_name = uniqid() . '.' . $file_ext;
                if (move_uploaded_file($file_tmp_name, $upload_dir . $new_file_name)) {
                    echo "File uploaded successfully: " . $new_file_name;
                } else {
                    echo "Error moving the uploaded file.";
                }
            } else {
                echo "Error: File size is too large.";
            }
        } else {
            echo "Error: Invalid file type.";
        }
    } else {
        echo "Error: " . $_FILES['file']['error'];
    }
}
