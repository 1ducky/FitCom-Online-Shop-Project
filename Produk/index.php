<?php 
include(__DIR__. '/../config/setup.php');
$res=null;
// $res= file_get_contents($basepath.'/backend/api.php/detail?limit=3');    
$data = json_decode($res !== null ? $res : '[]', true);
?>




<!DOCTYPE html>
<link rel="stylesheet" href="<?= $basepath ?>/css/card-interaction.css">
<html lang="en">
<body>
    <?php include $basedir . '/component/navbar.php'; ?>
    <?php include $basedir . '/component/category.php'; ?>
    <?php include $basedir . '/component/product-list.php';?>

    <!-- tampilkan kartu produk dari hasil data -->
    <?php echo RenderProductList($data);?>



    <?php include $basedir ."/component/footer.php"; ?>

    <!-- Bootstrap & jQuery JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Jquery -->
    <script>
        $(document).ready(function(){
            
        });

        function scrollTriger() {
            $(".fade-in").each(function () {  
                let rect=this.getBoundingClientRect();
                if(rect.top < window.innerHeight - 50 ){
                    $(this).addClass("show")
                }
            })
          }
        $(window).on("scroll load", scrollTriger);
    </script>
</body>
</html>