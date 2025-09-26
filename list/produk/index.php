<?php
require(__DIR__ . '/../../config/setup.php');

if (!isset($_SESSION['is_login']) || !$_SESSION['is_login']) {
    header("Location: ../../account/login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

$stmt = $conn->prepare("SELECT id, nama_produk, harga, gambar, type, kode_produk, stok, satuan 
                        FROM products WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Produk Saya</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
  <h2 class="mb-4">Produk Saya</h2>
  
  <?php if ($result && $result->num_rows > 0): ?>
    <div class="row">
      <?php while($row = $result->fetch_assoc()): ?>
        <div class="col-md-4 mb-3">
          <div class="card h-100 shadow-sm">
            <?php if (!empty($row['gambar'])): ?>
              <img src="data:image/jpeg;base64,<?= base64_encode($row['gambar']) ?>" 
     class="card-img-top img-fluid"
     style="height: 400px; object-fit: cover;" 
     alt="<?= htmlspecialchars($row['nama_produk']) ?>">
            <?php else: ?>
              <img src="https://via.placeholder.com/300x200?text=No+Image" class="card-img-top">
            <?php endif; ?>

            <div class="card-body">
              <h5 class="card-title"><?= htmlspecialchars($row['nama_produk']) ?></h5>
              <p class="card-text text-muted">
                Rp <?= number_format($row['harga'], 0, ',', '.') ?> / <?= htmlspecialchars($row['satuan']) ?>
              </p>
              <p class="card-text"><small>Stok: <?= (int)$row['stok'] ?></small></p>
              <a href="update/index.php?code=<?= $row['kode_produk'] ?>" class="btn btn-sm btn-warning">
                <i class="fas fa-edit"></i> Edit
              </a>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
  <?php else: ?>
    <div class="alert alert-info">Belum ada produk yang kamu tambahkan.</div>
  <?php endif; ?>
  
  <a href="upload" class="btn btn-primary mt-3">
    <i class="fas fa-plus"></i> Tambah Produk
  </a>
  <a href="../../index.php" class="btn btn-secondary mt-3">Kembali</a>
</div>

</body>
</html>
