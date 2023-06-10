<?php

session_start();
if ($_SESSION['s_id']) {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Faculty Details</title>
        <link rel="stylesheet" href="pending.css">
        <link rel="stylesheet" type="text/css" href="sidebar.css">
    </head>

    <body><?php include "Sidebar.php"; ?>
        <div class="container" style="margin-left: auto">

            <?php include "header.php"; ?>

            <?php
            // Connect to the database
            //echo' container begins';
            include '../database/Databasedemo.php';


            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }


            $form_fields = [
                'Name' => ['type' => 'text', 'label' => 'Name', 'required' => true],      // the coulumn name in the table in the single quotes firstly
                'id' => ['type' => 'varchar', 'label' => 'ID', 'required' => true],
                'LType' => ['type' => 'text', 'label' => 'Leave-Type', 'required' => true],
                'ndays' => ['type' => 'int', 'label' => 'No of Days', 'required' => true],
                'start' => ['type' => 'date', 'label' => 'From', 'required' => true],
                'end' => ['type' => 'date', 'label' => 'To', 'required' => true],
                'reason' => ['type' => 'text', 'label' => 'Reason', 'required' => false],

            ];


            // Fetch the data from the database
            $id = $_SESSION['s_id'];
            $sql = "SELECT Name,id,LType,ndays,start,end,reason FROM faculty1 WHERE id='" . $id . "' AND (hod=FALSE OR aqict=FALSE OR principal=FALSE OR hod=3  or 
                 aqict=3 OR  principal=3)";

            $sql2 = "Select hod,aqict,principal from faculty1 where id ='" . $id . "' AND (hod=FALSE OR aqict=FALSE OR principal=FALSE OR hod=3  or 
        aqict=3 OR  principal=3)";


            $result = mysqli_query($conn, $sql);

            $result2 = mysqli_query($conn, $sql2);
            //$row = mysqli_fetch_assoc($result);

            // Display the form data in non-editable format
            while (true) {
                $row = mysqli_fetch_assoc($result);

                $row2 = mysqli_fetch_assoc($result2);
                if ($row != null) {
                    //echo'playing';
            ?>
                    <div class="form-container">
                        <?php
                        //to give different border color for od,cl
                        if (strcasecmp($row['LType'], 'OD') == 0) {

                            echo '<h2 class="form-heading">' . strtoupper($row['LType']) . '</h2>';
                        } elseif (strcasecmp($row['LType'], 'CL') == 0) {

                            echo '<h2 class="form-heading" >' . strtoupper($row['LType']) . '</h2>';
                        }
                        ?>

                        <hr>

                        <div class="box-container">
                            <fieldset>
                                <?php
                                foreach ($form_fields as $field_name => $field_data) {
                                    $value = $row[$field_name];
                                    echo '<label>' . $field_data['label'] . '</label>';
                                    echo '<span class="sp">' . $value . '<br></span>';
                                }
                                ?>
                            </fieldset>

                        </div>
                        <?php
                        $state = array(

                            0 => $row2['hod'],

                            1 => $row2['aqict'],

                            2 => $row2['principal'],

                        );

                        $steps = array(
                            array('status' => '', 'symbol' => ''),
                            array('status' => '', 'symbol' => ''),
                            array('status' => '', 'symbol' => ''),
                        );

                        $official = array('HOD', 'AQICT', 'PRINCIPAL');


                        for ($i = 0; $i < count($state); $i++) {
                            if ($state[$i] == 1) {

                                $steps[$i][0] = 'Approved';
                                $steps[$i][1] = '✔';
                            } elseif ($state[$i] == 0) {

                                $steps[$i][0] = 'Declined';
                                $steps[$i][1] = '❌';
                            } else {

                                $steps[$i][0] = 'Pending';
                                $steps[$i][1] = '!';
                            }
                        }

                        ?>

                        <div class="containerB">
                            <ul class="progressbar">
                                <?php
                                for ($i = 0; $i < count($steps); $i++) {

                                    echo '<li class="' . $steps[$i][0] . '">' . $official[$i] . '<span class="step-symbol">' . $steps[$i][0] . '</span></li>';
                                    //where css class can be Approved, Declined, Pending 
                                }
                                ?>
                            </ul>
                        </div>


                        <!-- style to change the symbols displayed in the progress bar circle -->
                        <style>
                            <?php
                            for ($i = 0; $i < count($steps); $i++) {
                                echo '.progressbar li.' . $steps[$i][0] . '::before {';
                                echo 'content: "' . $steps[$i][1] . '"; ';
                                echo '}';
                            } ?>
                        </style>
                    </div>
            <?php
                } else break;
            }
            // Close the database connection
            mysqli_close($conn);
            ?>
        </div>

    </body>

    </html>
<?php
} else {
    header("location:../Login/home.php");
}
?>