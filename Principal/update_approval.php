<?php
include("..//database/Databasedemo.php");

if (isset($_POST['leave_id']) && isset($_POST['status'])) {
    $leaveID = $_POST['leave_id'];
    $status = $_POST['status'];
    $comments = isset($_POST['comments']) ? $_POST['comments'] : '';

    $comments = trim($comments);

    // Check if the comment is empty after trimming
    if (empty($comments)) {
        $comments = ''; // Set comment as empty string
    } else {
        // Sanitize the comments value to prevent SQL injection
        $comments = mysqli_real_escape_string($conn, $comments);
    }

    // Update the principal and IC_feedback columns in the faculty1 table
    $query = "UPDATE faculty1 SET principal = $status, Pn_Feedback = '$comments' WHERE application_id = $leaveID";  

    // Execute the query
    $result = mysqli_query($conn, $query);

    // Check if the query executed successfully
    if ($result) {
        // Return a success response
        echo "success";
    } else {
        // Return an error response
        echo "Error: " . mysqli_error($con);
    }
}
?>
