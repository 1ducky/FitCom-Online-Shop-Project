<!-- Card Produk Render -->
 <link rel="stylesheet" href="<?= $basepath . '/css/card-interaction.css'?>">
<?php 
function RenderProductList($data){
    global $basepath;

    ob_start();
?> 

<section class="py-4 flex-grow-1 h-100">
    <div class="container">
      <h2 class="h5 fw-bold text-success mb-3 fade-in">Daftar Produk Terkait </h2>
      <?php if(!isset($data['data'])):?>
        <div class=" fade-in">
            <h2>Tidak Ada Produk Terkait :(</h2>
        </div>
        <h2>Temukan Produk Lainnya</h2>

        <h3>Promo</h3>
        <h3>Pilihan</h3>
        
      <?php else:?>
        <div class="row g-4">
            <?php foreach($data['data'] as $product):?>
                <?php $imgurl= $basepath."/image/?code=". urldecode($product['kode_produk']) ?>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 fade-in">
                    <div class="card shadow-sm h-100 fade-up">
                        <div class="card product-card h-100">
                        <img src="<?=$imgurl ?>" class="card-img-top" alt="<?=htmlspecialchars($product['nama_produk']) ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?=htmlspecialchars($product['nama_produk']) ?></h5>
                                <p class="card-text"><?=htmlspecialchars($product['kriteria']) ?></p>
                                <a href="<?= $basepath . '/produk/detail/?code=' . $product['kode_produk']?>" class="btn btn-success">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach?>
        </div>
      <?php endif?>
      
    </div>
</section>
<?php
return ob_get_clean();
}
