<?php
$con = mysqli_connect("localhost", "root", "", "demo");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

if (isset($_POST['leave_id']) && isset($_POST['status'])) {
    $leaveID = $_POST['leave_id'];
    $status = $_POST['status'];
    $comments = isset($_POST['comments']) ? $_POST['comments'] : '';

    $comments = trim($comments);

    // Check if the comment is empty after trimming
    if (empty($comments)) {
        $comments = 'pass'; // Set comment as empty string
    } else {
        // Sanitize the comments value to prevent SQL injection
        $comments = mysqli_real_escape_string($con, $comments);
    }

    // Update the aqict and IC_feedback columns in the faculty1 table
    $query = "UPDATE leave_details SET iqac = $status, IC_Feedback = '$comments' WHERE application_id = $leaveID";  

    // In the above query comments are enclosed with single quotes bcoz it holds a string value whereas status has numeric value so no quotes

    // Execute the query
    $result = mysqli_query($con, $query);

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
