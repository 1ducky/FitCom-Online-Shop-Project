<?php
require(__DIR__ . '/../../config/setup.php');

if (!isset($_SESSION['is_login']) || !$_SESSION['is_login']) {
    header("Location: $basepath/account/login");
    exit;
}

$user_id = $_SESSION['user_id'];

try{
    $res= @file_get_contents($basepath."/backend/api.php/myproduct/$user_id?limit=$limit&offset=$offset&$basequery");  
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

<body>
  <div class="root mt-5 mt-md-5">
        <?php include $basedir . '/component/navbar.php'; ?>
        <div class="my-4 py-4"></div>
        <?php include $basedir . '/component/filter.php';?>
        <?php include $basedir . '/component/myproduct-list.php';?>
        <?php include $basedir . '/component/pagination.php'?>
        
        
        <div class="container">
          <a href="upload" class="btn btn-primary mt-3 w-auto flex-shrink-0">
            <i class="fas fa-plus"></i> Tambah Produk
          </a>
          <a href="../../" class="btn btn-secondary mt-3 w-auto flex-shrink-0">Kembali</a>

        </div>
        
        
        <?php echo RenderProductList($data);?>
        <?php echo pagination($page,$totalPage);?>

  </div>
  <!-- Bootstrap & jQuery JS -->
<div class="container py-5">
  
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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
