<?php
include('alert.php')
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="style1.css">
    <title>Sjc login page</title>
</head>

<body>

    <div class="circle"></div>
    <div class="card">
        <img src="../assets/sjcbanner_10 (1).jpg" height="200px" width="400px" style="margin-top: -130px;">
        <!-- <h1 style="margin-top: -30%;">St.joseph's college</h1> -->
        <h2 style="margin-top: 15px;">Login page</h2>
        <form class="form" action="insert.php" method="POST">
            <input type="text" placeholder="username" name="username" required>
            <input type="password" placeholder="Password" name="password" id="id_password" required>
            <div style="height: 25px; width: 25px; margin-left:87%; margin-top:-13%">
                <i class="far fa-eye" id="togglePassword" style="cursor: pointer; font-size: 27px;"></i>
            </div>


            <script>
                const togglePassword = document.querySelector('#togglePassword');
                const password = document.querySelector('#id_password');

                togglePassword.addEventListener('click', function(e) {
                    // toggle the type attribute
                    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                    password.setAttribute('type', type);
                    // toggle the eye slash icon
                    this.classList.toggle('fa-eye-slash');
                });
            </script>

            <button type="submit" name='submit'>LOGIN</button>
        </form>
        <footer>
            forgot password
            <a href="#">click here</a>
        </footer>
    </div>
</body>

</html>