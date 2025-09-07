<?php
require ("../db.php");


echo'<pre>';
print_r($_POST);
echo'</pre>';

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
        $kode= mysqli_real_escape_string($conn, $_POST['kp']);
        $tmpPath= $_FILES['img']['tmp_name'];
        $type=mime_content_type($tmpPath);
        $image=file_get_contents($tmpPath);
    }

    insertProduct($kode_produk,$nama_produk,$satuan,$harga,$stok,$kode_jenis,$image,$type);
}else{
    echo 'No Update Data';
}

function insertProduct($kp,$np,$s,$h,$stok,$j,$image,$type){
    global $conn;
    $sql = "insert into products 
    (kode_produk,nama_produk,satuan,harga,stok,kode_jenis,gambar,type) 
    values (?,?,?,?,?,?,?,?)";
    $null= null;

    $stmt= $conn->prepare($sql);
    $stmt -> bind_param('sssdisbs',
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
        $stmt->send_long_data(6,$image);
    }
    if($stmt->execute()){
        echo 'Upload Berhasil';
    }else{
        echo 'Upload gagal' . $stmt->error;
    }
}


