<?php

session_start();
if ($_SESSION['s_id'] && $_SESSION['position'] == 'iqac') {
?>


<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Leave details management</title>
</head>
<body>
<?php include 'Sidebar.php'; ?>
<div class="main-content">
<?php include 'header.php' ?>
<?php
include '../database/Databasedemo.php';
$sql="select * from l_details";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$year=$row['Academic_year'];
$cl=$row['CL'];
$ml=$row['ML'];
$od=$row['OD'];


?>
    <main>
    <table id="data-table" class="table">
                        <thead>
                            <tr>
                                <th>S.N</th>
                                <th>Operation Name</th>
                                <th>Staff ID</th>
                                <th>Input Field</th>
                                <th>Update</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
      <th scope="row">1</th>
      <td>Academic year</td>
      <td><?php echo $year;?></td>
      <td><form method="post"><select name="year">
        <option>2023-2024</option>
        <option>2024-2025</option>
        <option>2025-2026</option>
        <option>2026-2027</option>
        <option>2027-2028</option>
        <option>2028-2029</option>
    </select></td>
    <td><input type="submit" class="btn btn-secondary"  value="update" name="yearvalue"></form></td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>CL Available</td>
      <td><?php echo $cl;?></td>
      <td><form method="post">
        <input type="number" name="cl1">
        </td>
      <td><input type="submit" class="btn btn-secondary"  value="update" name="cl">
      </form></td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>ML Available</td>
      <td><?php echo $ml;?></td>
      <td><form method="post">
        <input type="number" name="medical">
        </td>
      <td><input type="submit" class="btn btn-secondary"  value="update" name="ml">
      </form></td>
    </tr>
    <tr>
      <th scope="row">4</th>
      
      <td>OD Available</td>
      <td><?php echo $od;?></td>
      <td><form method="post">
        <input type="number" name="od1">
        </td>
      <td><input type="submit" class="btn btn-secondary"  value="update" name="od">
      </form></td>
    </tr>

                        </tbody>
                    </table>
    </main>
            <?php
            if(isset($_POST['yearvalue'])){
                $year=$_POST['year'];
                $sql="UPDATE L_DETAILS SET Academic_year='$year'";
                mysqli_query($conn,$sql);
            }
            if(isset($_POST['ml'])){
                $ml=$_POST['medical'];
                $sql0="UPDATE L_DETAILS SET ML='$ml'";
                mysqli_query($conn,$sql0);
            }
            if(isset($_POST['cl'])){
                $cl=$_POST['cl1'];
                $sql1="UPDATE L_DETAILS SET CL='$cl'";
                mysqli_query($conn,$sql1);
            }
            if(isset($_POST['od'])){
                $od=$_POST['od1'];
                $sql2="UPDATE L_DETAILS SET OD='$od'";
                mysqli_query($conn,$sql2);
            }
            ?>

            
</div>
</body>
</html>

<?php
} else {
    header("location:../Login/home.php");
}
?>