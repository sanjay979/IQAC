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
    
    $sql = "SELECT department, LType, sum(ndays) as sum FROM faculty1 where principal=1 GROUP BY department, LType ";
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
    $count = $row['sum'];

    if (!isset($leaveCounts[$department])) {
        $leaveCounts[$department] = array('OD' => 0, 'CL' => 0, 'ML' => 0);
    }

    $leaveCounts[$department][$leaveType] += $count;
}

foreach ($leaveCounts as $department => $counts) {
    $odCount = $counts['OD'];
    $clCount = $counts['CL'];
    $mlCount = $counts['ML'];

    echo "<tr><td>$department</td><td>$odCount</td><td>$clCount</td><td>$mlCount</td></tr>";
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
                    <table width="100%">
                        <thead>
                            <tr>
                                <td>Department</td>
                                <td>OD</td>
                                <td>CL</td>
                                <td>ML</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Computer science</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>Botony</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>Maths</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
        </div>
        </div>
    </div>
</body>
</html>