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

    <link rel="stylesheet" href="leaveform.css">
    <link rel="stylesheet" href="../compenents/sidebar/sidebar.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Responsive Registration Form</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap');

        /* Add your custom styles here */
        body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    margin: 0;
    padding: 0;
  }
  
  .form_center {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: flex-start;
    height: 100vh;
    margin-top: 23px;
  }
  
  form {
    max-width:950px;
    margin: 0 auto;
    background-color: #ffffff;
    padding: 60px;
    border-radius: 55px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Add box shadow for a subtle effect */
  }
  
  h1 {
    text-align: center;
    margin-bottom: 40px;
    margin-top: -20px;
    color: #4070f4; /* Change heading color */
  }
  
  .input-field {
    display: flex;
    flex-direction: row;
    align-items: center;
    margin-bottom: 20px;
  }
  
  .input-field label {
    font-size: 18px;
    font-weight: 445;
    color: #2e2e2e;
    width: 180px;
    margin-right: 16px;
  }
  
  .input-field input,
  textarea,
  select {
    outline: none;
    flex: 1;
    font-size: 15px;
    font-weight: 400;
    color: #333;
    border-radius: 5px;
    border: 1px solid #aaa;
    padding: 5px;
    height: 30px;
  }
  
  textarea {
    resize: vertical;
  }
  
  form button i {
    margin: 0 6px;
  }
  
  form button:hover {
    background-color: #265df2;
  }
  
  form button {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 45px;
    max-width: 200px;
    width: 100%;
    border: none;
    outline: none;
    color: #fff;
    border-radius: 5px;
    margin-top: 20px;
    background-color: #4070f4;
    transition: all 0.3s linear;
    cursor: pointer;
  }


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
  
  @media (max-width: 768px) {
    .main-content {
        padding: 20px;
    }

    .form_center {
        max-width: 100%;
    }

    .form.first .details .fields .input-field {
        width: 100%;
    }

    .submitBtn {
        margin-top: 20px;
    }
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
                <?php 
                echo $_POST['id'];
                ?>
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

                                

                                <!-- <div class="input-field">
                                    <label>Application Id</label>
                                    <input type="text" name="application_id" value="<?php echo $application_id; ?>" readonly>
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
                                    <input type="text" name="application_id" placeholder="Enter your Application Id" required>
                                </div>

                                <!-- <div class="input-field">
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
                                </div> -->
                                
                                <div class="input-field">
                                    <label>Assessment</label>
                                    <input type="text" name="assessment" placeholder="Description" required>
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

            // $leaveType = $_POST['Ltype'];
            // $startDate = $_POST['start'];
            // $endDate = $_POST['end'];
            // $numDays = $_POST['days'];
            // $reason = $_POST['reason'];
            // $hod = 3;
            // $aqict = 3;
            // $principal = 3;

            $target_directory = "../assets" . "/assets";
            $file_name = $_FILES['file']['name'];
            $file_path = $target_directory . $file_name;

            if (move_uploaded_file($_FILES['file']['tmp_name'], $file_path)) {
                // Insert form data into the database
                $sql = "INSERT INTO leave_details (Application Id,Name, id, department,Assessment,file)
                        VALUES ('$application_id','$name', '$id', '$department','$assesment','$file_path')";

                if ($conn->query($sql) === TRUE) {
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
</body>

</html>
<!-- <script>
    document.addEventListener("DOMContentLoaded", function() {
        const startDateInput = document.querySelector('input[name="start"]');
        const endDateInput = document.querySelector('input[name="end"]');
        const daysInput = document.querySelector('input[name="days"]');

        startDateInput.addEventListener("change", updateDays);
        endDateInput.addEventListener("change", updateDays);

        function updateDays() {
            const startDate = new Date(startDateInput.value);
            const endDate = new Date(endDateInput.value);
            const timeDiff = endDate.getTime() - startDate.getTime();
            const numDays = Math.ceil(timeDiff / (1000 * 3600 * 24)) + 1;
            daysInput.value = numDays;
        }
    });
</script> -->
<?php
} else {
    header("location:../Login/home.php");
}
?>
