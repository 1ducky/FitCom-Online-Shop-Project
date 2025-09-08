<?php
session_start();
require( __DIR__ . '/Backend/db.php');

if (isset($_SESSION['user_id'])) {
    $stmt = $conn->prepare("UPDATE accounts SET remember_token = NULL WHERE user_id = ?");
    $stmt->bind_param("i", $_SESSION['user_id']);
    $stmt->execute();
}

session_destroy();

setcookie("remember_token", "", time() - 3600, "/");

header("Location: index.php");
exit;
