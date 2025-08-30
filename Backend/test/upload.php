<?php

require('../db.php');

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['img'])){
    $code = $_POST['kp'];
    $tmpPath = $_FILES['img']['tmp_name'];
    $type=mime_content_type($tmpPath);
    $image=file_get_contents($tmpPath);
    
    $sql = "INSERT INTO image (type,kode_gambar,gambar) values(?,?,?)";
    $stmt= $conn->prepare($sql);
    $stmt-> bind_param("sss", $type, $code,$image);

    //kirim data binary
    $stmt->send_long_data(2,$image);

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
