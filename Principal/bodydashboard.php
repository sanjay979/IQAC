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

    $sql = "SELECT department, LType, SUM(ndays) AS leaveSum FROM faculty1 WHERE principal=1 GROUP BY department, LType";
    $result = mysqli_query($conn, $sql);

    ?>
    <div class="recent-grid">
        <div class="leaves">
            <div class="card">
                <div class="card-header">
                    <h3>Departments wise leave</h3>
                </div>
                <div class="card-body">
                    <?php
                    echo "<table width='100%'>";
                    echo "<thead><tr><td>Department</td><td>OD</td><td>CL</td><td>ML</td></tr></thead>";
                    echo "<tbody>";

                    $leaveCounts = array();
                    while ($row = mysqli_fetch_assoc($result)) {
                        $department = $row['department'];
                        $leaveType = $row['LType'];
                        $count = $row['leaveSum'];

                        if (!isset($leaveCounts[$department])) {
                            $leaveCounts[$department] = array('OD' => 0, 'CL' => 0, 'ML' => 0);
                        }

                        $leaveCounts[$department][$leaveType] += $count;
                    }

                    foreach ($leaveCounts as $department => $counts) {
                        $odCount = isset($counts['OD']) ? $counts['OD'] : 0;
                        $clCount = isset($counts['CL']) ? $counts['CL'] : 0;
                        $mlCount = isset($counts['ML']) ? $counts['ML'] : 0;

                        // Add a link to the department page with department name as a parameter
                        echo "<tr><td><a href='department.php?dept=$department'>$department</a></td><td>$odCount</td><td>$clCount</td><td>$mlCount</td></tr>";
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
                            GROUP BY department";
                        $todayLeaveResult = mysqli_query($conn, $todayLeaveQuery);

                        echo "<table width='100%'>";
                        echo "<thead><tr><td>Department</td><td>OD</td><td>CL</td><td>ML</td></tr></thead>";
                        echo "<tbody>";

                        while ($row = mysqli_fetch_assoc($todayLeaveResult)) {
                            $department = $row['department'];
                            $odCount = $row['odCount'];
                            $clCount = $row['clCount'];
                            $mlCount = $row['mlCount'];

                            echo "<tr><td>$department</td><td>$odCount</td><td>$clCount</td><td>$mlCount</td></tr>";
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
