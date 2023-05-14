<!DOCTYPE html>
<html>

<head>
    <title>Faculty Details</title>
    <link rel="stylesheet" href="ApproveForm.css">
</head>

<body>

    <div class="container" style="margin-left: auto">

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

        
        $form_fields = [
            'Name' => ['type' => 'text', 'label' => 'Name', 'required' => true],      // the coulumn name in the table in the single quotes firstly
            'id' => ['type' => 'varchar', 'label' => 'ID', 'required' => true],
            'LType' => ['type' => 'text', 'label' => 'Leave-Type', 'required' => true],
            'days' => ['type' => 'int', 'label' => 'No of Days', 'required' => true],
            'start' => ['type' => 'date', 'label' => 'From', 'required' => true],
            'end' => ['type' => 'date', 'label' => 'To', 'required' => true],
            'reason' => ['type' => 'text', 'label' => 'Reason', 'required' => false],

        ];


        // Fetch the data from the database
        $id = "1234567";
        $sql = "SELECT * FROM faculty WHERE hod=false";
        $result = mysqli_query($conn, $sql);
        //$row = mysqli_fetch_assoc($result);

        // Display the form data in non-editable format
        while (true) {
            $row = mysqli_fetch_assoc($result);
            if ($row != null) {
                echo '<div class="form-container';

                //to give different border color for od,cl
                if (strcasecmp($row['LType'], 'OD') == 0) {
                    echo ' od-border"> <div class="odForm-head">';
                    echo '<h2 class="form-heading">' . strtoupper($row['LType']) . '</h2>';
                    //for dif color  style="color:#006400"
                } elseif (strcasecmp($row['LType'], 'CL') == 0) {
                    echo ' cl-border"> <div class="clForm-head">';
                    echo '<h2 class="form-heading" >' . strtoupper($row['LType']) . '</h2>';
                    //for dif color  style="color:#800080"
                }
                echo'</div>';
                //heading to the form -(type of leave)
                //echo '<h2 class="form-heading">'.strtoupper($row['LType']).'</h2>';

                echo '<hr>';

                //echo '<div class="form-body">';
                echo '<div class="box-container">';
                echo '<fieldset>';
                //$i=1;
                //echo '<legend>'.$row['LType'].'</legend>';
                foreach ($form_fields as $field_name => $field_data) {
                    $value = $row[$field_name];
                    echo '<label>' . $field_data['label'] . '</label>';
                    echo '<span class="sp">' . $value . '<br></span>';
                    //if($i%2==0) echo '<br>';
                    //$i++;
                    //echo'<label></label><span></span>';
                }

                echo '</fieldset>';

                echo '<div class="button-container">';
                echo '<label>Remarks</label>';
                echo '<textarea row=3 column=10 style="resize:none; color:#333333" ></textarea>';
                
                echo '<div class="btn-phn">';
                echo '<br><button class="btn-primary ">Approve</button>';
                echo '<button class="btn-secondary ">Decline</button>';
                echo '</div>';

                echo '</div>';     //for button container 
                echo '</div>';     // for fieldset box container
                //echo '</div>';     // for form body
                echo '</div>';     // for form container
            } else break;
        }
        // Close the database connection
        mysqli_close($conn);
        ?>
    </div>

</body>

</html>