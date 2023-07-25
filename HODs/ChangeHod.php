<?php
session_start();
if ($_SESSION['s_id']) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change HOD page</title>
    <link rel="stylesheet" type="text/css" href="Hodsidebar.css">
</head>
<body>
    <?php include 'Hodsidebar.php';
    ?>
    <div class="main-content">
        <?php include "header.php"; ?>
        <main>
            <div class="card">
            <form method="post">
                <?php 
                include '../database/Databasedemo.php';
                $sid=$_SESSION['s_id'];
                $sql1="select department,shift from faculty_details where s_id='$sid'";
                $result=mysqli_query($conn,$sql1);
                $row=mysqli_fetch_assoc($result);
                $dept=$row['department'];
                $shift=$row['shift'];
                $check="select a_position from faculty_details where position='hod_dep' and department='$dept' and shift='$shift'";
                $result2=mysqli_query($conn,$check);
                $row1=mysqli_fetch_assoc($result2);
                $status=$row1['a_position'];
                if($status=='Active'){
                echo '<h5>Close the permission of Assistant HOD</h5>';
                echo '<button name="deactive" class="deactive">Deactive</button>';
                }else{
                echo '<h5>Change the HOD</h5>';
                echo '<button name="active" class="ative">Active</button>';
                }
                ?>
                
                <?php
                 if(isset($_POST['deactive'])){
                    $sql="Update faculty_details set a_position='Deative' where position='hod_dep' and department='$dept' and shift='$shift'";
                    $result1=mysqli_query($conn,$sql);
                }
                if(isset($_POST['active'])){
                    $sql="Update faculty_details set a_position='Active' where position='hod_dep' and department='$dept' and shift='$shift'";
                    $result1=mysqli_query($conn,$sql);
                }
                ?>
            </form>
        </div>
        </main>
        
    </div>
</body>
</html>
<?php
} else {
    header("location:../Login/home.php");
}
?>