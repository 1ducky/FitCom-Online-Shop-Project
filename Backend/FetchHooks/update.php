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

    updateProduct($kode_produk,$nama_produk,$satuan,$harga,$stok,$kode_jenis,$image,$type);
}else{
    echo 'No Update Data';
}

function updateProduct($kp,$np,$s,$h,$stok,$j,$image,$type) {
    global $conn;
    $sql ="SELECT 1 FROM products WHERE kode_produk = ?";
    
    $stmt= $conn->prepare($sql);
    $stmt->bind_param("s",$kp);
    $stmt->execute();
    $result= $stmt->get_result();

    if($result->num_rows > 0){
        if($image || $type){
            // jika ada gambar update gambar
            $sql=
            "update products set
                nama_produk = ? ,
                satuan = ?,
                harga = ?,
                stok = ?,
                kode_jenis = ?,
                gambar=?, 
                type=?
            where kode_produk =?";
            $null= null;

            $stmt= $conn->prepare($sql);
            $stmt -> bind_param('ssdisbss',
                $np,
                $s,
                $h,
                $stok,
                $j,
                $null,
                $type,
                $kp
            );
            if($image !== null || $image == 'replace'){
                $stmt->send_long_data(5,$image);
            }
            if($stmt->execute()){
            echo 'gambar berhasil';
            }else{
                echo 'gambar gagal' . $stmt->error;
            }


        }else{
            //hanya update data kecuali gambar untuk mencegah update null
            $sql = 
            "update products set
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
        
        
        



    }
}





