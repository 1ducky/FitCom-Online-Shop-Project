<?php 
include(__DIR__. '/../config/setup.php');



try{
    $res= @file_get_contents($basepath."/backend/api.php/detail?limit=$limit&offset=$offset&$basequery");  
    if($res === null){
        throw new Exception('Gagal Fetch');
    }  
    $data = json_decode($res !== null ? $res : '[]', true);
    $total=$data['total'] ?? null;
    $totalPage=max(ceil($total/$limit),1);
}catch(Exception $e){
    $data=null;
};

?>

<!DOCTYPE html>
<html lang="id">
<body>
    <div class="root mt-5 mt-md-5">

        <?php include $basedir . '/component/navbar.php'; ?>
        <?php include $basedir . '/component/category.php'; ?>
        <?php include $basedir . '/component/filter.php';?>
        <?php include $basedir . '/component/product-list.php';?>
        <?php include $basedir . '/component/pagination.php'?>

        <!-- tampilkan kartu produk dari hasil data -->
        <?php echo RenderProductList($data);?>
        <?php echo pagination($page,$totalPage);?>

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