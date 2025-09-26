<?php
require('../db.php');



if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){

    $email = filter_input(INPUT_POST,'email', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST,'password', FILTER_SANITIZE_SPECIAL_CHARS);

    if(empty($email) || empty($password)){
        echo 'Could not run Sign-in Process';
        return;
    }

    $hash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO accounts (email, password, create_at) 
            VALUES ('$email', '$hash', NOW())";

    $result = mysqli_query($conn, $sql);

    // ✅ DEBUG PART
    if ($result) {
        echo "✅ Success: Data berhasil ditambahkan<br>";
        header("Location: ../../account/login?success=Account created successfully. Please log in.");
    } else {
        echo "❌ Error Query: " . $sql . "<br>";
        echo "❌ MySQL Error: " . mysqli_error($conn) . "<br>";
    }

}
