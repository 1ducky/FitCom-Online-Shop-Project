<!DOCTYPE html>
<html lang="en">
<?php include (__DIR__ . './../config/setup.php') ?>
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