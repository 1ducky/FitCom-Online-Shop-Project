<!-- load env file -->
<?php 
include (__DIR__ . './envloader.php');
$basepath=$env['ROOT_PATH'].$env['MAIN_PATH'];
$basedir=dirname(__DIR__   );
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Pertanian Online - GreenCore</title>
    <!-------- Icon --------->
    <link rel="icon" type="image/png" href="<?= $basepath?>/assets/brand-img.png"/>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= $basepath?>/css/navbar.css">
    <link rel="stylesheet" href="<?= $basepath?>/css/style.css">
    <link rel="stylesheet" href="<?= $basepath?>/css/carousel.css">
    <link rel="stylesheet" href="<?= $basepath?>/css/promo.css">
</head>

