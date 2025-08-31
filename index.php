<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Pertanian Online - GreenCore</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/carousel.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <div class="brand-img">GREEN CORE</div>
            </a>
            
            <div class="d-flex align-items-center flex-grow-1 mx-lg-4">
                <input type="search" class="form-control search-custom ms-lg-5" placeholder="Cari Produk">
            </div>
            
            <!-- PERBAIKAN: Tombol toggle yang benar -->
            <button class="navbar-toggler navbar-toggler-custom" type="button" data-bs-toggle="offcanvas" data-bs-target="#navtoggler" aria-controls="navtoggler">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </nav>

    <!-- Offcanvas Menu -->
    <div class="offcanvas offcanvas-end offcanvas-custom" tabindex="-1" id="navtoggler" aria-labelledby="navtogglerLabel">
        <div class="offcanvas-header offcanvas-header-custom">
            <h5 class="offcanvas-title" id="navtogglerLabel">GreenCore Menu</h5>
            <!-- PERBAIKAN: Tombol close yang benar -->
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
                    <a class="nav-link nav-link-custom" href="#">
                        <i class="fas fa-seedling me-2"></i>Produk
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-custom" href="#">
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
                    <img src="https://images.unsplash.com/photo-1592841813350-8bd6dc23836c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1200&q=80" class="d-block w-100" alt="Pertanian Organik">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="fw-bold">Pertanian Organik Modern</h2>
                        <p>Dapatkan produk pertanian organik berkualitas tinggi untuk hasil panen yang melimpah</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://images.unsplash.com/photo-1625246339662-3ae4dffc3366?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1200&q=80" class="d-block w-100" alt="Pupuk Berkualitas">
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

    <!-- Bootstrap & jQuery JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JS -->
    <script>
        $(document).ready(function(){
            // Tidak perlu perubahan JavaScript
        });
    </script>
</body>
</html>