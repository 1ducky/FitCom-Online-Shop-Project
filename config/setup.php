<!-- load env file & cookie remember me -->
<?php 
session_start();
require(__DIR__ . '/../Backend/db.php');

// Kalau belum login tapi ada cookie
if (!isset($_SESSION['is_login']) && isset($_COOKIE['remember_token'])) {
    $token = $_COOKIE['remember_token'];

    $stmt = $conn->prepare("SELECT user_id, email FROM accounts WHERE remember_token = ? LIMIT 1");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();
    $data   = $result->fetch_assoc();

    if ($data) {
        $_SESSION['user_id']  = $data['user_id'];
        $_SESSION['email']    = $data['email'];
        $_SESSION['is_login'] = true;
    }
}

include (__DIR__ . '/envloader.php');
$basepath=$env['ROOT_PATH'].$env['MAIN_PATH'];
$basedir=dirname(__DIR__   );
$query= $_GET;
$basequery=(string) (http_build_query($query) ?? '');
$currentPath=$_SERVER['REQUEST_URI'];
$baseurl=parse_url($currentPath,PHP_URL_PATH);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Pertanian Online - GreenCore</title>
    <!-------- Icon --------->
    <link rel="icon" type="image/png" href="<?= $basepath ?>/assets/brand-img.png"/>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= $basepath ?>/css/base.css">
    <link rel="stylesheet" href="<?= $basepath ?>/css/navbar.css">
    <link rel="stylesheet" href="<?= $basepath ?>/css/style.css">
    <link rel="stylesheet" href="<?= $basepath ?>/css/carousel.css">
    <link rel="stylesheet" href="<?= $basepath ?>/css/promo.css">
    <link rel="stylesheet" href="<?= $basepath ?>/css/tentang.css">

    <!-- Load JQuery -->
    <script src="<?= $basepath  ?>/js/jquery-3.7.1.min.js"></script>
</head>

