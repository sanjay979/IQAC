<?php
// fetch_dates.php
echo '<script>alert("control to fetcg dates");</script>';
// Assuming you have already established a database connection
include("..//database/Databasedemo.php");

// Get the application ID from the AJAX request
if (isset($_POST['application_id'])) {
    $application_id = $_POST['application_id'];

    // Query to fetch start and end dates based on the selected application ID
    $query = "SELECT start, end FROM faculty1 WHERE application_id = '$application_id' LIMIT 1";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $start_date = $row['start_date'];
        $end_date = $row['end_date'];

        // Return the data as JSON response
        $response = array(
            "success" => true,
            "start_date" => $start_date,
            "end_date" => $end_date
        );
    } else {
        $response = array(
            "success" => false,
            "message" => "No data found for the selected application ID."
        );
    }

    // Close the database connection
    $conn->close();

    // Send the JSON response back to the JavaScript
    header("Content-Type: application/json");
    echo json_encode($response);
}
?>
