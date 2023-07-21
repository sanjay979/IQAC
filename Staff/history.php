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

        <link rel="stylesheet" href="accepted.css">
        <link rel="stylesheet" href="accepted1.css">
        <title>History of Applications</title>
    </head>

    <body>
        <?php include "Sidebar.php"; ?>
        <div class="main-content">
            <?php include "header.php"; ?>
            <main>
                <h2>Post leave History</h2>
                <?php include("..//database/Databasedemo.php");
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $id = $_SESSION['s_id'];


                $sql = "SELECT * FROM leave_details where id='$id' and hod=0 or iqac=0 or iqac=1";
                $result = mysqli_query($conn, $sql);
                // Generate the HTML table
                $html = '<div class="table-responsive">';
                $html .= '<table class="table table-striped table-bordered">';
                $html .= '<thead class="thead-dark">';
                $html .= '<tr>';
                $html .= '<th>S.N</th>';
                $html .= '<th>Staff Name</th>';
                $html .= '<th>Staff ID</th>';
                $html .= '<th>shift</th>';
                $html .= '<th>Document</th>';
                $html .= '<th>Status</th>';

                $html .= '</tr>';
                $html .= '</thead>';
                $html .= '<tbody>';

                $serialNumber = 1; // Initialize the serial number

                while ($row = mysqli_fetch_assoc($result)) {
                    $html .= '<tr id="row_' . $row['application_id'] . '">';
                    $html .= '<td>' . $serialNumber . '</td>'; // Add the serial number column
                    $html .= '<td>' . $row['name'] . '</td>';
                    $html .= '<td>' . $row['id'] . '</td>';
                    $html .= '<td>' . $row['shift'] . '</td>';
                    $html .= '<td>';

                    if (!empty($row['file'])) {
                        $html .= '<a href="' . $row['file'] . '" target="_blank">View File</a>';
                    } else {
                        $html .= 'No File Available';
                    }
                    $html .= '</td>';
                    $html .= '<td>';
                    if($row['iqac']==1){
                    $html .= '<p class="completed">completed</p>';
                    }elseif ($row['hod']==0) {
                        $html .= '<p class="rejected" >Rejected by HOD</p>';
                    }elseif ($row['iqac']==0) {
                        $html .= '<p class="rejected" >Rejected by IQAC</p>';
                    }else{
                        $html .= '<p>Rejected</p>';
                    }
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
            </main>
        </div>
    </body>

    </html>
<?php
} else {
    header("location:../Login/home.php");
}
?>