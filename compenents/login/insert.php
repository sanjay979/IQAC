<?php
session_start();
include("database_connect.php");
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sel = mysqli_query($con, "select * from login_table where username='$username' and password='$password' ");

    if (mysqli_num_rows($sel) == 1) {
        $rows = mysqli_fetch_assoc($sel);
        echo "<h3>" . $rows["id"];
        echo "--" . $rows["username"];
        echo "--" . $rows["password"] . "</h3>";
    } else {
        $_SESSION['alert'] = "invalid password or username";
        header("location:home.php");
    }
}
