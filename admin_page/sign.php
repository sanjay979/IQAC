<?php
session_start();
include("..//database/database_connect.php");
if (isset($_POST['submit'])) {
    $username = $_POST['Username'];
    $password = $_POST['Password'];
    $st = mysqli_query($con, "select * from login where s_id='$username' and password='$password' ");
    if ($st->num_rows == 1) {
        $rows = mysqli_fetch_assoc($st);
        $position = $rows['position'];

        if ($position == 'admin') {
            $_SESSION['s_id'] = $username;
            $_SESSION['position'] = $position;
            header("location:forms.php");
        }
    } else {
        $_SESSION['alert'] = "invalid password or username";
        header("location:index.php");
    }
}
