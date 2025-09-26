<?php 

include('../db.php');
echo 'hello world';
header("Location:/shop")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="text" name="kp" placeholder="Kode Produk" required>
        
        <input type="file" name="img" accept="img/*">
        <button type="submit" name="submit">upload</button> 
    </form>

    <img src="image.php?code=k98" alt="">
</body>
</html>

