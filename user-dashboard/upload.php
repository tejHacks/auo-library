<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/';  // Make sure this path is correct
        $uploadFile = $uploadDir . basename($_FILES['file']['name']);
        
        if (!is_dir($uploadDir) || !is_writable($uploadDir)) {
            echo "Upload directory is not writable.";
            exit;
        }
        
        if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile)) {
            echo "File is valid, and was successfully uploaded.";
        } else {
            echo "Possible file upload attack!";
        }
    } else {
        echo "File upload error: " . $_FILES['file']['error'];
    }
}
?>
