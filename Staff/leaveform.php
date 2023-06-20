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

        <link rel="stylesheet" href="leaveform.css">
        <link rel="stylesheet" href="../compenents/sidebar/sidebar.css">
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

        <title>Responsive Registration Form</title>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap');

            /* Add your custom styles here */

            .success-message {
                background-color: #4CAF50;
                color: #ffffff;
                padding: 10px;
                text-align: center;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                z-index: 9999;
            }

            .error-message {
                background-color: #f44336;
                color: #ffffff;
                padding: 10px;
                text-align: center;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                z-index: 9999;
            }
        </style>
    </head>

    <body>
        <?php include "Sidebar.php"; ?>

        <div class="main-content">
            <?php include "header.php"; ?>
            <?php
            include("..//database/Databasedemo.php");
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $id = $_SESSION['s_id'];
            $query = "SELECT * FROM faculty_details WHERE s_id = '$id'";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $name = $row['name'];
                $id = $row['s_id'];
                $department = $row['department'];

                // Other fields to be fetched from the faculty_details table

                // Close the database connection
                $conn->close();
            } else {
                $name = 'error';
                $id = 'error';
                $department = 'error';
            }
            ?>
            <main>
                <div class="form_center">
                    <h1>Leave Form</h1>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                        <div class="form first">
                            <div class="details personal">
                                <span class="title">Leave Details</span>

                                <div class="fields">
                                    <div class="input-field">
                                        <label>Staff Name</label>
                                        <input type="text" name="name" value="<?php echo $name; ?>" readonly>
                                    </div>

                                    <div class="input-field">
                                        <label>Staff Id</label>
                                        <input type="text" name="id" value="<?php echo $id; ?>" readonly>
                                    </div>

                                    <div class="input-field">
                                        <label>Department</label>
                                        <input type="text" name="department" value="<?php echo $department; ?>" readonly>
                                        <?php /*
                                    <select name="department" required>
                                        <option disabled selected>Select Department</option>
                                        <option>Computer Science</option>
                                        <option>Physics</option>
                                        <option>Chemistry</option>
                                        <option>Botany</option>
                                    </select>
                                    */ ?>
                                    </div>

                                    <div class="input-field">
                                        <label>Leave type</label>
                                        <select name="Ltype" required>
                                            <option disabled selected>--Select--</option>
                                            <option>OD</option>
                                            <option>CL</option>
                                            <option>ML</option>
                                        </select>
                                    </div>

                                    <div class="input-field">
                                        <label>From date</label>
                                        <input type="date" name="start" placeholder="from" required>
                                    </div>

                                    <div class="input-field">
                                        <label>To date</label>
                                        <input type="date" name="end" placeholder="to" required>
                                    </div>

                                    <div class="input-field">
                                        <label>No of Days</label>
                                        <input type="number" name="days" placeholder="Enter number of days" readonly>
                                    </div>

                                    <div class="input-field">
                                        <label>Reason</label>
                                        <input type="text" name="reason" placeholder="Enter your reason" required>
                                    </div>

                                    <div class="input-field">
                                        <label>Upload</label>
                                        <input type="file" name="file" accept="application/pdf">
                                    </div>
                                </div>
                            </div>

                            <button type="submit" name="submit" class="submitBtn">
                                <span class="btnText">Submit</span>
                                <i class="uil uil-navigator"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </main>

            <?php
            if (isset($_POST['submit'])) {
                include("..//database/Databasedemo.php");
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $leaveType = $_POST['Ltype'];
                $startDate = $_POST['start'];
                $endDate = $_POST['end'];
                $numDays = $_POST['days'];
                $reason = $_POST['reason'];
                $hod = 3;
                $aqict = 3;
                $principal = 3;

                $target_directory = "../assets" . "/assets";
                $file_name = $_FILES['file']['name'];
                $file_path = $target_directory . $file_name;

                if (move_uploaded_file($_FILES['file']['tmp_name'], $file_path)) {
                    // Insert form data into the database
                    $sql = "INSERT INTO faculty1 (Name, id, department, LType, start, end, ndays, reason, file)
                        VALUES ('$name', '$id', '$department', '$leaveType', '$startDate', '$endDate', '$numDays', '$reason', '$file_path')";

                    if ($conn->query($sql) === TRUE) {
                        $successMessage = "Leave application submitted successfully.";
                    } else {
                        $errorMessage = "Error: " . $sql . "<br>" . $conn->error;
                    }
                } else {
                    $errorMessage = "Error uploading file.";
                }

                $conn->close();
            }
            ?>

            <?php if (isset($successMessage)) : ?>
                <div class="success-message"><?php echo $successMessage; ?></div>
                <script>
                    setTimeout(function() {
                        document.querySelector('.success-message').style.display = 'none';
                    }, 3000);
                </script>
            <?php endif; ?>

            <?php if (isset($errorMessage)) : ?>
                <div class="error-message"><?php echo $errorMessage; ?></div>
                <script>
                    setTimeout(function() {
                        document.querySelector('.error-message').style.display = 'none';
                    }, 3000);
                </script>
            <?php endif; ?>
        </div>
    </body>

    </html>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const startDateInput = document.querySelector('input[name="start"]');
            const endDateInput = document.querySelector('input[name="end"]');
            const daysInput = document.querySelector('input[name="days"]');

            startDateInput.addEventListener("change", updateDays);
            endDateInput.addEventListener("change", updateDays);

            function updateDays() {
                const startDate = new Date(startDateInput.value);
                const endDate = new Date(endDateInput.value);
                const timeDifference = endDate.getTime() - startDate.getTime();
                const daysDifference = Math.ceil(timeDifference / (1000 * 3600 * 24));
                daysInput.value = daysDifference + 1;
            }
        });
    </script>
<?php
} else {
    header("location:../Login/home.php");
}
?>