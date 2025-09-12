<?php
session_start();
require('../db.php');

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password']; // jangan FILTER_SANITIZE_SPECIAL_CHARS, bisa bikin hash gagal
    $remember = isset($_POST['remember']);

    if(empty($email) || empty($password)){
        echo 'Email / Password tidak boleh kosong';
        exit;
    }

    // Gunakan prepared statement biar aman
    $stmt = $conn->prepare("SELECT user_id, email, password FROM accounts WHERE email = ? LIMIT 1");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();

    if($data && password_verify($password, $data["password"])){
        // Set session
        $_SESSION['user_id'] = $data['user_id'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['is_login'] = true;

        // Remember Me
        if ($remember) {
            $token = bin2hex(random_bytes(32));
            $stmt2 = $conn->prepare("UPDATE accounts SET remember_token = ? WHERE user_id = ?");
            $stmt2->bind_param("si", $token, $data['user_id']);
            
            if ($stmt2->execute()) {
                setcookie("remember_token", $token, time() + (86400 * 30), "/", "", false, true);
                // Debug cek apakah token tersimpan
                // echo "Token saved: $token";
            } else {
                echo "Error update: " . $stmt2->error;
            }
        }

        // Redirect setelah sukses
        header("Location: ../../");
        exit;
    } else {
        echo 'Email atau password salah';
        header("Location: ../../account/login?error=Invalid email or password.");
    }
}