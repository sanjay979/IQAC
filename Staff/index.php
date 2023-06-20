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
        <title>Dashboard</title>
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

        <link rel="stylesheet" type="text/css" href="../compenents/sidebar/sidebar.css">
    </head>

    <body>


        <?php include "Sidebar.php"; ?>

        <div class="main-content">
            <?php include "header.php"; ?>
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
                            <h1><?php
                                if ($result1) {
                                    $row = mysqli_fetch_assoc($result1);


                                    $ml = $row['ml'];
                                    if ($ml == 0) {
                                        echo '0';
                                    } else {
                                        echo $ml;
                                    }
                                }
                                ?></h1>
                            <span>No of days ML</span>
                        </div>
                        <div>
                            <span class="las la-users"></span>
                        </div>
                    </div>
                    <div class="card-single">
                        <div>
                            <h1><?php
                                if ($result2) {
                                    $row = mysqli_fetch_assoc($result3);
                                    $cl = $row['cl'];
                                    if ($cl == 0) {
                                        echo '0';
                                    } else {
                                        echo $cl;
                                    }
                                }
                                ?></h1>
                            <span>No of days CL</span>
                        </div>
                        <div>
                            <span class="las la-shopping-bag"></span>
                        </div>
                    </div>
                    <div class="card-single">
                        <div>
                            <h1><?php
                                if ($result3) {
                                    $row = mysqli_fetch_assoc($result2);
                                    $od = $row['od'];
                                    if ($od == 0) {
                                        echo '0';
                                    } else {
                                        echo $od;
                                    }
                                } ?></h1>
                            <span>No of days OD</span>
                        </div>
                        <div>
                            <span class="las la-hospital"></span>
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
?>