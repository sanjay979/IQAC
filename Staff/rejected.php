<?php

session_start();
if ($_SESSION['s_id'] && $_SESSION['position'] == 'Staff') {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="rejected.css">
        <title>Rejected applications</title>
    </head>

    <body>
        <?php include "Sidebar.php"; ?>
        <div class="main-content">
            <?php include "header.php"; ?>
            <main>
                <?php include("..//database/Databasedemo.php");
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $id = $_SESSION['s_id'];


                $sql = "SELECT * FROM faculty1 WHERE (principal=0 or hod=0 or aqict=0) and id='$id'";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {

                    $itemID = $row['application_id'];
                    $name = $row['name'];
                    $sID = $row['id'];

                    $dep = $row['department'];
                    $hod = $row['hod'];
                    $iqac = $row['aqict'];
                    $principal = $row['principal'];
                    $lType = $row['LType'];
                    $start = $row['start'];
                    $end = $row['end'];
                    $ndays = $row['ndays'];
                    $reason = $row['reason'];
                    echo '<div class="card">';
                    echo '<div class="head">';
                    echo '<h2 class="value">' . $lType . '</h2>';
                    echo '</div>';
                    echo '<div class="content" >';
                    echo '<div class="card-content">';
                    echo '<span class="label">Staff ID : </span>';
                    echo '<span class="value">' . $sID . '</span><br>';

                    echo '<span class="label">Name : </span>';
                    echo '<span class="value">' . $name . '</span><br>';

                    //adding department
                    echo '<span class="label">Department : </span>';
                    echo '<span class="value">' . $dep . '</span><br>';
                    echo '</div>';
                    echo '<div class="card-content">';
                    echo '<span class="label">Leave Type : </span>';
                    echo '<span class="value">' . $lType . '</span><br>';
                    echo '<span class="label">Start Date : </span>';
                    echo '<span class="value">' . $start . '</span><br>';
                    echo '<span class="label">End Date : </span>';
                    echo '<span class="value">' . $end . '</span><br>';
                    echo '<span class="label">Number of Days:</span>';
                    echo '<span class="value">' . $ndays . '</span><br>';
                    echo '<span class="label">Reason:</span>';
                    echo '<span class="value">' . $reason . '</span><br>';
                    echo '<span class="reject">rejected</span>';
                    if ($hod == 0) {
                        echo 'Rejected by hod';
                    } elseif ($iqac == 0) {
                        echo 'Rejected by IQAC';
                    } else {
                        echo 'Rejected by principal';
                    }
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
                ?>
            </main>
        </div>
    </body>

    </html>

<?php
} else {
    header("location:../Login/home.php");
}
?>