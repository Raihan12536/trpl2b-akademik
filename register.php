<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Akun Baru</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-dark d-flex align-items-center" style="min-height:100vh;">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">

            <div class="card shadow-lg border-0">
                <div class="card-header bg-danger text-white text-center py-3">
                    <h4 class="mb-0 fw-bold">
                        <i class="bi bi-person-plus-fill me-1"></i> Daftar Akun Baru
                    </h4>
                </div>

                <div class="card-body p-4">

                    <?php if(isset($_GET['pesan'])): ?>
                        <div class="alert alert-warning text-center">
                            <?= htmlspecialchars($_GET['pesan']); ?>
                        </div>
                    <?php endif; ?>

                    <form action="proses_register.php" method="POST">

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama Lengkap</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-person"></i>
                                </span>
                                <input type="text" name="nama_lengkap" class="form-control" placeholder="Masukkan nama lengkap" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Email</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-envelope"></i>
                                </span>
                                <input type="email" name="email" class="form-control" placeholder="contoh@email.com" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Password</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-lock"></i>
                                </span>
                                <input type="password" name="password" class="form-control" placeholder="Minimal 6 karakter" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Konfirmasi Password</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-lock-fill"></i>
                                </span>
                                <input type="password" name="konfirmasi_password" class="form-control" placeholder="Ulangi password" required>
                            </div>
                        </div>

                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" name="register" class="btn btn-danger fw-semibold">
                                <i class="bi bi-person-check-fill"></i> Daftar Sekarang
                            </button>
                            <a href="login.php" class="btn btn-outline-secondary">
                                Sudah punya akun? Login
                            </a>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>
