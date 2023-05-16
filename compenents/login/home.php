<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <title>Sjc login page</title>
</head>

<body>

    <div class="circle"></div>
    <div class="card">
        <h1 style="margin-top: -30%;">St.joseph's college</h1>
        <h2>Login page</h2>
        <form class="form" action="database_connect.php" method="post">
            <input type="text" placeholder="username" name="username" required>
            <input type="password" placeholder="Password" name="password" required>
            <button type="submit" name='submit'>SIGN UP</button>
        </form>
        <footer>
            forgot password
            <a href="#">click here</a>
        </footer>
    </div>
</body>

</html>