<?php
if (isset($_POST['submit'])) {
    $targetDir = "uploads/";
    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $imageFileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

    $allowedTypes = array('jpg', 'jpeg', 'png', 'gif');

    if (in_array($imageFileType, $allowedTypes)) {
        $mimeType = mime_content_type($_FILES["file"]["tmp_name"]);
        $allowedMimeTypes = array('image/jpeg', 'image/png', 'image/gif');

        if (in_array($mimeType, $allowedMimeTypes)) {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
                echo "Your file has been uploaded successfully.";
            } else {
                echo "Something is wrong!";
            }
        } else {
            echo "Invalid file type. Only images are allowed.";
        }
    } else {
        echo "Invalid file extension. Only images are allowed.";
    }
}
?>
