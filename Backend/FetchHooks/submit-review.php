<?php
session_start();
require('../db.php');

// pastikan login
if (!isset($_SESSION['id_user'])) {
    header("Location: ../../account/login/index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kode_produk = mysqli_real_escape_string($conn, $_POST['kode_produk']);
    $id_user = (int) $_POST['id_user'];
    $rating = (int) $_POST['rating'];
    $comment = mysqli_real_escape_string($conn, $_POST['comment']);

    if ($kode_produk && $id_user && $rating && $comment) {
        $sql = "INSERT INTO reviews (kode_produk, id_user, rating, comment) 
                VALUES ('$kode_produk', '$id_user', '$rating', '$comment')";
        if (mysqli_query($conn, $sql)) {
            header("Location: /produk/detail.php?code=$kode_produk&review=success");
            exit();
        } else {
            echo "Gagal simpan ulasan: " . mysqli_error($conn);
        }
    } else {
        echo "Data tidak lengkap!";
    }
}
?>
