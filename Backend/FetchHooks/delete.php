<?php
require ("../db.php");

if(isset($_POST['submit'])){
    $kode_produk= $_POST["kp"];
    try{
        $sql = "DELETE FROM products WHERE
        kode_produk ='$kode_produk'";
        mysqli_query($conn, $sql);
        echo 'berhasil hapus produk';
        
    }catch(mysqli_sql_exception $e){
        echo 'gagal produk' . $e;
    }
    try{
        $sql = "DELETE FROM image WHERE
        kode_gambar ='$kode_produk'";
        mysqli_query($conn, $sql);
        echo 'berhasil hapus gambar';

    }catch(mysqli_sql_exception $e){
        echo 'gagal gambar' . $e;
    }
    
    
    
}