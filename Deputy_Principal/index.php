<?php
session_start();
if ($_SESSION['s_id'] && $_SESSION['position'] == 'deputy_prin') {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Deputy Principal page</title>
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

        <link rel="stylesheet" type="text/css" href="sidebar.css">

    <body>

        <?php include 'PrincipalSideBar.php'; ?>
        <div class="main-content">
            <header>
                <h2>
                    <div class="header-list">
                        <label for="nav-toggle">
                            <span class="las la-bars"></span>
                        </label> Dashboard
                    </div>

                </h2>
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
                        <small>Deputy Principal</small>
                    </div>
                </div>
            </header>
            <main>
                <?php
                $sql1 = "SELECT COUNT(*) AS mlCount FROM faculty1 WHERE principal = 1 AND LType = 'ML' and shift=2";
                $sql2 = "SELECT COUNT(*) AS odCount FROM faculty1 WHERE principal = 1 AND LType = 'OD' and shift=2";
                $sql3 = "SELECT COUNT(*) AS clCount FROM faculty1 WHERE principal = 1 AND LType = 'CL' and shift=2";
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
                            <h1><?php echo $mlCount; ?></h1>
                            <span>No of ML</span>
                        </div>
                        <div>
                            <span class="las la-users"></span>
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
