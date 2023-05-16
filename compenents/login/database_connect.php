<?php
$con = mysqli_connect("localhost", "root", "", "login_database");

?>





































































<!-- <?php
        $username = $_POST["username"];
        $password = $_POST["password"];

        // Database connection
        $con = new mysqli("localhost", "root", "", "login_database");
        if ($con->connect_error) {
            die("Failed to connect: " . $con->connect_error);
        } else {
            $stmt = $con->prepare("SELECT * FROM registration WHERE email = ?");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $stmt_result = $stmt->get_result();

            if ($stmt_result->num_rows > 0) {
                $data = $stmt_result->fetch_assoc();
                if (password_verify($password, $data['password'])) {
                    echo "Login successful";
                } else {
                    echo "Invalid username or password";
                }
            } else {
                echo "Invalid username or password";
            }

            $stmt->close();
            $con->close();
        }
        ?> -->





































// $username=$_POST["username"];
// $password=$_POST["password"];

// //database connection
// $con = new mysqli("localhost","root","","login_database");
// if($con->connect_error){
// die("failed to connect :".$con->connect_error);
// }else{
// $stmt=$con->prepare("select * from registration where email=?");
// $stmt->bind_param("s",$username);
// $stmt->execute();
// $stmt_result=$stmt->get_result();
// if($stmt_result->num_rows>0){
// $data=$stmt_result->fetch_assoc();
// if($data['password']===$password) {
// echo "login successfully";
// }else{
// echo"invalid username or password";
// }
// }else{
// echo"invalid username or password";
// }
// }




























































<!-- <?php
        // Retrieve the submitted username and password
        $username = $_POST["username"];
        $password = $_POST["password"];

        // Check if both username and password are not empty
        if (!empty($username) && !empty($password)) {
            $host = "localhost";
            $dbUsername = "admin";
            $dbPassword = "admin";
            $dbname = "login_database";

            // Create connection to the database
            $conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbname);

            // Check if the connection was successful
            if (mysqli_connect_error()) {
                die('Connect Error (' . mysqli_connect_errno() . ')' . mysqli_connect_error());
            } else {
                // Sanitize user input to prevent SQL injection
                $username = mysqli_real_escape_string($conn, $username);
                $password = mysqli_real_escape_string($conn, $password);

                // Hash the password for comparison with the stored hash
                $hashedPassword = sha1($password);

                // Prepare the SQL statement
                $sql = "SELECT * FROM admin_table WHERE username='$username' AND password='$hashedPassword'";

                // Execute the query
                $result = mysqli_query($conn, $sql);

                // Check if any rows were returned
                if (mysqli_num_rows($result) == 1) {
                    echo "Login successful";
                    // Continue with further actions or redirect to another page
                } else {
                    echo "Invalid username or password";
                }

                // Free the result set
                mysqli_free_result($result);

                // Close the connection
                mysqli_close($conn);
            }
        } else {
            echo "All fields are required";
            die();
        }
        ?> -->
































// $username=$_POST["username"];
// $password=$_POST["password"];
// if(!empty($username)||($password)){
// $host="localhost";
// $dbUsername="admin";
// $dbPassword="admin";
// $dbname="login_database";
// // $sql="select * from admin where username='$username' and password='$password'";
// //create connection to the database
// $conn = mysqli_connect($host,$dbUsername,$dbPassword,$dbname);
// if (mysqli_connect_error()) {
// die('Connect Error ('. mysqli_connect_errno().')'. mysqli_connect_error());
// }else{
// $sql="select * from admin_table where username='$username' and password='$password'";
// }
// }else{
// echo"all field are required or error";
// die();
// }
?>