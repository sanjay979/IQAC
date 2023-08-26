<?php
session_start();
if ($_SESSION['s_id'] && $_SESSION['position'] == 'staff') {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Post Pending Application</title>
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
                $sql = "SELECT * FROM leave_details WHERE id = '" . $id . "' AND (hod <>0 and iqac = 3 )ORDER BY application_id DESC";
                $result = mysqli_query($conn, $sql);


                $numRows = mysqli_num_rows($result);
                if ($numRows > 0) {
                // Display the form data in a table format
                while ($row = mysqli_fetch_assoc($result)) {
                    $approvalStatus = array();
                    $officials = array('HOD', 'IQAC');
                    $officialKeys = array('hod', 'iqac');
                    $official_fb = array('H_feedback', 'IC_Feedback');

                    foreach ($officialKeys as $key) {
                        if ($row[$key] == 1) {
                            $approvalStatus[] = 'Approved';
                        } elseif ($row[$key] == 0) {
                            $approvalStatus[] = 'Declined';
                        } else {
                            $approvalStatus[] = 'Pending';
                        }
                    }
                ?>
                    <div class="form-container">
                        <table>
                            <?php
                            $form_fields = [
                                //'fieldname' => ['labelName' => 'field_data['labelName']']  (pattern)
                                
                                'application_id' => ['label' => 'application_id'],
                                //'LType' => ['label' => 'Leave-Type'],
                                'shift' => ['label' => 'Shift'],
                                //'start' => ['label' => 'Date'],
                                //'ndays' => ['label' => 'No of Days'],
                                //'reason' => ['label' => 'Reason'],
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

                            // Display the approval status for each official
                            foreach ($officials as $index => $official) {
                                $status = $approvalStatus[$index];
                                echo '<tr>';
                                echo '<td><label>' . $official . '</label></td>';
                                echo '<td colspan="3"><span class="approval-status ' . strtolower($status) . '">' . $status . '</span><br>
                                ' . $row[$official_fb[$index]] . '
                                </td>';
                                echo '</tr>';
                            }


                            ?>
                        </table>
                    </div>

                <?php
                }
            }
            else {
                // No waiting forms message with additional content
                echo '<div class="no-forms-message">';
                echo '<span class="icon">&#128712;</span>';
                echo '<p>No pending post leave Submissions.</p>';
                echo '</div>';
            }

                // Close the database connection
                mysqli_close($conn);
                ?>
            </div>
        </div>
    </body>

    </html>
<?php
} else {
    header("location:../Login/home.php");
}
?>