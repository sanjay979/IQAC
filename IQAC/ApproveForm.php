<?php
session_start();
if ($_SESSION['s_id']) {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>IQAC Approval</title>
        <link rel="stylesheet" href="ApproveForm2.css">
        <link rel="stylesheet" type="text/css" href="sidebar.css">
    </head>

    <body>
        <?php include 'sidebar.php' ?>

        <div class="main-content">
            <?php include 'header.php' ?>
            <main>
                <?php
                // Connect to the database
                include("..//database/Databasedemo.php");
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                // Fetch the data from the database
                $id = $_SESSION['s_id'];

                $sql = "SELECT * FROM faculty1 WHERE hod = 1 AND aqict = 3";
                $result = mysqli_query($conn, $sql);

                if (isset($_POST['approve'])) {
                    $itemID = $_POST['itemID'];

                    // Perform the SQL update query to approve the item
                    $updateQuery = "UPDATE faculty1 SET aqict = 1";

                    if (!empty($_POST['feedback'])) {
                        $feedback = $_POST['feedback'];
                        $updateQuery .= ", IC_feedback = '$feedback'";
                    }

                    $updateQuery .= " WHERE application_id = $itemID";
                    mysqli_query($conn, $updateQuery);
                } else if (isset($_POST['reject'])) {
                    $itemID = $_POST['itemID'];

                    // Perform the SQL update query to reject the item
                    $updateQuery = "UPDATE faculty1 SET aqict = 0";

                    if (!empty($_POST['feedback'])) {
                        $feedback = $_POST['feedback'];
                        $updateQuery .= ", IC_feedback = '$feedback'";
                    }

                    $updateQuery .= " WHERE application_id = '$itemID'";

                    mysqli_query($conn, $updateQuery);
                }

                // Get the list of approved and rejected application IDs
                $approvedIDs = array();
                $rejectedIDs = array();

                // Fetch the approved and rejected application IDs from the database
                $approvedQuery = "SELECT application_id FROM faculty1 WHERE aqict = 1";
                $rejectedQuery = "SELECT application_id FROM faculty1 WHERE aqict = 0";

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
                    $dep = $row['department'];
                    $lType = $row['LType'];
                    $start = $row['start'];
                    $end = $row['end'];
                    $ndays = $row['ndays'];
                    $reason = $row['reason'];

                    // Skip displaying approved or rejected forms
                    if (in_array($itemID, $approvedIDs) || in_array($itemID, $rejectedIDs)) {
                        continue;
                    }

                    // Display the form data in non-editable format
                ?>
                    <div class="card">
                        <div style="margin:5%">
                            <table>
                                <tr>
                                    <td class="label">Name:</td>
                                    <td class="value"><?php echo $name ?></td>
                                    <td class="label">Staff Id:</td>
                                    <td class="value"><?php echo $sID ?></td>
                                </tr>
                                <tr>
                                    <td class="label">Leave Type:</td>
                                    <td class="value"><?php echo $lType ?></td>
                                    <td class="label">Number of Days:</td>
                                    <td class="value"><?php echo $ndays ?></td>
                                </tr>
                                <tr>
                                    <td class="label">Start Date:</td>
                                    <td class="value"><?php echo $start ?></td>
                                    <td class="label">End Date:</td>
                                    <td class="value"><?php echo $end ?></td>
                                </tr>
                                <tr>
                                    <td class="label">Reason:</td>
                                    <td colspan="3" class="value"><?php echo $reason ?></td>
                                </tr>
                            </table>
                            <div colspan="4" class="feedback-form">
                                <form method="post">
                                    <input type="hidden" name="itemID" value="<?php echo $itemID ?>">
                                    <label for="feedback">Feedback:</label>
                                    <input type="text" name="feedback" id="feedback" placeholder="Enter Feedback">
                                    <div class="button-container">
                                        <input type="submit" name="approve" value="Approve" class="btn-primary">
                                        <input type="submit" name="reject" value="Reject" class="btn-secondary">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php } ?>


        </div>

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