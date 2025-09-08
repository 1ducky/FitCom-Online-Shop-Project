<?php if (session_status() === PHP_SESSION_NONE) session_start(); ?>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <div class="brand-img">GREEN CORE</div>
        </a>

        <!-- Search Box (desktop) -->
        <div class="d-none d-lg-flex align-items-center flex-grow-1 mx-lg-4">
            <div class="input-group">
                <input type="search" 
                       name="query" 
                       id="searchInputDesktop" 
                       class="form-control search-custom ms-lg-5" 
                       placeholder="Cari Produk" 
                       required>
                <button class="btn btn-success" id="searchBtnDesktop">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>

        <!-- Search Icon (mobile) -->
        <button class="btn btn-success d-lg-none me-2" id="mobileSearchBtn">
            <i class="fas fa-search"></i>
        </button>

        <!-- Toggler -->
        <button class="navbar-toggler navbar-toggler-custom" type="button" data-bs-toggle="offcanvas" data-bs-target="#navtoggler" aria-controls="navtoggler">
            <i class="fas fa-bars"></i>
        </button>
    </div>
</nav>

<!-- Search input muncul saat icon ditekan (mobile) -->
<div id="mobileSearchBox" class="d-lg-none px-3 py-2 bg-light d-none">
    <div class="input-group">
        <input type="text" 
               name="query" 
               id="searchInputMobile" 
               class="form-control" 
               placeholder="Cari Produk" 
               required>
        <button class="btn btn-success" id="searchBtnMobile">
            <i class="fas fa-search"></i>
        </button>
    </div>
</div>

<!-- Offcanvas Menu -->
<div class="offcanvas offcanvas-end offcanvas-custom" tabindex="-1" id="navtoggler" aria-labelledby="navtogglerLabel">
    <div class="offcanvas-header offcanvas-header-custom">
        <h5 class="offcanvas-title" id="navtogglerLabel">GreenCore Menu</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link nav-link-custom active" aria-current="page" href="<?= $basepath?>/">
                    <i class="fas fa-home me-2"></i>Home
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-link-custom" href="<?= $basepath?>/Produk">
                    <i class="fas fa-seedling me-2"></i>Produk
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-link-custom" href="<?= $basepath?>/tentang">
                    <i class="fas fa-info-circle me-2"></i>Tentang Kami
                </a>
            </li>
            <li class="nav-item">
                <?php if (isset($_SESSION['is_login']) && $_SESSION['is_login']): ?>
                    <a class="nav-link nav-link-custom" href="<?= $basepath ?>/logout.php">
                        <i class="fas fa-sign-out-alt me-2"></i>Log out
                    </a>
                <?php else: ?>
                    <a class="nav-link nav-link-custom" href="<?= $basepath ?>/login.php">
                        <i class="fas fa-sign-in-alt me-2"></i>Sign in
                    </a>
                <?php endif; ?>
            </li>
        </ul>
    </div>
</div>

<script>
        $(document).ready(function(){
    function doSearch(keyword){
        if(keyword){
            window.location.href = "<?= $basepath ?>/pencarian/index.php?query=" + encodeURIComponent(keyword);
        }
    }

    // Desktop
    $("#searchInputDesktop").on("keypress", function(e){
        if(e.which === 13){ 
            e.preventDefault();
            doSearch($(this).val().trim());
        }
    });
    $("#searchBtnDesktop").on("click", function(){
        doSearch($("#searchInputDesktop").val().trim());
    });

    // Mobile: tombol buka/tutup search
    $("#mobileSearchBtn").on("click", function(){
        $("#mobileSearchBox").toggleClass("d-none");
        $("#searchInputMobile").focus();
    });

    // Mobile: enter + klik
    $("#searchInputMobile").on("keypress", function(e){
        if(e.which === 13){
            e.preventDefault();
            doSearch($(this).val().trim());
        }
    });
    $("#searchBtnMobile").on("click", function(){
        doSearch($("#searchInputMobile").val().trim());
    });
});
</script>
