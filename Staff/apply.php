<?php
session_start();
if ($_SESSION['s_id'] && $_SESSION['position'] == 'staff') {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Pending to Apply</title>
        <link rel="stylesheet" href="pending2.css">
        <link rel="stylesheet" type="text/css" href="sidebar.css">
    </head>

    <body>
        <?php include "Sidebar.php"; ?>
        <div class="main-content">
            <div class="container" style="margin-left: auto">
                <?php include "header.php"; ?>

                <?php
                // Connect to the database
                include '../database/Databasedemo.php';

                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                // Fetch the data from the database
                $id = $_SESSION['s_id'];
                $sql = "SELECT * FROM faculty1 WHERE  id='" . $id . "' AND (principal=1 and next_form=3) AND end<=CURDATE()";
                $result = mysqli_query($conn, $sql);

                // Modify the loop to add a unique identifier to each form
                $formIndex = 0; // Add this counter outside the loop

                $numRows = mysqli_num_rows($result);
                if ($numRows > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        //echo "playing";
                        $app_id = $row['application_id'];
                        $name = $row['name'];
                        $id = $row['id'];
                        $shift = $row['shift'];
                        $department = $row['department'];
                ?>

                        <div class="form-container" id="form-<?php echo $app_id; ?>">
                            <table>
                                <?php
                                $form_fields = [
                                    'id' => ['label' => 'ID'],
                                    'LType' => ['label' => 'Leave-Type'],
                                    'shift' => ['label' => 'Shift'],
                                    'start' => ['label' => 'Date'],
                                    'ndays' => ['label' => 'No of Days'],
                                    'reason' => ['label' => 'Reason'],
                                    'file' => ['label' => 'File'],
                                ];

                                foreach ($form_fields as $field_name => $field_data) {
                                    $value = $row[$field_name];
                                    echo '<tr>';
                                    echo '<td><label>' . $field_data['label'] . '</label></td>';

                                    if ($field_name === 'file') {
                                        if ($row['file']) {
                                            echo '<td><a href="' . $row['file'] . '" target="_blank">View File</a></td>';
                                        } else {
                                            echo '<td>No File</td>';
                                        }
                                    } elseif ($field_name === 'start' || $field_name === 'end') {
                                        $start_date = date('Y-m-d', strtotime($row['start']));
                                        $end_date = date('Y-m-d', strtotime($row['end']));
                                        $date_range = $start_date . ' to ' . $end_date;
                                        echo '<td><span class="sp">' . $date_range . '</span></td>';
                                    } else {
                                        echo '<td><span class="sp">' . $value . '</span></td>';
                                    }
                                    echo '</tr>';
                                }
                                echo '<tr>';
                                echo '<td colspan="2">'; // This colspan will make the button span across two columns
                                ?>
                                <form action="post_update.php" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="application_id" value="<?php echo $row['application_id']; ?>">
                                    <input type="hidden" name="name" value="<?php echo $name; ?>">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <input type="hidden" name="shift" value="<?php echo $shift; ?>">
                                    <input type="hidden" name="department" value="<?php echo $department; ?>">
                                    <input type="hidden" name="dataToSend" value="<?php echo $app_id; ?>">


                                    <input type="file" name="file" accept=".pdf"> <!-- File upload input field -->
                                    
                                    <button class="green-button" type="submit" name="submit">Apply</button>
                                </form>

                                <?php

                                echo '</td>';
                                echo '</tr>';

                                ?>

                            </table>

                        </div>
                <?php
                    }
                } else {
                    // No waiting forms message with additional content
                    echo '<div class="no-forms-message">';
                    echo '<span class="icon">&#128712;</span>';
                    echo '<p>No pending post leave forms.</p>';
                    echo '</div>';
                }

                ?>

                <script>
                    // JavaScript to scroll to the desired form based on URL parameter
                    document.addEventListener("DOMContentLoaded", function() {
                        var urlParams = new URLSearchParams(window.location.search);
                        var focusFormIndex = urlParams.get('focus');

                        if (focusFormIndex !== null) {
                            var formToFocus = document.getElementById('form-' + focusFormIndex);
                            if (formToFocus !== null) {
                                formToFocus.scrollIntoView();
                            }
                        }
                    });
                </script>

                <!-- ... Your existing HTML and PHP code ... -->
            </div>
        </div>
    </body>

    </html>
<?php
} else {
    header("location:../Login/home.php");
}
?>