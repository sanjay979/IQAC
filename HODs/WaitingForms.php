<?php

session_start();
if ($_SESSION['s_id'] && ($_SESSION['position'] == 'hod' || $_SESSION['position'] == 'hod_dep')) {

?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Hod Approve</title>
        <link rel="stylesheet" href="WaitingForms.css">
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

                $sql = "SELECT * FROM faculty1 WHERE department='$value' and hod=1 and (aqict =3 or principal=3) ORDER BY application_id DESC";
                $result = mysqli_query($conn, $sql);

                //condition to check if there are waiting forms
                if (mysqli_num_rows($result) > 0) {

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
                //$html .= '<th>No of Days</th>';
                $html .= '<th>Reason</th>';
                $html .= '<th>Documents</th>';
                //$html .= '<th>Comments</th>';
                $html .= '<th>IQAC</th>';
                $html .= '<th>Principal</th>';

                //$html .= '<th>Approval</th>';
                $html .= '</tr>';
                $html .= '</thead>';
                $html .= '<tbody>';

                $serialNumber = 1; // Initialize the serial number

                //function to return status of the faculty forms
                function getStatusString($input)
                {
                    if ($input == 1) {
                        return '<span class="status-approved">Approved</span>';
                    } elseif ($input == 0) {
                        return '<span class="status-rejected">Rejected</span>';
                    } else {
                        return '<span class="status-pending">Pending</span>';
                    }
                }

                while ($row = mysqli_fetch_assoc($result)) {
                    $html .= '<tr id="row_' . $row['application_id'] . '">';
                    $html .= '<td>' . $serialNumber . '</td>'; // Add the serial number column
                    $html .= '<td>' . $row['name'] . '</td>';
                    $html .= '<td>' . $row['id'] . '</td>';
                    $html .= '<td>' . $row['LType'] . '</td>';
                    $html .= '<td>' . $row['start'] . '</td>';
                    $html .= '<td>' . $row['end'] . '</td>';
                    //$html .= '<td>' . $row['ndays'] . '</td>';

                    $html .= '<td>' . $row['reason'] . '</td>';

                    $html .= '<td>';

                    if (!empty($row['file'])) {
                        $html .= '<a href="' . $row['file'] . '" target="_blank">View File</a>';
                    } else {
                        $html .= 'No File Available';
                    }

                    $html .= '</td>';

                    $html .= '<td>';
                    $html .= getStatusString($row['aqict']);
                    $html .= '</td>';

                    $html .= '<td>';
                    $html .= getStatusString($row['principal']);
                    $html .= '</td>';

                    $html .= '</tr>';

                    $serialNumber++; // Increment the serial number
                }

                $html .= '</tbody>';
                $html .= '</table>';
                $html .= '</div>';

                // Output the generated HTML table
                echo $html;
            }
            else {
                // No waiting forms message with additional content
                echo '<div class="no-forms-message">';
                echo '<span class="icon">&#128712;</span>';
                echo '<p>No forms are waiting.</p>';
                echo '</div>';
            }
            

                ?>

                <script>
                    $(document).ready(function() {
                        // Add click event handler to table rows
                        $('tbody tr').click(function() {
                            // Remove any existing selected classes from other rows
                            $('tbody tr').removeClass('selected');

                            // Add selected class to the clicked row
                            $(this).addClass('selected');
                        });
                    });
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