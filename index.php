<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Pertanian Online - GreenCore</title>
    <!-------- Icon --------->
    <link rel="icon" type="image/png" href="./assets/brand-img.png"/>
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

    <!-- Carousel -->
    <div class="container mt-4 main-content">
        <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./assets/pexels-arina-krasnikova-6316520.jpg" class="d-block w-100" alt="Pertanian Organik">
                    <div class="carousel-caption">
                        <h2 class="fw-bold">Pertanian Organik Modern</h2>
                        <p>Dapatkan produk pertanian organik berkualitas tinggi untuk hasil panen yang melimpah</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="./assets/Organik-Petrosida.png" class="d-block w-100" alt="Pupuk Berkualitas">
                    <div class="carousel-caption">
                        <h2 class="fw-bold">Pupuk Berkualitas Tinggi</h2>
                        <p>Tingkatkan kesuburan tanah dengan pupuk pilihan dari para ahli</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://images.unsplash.com/photo-1574323347407-f5e1ad6d020b?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1200&q=80" class="d-block w-100" alt="Benih Unggul">
                    <div class="carousel-caption">
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
    <?php include 'component/corausel.php'; ?>

<!--- footer -->
    <?php include "component/footer.php"?>

    <!-- Bootstrap & jQuery JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Jquery -->
    <script>
    document.addEventListener('DOMContentLoaded', function () {
    const itemsPerSlide = 2;               // 2 kartu per slide
    const items = document.querySelectorAll('#promoCarousel .carousel-item');
    items.forEach((el) => {
        let next = el.nextElementSibling;
        for (let i = 1; i < itemsPerSlide; i++) {
            if (!next) next = items[0];        // loop ke awal bila habis
                el.appendChild(next.firstElementChild.cloneNode(true));
                next = next.nextElementSibling;
            }
        });
    });
        document.getElementById("mobileSearchBtn").addEventListener("click", function () {
            const box = document.getElementById("mobileSearchBox");
            if (box.style.display === "none" || box.style.display === "") {
                box.style.display = "block";
            } else {
                box.style.display = "none";
            }
        });
    </script>
</body>
</html>
