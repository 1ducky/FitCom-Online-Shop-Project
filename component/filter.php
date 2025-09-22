<div class="d-flex my-5 gap-3 container">
    <h2>urutkan</h2>

    <div class="dropdown">
        <button class="btn" type="button" id="sortMenu" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo (is_null($_GET['order'] ?? null)) ? 'Tanggal' : (($_GET['order'] == 'asc') ? 'Terbaru' : 'Terlama')?>
        </button>
        <ul class="dropdown-menu" aria-label="sortMenu">
            <li><a href="<?php echo $baseurl . '?' . http_build_query(array_merge($query,['order'=> 'asc']))?>" class="dropdown-item" data-sort="Terbaru">Terbaru</a></li>
            <li><a href="<?php echo $baseurl . '?' . http_build_query(array_merge($query,['order'=> 'desc']))?>" class="dropdown-item" data-sort="Terlama">Terlama</a></li>
        </ul>
    </div>
    <div class="dropdown">
        <button class="btn" type="button" id="priceMenu" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo (is_null($_GET['price'] ?? null)) ? 'Harga' : (($_GET['price'] == 'asc') ? 'Termurah' : 'Termahal')?>
        </button>
        <ul class="dropdown-menu" aria-label="priceMenu">
            <li><a href="<?php echo $baseurl . '?' . http_build_query(array_merge($query,['price'=> 'asc']))?>" class="dropdown-item" data-sort="Terendah">Termurah</a></li>
            <li><a href="<?php echo $baseurl . '?' . http_build_query(array_merge($query,['price'=> 'desc']))?>" class="dropdown-item" data-sort="Tertinggi">Termahal</a></li>
        </ul>
    </div>
            
</div>
