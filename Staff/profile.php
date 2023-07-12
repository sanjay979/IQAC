<?php

session_start();
if ($_SESSION['s_id'] && $_SESSION['position'] == 'staff') {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel='stylesheet' href="profile3.css">
        <link rel="stylesheet" type="text/css" href="../compenents/sidebar/sidebar.css">
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

        <title>Staff profile</title>
    </head>

    <body>

        <?php include "Sidebar.php"; ?>
        <div class="main-content">
            <?php include "header.php"; ?>

            <?php
            include("..//database/Databasedemo.php");
            $id = $_SESSION['s_id'];
            $sql = "SELECT * FROM faculty_details WHERE s_id='$id'";
            $result = mysqli_query($conn, $sql);
            ?>
            <div>
                <div>
                    <img class="profile-photo" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQMi1noTDjkelW0kvsZO5CgEaBM5GHrNkF9ix7Knt9Ztw&s" alt="Profile Photo">
                    <table>
                        <tr>
                            <td class="bold">Name</td>
                            <td><?php
                                if ($result->num_rows > 0) {
                                    $row = $result->fetch_assoc();
                                    $name = $row['name'];
                                    $dep = $row['department'];
                                    $dob = $row['dob'];
                                    $shift=$row['shift'];
                                    echo  $name;
                                } ?></td>
                        </tr>
                        <tr>
                            <td class="bold">Department</td>
                            <td><?php echo $dep; ?></td>
                        </tr>
                        <tr>
                            <td class="bold">Staff ID</td>
                            <td><?php echo $id; ?></td>
                        </tr>
                        <tr>
                            <td class="bold">Date of Birth</td>
                            <td><?php echo $dob; ?></td>
                        </tr>
                        <tr>
                            <td class="bold">Shift</td>
                            <td><?php echo $shift; ?></td>
                        </tr>
                        <tr>
                            <td class="bold">Experience</td>
                            <td><?php $exp = '32 years';
                                echo $exp ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>


    </body>

    </html>

<?php
} else {
    header("location:../Login/home.php");
}
?>