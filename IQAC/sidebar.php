<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
    <title>HOD Profile</title>
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
    <div class="sidebar">
        <?php $page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/") + 1) ?>
        <div class="sidebar-head">
            <h2><span>IQAC</span></h2>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li><a href="index.php" class="<?= $page == 'index.php' ? 'active' : '' ?>"><span class="las la-igloo"></span> <span>Dashboard</span></a></li>
                <li><a href="StaffLogin.php" class="<?= $page == 'StaffLogin.php' ? 'active' : '' ?>"><span class="las la-clipboard-list"></span><span>add staff</span> </a></li>
                <li><a href="ApproveForm.php" class="<?= $page == 'ApproveForm.php' ? 'active' : '' ?>"><span class="las la-receipt"></span> <span>Leave requests</span></a></li>
                <li><a href="WaitingForms.php" class="<?= $page == 'WaitingForms.php' ? 'active' : '' ?>"><span class="las la-receipt"></span> <span>Waiting Forms</span></a></li>
                <li><a href="history.php" class="<?= $page == 'history.php' ? 'active' : '' ?>"><span class="fa fa-clock"></span> <span>history</span></a></li>
                <li><a href="../Login/logout.php" class=""><span class="las la-igloo"></span> <span>Logout</span></a></li>
            </ul>
        </div>
    </div>




</body>

</html>