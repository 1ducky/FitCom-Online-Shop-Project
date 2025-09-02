<?php
require('../db.php');

$limit = 1;

$sql= 'select kode_produk,nama_produk,satuan,harga,stok,p.kode_jenis,c.kode_jenis,c.kriteria from products p
        left join category c
        on p.kode_jenis = c.kode_jenis limit '. $limit .' offset 1';

$result = mysqli_query($conn,$sql);
        $data = mysqli_fetch_all($result,MYSQLI_ASSOC);

        print_r($data);