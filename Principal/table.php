
<?php
include '../database/Databasedemo.php';

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Step 3: Fetch the data from the database
$sql = "SELECT department, LType, sum(ndays) as count FROM faculty1 GROUP BY department, LType";
$result = mysqli_query($conn, $sql);

// Step 4: Process the data and display it
echo "<table width='100%'>";
echo "<thead><tr><td>Department</td><td>OD</td><td>CL</td><td>ML</td></tr>";

// Initialize counters
$medicalLeaveCount = 0;
$odCount = 0;
$clcount= 0;
$currentDepartment = "";

while ($row = mysqli_fetch_assoc($result)) {
    $department = $row['department'];
    $leaveType = $row['LType'];
    $count = $row['count'];

    // Calculate counts based on leave type
    if ($leaveType == 'Medical') {
        $medicalLeaveCount += $count;
    } elseif ($leaveType == 'OD') {
        $odCount += $count;
    }elseif ($leaveType == 'CL'){
        $clcount +=$count;
    }

    // Print department and counts if it has changed
    if ($department !== $currentDepartment) {
        echo "<tbody><tr><td>$currentDepartment</td><td>$odCount</td><td>$clcount</td><td>$medicalLeaveCount</td></tr></tbody>";
        $currentDepartment = $department;
        $medicalLeaveCount = 0;
        $odCount = 0;
    }
}

// Print the last department's counts
echo "<tr><td>$currentDepartment</td><td>$medicalLeaveCount</td><td>$odCount</td></tr>";

echo "</table>";

// Close the database connection
mysqli_close($conn);
?>
