<?php
// check_next_form.php

// Assuming you have already established a database connection
include("..//database/Databasedemo.php");

// Query to fetch application IDs and their next_form values from the database
$query = "SELECT application_id, next_form FROM faculty1";
$result = $conn->query($query);

if ($result && $result->num_rows > 0) {
    $applicationIdsToRemove = [];

    while ($row = $result->fetch_assoc()) {
        $application_id = $row['application_id'];
        $next_form = $row['next_form'];

        // If the next_form is not 3, add the application_id to the list of IDs to remove
        if ($next_form !== '3') {
            $applicationIdsToRemove[] = $application_id;
        }
    }

    // Close the database connection
    $conn->close();

    // Return the list of application IDs to remove as JSON response
    $response = array(
        "success" => true,
        "applicationIdsToRemove" => $applicationIdsToRemove
    );
} else {
    // Handle database query error or no data found
    $response = array(
        "success" => false,
        "message" => "Error fetching next_form values or no data found."
    );
}

// Send the JSON response back to the JavaScript
header("Content-Type: application/json");
echo json_encode($response);
?>
