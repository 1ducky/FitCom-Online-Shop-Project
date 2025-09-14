<?php

require('./db.php');

function Detail($method=null,$params=null) : array  {
    global $conn;

    $limit =(int) ($_GET['limit'] ?? 1);
    $offset=(int) ($_GET['offset'] ?? 0);
    $order=(string) ($_GET['order'] ?? 'desc');

    if(!$method){
        $sql = "select kode_produk,nama_produk,satuan,harga,stok,update_at,create_at,p.kode_jenis,c.kode_jenis,c.kriteria from products p
        left join category c
        on p.kode_jenis = c.kode_jenis 
        order by COALESCE(update_at,create_at) $order
        limit ". $limit .' offset ' . $offset;

        $result = mysqli_query($conn,$sql);
        $data = mysqli_fetch_all($result,MYSQLI_ASSOC);

        $sql='select count(*) as total from products';
        $result = mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($result);
        $total=$row['total'];

        return [$data,$total,$limit,$offset];
        
        
    }else if($method == 'search') {
        $keyword=mysqli_real_escape_string($conn,$params);
        $sql="select kode_produk,nama_produk,satuan,harga,stok,update_at,create_at,p.kode_jenis,c.kode_jenis,c.kriteria from products p
        left join category c
        on p.kode_jenis = c.kode_jenis
        where nama_produk like '%$keyword%' 
        or kode_produk like '%$keyword%'
        or p.kode_jenis like '%$keyword%'
        order by COALESCE(update_at,create_at) $order" . ' limit '. $limit .' offset ' . $offset;
        
        $result = mysqli_query($conn,$sql);
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        
        $sql="select count(*) as total from products where nama_produk like '%$keyword%' 
        or kode_produk like '%$keyword%'";
        $result = mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($result);
        $total=$row['total'];

        return [$data,$total,$limit,$offset];

    }else if($method == 'full'){
        $keyword=mysqli_real_escape_string($conn,$params);
        if(!$keyword){
            return[];
        }
        $sql="select kode_produk,nama_produk,satuan,harga,stok,p.kode_jenis,c.kode_jenis,c.kriteria from products p
        left join category c
        on p.kode_jenis = c.kode_jenis
        where kode_produk = '$keyword'" ;

        $result = mysqli_query($conn,$sql);
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $total=1;

        return [$data,$total,$limit,$offset];
    }
    return [];
    
};

?>