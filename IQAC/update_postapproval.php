<?php
include "../database/Databasedemo.php";


if (isset($_POST['leav_id']) && isset($_POST['status'])) {
    $leaveID = $_POST['leav_id'];
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

    // Update the aqict and IC_feedback columns in the faculty1 table
    $query = "UPDATE leave_details SET iqac = $status, IC_Feedback = '$comments' WHERE application_id = $leaveID";  

    // In the above query comments are enclosed with single quotes bcoz it holds a string value whereas status has numeric value so no quotes

    // Execute the query
    $result = mysqli_query($conn, $query);

    // Check if the query executed successfully
    if ($result) {
        // Return a success response
        echo "success";
    } else {
        // Return an error response
        echo "Error: " . mysqli_error($conn);
    }
}
?>
