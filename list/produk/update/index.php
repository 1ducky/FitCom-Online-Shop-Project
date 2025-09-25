<?php
    include(__DIR__ . '/../../../config/setup.php');

    $kp=$_GET['code'];

    try {
    $res = @file_get_contents($basepath . "/backend/api.php/detail/full/$kp");
    if ($res === false) {
        throw new Exception('Gagal Fetch');
    }
    $json = json_decode($res, true);
    $data = $json['data'][0] ?? null;
    } catch (Exception $e) {
        $data = null;
    }
?>
<body class="bg-light">
    <!-- style="max-width:800px;width:100%;" -->
<div class="container d-flex justify-content-center align-items-center h-100">
        <div class="card shadow-lg p-4 container" >
            <h3 class="text-center mb-4 text-capitalize">Upadete Produk <?= $kp ?></h3>

            <form action="<?= $basepath ?>/Backend/CRUD/update.php?kp=<?=$kp?>" method="POST"  enctype="multipart/form-data" class="row">
                <div class="mb-3 col-md-3 col-6">
                    <label>Nama Produk</label>
                    <input type="text" name="np" placeholder="Nama Produk" required class="form-control" required value="<?= htmlspecialchars($data['nama_produk'])?>">
                </div>
                <div class="mb-3 col-md-3 col-6">
                    <label>Satuan</label>
                    <input type="text" name="s" placeholder="Satuan" required class="form-control" required value="<?= htmlspecialchars($data['satuan'])?>">
                </div>
                <div class="mb-3 col-md-3 col-6">
                    <label>Harga</label>
                    <input type="number" name="h" placeholder="Harga" required class="form-control" required value="<?= htmlspecialchars($data['harga'])?>">
                </div>
                <div class="mb-3 col-md-3 col-6">
                    <label>Stok</label>
                    <input type="number" name="stok" placeholder="Stok" required class="form-control" required value="<?= htmlspecialchars($data['stok'])?>">
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
                    <button type="submit" name="submit" class="btn rounded-3 sc hov sshov w-75">Update</button>
                    <a href="<?= $basepath ?>/Backend/CRUD/delete.php?kp=<?= $kp ?>" class="btn btn-danger">Delete</a>
                </div>

            </form>
        </div>
    </div>
</body>