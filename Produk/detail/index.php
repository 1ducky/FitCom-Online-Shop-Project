<?php
    include(__DIR__ . '/../../config/setup.php');

$code=(string)($_GET['code'] ?? '');

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

?>
<!DOCTYPE html>
<html lang="in_ID">
<body>
    <?php include __DIR__ . '/../../component/navbar.php'; ?>
    <!-- Product Detail Section -->
<?php if ($data): ?>
<div class="row">
    <div class="col-md-6">
        <img src="<?php echo $basepath . "/image/index.php?code=" . urlencode($data['kode_produk']); ?>" class="img-fluid" alt="<?php echo htmlspecialchars($data['nama_produk']); ?>">

    </div>
    <div class="col-md-6">
        <h2><?php echo htmlspecialchars($data['nama_produk']); ?></h2>
        <p class="text-muted">Satuan: <?php echo htmlspecialchars($data['satuan']); ?></p>
        <h4 class="text-success">Rp <?php echo number_format((float)$data['harga'], 0, ',', '.'); ?></h4>
        <p>Stok tersedia: <?php echo htmlspecialchars($data['stok']); ?></p>
        <button class="btn btn-primary" onclick="">Add to Cart</button>
    </div>
</div>
<?php else: ?>
    <p class="text-danger">Product not found.</p>
<?php endif; ?>
    <!-- Footer -->
    <?php include __DIR__ . '/../../component/footer.php'?>
        <!-- Bootstrap & jQuery JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
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