<?php if (session_status() === PHP_SESSION_NONE) session_start(); ?>

<nav class="navbar ic ic-shadow navbar-expand-lg fixed-top justify-content-around ">
    <div class="container-fluid gap-4">
        <!-- Brand -->
        <a class="d-flex gap-2" href="<?= $basepath?>/">
            <img src="<?= $basepath ?>/assets/icon.png" alt="GreenCore" class="icon">
            <div class="navbar-brand text-white">GreenCore</div>
        </a>
        <!-- Center Content -->
        <div class="flex-fill flex-column gap-2 d-flex text-white d-none d-md-block">
            <div class=" input px-2 d-flex justify-content-around align-items-center text-white flex-fill rounded-pill sc">
                <input type="text" name="" id="" class="container-fluid  sc">
                <button class="border-0 bg-transparent text-white icon "><i class="fas fa-search"></i></button>
            </div>
            <div class="link">
                <ul class="d-flex justify-content-around list-unstyled text-white">
                    <li class="text-decoration-none">Beranda</li>
                    |
                    <li class="text-decoration-none">Produk</li>
                    |
                    <li class="text-decoration-none">Keranjang</li>
                    |
                    <li class="text-decoration-none">Tentang</li>
                </ul>
            </div>
        </div>
        <!-- End Centent -->
         <div class="text-white d-flex justify-content-md-end justify-content-around flex-md-shrink-1 flex-md-shrink-0 gap-4 gap-md-0">
             <!-- Mobile Search Box -->
              <button class="rounded-circle sc d-block d-md-none me-2 icon" id="mobileSearchBtn">
                 <i class="fas fa-search"></i>
             </button>
     
             <!-- Login User -->
             <div class="d-flex flex-column justify-content-center align-content-center gap-2 ">
                 <center>
                     <img src="<?= $basepath ?>/image/notfound.jpg" alt="GreenCore" class="icon rounded-circle">
                 </center>
                 <p class="sc rounded-pill p-1 d-none d-md-block">Login/Sign-Up</p>
             </div>
     
             <!-- Mobile Menu Toggler -->
              <button class=" sc d-block d-md-none icon rounded-circle" type="button" data-bs-toggle="offcanvas" data-bs-target="#navtoggler" aria-controls="navtoggler">
                 <i class="fas fa-bars"></i>
             </button>

         </div>

    </div>
</nav>
<!-- Search input muncul saat icon ditekan (mobile) -->
<div id="mobileSearchBox" class="text-white d-lg-none px-3 py-2 bg-light d-none fixed-top z-1 ">
    <div class="input px-2 d-flex justify-content-around align-items-center text-white flex-fill rounded-pill sc">
        <button class="rounded-circle sc d-block d-md-none icon z-2" id="mobileSearchBtn">
            <
        </button>
        <input type="text" name="" id="searchInputMobile" class="container-fluid  sc">
        <button class="btn "><i class="fas fa-search"></i></button>
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
                    <a class="nav-link nav-link-custom" href="<?= $basepath ?>/account/log-out">
                        <i class="fas fa-sign-out-alt me-2"></i>Log out
                    </a>
                <?php else: ?>
                    <a class="nav-link nav-link-custom" href="<?= $basepath ?>/account/login">
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
            window.location.href = "<?= $basepath ?>/produk/pencarian/?keyword=" + encodeURIComponent(keyword);
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
