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

                $row = $result->fetch_assoc();
                $value = $row['department'];

                $sql = "SELECT * FROM faculty1 WHERE department='$value' and hod=3";
                $result = mysqli_query($conn, $sql);

                if (isset($_POST['reject'])) {
                    $itemID = $_POST['itemID'];

                    // Perform the SQL update query to approve the item
                    $updateQuery = "UPDATE faculty1 SET hod=0 ";

                    if (!empty($_POST['feedback'])) {
                        $feedback = $_POST['feedback'];
                        $updateQuery .= ", H_feedback = '$feedback'";
                    }

                    $updateQuery .= " WHERE application_id = '$itemID'";
                    mysqli_query($conn, $updateQuery);
                } else if (isset($_POST['approve'])) {
                    $itemID = $_POST['itemID'];

                    // Perform the SQL update query to approve the item
                    $updateQuery = "UPDATE faculty1 SET hod=1 ";

                    if (!empty($_POST['feedback'])) {
                        $feedback = $_POST['feedback'];
                        $updateQuery .= ", H_feedback = '$feedback'";
                    }

                    $updateQuery .= " WHERE application_id = '$itemID'";

                    mysqli_query($conn, $updateQuery);
                }

                //the following code till 3rd while loop are used to remove approved/rejected forms in the display

                // Get the list of approved and rejected application IDs
                $approvedIDs = array();
                $rejectedIDs = array();

                // Fetch the approved and rejected application IDs from the database
                $approvedQuery = "SELECT application_id FROM faculty1 WHERE hod = 1";
                $rejectedQuery = "SELECT application_id FROM faculty1 WHERE hod = 0";

                $approvedResult = mysqli_query($conn, $approvedQuery);
                $rejectedResult = mysqli_query($conn, $rejectedQuery);

                while ($row = mysqli_fetch_assoc($approvedResult)) {
                    $approvedIDs[] = $row['application_id'];
                }

                while ($row = mysqli_fetch_assoc($rejectedResult)) {
                    $rejectedIDs[] = $row['application_id'];
                }

                // Display the form data in table format
                echo '<div class="form-container">';
                while ($row = mysqli_fetch_assoc($result)) {
                    $itemID = $row['application_id'];
                    $sID = $row['id'];
                    $name = $row['name'];
                    $lType = $row['LType'];
                    $start = $row['start'];
                    $end = $row['end'];
                    $ndays = $row['ndays'];
                    $reason = $row['reason'];

                    //to remove the approved/rejected form from the display
                    if (in_array($itemID, $approvedIDs) || in_array($itemID, $rejectedIDs)) {
                        continue;
                    }

                    // Display the form data in non-editable format


                    echo '<div  class="card">';
                    echo '<table>';
                    echo '<tr><td class="label">Name:</td><td class="value">' . $name . '</td>';
                    echo '<td class="label">Staff Id:</td><td class="value">' . $sID . '</td></tr>';
                    echo '<tr><td class="label">Leave Type:</td><td class="value">' . $lType . '</td>';
                    echo '<td class="label">Number of Days:</td><td class="value">' . $ndays . '</td></tr>';
                    echo '<tr><td class="label">Start Date:</td><td class="value">' . $start . '</td>';
                    echo '<td class="label">End Date:</td><td class="value">' . $end . '</td></tr>';
                    echo '<tr><td class="label">Reason:</td><td colspan="3" class="value">' . $reason . '</td></tr>';
                    echo '<tr>';
                    echo '</table>';
                    echo '<div colspan="4" class="feedback-form">';
                    echo '<form method="post">';
                    echo '<input type="hidden" name="itemID" value="' . $itemID . '">';
                    echo '<label for="feedback">Feedback:</label>';
                    echo '<input type="text" name="feedback" id="feedback" placeholder="Enter Feedback">';
                    echo '<div class="button-container">';
                    echo '<input type="submit" name="approve" value="Approve" class="btn-primary">';
                    echo '<input type="submit" name="reject" value="Reject" class="btn-secondary">';
                    echo '</div>';
                    echo '</form>';
                    echo '</div>';
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