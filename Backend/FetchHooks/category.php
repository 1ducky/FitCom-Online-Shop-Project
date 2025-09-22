<?php
require("./db.php");

function category( $category ):array {
    global $conn;

    $limit =(int) ($_GET['limit'] ?? 1);
    $offset=(int) ($_GET['offset'] ?? 0);
    $order=(string) ($_GET['order'] ?? 'desc');
    $price= $_GET['price'] ?? null;


    
    if($category){
        $sql = "select kode_produk,nama_produk,satuan,harga,stok,p.kode_jenis,c.kode_jenis,c.kriteria from products p 
        left join category c
        on p.kode_jenis = c.kode_jenis
        where p.kode_jenis = '".$category. "'
        order by ". ($price ? "harga $price," : '') ."COALESCE(update_at,create_at) $order" . ' limit '. $limit .' offset ' . $offset;
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_all($result,MYSQLI_ASSOC);
        
        $sql="select count(*) as total from products where kode_jenis = '$category'";
        $result = mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($result);
        $total=$row['total'];

        return [$data,$total,$limit,$offset];
    }
    return [];
}
?>