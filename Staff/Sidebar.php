<?php


session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
    <title>Staff Profile</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Goblin+One&display=swap" rel="stylesheet">
<!--font2 -->
<script src="https://kit.fontawesome.com/668b4cc612.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="sidebar.css">
</head>
<body>
    <input type="checkbox" id="nav-toggle">
    <?php $page = substr($_SERVER['SCRIPT_NAME'],strrpos($_SERVER['SCRIPT_NAME'],"/")+1) ?>
    <div class="sidebar">
         <div class="sidebar-head">
            <h2><span>SJC Staff</span></h2>
        </div>
        <div class="sidebar-menu">
        <ul>
            <li><a href="..//..//Staff/index.php"  class="<?= $page == 'index.php'? 'active':'' ?>"><span class="las la-igloo"></span> <span>Dashboard</span></a></li>
            <li><a href="..//..//Staff/profile.php"  class="<?= $page == 'profile.php'? 'active':'' ?>"><span class="las la-user"></span><span>Profile</span> </a></li>
            <li><a href="..//..//Staff/leaveform.php"  class="<?= $page == 'leaveform.php'? 'active':'' ?>"><span class="las la-clipboard-list"></span><span>Apply OD</span> </a></li>
            <li><a href="..//..//Staff/pending.php" class="<?= $page == 'pending.php'? 'active':'' ?>"><span class="las la-receipt"></span> <span>Pending</span></a></li>
            <li><a href=""><span class="las la-list"></span> <span>History</span></a></li>
            <li>
                        <form action="..//..//Login/logout.php" method="post">
                            <button type="submit" name="logout" class="logout-btn">
                                <span class="las la-power-off"></span>
                                <span>Logout</span>
                            </button>
                        </form>
                    </li>
        </ul>
        </div> 
    </div>
       



    </body>

    </html>