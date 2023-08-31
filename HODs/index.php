<?php

session_start();
if ($_SESSION['s_id'] && ($_SESSION['position'] == 'hod' || $_SESSION['position'] == 'hod_dep')) {

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HODs page</title>
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Goblin+One&display=swap" rel="stylesheet">
    <!--font2 -->
    <script src="https://kit.fontawesome.com/668b4cc612.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="sidebar.css">
    </head>

    <body>

        <?php include 'Hodsidebar.php'; ?>
        <div class="main-content">
            <header>
                <h2>
                    <div class="header-list">
                        <label for="nav-toggle">
                            <span class="las la-bars"></span>
                        </label> Dashboard
                    </div>
                    
                </h2>
                <div class="notify">
                    <?php
                    
                    include '../database/Databasedemo.php';
                    $id = $_SESSION['s_id'];
                     $notify = "SELECT department,shift FROM faculty_details where s_id='$id'";
                     $result2 = mysqli_query($conn,$notify);
                    if($result2->num_rows > 0){
                        $row = $result2->fetch_assoc();
                        $dept=$row['department'];
                        $shift=$row['shift'];
                    }
                    $st="select count(*) AS count from faculty1 where department='$dept' and shift='$shift' and hod=3";
                    $st1="select count(*) AS count from leave_details where department='$dept' and shift='$shift' and hod=3";
                    $result1=mysqli_query($conn,$st);
                    $result2=mysqli_query($conn,$st1);
                    if($result1){ 
                        $row1=mysqli_fetch_assoc($result1);
                        $count=$row1['count'];
                    }
                    if($result2){ 
                        $row2=mysqli_fetch_assoc($result2);
                        $count1=$row2['count'];
                    }

                    ?>
                    <i class="fa fa-bell"></i>
                    <span class="badge"><?php echo $count+$count1; ?></span>
                    <div class="notification-list">
                   <!-- Notification list items -->
                   
                   <ul><?php
                  
                    echo '<li ><a href="ApproveForm.php">Pre-leave request:'. $count .'</a></li>';
                    echo '<li ><a href="ApproveForm.php">post-leave request:'. $count1 .'</a></li>';
                   
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
                        <h4> <?php
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
                        <small>HOD</small>
                    </div>
                </div>
            </header>
            <main>
            <?php
               $sql1 = "SELECT COUNT(*) AS mlCount FROM faculty1 WHERE principal = 1 AND LType = 'ML' and shift='$shift' and department='$dept'";
               $sql2 = "SELECT COUNT(*) AS odCount FROM faculty1 WHERE principal = 1 AND LType = 'OD' and shift='$shift' and department='$dept'";
               $sql3 = "SELECT COUNT(*) AS clCount FROM faculty1 WHERE principal = 1 AND LType = 'CL' and shift='$shift' and department='$dept'";
               
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
                             if($ml==0){
                                echo 0;
                             }else{
                                echo $ml;
                            }
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
