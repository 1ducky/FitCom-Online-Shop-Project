<?php
include("../db.php");
function insertProduct($kp,$np,$s,$h,$stok,$j) {
    global $conn;
    $sql = "insert into products (kode_produk,nama_produk,satuan,harga,stok,kode_jenis) 
    values ('$kp','$np','$s',$h,$stok,'$j')";

    try{
        mysqli_query($conn,$sql);
        echo "sukses";
    }catch(mysqli_sql_exception $e){
        echo 'gagal' . $e . '<br>';
    }

    

}