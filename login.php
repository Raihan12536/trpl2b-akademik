<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Sistem</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-dark d-flex align-items-center" style="min-height:100vh;">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">

            <div class="card shadow-lg border-0">
                <div class="card-header bg-danger text-white text-center py-3">
                    <h4 class="mb-0 fw-bold">
                        <i class="bi bi-box-arrow-in-right me-1"></i> LOGIN SIAKAD
                    </h4>
                </div>

                <div class="card-body p-4">

                    <?php if(isset($_GET['pesan'])): ?>
                        <div class="alert alert-danger text-center">
                            <?= htmlspecialchars($_GET['pesan']); ?>
                        </div>
                    <?php endif; ?>

                    <form action="proses_login.php" method="POST">

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Email</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-envelope"></i>
                                </span>
                                <input type="email" name="email" class="form-control" placeholder="Masukkan email" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Password</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-lock"></i>
                                </span>
                                <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
                            </div>
                        </div>

                        <button type="submit" name="login" class="btn btn-danger w-100 fw-semibold">
                            <i class="bi bi-box-arrow-in-right me-1"></i> Masuk
                        </button>

                        <div class="mt-3 text-center">
                            <small>
                                Belum punya akun?
                                <a href="register.php" class="fw-semibold text-danger text-decoration-none">
                                    Daftar di sini
                                </a>
                            </small>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>
