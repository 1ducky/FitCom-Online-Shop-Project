<?php
    include(__DIR__ . '/../../../config/setup.php');


?>
<body class="bg-light">
    <!-- style="max-width:800px;width:100%;" -->
<div class="container d-flex justify-content-center align-items-center h-100">
        <div class="card shadow-lg p-4 container" >
            <h3 class="text-center mb-4">Upload Produk</h3>

            <form action="<?= $basepath ?>/Backend/CRUD/upload.php" method="POST"  enctype="multipart/form-data" class="row">
                <div class="mb-3 col-md-3 col-6">
                    <label>Kode Produk</label>
                    <input type="text" name="kp" placeholder="Kode Produk" required class="form-control" required>
                </div>
                <div class="mb-3 col-md-3 col-6">
                    <label>Nama Produk</label>
                    <input type="text" name="np" placeholder="Nama Produk" required class="form-control" required>
                </div>
                <div class="mb-3 col-md-3 col-6">
                    <label>Satuan</label>
                    <input type="text" name="s" placeholder="Satuan" required class="form-control" required>
                </div>
                <div class="mb-3 col-md-3 col-6">
                    <label>Harga</label>
                    <input type="number" name="h" placeholder="Harga" required class="form-control" required>
                </div>
                <div class="mb-3 col-md-3 col-6">
                    <label>Stok</label>
                    <input type="number" name="stok" placeholder="Stok" required class="form-control" required>
                </div>
                <div class="mb-3 col-md-3 col-6">
                    <label>Kategori</label>
                    <select name="j" id="Ketegori" required class="form-control">
                        <option selected disabled class="text-center">-- Pilih Jenis Kategori --</option>
                        <option value="B1">Bibit/Tunas</option>
                        <option value="P1">Pupuk</option>
                        <option value="A1">Peralatan</option>
                        <option value="IOT1">IOT</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Upload Gambar</label>
                    <input type="file" name="img" accept="img/*">
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" name="submit" class="btn rounded-3 sc hov sshov w-75">Upload</button>
                </div>

            </form>
        </div>
    </div>
</body>