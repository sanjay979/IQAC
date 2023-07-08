<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Department Leaves</title>
    <link rel="stylesheet" type="text/css" href="bodyDashboard.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        h2 {
            margin-top: 20px;
            margin-bottom: 20px;
            text-align: center;
            color:cornflowerblue;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            margin: 10px auto;
            background-color: #fff;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        thead {
            background-color: #333;
            color: #fff;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        @media screen and (max-width: 600px) {
            table {
                font-size: 14px;
            }
        }

        @media screen and (max-width: 400px) {
            table {
                font-size: 12px;
            }

            h2 {
                font-size: 18px;
            }
        }
    </style>
</head>

<body>
    <?php
    include '../database/Databasedemo.php';

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Retrieve the department from the URL parameter
    $department = $_GET['dept'];

    // Query to retrieve the staff who have taken leaves in the selected department
    $staffLeaveQuery = "SELECT * FROM faculty1 WHERE department = '$department' AND principal = 1";
    $staffLeaveResult = mysqli_query($conn, $staffLeaveQuery);

    echo "<h2>Leaves in $department Department</h2>";

    if (mysqli_num_rows($staffLeaveResult) > 0) {
        echo "<table>";
        echo "<thead><tr><th>Name</th><th>Staff ID</th><th>Leave Type</th><th>Start Date</th><th>End Date</th></tr></thead>";
        echo "<tbody>";

        while ($row = mysqli_fetch_assoc($staffLeaveResult)) {
            $name = $row['name'];
            $id = $row['id'];
            $leaveType = $row['LType'];
            $startDate = $row['start'];
            $endDate = $row['end'];

            echo "<tr><td>$name</td><td>$id</td><td>$leaveType</td><td>$startDate</td><td>$endDate</td></tr>";
        }

        echo "</tbody>";
        echo "</table>";
    } else {
        echo "<p>No leaves found in $department Department.</p>";
    }

    mysqli_close($conn);
    ?>
</body>

</html>
