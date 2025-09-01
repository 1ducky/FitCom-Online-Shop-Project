<?php
session_start();
if(isset($_SESSION['is_login'])){
    echo 'login';
}else{
    echo 'Log out';
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="Backend/Fetchhooks/login.php" method="post">

        <input type="email" name="email" id="email" placeholder="Email" required><br>
        <input type="password" name="password" id="password" placeholder="New Password" required><br>
        <input type="submit" name="submit">
            
    </form>

    <a href="logout.php">log out</a>
</body>
</html>