<?php
include("login/database_connect.php");
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sel = mysqli_query($con, "select * from admin_table where username='$username' and password='$password' ");
    echo "number of rows selected" . mysqli_num_rows($sel);
    while ($rows = mysqli_fetch_assoc($sel)) {
        echo "<h3>" . $rows["id"];
        echo "--" . $rows["username"];
        echo "--" . $rows["password"] . "</h3>";
    }
}
