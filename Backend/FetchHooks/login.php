<?php
session_start();
require('../db.php');

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
    $email= filter_input(INPUT_POST,'email', FILTER_SANITIZE_EMAIL);
    $password= filter_input(INPUT_POST,'password', FILTER_SANITIZE_SPECIAL_CHARS);

    
    if(empty($email) || empty($password)){
        echo 'Could not run log-in Proccess';
        return;
    }

    $sql= "SELECT * from accounts where email='$email'";
    $result=mysqli_query($conn, $sql);
    $data= mysqli_fetch_all($result, MYSQLI_ASSOC);
    if(password_verify($password,$data[0]["password"])){
        echo 'berhasil';
        $_SESSION['user_id']=$data[0]['user_id'];
        $_SESSION['email']=$data[0]['email'];
        $_SESSION['is_login']=$data[0]['user_id'];
        header("Location: ../../login.php");
    }else{
        echo 'salah';
    }
    print_r($data);
    print_r($_SESSION);
}