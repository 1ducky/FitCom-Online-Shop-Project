<?php
require ("../db.php");
require ("insert/products.php");
require ("insert/image.php");

echo'<pre>';
print_r($_POST);
echo'</pre>';

if(isset($_POST['submit'])){
    $kode_produk= $_POST["kp"];
    $nama_produk= $_POST["np"];
    $satuan= $_POST["s"];
    $harga= $_POST["h"];
    $stok= $_POST["stok"];

    $kode_jenis= $_POST["j"];

    insertProduct($kode_produk,$nama_produk,$satuan,$harga,$stok,$kode_jenis);
}

if(isset($_POST['submit']) && isset($_FILES['img']) && $_FILES['img']['error'] == UPLOAD_ERR_OK) {
    $kode= mysqli_real_escape_string($conn, $_POST['kp']);
    $tmpPath= $_FILES['img']['tmp_name'];
    $type=mime_content_type($tmpPath);
    $image=file_get_contents($tmpPath);

    insertImage($kode,$type,$image);


};


echo 'hello world';