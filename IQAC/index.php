<?php

session_start();
if ($_SESSION['s_id'] && $_SESSION['position'] == 'iqac') {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>IQAC page</title>
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />


        <link rel="stylesheet" type="text/css" href="sidebar.css">
        <link rel="stylesheet" type="text/css" href="../Staff/sidebar.css">

    <body>

        <?php include 'sideBar.php'; ?>
        <div class="main-content">
            <header>
                <h2>
                    <div class="header-list">
                        <label for="nav-toggle">
                            <span class="las la-bars"></span>
                        </label> IQAC page
                    </div>

                </h2>
                <div class="notify">
                    <?php

                    include '../database/Databasedemo.php';
                    $id = $_SESSION['s_id'];

                    $st = "select count(*) AS count from faculty1 where shift=1 and hod=1 and aqict=3";
                    $st1 = "select count(*) AS count from leave_details where shift=2 and hod=1 and iqac=3";
                    $result1 = mysqli_query($conn, $st);
                    $result2 = mysqli_query($conn, $st1);
                    if ($result1) {
                        $row1 = mysqli_fetch_assoc($result1);
                        $count = $row1['count'];
                    }
                    if ($result2) {
                        $row2 = mysqli_fetch_assoc($result2);
                        $count1 = $row2['count'];
                    }

                    ?>
                    <i class="fa fa-bell"></i>
                    <span class="badge"><?php echo $count + $count1; ?></span>
                    <div class="notification-list">
                        <!-- Notification list items -->

                        <ul><?php

                            echo '<li ><a href="ApproveFormS1.php">Shift-I leave request:' . $count . '</a></li>';
                            echo '<li ><a href="ApproveFormS2.php">Shift-II leave request:' . $count1 . '</a></li>';

                            ?>
                        </ul>
                        <script>
                            var notificationIcon = document.querySelector('.notify');
                            var notificationList = document.querySelector('.notification-list');

                            // Toggle the visibility of the notification list when the icon is clicked
                            notificationIcon.addEventListener('click', function() {
                                if (notificationList.style.display === 'none') {
                                    notificationList.style.display = 'block';
                                } else {
                                    notificationList.style.display = 'none';
                                }
                            });
                        </script>
                    </div>
                </div>
                <div class="user-wrapper">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQMi1noTDjkelW0kvsZO5CgEaBM5GHrNkF9ix7Knt9Ztw&s" alt="" width="30px" height="30px">
                    <div>
                        <h4><?php
                            $id = $_SESSION['s_id'];
                            include '../database/Databasedemo.php';
                            $sql = "SELECT name FROM faculty_details where s_id='$id'";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $value = $row['name'];
                                echo  $value;
                            }
                            ?></h4>
                        <small>IQAC</small>
                    </div>
                </div>
            </header>
            <main>
                <?php
                $sql1 = "SELECT COUNT(*) AS mlCount FROM faculty1 WHERE principal = 1 AND LType = 'ML'";
                $sql2 = "SELECT COUNT(*) AS odCount FROM faculty1 WHERE principal = 1 AND LType = 'OD'";
                $sql3 = "SELECT COUNT(*) AS clCount FROM faculty1 WHERE principal = 1 AND LType = 'CL'";
                $result1 = mysqli_query($conn, $sql1);
                $result2 = mysqli_query($conn, $sql2);
                $result3 = mysqli_query($conn, $sql3);

                $mlCount = 0;
                $odCount = 0;
                $clCount = 0;

                if ($result1) {
                    $row1 = mysqli_fetch_assoc($result1);
                    $mlCount = $row1['mlCount'];
                }

                if ($result2) {
                    $row2 = mysqli_fetch_assoc($result2);
                    $odCount = $row2['odCount'];
                }

                if ($result3) {
                    $row3 = mysqli_fetch_assoc($result3);
                    $clCount = $row3['clCount'];
                }
                ?>

                <div class="cards">
                    <div class="card-single">
                        <div>
                            <span>Ml taken:</span>
                            <h1><?php echo $mlCount; ?></h1>
                            <span>No of ML</span>
                            <div style="margin-left: 220px; margin-top: -50px;">
                                <span class="material-symbols-outlined" style="font-size: 36px;">medical_services</span>
                            </div>
                        </div>

                    </div>
                    <div class="card-single">
                        <div>
                            <h1><?php echo $clCount; ?></h1>
                            <span>No of CL</span>
                        </div>
                        <div>
                            <span class="las la-shopping-bag"></span>
                        </div>
                    </div>
                    <div class="card-single">
                        <div>
                            <h1><?php echo $odCount; ?></h1>
                            <span>No of OD</span>
                        </div>
                        <div>
                            <span class="las la-hospital"></span>
                        </div>
                    </div>
                </div>
                <?php include 'bodydashboard.php'; ?>
            </main>
        </div>
    </body>

    </html>
<?php
} else {
    header("location:../Login/home.php");
}
?>