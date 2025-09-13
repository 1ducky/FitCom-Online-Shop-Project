<?php
require(__DIR__ . '/../../config/setup.php');

if (isset($_SESSION['is_login']) && $_SESSION['is_login']) {
    header("Location: index.php");
    exit;
}
$error   = $_GET['error'] ?? '';
$success = $_GET['success'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?= $basepath ?>/css/account.css">
    <title>Login - GreenCore</title>
<body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center h-100">
        <div class="card shadow-lg p-4" style="max-width:400px;width:100%;">
            <h3 class="text-center mb-4">Login</h3>

            <?php if ($error): ?>
                <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>
            <?php if ($success): ?>
                <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
            <?php endif; ?>

            <form action="<?= $basepath ?>/Backend/FetchHooks/login.php" method="POST">
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Password</label>
                    <div class="input-group">
                        <input type="password" name="password" id="password" class="form-control" required>
                        <button type="button" id="togglePassword" class="btn btn-outline-secondary">
                            👁
                        </button>
                    </div>
                </div>
                <div class="form-check mb-3">
                    <input type="checkbox" name="remember" value="1" class="form-check-input" id="remember">
                    <label for="remember" class="form-check-label">Ingat saya</label>
                </div>
                <button type="submit" name="submit" class="btn btn-success w-100">Login</button>
            </form>
            <p class="text-center mt-3 mb-0">
                Belum punya akun? <a href="<?= $basepath ?>/account/sign-up">Daftar</a>
            </p>
        </div>
    </div>
    <script>
            $(document).ready(function(){
            $("#togglePassword").click(function(e){
                e.preventDefault();
                let input = $("#password");
                let type = input.attr("type") === "password" ? "text" : "password";
                input.attr("type", type);
                $(this).text(type === "password" ? "👁" : "🙈");
            });
        });
    </script>
</body>
</html>