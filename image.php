<?php
require('backend/db.php');

$id = htmlspecialchars($_GET['code']);
$res= $conn->query("SELECT type,gambar,kode_produk from products where kode_produk='$id'");
$row = $res->fetch_assoc();

if(isset($row['gambar'])){
    header("Content-Type: ".$row['type']);
    echo $row['gambar'];
}else {
    http_response_code(404);
    echo 'Image not Found';
}