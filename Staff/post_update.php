<?php
session_start();
// Connect to the database
include '../database/Databasedemo.php';
// ... Other necessary includes and connection ...

if (isset($_POST['submit'])) {
    $application_id = $_POST['dataToSend'];
    $name = $_POST['name'];
    $id = $_POST['id'];
    $shift = $_POST['shift'];
    $department = $_POST['department'];
    $nextForm = 1;

    // File upload handling
    $uploadDirectory = '../assets/';
    $uploadedFile = $_FILES['file']['name'];
    $filePath = $uploadDirectory . $uploadedFile;

    if (move_uploaded_file($_FILES['file']['tmp_name'], $filePath)) {
        // File upload successful, now update the database
        $sql = "INSERT INTO leave_details (application_id, name, id, shift, department, file)
                VALUES ('$application_id', '$name', '$id', '$shift', '$department', '$filePath')";

        $upQuery = "UPDATE faculty1 SET next_form=$nextForm WHERE application_id = $application_id";

        if ($conn->query($sql) === TRUE && $conn->query($upQuery) === TRUE) {
            $successMessage = "Certificate uploaded successfully .";

            echo '<div class="success-message" style="color: green; background-color: #e9f5e9; 
            padding: 10px; border: 1px solid #43a047; font-size: 18px;">' . $successMessage . ' Redirecting...</div>';
            echo '<script>
            setTimeout(function() {
                window.location.href = "index.php";
            }, 1500); // Redirect after 1.5 seconds
          </script>';
        } else {
            $errorMessage = "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        $errorMessage = "Error uploading file.";
    }
    $conn->close();
}
?>
