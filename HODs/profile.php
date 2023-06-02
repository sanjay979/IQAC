<?php

session_start();
if ($_SESSION['s_id']) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel='stylesheet' href="profile.css">
        <link rel="stylesheet" type="text/css" href="sidebar.css">
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

        <title>Staff profile</title>
    </head>

    <body>

        <?php include 'Hodsidebar.php'; ?>
        <div class="main-content">
            <?php include 'header.php' ?>
            <main>
                <div>
                    <ul>
                        <li class="card-single">Name<span><?php $name = 'Ravindran';
                                                            echo $name ?></span></li>
                        <li class="card-single">Department<span><?php $deparment = 'Computer science';
                                                                echo $deparment ?></span></li>
                        <li class="card-single">Staff ID<span><?php $s_id = '01fcs10';
                                                                echo $s_id ?></span></li>
                        <li class="card-single">Date of birth<span><?php $dob = '01/01/1976';
                                                                    echo $dob ?></span></li>
                        <li class="card-single">Experience<span><?php $exp = '32 years';
                                                                echo $exp ?></span></li>
                    </ul>
                </div>
        </div>

        </main>

    </body>

    </html>
<?php
} else {
    header("location:../Login/home.php");
}
?>