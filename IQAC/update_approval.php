<?php
$con = mysqli_connect("localhost", "root", "", "demo");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

if (isset($_POST['leave_id']) && isset($_POST['status'])) {
    $leaveID = $_POST['leave_id'];
    $status = $_POST['status'];

    // Update the aqict column in the faculty1 table
    $query = "UPDATE faculty1 SET aqict = $status WHERE application_id = $leaveID";

    // Execute the query
    mysqli_query($con, $query);

    // Return a response (optional)
    echo "success";
}
?>
