<?php 
include(__DIR__. '/../../config/setup.php');

$keyword = (string) str_replace(' ', '-',  ($_GET['keyword'] ?? ''));
$page=(int) ($_GET['page'] ?? 0);
$page=max($page,0);
$limit=10;
$offset= $page*$limit;

try{
    $url_keyword = urlencode($keyword);
    $res= @file_get_contents($basepath."/backend/api.php/detail/search/$url_keyword?limit=$limit&offset=$offset&$basequery");  
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
    <div class="root mt-5 mt-md-5">

        <?php include $basedir . '/component/navbar.php'; ?>
        <?php include $basedir . '/component/category.php'; ?>
        <?php include $basedir . '/component/filter.php';?>
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