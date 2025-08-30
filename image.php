<?php
require('db.php');

$id = htmlspecialchars($_GET['code']);
$res= $conn->query("SELECT type,gambar from image where kode_gambar='$id'");
$row = $res->fetch_assoc();

if($row){
    header("Content-Type: ".$row['type']);
    echo $row['gambar'];
}else {
    http_response_code(404);
    echo 'Image not Found';

}