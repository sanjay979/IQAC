<?php

session_start();
if ($_SESSION['s_id']) {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Faculty Details</title>
        <link rel="stylesheet" href="ApproveForm.css">
        <link rel="stylesheet" type="text/css" href="Hodsidebar.css">
    </head>

    <body>
        <?php include 'Hodsidebar.php' ?>

        <div class="main-content">
            <?php include 'header.php' ?>
            <main>
                <?php
                // Connect to the database
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "demo";

                $conn = mysqli_connect($servername, $username, $password, $dbname);

                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }




                // Fetch the data from the database

                $id = $_SESSION['s_id'];
                $sql = "SELECT department FROM faculty_details where s_id='$id'";
                $result = $conn->query($sql);


                $row = $result->fetch_assoc();    /* the fetch_assoc() function is used to retrieve a row from a result set returned by a database query using the mysqli extension. 
                                                    It fetches the next row from the result set as an associative array, where the column names are used as the array keys, and the row values are the corresponding array values.*/
                $value = $row['department'];
                echo  $value;


                $sql = "SELECT * FROM faculty1 WHERE department='$value' and hod=3";
                $result = mysqli_query($conn, $sql);
                //$row = mysqli_fetch_assoc($result);

                // Display the form data in non-editable format
                if (isset($_POST['reject'])) {
                    $itemID = $_POST['itemID'];

                    // Perform the SQL update query to approve the item
                    $updateQuery = "UPDATE faculty1 SET hod=0 WHERE application_id = '$itemID'";
                    mysqli_query($conn, $updateQuery);
                }
                if (isset($_POST['approve'])) {
                    $itemID = $_POST['itemID'];

                    // Perform the SQL update query to approve the item
                    $updateQuery = "UPDATE faculty1 SET hod=1 WHERE application_id = '$itemID'";
                    mysqli_query($conn, $updateQuery);
                }
                echo '<div class="form-container">';
                while ($row = mysqli_fetch_assoc($result)) {
                    $itemID = $row['application_id'];
                    $sID = $row['id'];
                    $lType = $row['LType'];
                    $start = $row['start'];
                    $end = $row['end'];
                    $ndays = $row['ndays'];
                    $reason = $row['reason'];

                    echo '<div class="odForm-head">';
                    echo '<h2 class="value">' . $lType . '</h2>';
                    echo '</div>';
                    echo '<div class="card" >';
                    echo '<div class="card-content">';
                    echo '<span class="label">Staff ID:</span>';
                    echo '<span class="value">' . $sID . '</span><br>';
                    echo '<span class="label">Leave Type:</span>';
                    echo '<span class="value">' . $lType . '</span><br>';
                    echo '<span class="label">Start Date:</span>';
                    echo '<span class="value">' . $start . '</span><br>';
                    echo '<span class="label">End Date:</span>';
                    echo '<span class="value">' . $end . '</span><br>';
                    echo '<span class="label">Number of Days:</span>';
                    echo '<span class="value">' . $ndays . '</span><br>';
                    echo '<span class="label">Reason:</span>';
                    echo '<span class="value">' . $reason . '</span><br>';
                    echo '</div>';
                    echo '<form method="post">';
                    echo '<input type="hidden" name="itemID" value="' . $itemID . '">';
                    echo '<input type="text" name="feedback">';
                    echo '<input type="submit" name="approve" value="Approve" class="btn-primary">';
                    echo '<input type="submit" name="reject" value="Reject" class="btn-secondary">';
                    echo '</form>';
                    echo '</div>';
                }
                echo '</div>';
                // Close the database connection
                mysqli_close($conn);
                ?>
            </main>

        </div>

    </body>

    </html>
<?php
} else {
    header("location:../Login/home.php");
}
?>