<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="bodyDashboard.css">
</head>

<body>
    <?php
    include '../database/Databasedemo.php';

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Fetch current user's department and shift
    $id = $_SESSION['s_id'];
    $notify = "SELECT department, shift FROM faculty_details WHERE s_id='$id'";
    $result2 = mysqli_query($conn, $notify);
    
    $dept = "";
    $shift = "";

    if ($result2->num_rows > 0) {
        $row = $result2->fetch_assoc();
        $dept = $row['department'];
        $shift = $row['shift'];
    }

    // Query to get department wise leave data
    $sql = "SELECT LType, COUNT(*) AS staffCount FROM faculty1 WHERE principal=1 AND shift='$shift' AND department='$dept' GROUP BY LType";
    $result = mysqli_query($conn, $sql);

    ?>
    <div class="recent-grid">
        <div class="leaves">
            <div class="card">
                <div class="card-header">
                    <h3>Staff Leave Details</h3>
                </div>
                <div class="card-body">
                    <?php
                    echo "<table width='100%'>";
                    echo "<thead><tr><td>Department</td><td>OD</td><td>CL</td><td>ML</td><td>Total</td></tr></thead>";
                    echo "<tbody>";

                    $leaveCounts = array();
                    while ($row = mysqli_fetch_assoc($result)) {
                        $leaveType = $row['LType'];
                        $staffCount = $row['staffCount'];

                        if (!isset($leaveCounts[$dept])) {
                            $leaveCounts[$dept] = array('OD' => 0, 'CL' => 0, 'ML' => 0);
                        }

                        $leaveCounts[$dept][$leaveType] = $staffCount;
                    }

                    foreach ($leaveCounts as $department => $counts) {
                        $odCount = isset($counts['OD']) ? $counts['OD'] : 0;
                        $clCount = isset($counts['CL']) ? $counts['CL'] : 0;
                        $mlCount = isset($counts['ML']) ? $counts['ML'] : 0;
                        $total = $odCount + $clCount + $mlCount;

                        // Display the current department name
                        echo "<tr><td><a href='department.php?dept=$department'>$department</a></td><td>$odCount</td><td>$clCount</td><td>$mlCount</td><td>$total</td></tr>";
                    }

                    echo "</tbody>";
                    echo "</table>";
                    ?>

                </div>
            </div>
        </div>
        <div class="staffs">
            <div class="card">
                <div class="card-header">
                    <h3>Today Leave</h3>
                </div>
                <div class="card-body">
                    <div class="staff">
                        <?php
                        // Get today's date
                        $today = date("Y-m-d");

                        // Query to retrieve faculties with today's date in their leave range
                        
                $todayLeaveQuery = "SELECT department,
                    SUM(CASE WHEN LType = 'OD' AND '$today' BETWEEN start AND end THEN 1 ELSE 0 END) AS odCount,
                    SUM(CASE WHEN LType = 'CL' AND '$today' BETWEEN start AND end THEN 1 ELSE 0 END) AS clCount,
                    SUM(CASE WHEN LType = 'ML' AND '$today' BETWEEN start AND end THEN 1 ELSE 0 END) AS mlCount
                    FROM faculty1
                    WHERE principal = 1
                    and shift = '$shift'
                    and department = '$dept'
                    GROUP BY department";
                        $todayLeaveResult = mysqli_query($conn, $todayLeaveQuery);

                        echo "<table width='100%'>";
                        echo "<thead><tr><td>Department</td><td>OD</td><td>CL</td><td>ML</td><td>Total</td></tr></thead>";
                        echo "<tbody>";

                        while ($row = mysqli_fetch_assoc($todayLeaveResult)) {
                            $department = $row['department'];
                            $odCount = $row['odCount'];
                            $clCount = $row['clCount'];
                            $mlCount = $row['mlCount'];
                            $total = $odCount + $clCount + $mlCount;

                            echo "<tr><td>$department</td><td>$odCount</td><td>$clCount</td><td>$mlCount</td><td>$total</td></tr>";
                        }

                        echo "</tbody>";
                        echo "</table>";
                        ?>

                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>
