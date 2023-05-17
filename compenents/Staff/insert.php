<?php
// Database connection credentials
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'demo';

// Connect to the database
$conn = mysqli_connect($host, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Assuming you have a MySQL database connection, you can establish the connection using the following code:
// Replace 'hostname', 'username', 'password', and 'database' with your actual database credentials

//echo'playing length='.count($_POST).'<br>    ';

// Check if form data was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data

    /*
    foreach ($_POST as $key => $value) {
        echo "Key: " . $key . ", Value: " . $value . "<br>";
    }
    */

    $name = $_POST['name'];
    $id = $_POST['id'];
    $department = $_POST['department'];
    $leaveType = $_POST['Ltype'];
    $startDate = $_POST['start'];
    $endDate = $_POST['end'];
    $numDays = $_POST['days'];
    $reason = $_POST['reason'];
    $hod = 3;
    $aqict = 3;
    $principal = 3;

    // Prepare the SQL statement to insert the data into the table
    //$sql = "INSERT INTO faculty (Name, id, LType, start, end, days, reason) VALUES ('$name', '$id', '$leaveType', '$startDate', '$endDate', '$numDays', '$reason')";

    $sql = "INSERT INTO faculty (Name, id,LType,start,end,days,reason) VALUES (?, ?, ?,?,?,?,?)";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        // Error occurred while preparing the statement
        die("Error preparing statement: " . $conn->error);
    }

    // Bind the parameters and execute the statement
    $stmt->bind_param("sssssss", $name, $id, $leaveType, $startDate, $endDate, $numDays,$reason);
    $stmt->execute();


    // Check if the insertion was successful
    if ($stmt->affected_rows > 0) {
        echo "Data inserted successfully.";
    } else {
        echo "Error inserting data: " . $stmt->error;
    }
    // Close the statement
    $stmt->close();
}
//}
echo 'playing 4';
// Close the database connection
$conn->close();
?>
