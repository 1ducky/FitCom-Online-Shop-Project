    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <div class="brand-img">GREEN CORE</div>
            </a>
            
            <div class="d-flex align-items-center flex-grow-1 mx-lg-4">
                <input type="search" class="form-control search-custom ms-lg-5" placeholder="Cari Produk">
            </div>
            <button class="navbar-toggler navbar-toggler-custom" type="button" data-bs-toggle="offcanvas" data-bs-target="#navtoggler" aria-controls="navtoggler">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </nav>

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