<?php
if (session_status() === PHP_SESSION_NONE) session_start();
require_once(__DIR__ . "/../../Backend/db.php");

// Kalau belum login → redirect ke login
if (!isset($_SESSION['is_login']) || !$_SESSION['is_login']) {
    header("Location: ../login");
    exit();
}

// Ambil data user
$userId = $_SESSION['user_id'] ?? null;
if (!$userId) {
    header("Location: ../login");
    exit();
}

$stmt = $conn->prepare("SELECT user_id, email, display_name, avatar FROM accounts WHERE user_id = ?");
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    echo "<p class='text-danger text-center mt-3'>User tidak ditemukan di database!</p>";
    exit();
}

$email        = $user['email'];
$displayName  = $user['display_name'] ?: ucfirst(explode('@', $email)[0]);
$avatar       = $user['avatar'] ?: null;
$initial      = strtoupper(substr($displayName, 0, 1));

// Handle form update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newDisplayName = !empty($_POST['display_name']) 
        ? htmlspecialchars($_POST['display_name']) 
        : $displayName;
    $newAvatar = $avatar; // default tetap avatar lama

    // Upload avatar jika ada
    if (!empty($_FILES["avatar"]["name"])) {
        $targetDir = __DIR__ . "/uploads/"; // FIX: tambahin slash

        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        $fileName = time() . "_" . basename($_FILES["avatar"]["name"]);
        $targetFile = $targetDir . $fileName;

        $allowedTypes = ['jpg','jpeg','png','gif'];
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        if (in_array($imageFileType, $allowedTypes)) {
            if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $targetFile)) {
                
                // Hapus foto lama (jika ada)
                if ($avatar) {
                    $oldFile = __DIR__ . "/" . $avatar;
                    if (file_exists($oldFile) && is_file($oldFile)) {
                        unlink($oldFile);
                    }
                }

                // Simpan path relatif ke DB
                $newAvatar = "uploads/" . $fileName;
            }
        }
    }

    // Update ke database
    $stmt = $conn->prepare("UPDATE accounts SET display_name = ?, avatar = ? WHERE user_id = ?");
    $stmt->bind_param("ssi", $newDisplayName, $newAvatar, $userId);
    $stmt->execute();

    // Update session
    $_SESSION['display_name'] = $newDisplayName;
    $_SESSION['avatar'] = $newAvatar;

    header("Location: ../profile");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="card shadow-lg mx-auto" style="max-width: 600px;">
        <div class="card-body text-center">
            <?php if ($avatar): ?>
                <img src="<?= htmlspecialchars($avatar) ?>" alt="Avatar" class="rounded-circle mb-3" style="width:100px; height:100px; object-fit:cover;">
            <?php else: ?>
                <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center mx-auto mb-3"
                     style="width:100px; height:100px; font-size:2rem; font-weight:bold;">
                    <?= $initial ?>
                </div>
            <?php endif; ?>
            
            <h3 class="mb-0"><?= htmlspecialchars($displayName) ?></h3>
            <p class="text-muted"><?= htmlspecialchars($email) ?></p>

            <hr>

            <!-- Form edit profil -->
            <form method="POST" enctype="multipart/form-data" class="text-start">
                <div class="mb-3">
                    <label class="form-label">Nama Tampilan</label>
                    <input type="text" name="display_name" class="form-control" value="<?= htmlspecialchars($displayName) ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Foto Profil</label>
                    <input type="file" name="avatar" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save me-2"></i>Simpan Perubahan</button>
            </form>

            <hr>
            <div class="d-grid gap-2">
                <a href="../../index.php" class="btn btn-success"><i class="fas fa-home me-2"></i>Kembali ke Beranda</a>
                <a href="log-out" class="btn btn-danger"><i class="fas fa-sign-out-alt me-2"></i>Logout</a>
            </div>
        </div>
    </div>
</div>

</body>
</html>
