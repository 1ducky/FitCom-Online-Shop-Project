<h2>upload</h2>
<form action="Backend/CRUD/upload.php" method="post" enctype="multipart/form-data">
    <input type="text" name="kp" placeholder="Kode Produk" required>
    <input type="text" name="np" placeholder="Nama Produk" required>
    <input type="text" name="s" placeholder="Satuan" required>
    <input type="number" name="h" placeholder="Harga" required>
    <input type="number" name="stok" placeholder="Jumlah Produk" required>
    <input type="text" name="j" placeholder="Kategori" required>
    
    <input type="file" name="img" accept="img/*">
    <button type="submit" name="submit">upload</button> 
</form>

<h2>update</h2>
<form action="Backend/CRUD/update.php" method="post" enctype="multipart/form-data">
    <input type="text" name="kp" placeholder="Kode Produk" required>
    <input type="text" name="np" placeholder="Nama Produk" required>
    <input type="text" name="s" placeholder="Satuan" required>
    <input type="number" name="h" placeholder="Harga" required>
    <input type="number" name="stok" placeholder="Jumlah Produk" required>
    <input type="text" name="j" placeholder="Kategori" required>
    <input type="file" name="img" accept="img/*">

    <button type="submit" name="submit">update</button> 
</form>

<form action="Backend/CRUD/delete.php" method="post" enctype="multipart/form-data">

    <input type="text" name="kp" placeholder="Kode Produk" required>
    <button type="submit" name="submit">delete</button>
    
</form>

<h2>Comment</h2>
<form action="Backend/logic/review/review.php?method=upload&id=3" method="post" enctype="multipart/form-data">
    <input type="text" name="kp" placeholder="Kode Produk" required>
    <input type="text" name="userid" placeholder="user id" required>
    <input type="text" name="rate" placeholder="Rating" required>
    <textarea type="text" name="text" placeholder="komentar" required></textarea>
    <input type="text" name="method" placeholder="method" required>


    <button type="submit" name="submit">update</button> 
</form>

<script>
    async function fetchdata(){
        const res= await fetch('./backend/api.php/detail?limit=2&offset=1')
        const data = await res.json()
        console.log(data)
    }

    fetchdata()
</script>

<?php

    $res= file_get_contents('http://localhost/Green-Core/backend/api.php/detail');    
    $data= json_decode($res,true);
?>
<img src="image.php?code=p002" alt="">