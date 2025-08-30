<?php
include("../db.php");

function insertImage($kode,$type,$blob) {
    global $conn;    
    $sql = "INSERT INTO image (type,kode_gambar,gambar) values(?,?,?)";
    $stmt= $conn->prepare($sql);
    $stmt-> bind_param("sss", $type, $kode,$blob);

    //kirim data binary
    $stmt->send_long_data(2,$blob);

    try{
        if($stmt->execute()){
            echo 'gambar berhasil';
        }else{
            echo 'Gambar Gagal' . $stmt->error;
        }
    }catch(mysqli_sql_exception $e) {
        echo 'error:' . $e;
    }
}