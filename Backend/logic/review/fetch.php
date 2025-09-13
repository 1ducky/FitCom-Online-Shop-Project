<?php
require __DIR__ .'/../../db.php';

function Comment($code=null,$params=null) : array  {
    global $conn;

    $limit =(int) ($_GET['limit'] ?? 1);
    $offset=(int) ($_GET['offset'] ?? 0);

    if($code){
        $sql = "select r.id_user,a.user_id,r.id,r.kode_produk,r.komentar,r.rating,r.create_at,r.update_at from reviews r
        left join accounts a
        on r.id_user = a.user_id
        where kode_produk='$code'
        limit ". $limit .' offset ' . $offset;

        $result = mysqli_query($conn,$sql);
        $data = mysqli_fetch_all($result,MYSQLI_ASSOC);

        $sql='select count(*) as total from products';
        $result = mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($result);
        $total=$row['total'];

        return [$data,$total,$limit,$offset];
    }

    return[];

}