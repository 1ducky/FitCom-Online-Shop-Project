<!-- Card Produk Render -->
 <link rel="stylesheet" href="<?= $basepath . '/css/card-interaction.css'?>">
<?php 
function RenderProductList($data){
    global $basepath;


    ob_start();
?> 

<section class="py-4 flex-grow-1 ">
    <div class="container">
        

      <h2 class=" fw-bold text-success mb-3 fade-in">Produk Ku </h2>
      <?php if(!isset($data['data'])):?>
        <div class=" fade-in pb-5">
            <div class="alert alert-info">Belum ada produk yang kamu tambahkan.</div>
        </div>
        
        
      <?php else:?>
        <div class="row g-4">
            <?php foreach($data['data'] as $product):?>
                <?php $imgurl= $basepath."/image/?code=". urldecode($product['kode_produk']) ?>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 fade-in">
                    <div class="card shadow-sm h-100 fade-up">
                        <div class="card product-card h-100">
                        <img src="<?=$imgurl ?>" class="card-img-top" alt="<?=htmlspecialchars($product['nama_produk']) ?>">
                            <div class="card-body">
                                <h5 class="card-title text-capitalize text-center"><?=htmlspecialchars($product['nama_produk']) ?></h5>
                                <table class="table table-borderless  table-transparent">
                                    <tbody>
                                        <tr>
                                            <td class="text-start">Kode</td>
                                            <td class="text-center">:</td>
                                            <td class="text-capitalize"><?= htmlspecialchars($product['kode_produk']) ?></td>
                                        </tr>
                                            <tr>
                                            <td class="text-start">Jenis</td>
                                            <td class="text-center">:</td>
                                            <td><?= htmlspecialchars($product['kriteria']) ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-start">Harga</td>
                                            <td class="text-center">:</td>
                                            <td>Rp<?= htmlspecialchars($product['harga']) ?>/<?= htmlspecialchars($product['satuan']) ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-start">Stok</td>
                                            <td class="text-center">:</td>
                                            <td><?= htmlspecialchars($product['stok']) ?></td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="d-flex justify-content-around">

                                    <a href="<?= $basepath . '/produk/detail/?code=' . $product['kode_produk']?>" class="btn tc  fw-bold tshov">Lihat Detail</a>
                                    <a href="<?= $basepath . '/list/produk/update/?code=' . $product['kode_produk']?>" class="btn tc fw-bold tshov">Update</a>
                                </div>
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
