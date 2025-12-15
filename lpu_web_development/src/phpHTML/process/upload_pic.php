<?php

// errors will still be logged to the PHP error log
error_reporting(0); 
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['uploadfile']['name'])) {
        
        $filename = $_FILES['uploadfile']['name'];
        
        $target_dir = "../../../assets/temp/"; 
        
        // create directory if not exist
        if (!is_dir($target_dir)) {
            if (!mkdir($target_dir, 0777, true)) {
                echo json_encode(['ok' => 0, 'error' => 'Failed to create assets/temp folder. Check permissions.']);
                exit;
            }
        }

        $target_file = $target_dir . basename($filename);
        
        if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $target_file)) {
            // Path to store in DB (relative to root)
            $display_path = "assets/temp/" . $filename;
            echo json_encode(['ok' => 1, 'temp_path' => $display_path]);
        } 
        else {
            // Use error_get_last() to send the actual system error back safely
            $error = error_get_last();
            echo json_encode(['ok' => 0, 'error' => 'Move failed. ' . ($error['message'] ?? '')]);
        }
    } 
    else {
        echo json_encode(['ok' => 0, 'error' => 'No file uploaded']);
    }
}
?>
