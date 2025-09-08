<?php
require('../db.php');



if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){


    $email= filter_input(INPUT_POST,'email', FILTER_SANITIZE_EMAIL);
    $password= filter_input(INPUT_POST,'password', FILTER_SANITIZE_SPECIAL_CHARS);

    
    if(empty($email) || empty($password)){
        echo 'Could not run Sign-in Proccess';
        return;
    }
    
    $hash=password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT into accounts (email,password) 
    values('$email','$hash')";
    mysqli_query($conn, $sql);
    echo "succses";
    header("Location: ../../login.php?success=Account created successfully. Please log in.");



}