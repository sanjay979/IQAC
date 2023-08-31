<?php
session_start();
if ($_SESSION['s_id'] && $_SESSION['position'] == 'staff') {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Staff page</title>
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

        <link rel="stylesheet" type="text/css" href="index.css">

        <link rel="stylesheet" type="text/css" href="sidebar.css">
    </head>

    <body>

        <?php include 'Sidebar.php'; ?>
        <div class="main-content">

            <?php
            include "header.php";
            ?>
            <main>
                <?php
                $id = $_SESSION['s_id'];
                $sql1 = "SELECT sum(ndays) AS ml from faculty1 where principal=1 and LType='ML' and id='$id'";
                $sql2 = "SELECT sum(ndays) AS od from faculty1 where principal=1 and LType='OD' and id='$id'";
                $sql3 = "SELECT sum(ndays) AS cl from faculty1 where principal=1 and LType='CL' and id='$id'";
                $result1 = mysqli_query($conn, $sql1);
                $result2 = mysqli_query($conn, $sql2);
                $result3 = mysqli_query($conn, $sql3);


                ?>
                <div class="cards">
                    <div class="card-single">
                        <div>
                            <?php
                                if ($result1) {
                                    $row = mysqli_fetch_assoc($result1);
                                    $ml = $row['ml'];
                                }
                                ?></h3>
                            <span>No of days ML <?php echo "<b>";
                             echo $ml;
                             echo "</b>";?></span><br>
                            <span>No of days ML available <?php echo "<b>";
                             echo 20-$ml;
                             echo "</b>";?></span>
                        </div>
                        <div>
                            <span class="las la-users"></span>
                        </div>
                    </div>
                    <div class="card-single">
                        <div>
                            <?php
                                if ($result2) {
                                    $row = mysqli_fetch_assoc($result3);
                                    $cl = $row['cl'];
                                }
                                ?>
                           <span>No of days CL <?php echo "<b>";
                             echo $cl;
                             echo "</b>";?></span><br>
                            <span>No of days CL available <?php echo "<b>";
                             echo 20-$cl;
                             echo "</b>";?></span>
                        </div>
                        <div>
                            <span class="las la-shopping-bag"></span>
                        </div>
                    </div>
                    <div class="card-single">
                        <div>
                            <?php
                                if ($result3) {
                                    $row = mysqli_fetch_assoc($result2);
                                    $od = $row['od'];
                                } ?>
                            <span>No of days OD <?php echo "<b>";
                             echo $od;
                             echo "</b>";?></span><br>
                            <span>No of days OD available <?php echo "<b>";
                             echo 20-$od;
                             echo "</b>";?></span>
                        </div>
                        <div>
                            <span class="las la-hospital"></span>
                        </div>
                    </div>
                </div>

                <?php

                $sql = "SELECT * FROM faculty1 WHERE id = '" . $id . "' AND (hod <>0 AND aqict<>0 AND principal = 3 )";
                $result = $conn->query($sql);
                $row = mysqli_fetch_assoc($result);

                //statements for next_form for od

                $sql2 = "SELECT * FROM faculty1 WHERE id = '" . $id . "' AND principal=1 AND next_form=3 ";
                $result2 = $conn->query($sql2);
                $row2 = mysqli_fetch_assoc($result2);


                if ($result2->num_rows > 0) {
                    //$app = $row2['application_id'];
                ?>

                    <div class="new-card-block">
                        <div class="new-card">
                            <div>
                                <h1>Post Leave Updation</h1>
                                <span>Kindly update the od completion document</span>
                                <!--span>< ?php echo $app; ?></span-->
                            </div>
                            <div>
                                <a href="apply.php" class="button">Open Form</a>
                            </div>
                        </div>
                    </div>


                <?php
                }

                if ($result->num_rows != 0) {
                    //echo "varata mamea";
                    //$row = mysqli_fetch_assoc($result);
                ?>

                    <div class="new-card-block">
                        <div class="new-card">
                            <div>
                                <h1>Leave Status</h1>

                                <?php if ($result->num_rows == 1) { ?>
                                    <span>The leave Form has been submitted</span>
                                    <a href="pending.php" class="button button-small">View Status</a>
                            </div>

                            <div class="containerB">
                                <ul class="progressbar">
                                    <li class="<?php echo getStatusClass($row['hod']); ?>" data-symbol="<?php echo getStatusSymbol($row['hod']); ?>">
                                        HOD <span class="step-symbol"><?php echo getStatusClass($row['hod']); ?></span>
                                    </li>
                                    <li class="<?php echo getStatusClass($row['aqict']); ?>" data-symbol="<?php echo getStatusSymbol($row['aqict']); ?> ">
                                        IQAC <span class="step-symbol"><?php echo getStatusClass($row['aqict']); ?></span>
                                    </li>
                                    <li class="<?php echo getStatusClass($row['principal']); ?>" data-symbol="<?php echo getStatusSymbol($row['principal']); ?> ">
                                        PRINCIPAL <span class="step-symbol"><?php echo getStatusClass($row['principal']); ?></span>
                                    </li>

                                </ul>
                            </div>
                        <?php } else { ?>
                            <span><?php echo "Your <strong>".$result->num_rows; ?></strong> forms are pending</span>
                        </div>
                        <div class="status-button-container">
                            <a href="pending.php" class="button button-small">View Status</a>
                            <?php } ?>
                        </div>
        </div>

    <?php
                }
    ?>
    <div class="new-card-block">
        <div class="new-card">
            <div>
                <h1>Leave Form</h1>
                <span>Do you want to Apply Leave</span>
            </div>
            <div>
                <a href="leaveform.php" class="button">Apply Leave</a>
            </div>
        </div>
    </div>
    </main>
    </div>
    </body>

    </html>
<?php
} else {
    header("location:../Login/home.php");
}

function getStatusSymbol($status)

{
    if ($status == 1) {
        return '✔';
    } elseif ($status == 0) {
        return '❌';
    } else {
        return '!';
    }
}

function getStatusClass($status)
{
    if ($status == 1) {
        return 'approved';
    } elseif ($status == 0) {
        return 'declined';
    } else {
        return 'pending';
    }
}
?>