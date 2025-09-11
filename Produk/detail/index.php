<?php
    include(__DIR__ . '/../../config/setup.php');

$code=(string)($_GET['code'] ?? '');

// full information Product

try {
    $res = @file_get_contents($basepath . "/backend/api.php/detail/full/$code");
    if ($res === false) {
        throw new Exception('Gagal Fetch');
    }
    $json = json_decode($res, true);
    $data = $json['data'][0] ?? null;
} catch (Exception $e) {
    $data = null;
}

// recomendation produk list

try{
    $res= @file_get_contents($basepath."/backend/api.php/detail/search/" . $data['kode_jenis'] . "?limit=5");  
    if($res === null){
        throw new Exception('Gagal Fetch');
    }  
    $data_req = json_decode($res !== null ? $res : '[]', true);
}catch(Exception $e){
    $data_req=null;
};

?>
<!DOCTYPE html>
<html lang="in_ID">
<body>
    <?php include $basedir . '/component/navbar.php'; ?>
    <?php include $basedir . '/component/product-list.php';?>
    <!-- Product Detail Section -->
    <?php if ($data): ?>
        <div class="row container justify-content-sm-center">
            <div class="col-md-6">
                <img src="<?= $basepath . "/image/index.php?code=" . urlencode($data['kode_produk']); ?>" class="img-fluid rounded-3" alt="<?= htmlspecialchars($data['nama_produk']); ?>">

            </div>
            <div class="col-md-6">
                <h2><?= htmlspecialchars($data['nama_produk']); ?></h2>
                <p class="text-muted">Satuan: <?= htmlspecialchars($data['satuan']); ?></p>
                <h4 class="text-success">Rp <?= number_format((float)$data['harga'], 0, ',', '.'); ?></h4>
                <p>Stok tersedia: <?= htmlspecialchars($data['stok']); ?></p>
                <button class="btn btn-primary hov" onclick="">Add to Cart</button>
            </div>
        </div>
        <?php include $basedir . '/component/comment.php'; ?>

        <div class="continer-fluid">
            <h2>Deskripsi</h2>  
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe reiciendis iure enim aliquam aperiam nisi, praesentium consequuntur dolore sunt aliquid quae, adipisci expedita non perspiciatis illo fuga. Fuga, ullam. Iste autem sapiente, nesciunt commodi veniam nihil eius excepturi, delectus, voluptatem ducimus harum quis officiis culpa? Nesciunt corrupti soluta cupiditate nemo!</p>
        </div>
    <?php else: ?>
        <p class="text-danger">Product not found.</p>
    <?php endif; ?>

    

    <!-- tampilkan kartu produk dari hasil data -->
    <?php echo RenderProductList($data_req);?>

    <!-- Footer -->
    <?php include $basedir . '/component/footer.php'?>



        <!-- Bootstrap & jQuery JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
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