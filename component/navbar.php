<?php 
if (session_status() === PHP_SESSION_NONE) session_start();

// Helper buat path avatar
function getAvatarUrl($avatar, $basepath) {
    if (empty($avatar)) {
        return $basepath . "/assets/default-avatar.png"; // fallback
    }
    return $basepath . "/account/profile/uploads/" . basename($avatar);
}
?>

<nav class="navbar ic ic-shadow navbar-expand-lg fixed-top">
    <div class="container-fluid justify-content-between">

        <!-- Brand -->
        <a class="d-flex gap-2 align-items-center text-white text-decoration-none" href="<?= $basepath ?>/">
            <img src="<?= $basepath ?>/assets/icon.png" alt="GreenCore" class="icon">
            <span class="navbar-brand mb-0 h1 text-white">GreenCore</span>
        </a>

        <!-- Center Content (Desktop) -->
        <div class="flex-fill mx-4 d-none d-md-block">
            <!-- Search -->
            <div class="input px-2 d-flex align-items-center text-white flex-fill rounded-pill sc mb-2">
                <input type="text" id="searchInputDesktop" class="form-control border-0 bg-transparent text-white" placeholder="Cari produk...">
                <button class="border-0 bg-transparent text-white icon" id="searchBtnDesktop">
                    <i class="fas fa-search"></i>
                </button>
            </div>
            <!-- Links -->
            <ul class="d-flex justify-content-around list-unstyled text-white mb-0">
                <li><a href="<?= $basepath ?>/" class="text-white text-decoration-none">Beranda</a></li>
                |
                <li><a href="<?= $basepath ?>/Produk" class="text-white text-decoration-none">Produk</a></li>
                |
                <li><a href="<?= $basepath ?>/keranjang" class="text-white text-decoration-none">Keranjang</a></li>
                |
                <li><a href="<?= $basepath ?>/tentang" class="text-white text-decoration-none">Tentang</a></li>
            </ul>
        </div>

        <!-- Right Side -->
        <div class="d-flex align-items-center gap-3">
            <!-- Mobile Search -->
            <button class="btn btn-sm sc d-block d-md-none icon" id="mobileSearchBtn">
                <i class="fas fa-search"></i>
            </button>

            <!-- User Login -->
            <div class="dropdown d-flex flex-row">
                <?php if (isset($_SESSION['is_login']) && $_SESSION['is_login']): ?>
                    <?php 
                        $email = $_SESSION['email']; 
                        $username = explode('@', $email)[0]; 
                        $displayName = $_SESSION['display_name'] ?? ucfirst($username);
                        $avatar = $_SESSION['avatar'] ?? null;
                        $initial = strtoupper(substr($displayName, 0, 1));
                    ?>
                    <button class="btn p-0 border-0 bg-transparent icon" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php if ($avatar): ?>
                            <img src="<?= getAvatarUrl($avatar, $basepath) ?>" 
                                 alt="Avatar" 
                                 class="rounded-circle" 
                                 style="width:40px; height:40px; object-fit:cover;">
                        <?php else: ?>
                            <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center"
                                 style="width:40px; height:40px; font-weight:bold; line-height: 1px; font-size: 16px;">
                                <?= $initial ?>
                            </div>
                        <?php endif; ?>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end bg-success" aria-labelledby="userDropdown">
                        <li class="dropdown-item-text">Hi, <?= htmlspecialchars($displayName) ?></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="<?= $basepath ?>/account/profile"><i class="fas fa-user me-2"></i>Profil</a></li>
                        <li><a class="dropdown-item" href="<?= $basepath ?>/account/log-out"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                    </ul>
                <?php else: ?>
                    <button class="btn p-0 border-0 bg-transparent dropdown-toggle" type="button" id="guestDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="<?= $basepath ?>/image/notfound.jpg" alt="Guest" class="rounded-circle" style="width:40px; height:40px; object-fit:cover;">
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="guestDropdown">
                        <li><a class="dropdown-item" href="<?= $basepath ?>/account/login"><i class="fas fa-sign-in-alt me-2"></i>Login / Sign-Up</a></li>
                    </ul>
                <?php endif; ?>
            </div>

            <!-- Mobile Menu Toggler -->
            <button class="btn sc d-block d-md-none icon rounded-circle" type="button" data-bs-toggle="offcanvas" data-bs-target="#navtoggler">
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
        <input type="text" id="searchInputMobile" class="form-control border-0 bg-transparent" placeholder="Cari produk...">
        <button class="btn" id="searchBtnMobile"><i class="fas fa-search"></i></button>
    </div>
