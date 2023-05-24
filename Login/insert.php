<?php
session_start();
include("..//database/database_connect.php");
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $st = mysqli_query($con, "select * from staff_login where s_id='$username' and password='$password' ");
    $hod = mysqli_query($con, "select * from hod_login where s_id='$username' and password='$password' ");

    if ($st->num_rows == 1) {
        $rows = mysqli_fetch_assoc($st);
        echo "<h3>" . $rows["id"];
        echo "--" . $rows["username"];
        echo "--" . $rows["password"] . "</h3>";
        // ($rows = mysqli_fetch_assoc($sel));
        $_SESSION['s_id'] = $username;
       header("location:..\Staff\index.php");
    } elseif ($hod->num_rows == 1) {
        $_SESSION['s_id'] = $username;
        
        header("location:..\HODs\index.php");
    }else{
        $_SESSION['alert'] = "invalid password or username";
        header("location:home.php");
    }
}
