<?php

require('./db.php');



function Detail($method=null,$params=null) : array  {
    global $conn;

    if(!$method){
        $sql = 'select kode_produk,nama_produk,satuan,harga,stok,p.kode_jenis,c.kode_jenis,c.kriteria from products p
        left join category c
        on p.kode_jenis = c.kode_jenis ';
        $result = mysqli_query($conn,$sql);

        $data = mysqli_fetch_all($result,MYSQLI_ASSOC);
        return $data;
        
    }else if($method == 'date'){
        $sql = "select kode_produk,nama_produk,satuan,harga,stok,p.kode_jenis,c.kode_jenis,c.kriteria from products p 
        left join category c
        on p.kode_jenis = c.kode_jenis
        order by update_at $params";
        $result = mysqli_query($conn,$sql);
    
        $data = mysqli_fetch_all($result,MYSQLI_ASSOC);
        
        return $data;
    }else if($method == 'search') {
        $keyword=mysqli_real_escape_string($conn,$params);
        $sql="select kode_produk,nama_produk,satuan,harga,stok,p.kode_jenis,c.kode_jenis,c.kriteria from products p
        left join category c
        on p.kode_jenis = c.kode_jenis
        where nama_produk like '%$keyword%' 
        or kode_produk like '%$keyword%'";
        
        $result = mysqli_query($conn,$sql);
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        
        return $data;

    }else if($method == 'full'){
        $keyword=mysqli_real_escape_string($conn,$params);
        if(!$keyword){
            return[];
        }
        $sql="select kode_produk,nama_produk,satuan,harga,stok,p.kode_jenis,c.kode_jenis,c.kriteria from products p
        left join category c
        on p.kode_jenis = c.kode_jenis
        where kode_produk = '$keyword'";

        $result = mysqli_query($conn,$sql);
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        
        return $data;
    }
    return [];
    
};

?>