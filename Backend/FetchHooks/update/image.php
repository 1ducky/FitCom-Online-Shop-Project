<?php

require("../db.php");
require("./insert/image.php");

function updateImage($kode,$type,$blob) {
    global $conn;   
    $sql ="SELECT 1 FROM image WHERE kode_gambar = ?";
    
    $stmt= $conn->prepare($sql);
    $stmt->bind_param("s",$kode);
    $stmt->execute();
    $result= $stmt->get_result();

    if($result->num_rows > 0){
        $sql = "UPDATE image set gambar=?, type=? where kode_gambar=?";
        $stmt= $conn->prepare($sql);
        $null = null;
        $stmt->bind_param("bss",$null,$type,$kode);
        $stmt->send_long_data(0,$blob);
        if($stmt->execute()){
            echo 'gambar berhasil';
        }else{
            echo 'gambar gagal' . $stmt->error;
        }

    }else{
        insertImage($kode,$type,$blob);
    }

}