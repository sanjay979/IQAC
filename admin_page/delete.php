<?php
include("../database/database_connect.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM  faculty1  WHERE application_id = $id";
    $result = mysqli_query($con, $sql);
    $row = mysqli_affected_rows($con);
    if ($row == 1) {
        header("location:forms.php");
    } else {
        echo "error";
    }
} else {
    header("location:forms.php");
}
