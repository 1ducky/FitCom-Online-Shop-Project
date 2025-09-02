<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Pertanian Online - GreenCore</title>
    <!-------- Icon --------->
    <link rel="icon" type="image/png" href="image/brand-img.png"/>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/carousel.css">
    <link rel="stylesheet" href="css/promo.css">
</head>
<body>
    <?php include 'component/navbar.php'; ?>

        <!-- Offcanvas Menu -->
    <div class="offcanvas offcanvas-end offcanvas-custom" tabindex="-1" id="navtoggler" aria-labelledby="navtogglerLabel">
        <div class="offcanvas-header offcanvas-header-custom">
            <h5 class="offcanvas-title" id="navtogglerLabel">GreenCore Menu</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link nav-link-custom active" aria-current="page" href="#">
                        <i class="fas fa-home me-2"></i>Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-custom" href="Produk/">
                        <i class="fas fa-seedling me-2"></i>Produk
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-custom" href="Tentang/">
                        <i class="fas fa-info-circle me-2"></i>Tentang Kami
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Carousel -->
    <div class="container mt-4 main-content">
        <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./image/pexels-arina-krasnikova-6316520.jpg" class="d-block w-100" alt="Pertanian Organik">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="fw-bold">Pertanian Organik Modern</h2>
                        <p>Dapatkan produk pertanian organik berkualitas tinggi untuk hasil panen yang melimpah</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="./image/Organik-Petrosida.png" class="d-block w-100" alt="Pupuk Berkualitas">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="fw-bold">Pupuk Berkualitas Tinggi</h2>
                        <p>Tingkatkan kesuburan tanah dengan pupuk pilihan dari para ahli</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://images.unsplash.com/photo-1574323347407-f5e1ad6d020b?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1200&q=80" class="d-block w-100" alt="Benih Unggul">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="fw-bold">Benih Unggul Terjamin</h2>
                        <p>Benih pilihan dengan kualitas terbaik untuk hasil panen optimal</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

  <!--------- Promo product ------------->
    <div class="promo-section">
        <div class="container text-center py-5">
            <h1 class="fw-bold mb-5 display-5">Promo Spesial Bulan Ini!</h1>
            <div class="row g-4 justify-content-center">
                <div class="col-lg-5 col-md-6">
                    <div class="card promo-card position-relative">
                        <span class="promo-badge">DISKON 20%</span>
                        <div class="img-container">
                            <img src="image/pexels-shvetsa-5830979.jpg" class="card-img-top" alt="Pupuk Organik">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Pupuk Organik Diskon 20%</h5>
                            <p class="card-text">Tingkatkan kesuburan tanah Anda dengan pupuk organik berkualitas tinggi.</p>
                            <a href="#" class="btn btn-success mt-auto">Beli Sekarang</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6">
                    <div class="card promo-card position-relative">
                        <span class="promo-badge">DISKON 20%</span>
                        <div class="img-container">
                            <img src="image/pexels-nadin-sh-78971847-26756785.jpg" class="card-img-top" alt="Bibit Tanaman">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Bibit Diskon 20%</h5>
                            <p class="card-text">Dapatkan bibit tanaman unggulan dengan kualitas terbaik untuk kebun Anda.</p>
                            <a href="#" class="btn btn-success mt-auto">Beli Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!--- footer -->
    <?php include "component/footer.php"?>

    <!-- Bootstrap & jQuery JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Jquery -->
    <script>
        $(document).ready(function(){
            
        });
    </script>
</body>
</html>