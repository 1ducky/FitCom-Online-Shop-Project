<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Pertanian Online - GreenCore</title>
    <!-------- Icon --------->
    <link rel="icon" type="image/png" href="./image/brand-img.png"/>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php include '../component/navbar.php'; ?>

        <!-- Offcanvas Menu -->
    <div class="offcanvas offcanvas-end offcanvas-custom" tabindex="-1" id="navtoggler" aria-labelledby="navtogglerLabel">
        <div class="offcanvas-header offcanvas-header-custom">
            <h5 class="offcanvas-title" id="navtogglerLabel">GreenCore Menu</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link nav-link-custom active" aria-current="page" href="../">
                        <i class="fas fa-home me-2"></i>Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-custom" href="../Produk/">
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

    <h1>About Test</h1>

    <?php include "../component/footer.php"; ?>

    <!-- Bootstrap & jQuery JS -->
    <script src="/js/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Jquery -->
    <script>
        $(document).ready(function(){
            
        });
    </script>
</body>
</html>