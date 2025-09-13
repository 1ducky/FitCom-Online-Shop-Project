<?php
require __DIR__ .'/../../db.php';

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
    $kode_produk=$_POST['kp'] ?? $_GET['kp'];
    $id_user=$_POST['userid'] ?? '';
    $method=$_GET['method'];

    $cid=$_GET['id'] ?? null;

    

    //check login user
    if(!isset($id_user)) header("Location: ../../../account/login");

    $rating=(float) $_POST['rate'] ?? null;
    $longtext=$_POST['text'] ?? '';
    // echo $method,$cid;
    // var_dump($_POST);

    //Checking valid user id

    $stmt = $conn->prepare("SELECT user_id FROM accounts WHERE user_id = ? LIMIT 1");
    $stmt->bind_param("i", $id_user);
    $stmt->execute();
    $result = $stmt->get_result();
    $account = $result->fetch_assoc();

    if($account){
        echo 'akun ketemu';
        $stmt = $conn->prepare("SELECT kode_produk FROM products WHERE kode_produk = ? LIMIT 1");
        $stmt->bind_param("s", $kode_produk);
        $stmt->execute();
        $result = $stmt->get_result();
        $produk = $result->fetch_assoc();
        if($produk){
            if($method == 'upload'){
                upload($kode_produk,$id_user,$longtext,$rating);
            }
            else if($method == 'update'){
                update($longtext,$rating,$cid);
            }
            else if($method == 'delete'){
                delete($cid);
            }
            header("Location: ../../../produk/detail?code=$kode_produk");
            
        }else{
            // tidak ditemukan kode produk, dicurigai celah
            header("Location: ../../../produk/");
        }
        
    }
    else{
        // user belum login
        header("Location: ../../../account/login") ;
    }
}

function upload($kode_produk, $id_user,$longtext,$rating){
    // backend/logic/review.php?method=upload
    global $conn;
    if(!isset($kode_produk, $id_user,$longtext,$rating)){
        echo 'kosong';
    }
    $sql="INSERT INTO reviews(kode_produk,id_user,komentar,rating) 
        VALUES('$kode_produk','$id_user','$longtext',$rating) ";
    if(mysqli_query($conn,$sql)){
        echo 'berhasil';
    }else{
        echo 'gagal';
    }

}
function update($longtext,$rating,$cid){
    //  backend/logic/review.php?method=upload&id=1&kp=p001
    global $conn;
    if(!isset($longtext,$rating,$cid)){
        echo 'kosong';
    }
    $sql="UPDATE reviews set 
        komentar = '$longtext',
        rating = $rating
        where id=$cid
        ";
    if(mysqli_query($conn,$sql)){
        echo 'berhasil';
    }else{
        echo 'gagal';
    }

}
function delete($cid){
    //  backend/logic/review.php?method=delete&id=1&kp=p001
    global $conn;
    if(!isset($cid)){
        echo 'kosong';
    }
    $sql="DELETE FROM reviews
        where id=$cid";
    if(mysqli_query($conn,$sql)){
        echo 'berhasil';
    }else{
        echo 'gagal';
    }
}
?>