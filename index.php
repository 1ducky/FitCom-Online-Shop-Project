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
    <?php include 'component/corausel.php'; ?>
    <!--------- Promo product ------------->
    <?php include 'component/promo.php'; ?>

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
