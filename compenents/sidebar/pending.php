<!DOCTYPE html>
<html>

<head>
    <title>Faculty Details</title>
    <link rel="stylesheet" href="pending.css">
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
        $id = "22pca115";
        $sql = "SELECT Name,id,LType,days,start,end,reason FROM faculty WHERE id='" . $id . "' AND (hod=FALSE OR aqict=FALSE OR principal=FALSE OR hod=3  or 
                 aqict=3 OR  principal=3)";

        $sql2 = "Select hod,aqict,principal from faculty where id ='" . $id . "' AND (hod=FALSE OR aqict=FALSE OR principal=FALSE OR hod=3  or 
        aqict=3 OR  principal=3)";


        $result = mysqli_query($conn, $sql);

        $result2 = mysqli_query($conn, $sql2);
        //$row = mysqli_fetch_assoc($result);

        // Display the form data in non-editable format
        while (true) {
            $row = mysqli_fetch_assoc($result);

            $row2 = mysqli_fetch_assoc($result2);
            if ($row != null) {
                //echo'playing';
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
                echo '</div>';
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

                //array storing the status of the form from the officials
                //index for each officials 0-hod , 1-aqict , 2-principal

                //echo 'hod='.$row2['hod'].' aqict='.$row2['aqict'].' pr'.$row2['principal'];
                $state = array(

                    0 => $row2['hod'],

                    1 => $row2['aqict'],

                    2 => $row2['principal'],

                );

                $steps = array(
                    array('status' => '', 'symbol' => ''),
                    array('status' => '', 'symbol' => ''),
                    array('status' => '', 'symbol' => ''),
                );

                //echo 'hod='.$row2['hod'].' and '.$state[0]; 

                for ($i = 0; $i < count($state); $i++) {
                    //echo 'hod='.$row2['hod'].' and '.$state[$i]; 

                    //echo $state[$i];
                    if ($state[$i] == 1) {
                        //echo 'playing';
                        $steps[$i][0] = 'complete';
                        $steps[$i][1] = '✔';
                    } elseif ($state[$i] == 0) {
                        $steps[$i][0] = 'failed';
                        $steps[$i][1] = '❌';
                    } else {
                        //echo 'playing';
                        $steps[$i][0] = 'pending';
                        $steps[$i][1] = '!';
                    }
                }
                echo '<div class="progress-bar">';

                /*
                foreach ($steps as $step){
                    echo '<div class="step '.$step[0].'">';
                    echo $step[1];
                    echo '</div>';
                }
                */

                echo '
                <div class="progress-bar">
  <div class="step completed">
    <span class="step-circle">'.$steps[0][1].'</span>
    <span class="step-label">'.$steps[0][0].'</span>
  </div>
  <div class="line"></div>
  <div class="step pending">
    <span class="step-circle">'.$steps[1][1].'</span>
    <span class="step-label">'.$steps[1][0].'</span>
  </div>
  <div class="line"></div>
  <div class="step">
    <span class="step-circle">'.$steps[2][1].'</span>
    <span class="step-label">'.$steps[2][0].'</span>
  </div>
</div>

';

                echo '</div>';


                echo '</div>';     //for button container 



                echo '</div>';     // for fieldset box container
                // echo '</div>';     // for form body
                echo '</div>';     // for form container
            } else break;
        }
        // Close the database connection
        mysqli_close($conn);
        ?>
    </div>

</body>

</html>