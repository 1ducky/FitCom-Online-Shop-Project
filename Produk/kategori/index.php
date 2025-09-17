<?php 
include(__DIR__. '/../../config/setup.php');

$kategori=(string) ($_GET['kategori'] ?? 'b1');
$page=(int) ($_GET['page'] ?? 0);
$page=max($page,0);
$limit=10;
$offset= $page*$limit;

try{
    $res= @file_get_contents($basepath."/backend/api.php/category/$kategori?limit=$limit&offset=$offset");  
    if($res === null){
        throw new Exception('Gagal Fetch');
    }  
    $data = json_decode($res !== null ? $res : '[]', true);
}catch(Exception $e){
    $data=null;
};


?>




<!DOCTYPE html>
<html lang="en">
<body>
    <div class="root">

        <?php include $basedir . '/component/navbar.php'; ?>
        <?php include $basedir . '/component/category.php'; ?>
        <?php include $basedir . '/component/product-list.php';?>

        <!-- tampilkan kartu produk dari hasil data -->
        <?php echo RenderProductList($data);?>



    </div>
    <?php include $basedir ."/component/footer.php"; ?>

    <!-- Bootstrap & jQuery JS -->

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

        $("#mobileSearchBtn").click(function() {
        $("#mobileSearchBox").toggle();
    });
    </script>
</body>
</html>