</div>

<!-- Offcanvas Menu -->
<div class="offcanvas offcanvas-end offcanvas-custom" tabindex="-1" id="navtoggler">
    <div class="offcanvas-header">
        <a class="d-flex gap-2 align-items-center text-white text-decoration-none" href="<?= $basepath ?>/">
            <img src="<?= $basepath ?>/assets/icon.png" alt="GreenCore" class="icon">
            <span class="navbar-brand mb-0 h1 text-white">GreenCore</span>
        </a>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link nav-link-custom" href="<?= $basepath ?>/"><i class="fas fa-home me-2"></i>Home</a></li>
            <li class="nav-item"><a class="nav-link nav-link-custom" href="<?= $basepath ?>/Produk"><i class="fas fa-seedling me-2"></i>Produk</a></li>
            <li class="nav-item"><a class="nav-link nav-link-custom" href="<?= $basepath ?>/tentang"><i class="fas fa-info-circle me-2"></i>Tentang Kami</a></li>
            <li class="nav-item">
                <?php if (isset($_SESSION['is_login']) && $_SESSION['is_login']): ?>
                    <a class="nav-link nav-link-custom" href="<?= $basepath ?>/account/log-out"><i class="fas fa-sign-out-alt me-2"></i>Log out</a>
                <?php else: ?>
                    <a class="nav-link nav-link-custom" href="<?= $basepath ?>/account/login"><i class="fas fa-sign-in-alt me-2"></i>Sign in</a>
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

    // === DESKTOP SEARCH ===
    $("#searchInputDesktop").on("keypress", function(e){
        if(e.which === 13){
            e.preventDefault();
            doSearch($(this).val().trim());
        }
    });
    $("#searchBtnDesktop").on("click", function(){
        doSearch($("#searchInputDesktop").val().trim());
    });

    // === MOBILE SEARCH (pakai class .show) ===
    $("#mobileSearchBtn").on("click", function () {
        $("#mobileSearchBox").addClass("show").removeClass("d-none");
        setTimeout(() => {
            $("#searchInputMobile").focus();
        }, 300);
    });

    $("#mobileSearchClose").on("click", function () {
        $("#mobileSearchBox").removeClass("show");
        setTimeout(() => {
            $("#mobileSearchBox").addClass("d-none");
        }, 300);
    });

    $(document).on("keydown", function (e) {
        if (e.key === "Escape") {
            $("#mobileSearchBox").removeClass("show");
            setTimeout(() => {
                $("#mobileSearchBox").addClass("d-none");
            }, 300);
        }
    });

    // Enter untuk cari
    $("#searchInputMobile").on("keypress", function(e){
        if(e.which === 13){
            e.preventDefault();
            doSearch($(this).val().trim());
        }
    });

    // Klik tombol cari
    $("#searchBtnMobile").on("click", function(){
        doSearch($("#searchInputMobile").val().trim());
    });

    
    // === FORCE HIDE kalau mode desktop ===
    function forceHideSearchOnDesktop() {
        if ($(window).width() >= 775) { 
            $("#mobileSearchBox").removeClass("show").addClass("d-none");
        }
    }

    // Cek saat load + resize
    forceHideSearchOnDesktop();
    $(window).on("resize", forceHideSearchOnDesktop);

    function forceHideMobileUI() {
    if ($(window).width() >= 775) { 
        // Paksa sembunyiin search box mobile
        $("#mobileSearchBox").removeClass("show").addClass("d-none");

        // Paksa sembunyiin tombol mobile search & hamburger
        $("#mobileSearchBtn, [data-bs-target='#navtoggler']").hide();

        // Paksa sembunyiin sidebar offcanvas mobile
        $("#navtoggler").removeClass("show"); 
        $(".offcanvas-backdrop").remove(); // hapus backdrop kalau masih ada
    } else {
        // Balik ke mobile mode → tampil lagi
        $("#mobileSearchBtn, [data-bs-target='#navtoggler']").show();
    }
}

// Cek saat load + resize
forceHideMobileUI();
$(window).on("resize", forceHideMobileUI);
});
</script>