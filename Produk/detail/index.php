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

//comment
try{
    $res= @file_get_contents($basepath."/backend/api.php/comment/$code?limit=3");  
    if($res === null){
        throw new Exception('Gagal Fetch');
    }  
    $data_comment = json_decode($res !== null ? $res : '[]', true);
}catch(Exception $e){
    $data_comment=null;
};
// recomendation produk list
try{
    $res= @file_get_contents($basepath."/backend/api.php/detail/search/" . $data['kode_jenis'] . "?limit=5");  
    if($res === null){
        throw new Exception('Gagal Fetch');
    }  
    $data_list = json_decode($res !== null ? $res : '[]', true);
}catch(Exception $e){
    $data_list=null;
};

?>
<!DOCTYPE html>
<html lang="in_ID">
<body>
    <div class="root mt-5 mt-md-5 pt-md-5">

        <?php include $basedir . '/component/navbar.php'; ?>
        <?php include $basedir . '/component/product-list.php';?>
        <?php include $basedir . '/component/comment.php'; ?>
        <!-- Product Detail Section -->
        <?php if ($data): ?>
            <div class="container bg-white">
                <div class="row justify-content-sm-center p-1 py-3">
                    <div class="col-md-6 dh">
                        <img src="<?= $basepath . "/image?code=" . urlencode($data['kode_produk']); ?>" class="img-fluid" alt="<?= htmlspecialchars($data['nama_produk']); ?>">

                    </div>
                    <div class="col-md-6">
                        <h2 class="mt-md-0 mt-3" ><?= htmlspecialchars($data['nama_produk']); ?></h2>
                        <div class="price d-flex">
                            <h4 class="text-success">Rp <?= number_format((float)$data['harga'], 0, ',', '.'); ?></h4>
                            <p class="text-muted text-start align-self-end"> /per <?= htmlspecialchars($data['satuan']); ?></p>
                        </div>
                        <p>Stok tersedia: <?= htmlspecialchars($data['stok']); ?></p>
                        <div class="d-flex text-center align-items-center my-3">
                            <h5 class="text-center h-100 m-0 me-3">Kuantitas</h5>
                            <button class="icon border-0" onclick="updatecount('-')">-</button>
                            <p id="counter" class="text-center m-0 px-5 bg-dark-subtle icon d-flex align-items-center justify-content-center">0</p>
                            <button class="icon border-0" onclick="updatecount('+')">+</button>
                            <h5 class="text-center h-100 m-0 ms-3"><?= htmlspecialchars($data['satuan']); ?></h5>
                            
                        </div>
                        <button class="btn btn-primary hov" onclick="">Add to Cart</button>
                    </div>
                </div>
            </div>
            <div class="container bg-white my-3 p-3">
                <h2>Deskripsi</h2>  
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe reiciendis iure enim aliquam aperiam nisi, praesentium consequuntur dolore sunt aliquid quae, adipisci expedita non perspiciatis illo fuga. Fuga, ullam. Iste autem sapiente, nesciunt commodi veniam nihil eius excepturi, delectus, voluptatem ducimus harum quis officiis culpa? Nesciunt corrupti soluta cupiditate nemo!</p>
            </div>

            <?php echo RenderCommentList($data_comment);?>

        <?php else: ?>
            <p class="text-danger">Product not found.</p>
        <?php endif; ?>

        

        <!-- tampilkan kartu produk dari hasil data -->
        <?php echo RenderProductList($data_list);?>

        <!-- Footer -->
        <?php include $basedir . '/component/footer.php'?>
    </div>
    


        <!-- Bootstrap & jQuery JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let kuantitas=0;
        function updatecount(operator) {

            if (operator == '+'){
                kuantitas++;
            }else if(operator == '-'){
                kuantitas<=0 ? null : kuantitas--;
                
            }
            $("#counter").text(kuantitas)
        }

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