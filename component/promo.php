    <div class="promo-section container my-3">
    <div class="container-fluid text-center py-5">
    <h1 class="fw-bold mb-5 display-5">Promo Spesial Bulan Ini!</h1>

    <div id="promoCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
        <!-- Item 1 -->
            <div class="carousel-item active">
                <div class="col-12 col-md-6">
                    <div class="card promo-card position-relative h-100 d-flex flex-column">
                        <span class="promo-badge">DISKON 20%</span>
                        <div class="img-container">
                            <img src="./assets/Pupuk2.jpeg" class="card-img-top" alt="Pupuk Organik">
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Pupuk Organik Diskon 20%</h5>
                            <p class="card-text">Tingkatkan kesuburan tanah Anda dengan pupuk organik berkualitas tinggi.</p>
                            <a href="<?= $basepath ?>/Produk/" class="btn btn-success mt-auto">Beli Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>

        <!-- Item 2 -->
        <div class="carousel-item">
            <div class="col-12 col-md-6">
                <div class="card promo-card position-relative h-100 d-flex flex-column">
                    <span class="promo-badge">DISKON 20%</span>
                    <div class="img-container">
                        <img src="./assets/Cakup.png" class="card-img-top" alt="Bibit Tanaman">
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Bibit Diskon 20%</h5>
                        <p class="card-text">Dapatkan bibit tanaman unggulan dengan kualitas terbaik untuk kebun Anda.</p>
                        <a href="#" class="btn btn-success mt-auto">Beli Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Tambah item lain kalau ada... -->
        <div class="carousel-item">
            <div class="col-12 col-md-6">
                <div class="card promo-card position-relative h-100 d-flex flex-column">
                    <span class="promo-badge">DISKON 20%</span>
                    <div class="img-container">
                        <img src="./assets/Garpu.jpeg" class="card-img-top" alt="Bibit Tanaman">
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Alat Pertanian Diskon 20%</h5>
                        <p class="card-text">Dapatkan alat pertanian unggulan dengan kualitas terbaik dan murah untuk kebun Anda.</p>
                        <a href="#" class="btn btn-success mt-auto">Beli Sekarang</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="carousel-item">
            <div class="col-12 col-md-6">
                <div class="card promo-card position-relative h-100 d-flex flex-column">
                    <span class="promo-badge">DISKON 20%</span>
                    <div class="img-container">
                        <img src="./assets/Drone.jpg" class="card-img-top" alt="Bibit Tanaman">
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Drone Sawah Diskon 20%</h5>
                        <p class="card-text">Dapatkan Peralatan Canggih IOT Untuk Mempermudah Pekerjaan Anda.</p>
                        <a href="#" class="btn btn-success mt-auto">Beli Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <!----- Button navigasi ----->
            <button class="carousel-control-prev" type="button" data-bs-target="#promoCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#promoCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
                <span class="visually-hidden">Next</span>
            </button>

        <!-- Dots opsional -->
            <div class="carousel-indicators position-static mt-3">
                <button type="button" data-bs-target="#promoCarousel" data-bs-slide-to="0" class="active" aria-label="1"></button>
                <button type="button" data-bs-target="#promoCarousel" data-bs-slide-to="1" aria-label="2"></button>
                <button type="button" data-bs-target="#promoCarousel" data-bs-slide-to="2" aria-label="3"></button>
                <button type="button" data-bs-target="#promoCarousel" data-bs-slide-to="3" aria-label="4"></button>
            </div>
        </div>
    </div>
</div>