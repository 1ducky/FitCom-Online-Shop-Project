<!DOCTYPE html>
<html lang="id">
    <!-- load Based COnfiguration -->
    <?php include('./config/setup.php'); ?>
<body>
    <div class="root mt-5 mt-md-5">

        
        <?php include 'component/navbar.php'; ?>
        <!-- Carousel -->
        <?php include 'component/corausel.php'; ?>
        <!--------- Promo product ------------->
        <?php include 'component/promo.php'; ?>

        <!--------- Testimonial ------------->
        <?php include 'component/testimoni.php'; ?>

        <!--- footer -->
        <?php include "component/footer.php"?>
    </div>

    <!-- Bootstrap & jQuery JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Jquery -->
    <script>
    // Carousel multi item
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
        // document.getElementById("mobileSearchBtn").addEventListener("click", function () {
        //     const box = document.getElementById("mobileSearchBox");
        //     if (box.style.display === "none" || box.style.display === "") {
        //         box.style.display = "block";
        //     } else {
        //         box.style.display = "none";
        //     }
        // });
    $("#mobileSearchBtn").click(function() {
        $("#mobileSearchBox").toggle();
    });

    </script>
</body>
</html>
