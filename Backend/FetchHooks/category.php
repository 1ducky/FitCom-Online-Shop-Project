<?php
require("./db.php");

function category( $category ):array {
    global $conn;
    if($category){
        $sql = "select * from products p 
        left join category c
        on p.kode_jenis = c.kode_jenis
        where p.kode_jenis = '".$category. "'";
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_all($result,MYSQLI_ASSOC);
        return $data;
    }
    return [];
}
?>