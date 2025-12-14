<?php
// src/phpHTML/process/upload_pic.php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['uploadfile']['name'])) {
        
        $filename = $_FILES['uploadfile']['name'];
        // Lab says to put temp in "assets/temp" based on my recommendation
        // We need to adjust path relative to this PHP file
        $target_dir = "../../../assets/temp/"; 
        
        // Ensure directory exists
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        $target_file = $target_dir . basename($filename);
        
        // Move file [cite: 239]
        if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $target_file)) {
            // Return the path that will be stored in the DB (relative to root usually works best)
            // But for display we might need relative path. 
            // Let's store "assets/temp/filename.jpg"
            $display_path = "assets/temp/" . $filename;
            echo json_encode(['ok' => 1, 'temp_path' => $display_path]);
        } else {
            echo json_encode(['ok' => 0, 'error' => 'Failed to move file']);
        }
    } else {
        echo json_encode(['ok' => 0, 'error' => 'No file uploaded']);
    }
}
?>
