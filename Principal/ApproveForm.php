<?php
 session_start();
 if ($_SESSION['s_id']) {
?>
<!DOCTYPE html>
<html>

<head>
    <title>Principal Approve</title>
    <link rel="stylesheet" href="ApproveForm.css">
    <link rel="stylesheet" type="text/css" href="PrincipalSideBar.css">
</head>

<body>
    <?php include 'PrincipalSideBar.php'?>
   
    <div class="main-content"> 
    <?php include 'header.php'?>
    <main>
    <?php
        // Connect to the database
        include("..//database/Databasedemo.php");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Fetch the data from the database
        
        $id=$_SESSION['s_id'];

    
        $sql = "SELECT * FROM faculty1 WHERE hod=1 and aqict=1 and principal=3";
        /*
        $sql="SELECT department FROM faculty_details where s_id='$id'";
        $result = $conn->query($sql);

            
                $row = $result->fetch_assoc();
                $value = $row['department'];
                echo  $value;
            
        
        $sql = "SELECT * FROM faculty1 WHERE department='$value' and hod=3";

        */

        $sql = "SELECT * FROM faculty1 WHERE principal=3 and aqict=1";

        $result = mysqli_query($conn, $sql);
        //$row = mysqli_fetch_assoc($result);

       
        if (isset($_POST['approve'])) {
            $itemID = $_POST['itemID'];

            // Perform the SQL update query to approve the item
            $updateQuery = "UPDATE faculty1 SET principal =1 ";

            if (!empty($_POST['feedback'])) {
                $feedback = $_POST['feedback'];
                $updateQuery .= ", Pn_feedback = '$feedback'";
            }

            $updateQuery .= " WHERE application_id = '$itemID'";
            mysqli_query($conn, $updateQuery);
        } 
        else if (isset($_POST['reject'])) {
            $itemID = $_POST['itemID'];

            // Perform the SQL update query to approve the item
            $updateQuery = "UPDATE faculty1 SET principal=0 ";

            if (!empty($_POST['feedback'])) {
                $feedback = $_POST['feedback'];
                $updateQuery .= ", Pn_feedback = '$feedback'";
            }

            $updateQuery .= " WHERE application_id = '$itemID'";

            mysqli_query($conn, $updateQuery);
        }

        //the following code till 3rd while loop are used to remove approved/rejected forms in the display

        // Get the list of approved and rejected application IDs
        $approvedIDs = array();
        $rejectedIDs = array();

        // Fetch the approved and rejected application IDs from the database
        $approvedQuery = "SELECT application_id FROM faculty1 WHERE principal = 1";
        $rejectedQuery = "SELECT application_id FROM faculty1 WHERE principal = 0";

        $approvedResult = mysqli_query($conn, $approvedQuery);
        $rejectedResult = mysqli_query($conn, $rejectedQuery);

        while ($row = mysqli_fetch_assoc($approvedResult)) {
            $approvedIDs[] = $row['application_id'];
        }

        while ($row = mysqli_fetch_assoc($rejectedResult)) {
            $rejectedIDs[] = $row['application_id'];
        }

                echo '<div class="form-container">';
                while ($row = mysqli_fetch_assoc($result)) {
                    $itemID = $row['application_id'];
                    $name = $row['name'];
                    $sID = $row['id'];

                    $dep = $row['department'];

                    $lType = $row['LType'];
                    $start = $row['start'];
                    $end = $row['end'];
                    $ndays = $row['ndays'];
                    $reason = $row['reason'];
                    
                     //to remove the approved/rejected form from the display
                     if (in_array($itemID, $approvedIDs) || in_array($itemID, $rejectedIDs)) {
                        continue;
                    }

                    echo '<div class="odForm-head">';
                    echo '<h2 class="value">' . $lType . '</h2>';
                    echo '</div>';
                    echo '<div class="card" >';
                    echo '<div class="card-content">';
                    echo '<span class="label">Staff ID : </span>';
                    echo '<span class="value">' . $sID . '</span><br>';
                    
                    //adding name
                    echo '<span class="label">Name : </span>';
                    echo '<span class="value">' . $name . '</span><br>';
                    
                    //adding department
                    echo '<span class="label">Department : </span>';
                    echo '<span class="value">' . $dep . '</span><br>';
                    

                    echo '<span class="label">Leave Type : </span>';
                    echo '<span class="value">' . $lType . '</span><br>';
                    echo '<span class="label">Start Date : </span>';
                    echo '<span class="value">' . $start . '</span><br>';
                    echo '<span class="label">End Date : </span>';
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