<?php 
include(__DIR__. '/../../config/setup.php');

if (!$_SESSION['is_login']) {
    header("Location: ../../account/login/index.php");
    exit();
}

$kode_produk = $_GET['code'] ?? null;
if (!$kode_produk) {
    echo "Produk tidak ditemukan.";
}
$id_user = $_SESSION['user_id'];
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Review Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow p-4">
        <h3 class="mb-3">Tulis Ulasan Anda</h3>
        <form action="../../Backend/FetchHooks/submit-review.php" method="POST">
        <!-- kirim kode_produk & id_user secara hidden -->
            <input type="hidden" name="kode_produk" value="<?= htmlspecialchars($kode_produk) ?>">
            <input type="hidden" name="id_user" value="<?= htmlspecialchars($id_user) ?>">

        <!-- Rating -->
            <div class="mb-3">
                <label for="rating" class="form-label">Rating</label>
                <select class="form-select" name="rating" id="rating" required>
                    <option value="">Pilih Rating</option>
                    <option value="5">⭐⭐⭐⭐⭐ (5)</option>
                    <option value="4">⭐⭐⭐⭐ (4)</option>
                    <option value="3">⭐⭐⭐ (3)</option>
                    <option value="2">⭐⭐ (2)</option>
                    <option value="1">⭐ (1)</option>
                </select>
            </div>

        <!-- Komentar -->
            <div class="mb-3">
                <label for="comment" class="form-label">Komentar</label>
                <textarea class="form-control" name="comment" id="comment" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Kirim Ulasan</button>
            </form>
        </div>
    </div>

</body>
</html>