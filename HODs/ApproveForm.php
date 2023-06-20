<?php
session_start();
if ($_SESSION['s_id'] && $_SESSION['position'] == 'hod') {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Hod Approve</title>
        <link rel="stylesheet" href="ApproveForm.css">
        <link rel="stylesheet" type="text/css" href="Hodsidebar.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>

    <body>
        <?php include 'Hodsidebar.php' ?>

        <div class="main-content">
            <?php include 'header.php' ?>
            <main>

                <?php
               include("..//database/Databasedemo.php");
                if (mysqli_connect_errno()) {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    exit();
                }

                // Retrieve all rows from the faculty1 table where hod=1 and hod=3
                  $id = $_SESSION['s_id'];
                $sql = "SELECT department FROM faculty_details where s_id='$id'";
                $result = $conn->query($sql);

                $row = $result->fetch_assoc();
                $value = $row['department'];

                $sql = "SELECT * FROM faculty1 WHERE department='$value' and hod=3";
                $result = mysqli_query($conn, $sql);

                // Generate the HTML table
                $html = '<div class="table-responsive">';
                $html .= '<table class="table table-striped table-bordered">';
                $html .= '<thead class="thead-dark">';
                $html .= '<tr>';
                $html .= '<th>S.N</th>';
                $html .= '<th>Staff Name</th>';
                $html .= '<th>Staff ID</th>';
                $html .= '<th>Leave Type</th>';
                $html .= '<th>Start Date</th>';
                $html .= '<th>End Date</th>';
                $html .= '<th>No of Days</th>';
                $html .= '<th>Reason</th>';
                $html .= '<th>Documents</th>';
                $html .= '<th>Comments</th>';

                $html .= '<th>Approval</th>';
                $html .= '</tr>';
                $html .= '</thead>';
                $html .= '<tbody>';

                $serialNumber = 1; // Initialize the serial number

                while ($row = mysqli_fetch_assoc($result)) {
                    $html .= '<tr id="row_' . $row['application_id'] . '">';
                    $html .= '<td>' . $serialNumber . '</td>'; // Add the serial number column
                    $html .= '<td>' . $row['name'] . '</td>';
                    $html .= '<td>' . $row['id'] . '</td>';
                    $html .= '<td>' . $row['LType'] . '</td>';
                    $html .= '<td>' . $row['start'] . '</td>';
                    $html .= '<td>' . $row['end'] . '</td>';
                    $html .= '<td>' . $row['ndays'] . '</td>';

                    $html .= '<td>' . $row['reason'] . '</td>';

                    $html .= '<td>';

                    if (!empty($row['file'])) {
                        $html .= '<a href="' . $row['file'] . '" target="_blank">View File</a>';
                    } else {
                        $html .= 'No File Available';
                    }

                    $html .= '</td>';

                    $html .= '<td>';
                    $html .= '<input type="text" name="comments[' . $row['application_id'] . ']" placeholder="Enter comments">';
                    $html .= '</td>';

                    $html .= '<td>';
                    $html .= '<form method="post">';
                    $html .= '<input type="hidden" name="leave_id" value="' . $row['application_id'] . '">';

                    // Add CSS classes to the buttons for styling
                    $html .= '<button class="approve-btn" type="button" onclick="updateApprovalStatus(' . $row['application_id'] . ', 1)">Approve</button>';
                    $html .= '<button class="reject-btn" type="button" onclick="updateApprovalStatus(' . $row['application_id'] . ', 0)">Reject</button>';

                    $html .= '</form>';
                    $html .= '</td>';
                    $html .= '</tr>';

                    $serialNumber++; // Increment the serial number
                }

                $html .= '</tbody>';
                $html .= '</table>';
                $html .= '</div>';

                // Output the generated HTML table
                echo $html;
                ?>

                <script>
                    function updateApprovalStatus(leaveID, status) {

                        var comments = $("input[name='comments[" + leaveID + "]']").val(); // Get the comments for the specific row

                        $.ajax({
                            type: 'POST',
                            url: 'update_approval.php', // PHP file to handle the update
                            data: {
                                leave_id: leaveID,
                                status: status,
                                comments: comments
                            },
                            success: function(response) {
                                // Handle the response
                                if (response === 'success') {
                                    // Remove the row from the table
                                    $('#row_' + leaveID).remove();

                                    // Update the serial numbers of remaining rows
                                    updateSerialNumbers();
                                } else {
                                    console.log(response); // Log the error message for debugging
                                }
                            }
                        });
                    }

                    function updateSerialNumbers() {
                        var rows = $('table tbody tr'); // Get all table rows

                        rows.each(function(index) {
                            $(this).find('td:first-child').text(index + 1); // Update the serial number column
                        });
                    }
                </script>

            </main>
        </div>

    </body>

    </html>
<?php
} else {
    header("location:../Login/home.php");
}
?>