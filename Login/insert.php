<?php
session_start();
include("..//database/database_connect.php");
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $st = mysqli_query($conn, "select * from login where s_id='$username' and password='$password' ");
    $st1 = mysqli_query($conn, "select * from faculty_details where s_id='$username'");
       
    if ($st->num_rows == 1) {
        $rows = mysqli_fetch_assoc($st);
        $rows1 = mysqli_fetch_assoc($st1);
        $position = $rows1['position'];
        $aposition = $rows1['a_position'];

        if ($position == 'staff') {
            $_SESSION['s_id'] = $username;
            $_SESSION['position'] = $position;
            header("location:..\Staff\index.php");
        } elseif ($position == 'hod') {
            $_SESSION['s_id'] = $username;
            $_SESSION['position'] = $position;
            $_SESSION['aposition'] = 'Deactive';

            header("location:..\HODs\index.php");
        } 
        elseif ($position == 'hod_dep' && $aposition == 'Active') {
            $_SESSION['s_id'] = $username;
            $_SESSION['position'] = $position;
            $_SESSION['aposition'] = $aposition;

            header("location:..\HODs\index.php");
        } elseif ($position == 'principal') {
            //elseif block to direct to principal page if the user is principal 
            $_SESSION['s_id'] = $username;
            $_SESSION['position'] = $position;

            header("location:..\Principal\index.php");

        } elseif ($position == 'deputy_prin') {
            //elseif block to direct to principal page if the user is principal 
            $_SESSION['s_id'] = $username;
            $_SESSION['position'] = $position;

            header("location:..\Deputy_Principal\index.php");
            
        } elseif ($position == 'iqac') {
            $_SESSION['s_id'] = $username;
            $_SESSION['position'] = $position;

            header("location:..\IQAC\index.php");
        } else {
            $_SESSION['alert'] = "unable to login try again";
            header("location:home.php");
        }
    } else {
        $_SESSION['alert'] = "invalid password or username";
        header("location:home.php");
    }
}
