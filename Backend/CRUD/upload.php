<?php
require ("../db.php");
session_start(); // biar bisa ambil user_id dari session

// ambil user_id dari session
    $user_id = $_SESSION['user_id'] ?? null;

    if(!$user_id){
        header("Location: ../../account/login");
    }

if(isset($_POST['submit']) ){
    $kode_produk= $_POST["kp"];
    $nama_produk= $_POST["np"];
    $satuan= $_POST["s"];
    $harga= $_POST["h"];
    $stok= $_POST["stok"];
    $kode_jenis= $_POST["j"];

    $image=null;
    $type=null;

    if( isset($_FILES['img']) && $_FILES['img']['error'] == UPLOAD_ERR_OK) {
        $tmpPath= $_FILES['img']['tmp_name'];
        $type=mime_content_type($tmpPath);
        $image=file_get_contents($tmpPath);
    }

    

    insertProduct($user_id,$kode_produk,$nama_produk,$satuan,$harga,$stok,$kode_jenis,$image,$type);
}else{
    echo 'No Update Data';
}

function insertProduct($user_id,$kp,$np,$s,$h,$stok,$j,$image,$type){
    global $conn;
    $sql = "INSERT INTO products 
    (user_id, kode_produk,nama_produk,satuan,harga,stok,kode_jenis,gambar,type) 
    VALUES (?,?,?,?,?,?,?,?,?)";

    $null= null;

    $stmt= $conn->prepare($sql);
    $stmt -> bind_param('isssdisbs',
        $user_id, // ⬅ masukin user id sesuai session
        $kp,
        $np,
        $s,
        $h,
        $stok,
        $j,
        $null,
        $type
    );
    if($image !== null){
        $stmt->send_long_data(7,$image);
    }

    if ($stmt->execute()) {
        $stmt->close();
        header("Location: ../../list/");
        exit;
    } else {
        echo 'Upload gagal: ' . $stmt->error;
        $stmt->close();
    }
}
