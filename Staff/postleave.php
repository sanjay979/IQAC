<?php
session_start();
if ($_SESSION['s_id']) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="postleave.css">
        <link rel="stylesheet" href="../compenents/sidebar/sidebar.css">
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

        <title>Responsive Registration Form</title>
        <style>

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
                $shift = $row['shift'];


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
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                        <h1>Post Leave Form</h1>
                        <div class="form first">
                            <div class="details personal">
                                <!-- <span class="title">Leave Details</span> -->

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
                                        <label>Shift</label>
                                        <input type="text" name="id" value="<?php echo $shift; ?>" readonly>
                                    </div>

                                    <!-- <div class="input-field">
                                    <label>Application Id</label>
                                    <input type="text" name="application_id" value="<?php //echo $application_id; 
                                                                                    ?>" readonly>
                                </div> -->

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
                                        <label>Application Id</label>
                                        <select name="application_id" required>
                                            <option value="" disabled selected>Select Application Id</option>
                                            <?php
                                            include("..//database/Databasedemo.php");
                                            $id = $_SESSION['s_id'];

                                            // Query to fetch application IDs from the database
                                            $query2 = "SELECT application_id FROM faculty1 WHERE principal = 1 AND next_form = 3 AND id = '$id'";
                                            $result2 = $conn->query($query2);

                                            if ($result2) {
                                                $num_rows = $result2->num_rows; // Get the number of rows in the result set

                                                if ($num_rows > 0) {
                                                    while ($row = $result2->fetch_assoc()) {
                                                        $application_id = $row['application_id'];
                                                        echo "<option value='$application_id'>$application_id</option>";
                                                    }
                                                } else {
                                                    echo "<option value='' disabled>No Application IDs found</option>";
                                                }

                                                echo "<p>Total Application IDs: $num_rows</p>"; // Display the number of rows
                                            } else {
                                                // Handle database query error
                                                echo "<option value='' disabled>Error fetching application IDs</option>";
                                                echo "<script>alert('Error: " . $conn->error . "');</script>";
                                                // Additional debugging information
                                                echo "<script>console.log('SQL Query: " . $query2 . "');</script>";
                                            }

                                            // Close the database connection
                                            $conn->close();
                                            ?>
                                        </select>
                                    </div>



                                    <div class="input-field">
                                        <label>Assessment</label>
                                        <input type="text" name="assesment" placeholder="Description" required>
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

                $application_id = $_POST['application_id'];
                $assesment = $_POST['assesment'];


                $target_directory = "../assets" . "/postAssets";
                $file_name = $_FILES['file']['name'];
                $file_path = $target_directory . $file_name;
                $nextForm = 2;

                if (move_uploaded_file($_FILES['file']['tmp_name'], $file_path)) {
                    // Insert form data into the database
                    $sql = "INSERT INTO leave_details (application_id,name, id, shift, department,assessment,file)
                        VALUES ('$application_id','$name', '$id','$shift', '$department','$assesment','$file_path')";

                    $upQuery = "UPDATE faculty1 SET next_form='$nextForm' WHERE application_id = $application_id";

                    if ($conn->query($sql) === TRUE && $conn->query($upQuery) === TRUE) {
                        $successMessage = "certificate upload successfully.";
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

        <script>
            function updateApplicationOptions() {
                var applicationDropdown = document.getElementById("application_id");

                var xhr = new XMLHttpRequest();
                xhr.open("POST", "update_appId.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        var data = JSON.parse(xhr.responseText);

                        if (data.success) {
                            var applicationIdsToRemove = data.applicationIdsToRemove;

                            // Remove options from the dropdown that need to be removed
                            applicationIdsToRemove.forEach(function(appId) {
                                var optionToRemove = applicationDropdown.querySelector("option[value='" + appId + "']");
                                if (optionToRemove) {
                                    applicationDropdown.removeChild(optionToRemove);
                                }
                            });
                        } else {
                            console.log("Error fetching next_form values: " + data.message);
                        }
                    }
                };

                xhr.send();
            }

            // Call the updateApplicationOptions function on page load
            updateApplicationOptions();
        </script>


    </body>

    </html>

<?php
} else {
    header("location:../Login/home.php");
}
?>