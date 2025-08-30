<?php
include("../db.php");
function updateProduct($kp,$np,$s,$h,$stok,$j) {
    global $conn;
    $sql = "update products set
    nama_produk = '$np' ,
    satuan = '$s',
    harga = $h,
    stok = $stok,
    kode_jenis = '$j'
    where kode_produk ='$kp'";

    try{
        mysqli_query($conn,$sql);
        echo "sukses";
    }catch(mysqli_sql_exception $e){
        echo 'gagal' . $e . '<br>';
    }

    

}