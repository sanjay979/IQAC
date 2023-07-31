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

    $sql_shift1 = "SELECT department, LType, COUNT(*) AS staffCount FROM faculty1 WHERE principal=1 AND shift = 1 GROUP BY department, LType";
    $result_shift1 = mysqli_query($conn, $sql_shift1);

    $sql_shift2 = "SELECT department, LType, COUNT(*) AS staffCount FROM faculty1 WHERE principal=1 AND shift = 2 GROUP BY department, LType";
    $result_shift2 = mysqli_query($conn, $sql_shift2);

    ?>
    <div class="recent-grid">
        <div class="leaves">
            <div class="card">
                <div class="card-header">
                    <h3>Shift 1 - Departments wise leave</h3>
                </div>

                <div class="card-body">
                    <?php
                    echo "<table width='100%'>";
                    echo "<thead><tr><td>Department</td><td>OD</td><td>CL</td><td>ML</td><td>Total</td></tr></thead>";
                    echo "<tbody>";

                    $leaveCounts_shift1 = array();
                    while ($row = mysqli_fetch_assoc($result_shift1)) {
                        $department = $row['department'];
                        $leaveType = $row['LType'];
                        $staffCount = $row['staffCount'];

                        if (!isset($leaveCounts_shift1[$department])) {
                            $leaveCounts_shift1[$department] = array('OD' => 0, 'CL' => 0, 'ML' => 0);
                        }

                        $leaveCounts_shift1[$department][$leaveType] = $staffCount;
                    }

                    foreach ($leaveCounts_shift1 as $department => $counts) {
                        $odCount = isset($counts['OD']) ? $counts['OD'] : 0;
                        $clCount = isset($counts['CL']) ? $counts['CL'] : 0;
                        $mlCount = isset($counts['ML']) ? $counts['ML'] : 0;
                        $total = $odCount + $clCount + $mlCount;

                        // Add a link to the department page with department name as a parameter
                        echo "<tr><td><a href='department.php?dept=$department&shift=1'>$department</a></td><td>$odCount</td><td>$clCount</td><td>$mlCount</td><td>$total</td></tr>";
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
                    <h3>Today Leave - Shift 1</h3>
                </div>
                <div class="card-body">
                    <div class="staff">
                        <?php
                        // Get today's date
                        $today = date("Y-m-d");

                        // Query to retrieve faculties with today's date in their leave range for Shift 1
                        $todayLeaveQuery_shift1 = "SELECT department,
                            SUM(CASE WHEN LType = 'OD' AND '$today' BETWEEN start AND end THEN 1 ELSE 0 END) AS odCount,
                            SUM(CASE WHEN LType = 'CL' AND '$today' BETWEEN start AND end THEN 1 ELSE 0 END) AS clCount,
                            SUM(CASE WHEN LType = 'ML' AND '$today' BETWEEN start AND end THEN 1 ELSE 0 END) AS mlCount
                            FROM faculty1
                            WHERE principal = 1 AND shift = 1
                            GROUP BY department";
                        $todayLeaveResult_shift1 = mysqli_query($conn, $todayLeaveQuery_shift1);

                        echo "<table width='100%'>";
                        echo "<thead><tr><td>Department</td><td>OD</td><td>CL</td><td>ML</td><td>Total</td></tr></thead>";
                        echo "<tbody>";

                        while ($row = mysqli_fetch_assoc($todayLeaveResult_shift1)) {
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
    <div class="recent-grid">
        <div class="leaves">
            <div class="card">
                <div class="card-header">
                    <h3>Shift 2 - Departments wise leave</h3>
                </div>

                <div class="card-body">
                    <?php
                    echo "<table width='100%'>";
                    echo "<thead><tr><td>Department</td><td>OD</td><td>CL</td><td>ML</td><td>Total</td></tr></thead>";
                    echo "<tbody>";

                    $leaveCounts_shift2 = array();
                    while ($row = mysqli_fetch_assoc($result_shift2)) {
                        $department = $row['department'];
                        $leaveType = $row['LType'];
                        $staffCount = $row['staffCount'];

                        if (!isset($leaveCounts_shift2[$department])) {
                            $leaveCounts_shift2[$department] = array('OD' => 0, 'CL' => 0, 'ML' => 0);
                        }

                        $leaveCounts_shift2[$department][$leaveType] = $staffCount;
                    }

                    foreach ($leaveCounts_shift2 as $department => $counts) {
                        $odCount = isset($counts['OD']) ? $counts['OD'] : 0;
                        $clCount = isset($counts['CL']) ? $counts['CL'] : 0;
                        $mlCount = isset($counts['ML']) ? $counts['ML'] : 0;
                        $total = $odCount + $clCount + $mlCount;

                        // Add a link to the department page with department name as a parameter
                        echo "<tr><td><a href='department.php?dept=$department&shift=2'>$department</a></td><td>$odCount</td><td>$clCount</td><td>$mlCount</td><td>$total</td></tr>";
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
                    <h3>Today Leave - Shift 2</h3>
                </div>
                <div class="card-body">
                    <div class="staff">
                        <?php
                        // Query to retrieve faculties with today's date in their leave range for Shift 2
                        $todayLeaveQuery_shift2 = "SELECT department,
                            SUM(CASE WHEN LType = 'OD' AND '$today' BETWEEN start AND end THEN 1 ELSE 0 END) AS odCount,
                            SUM(CASE WHEN LType = 'CL' AND '$today' BETWEEN start AND end THEN 1 ELSE 0 END) AS clCount,
                            SUM(CASE WHEN LType = 'ML' AND '$today' BETWEEN start AND end THEN 1 ELSE 0 END) AS mlCount
                            FROM faculty1
                            WHERE principal = 1 AND shift = 2
                            GROUP BY department";
                        $todayLeaveResult_shift2 = mysqli_query($conn, $todayLeaveQuery_shift2);

                        echo "<table width='100%'>";
                        echo "<thead><tr><td>Department</td><td>OD</td><td>CL</td><td>ML</td><td>Total</td></tr></thead>";
                        echo "<tbody>";

                        while ($row = mysqli_fetch_assoc($todayLeaveResult_shift2)) {
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
