<!DOCTYPE html>
<html>

<head>
    <title>Faculty Details</title>
    <style>
        body {
            display: flex;
            flex-wrap: wrap;
            font-family: Arial, sans-serif;
            font-size: 14px;
            color: #333;
        }

        .form-container {
            flex: 0 0 350px;
            margin: 10px;
            padding: 10px;
            border: 2px solid black;
            box-sizing: border-box;
            background-color: #f9f9f9;
        }

        hr {
            border: none;
            /* Remove default border */
            border-top: 1px solid #CCCCCC;
            /* Set a solid line with light gray color */
            margin: 20px 0;
            /* Add some margin for spacing */
        }


        fieldset {
            border: none;
            padding: 0;
            margin: 0;
        }

        label {
            display: inline-block;
            width: 110px;
            font-weight: bold;
            margin-bottom: 5px;
            color: #800020;
        }

        button {
            display: inline-block;
            padding: 10px;
            margin: 10px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-primary {
            background-color: #A4D0A4;
            color: white;
        }

        .btn-secondary {
            background-color: #E06469;
            color: white;
        }

        .box-container {

            display: flex;
            flex-direction: row;
            justify-content: space-between;
            margin-top: 10px;

        }

        .button-container {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            margin-top: 10px;
        }

        @media only screen and (max-width: 600px) {
            .form-container {
                flex: 1 0 100%;
            }

            .box-container,
            .button-container {
                display: block;
            }
        }

        .od-border {
            border-color: #006400;
        }

        .cl-border {
            border-color: #800080;
        }

        .form-heading {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
            text-align: center;
        }

        textarea {
            padding: 5px;
            /* Add padding for spacing within the textarea */
            font-family: Arial, sans-serif;
            /* Set the font family */
            font-size: 14px;
            /* Set the font size */
            border: 1px solid #CCCCCC;
            /* Add a border */
            border-radius: 5px;
            /* Add border radius for rounded corners */
            resize: vertical;
            /* Allow vertical resizing of the textarea */
        }

        textarea:focus {
            outline: none;
            /* Remove the default focus outline */
            border-color: #0000FF;
            /* Change the border color on focus */
        }

        .sp{
            font-family: Arial, sans-serif;
            /* Set the font family */
            font-size: 14px;
            /* Set the font size */
            /*display: inline-block;
            background-color: #FFFF00;*/
            color: #333333;
            font-weight: bold;
        }
    </style>

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

        // Define the form structure
        /*
        $form_fields = [
            'name' => ['label' => 'Name'],
            'email' => ['label' => 'Email'],
            'phone' => ['label' => 'Phone'],
            'message' => ['label' => 'Message'],
        ];
        */

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
                    echo ' od-border">';
                    echo '<h2 class="form-heading" style="color:#006400">' . strtoupper($row['LType']) . '</h2>';
                } elseif (strcasecmp($row['LType'], 'CL') == 0) {
                    echo ' cl-border"> ';
                    echo '<h2 class="form-heading" style="color:#800080">' . strtoupper($row['LType']) . '</h2>';
                }
                //heading to the form -(type of leave)
                //echo '<h2 class="form-heading">'.strtoupper($row['LType']).'</h2>';

                echo '<hr>';


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
                echo '<br><button class="btn-primary">Approve</button>';
                echo '<button class="btn-secoondary">Decline</button>';

                echo '</div>';
                echo '</div>';
                echo '</div>';
            } else break;
        }
        // Close the database connection
        mysqli_close($conn);
        ?>
    </div>

</body>

</html>