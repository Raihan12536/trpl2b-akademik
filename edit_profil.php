<?php
session_start();
include "koneksi_akademik.php";

if ($_SESSION['status'] != "login") {
    header("Location: login.php?pesan=Belum Login");
    exit();
}

// Ambil data user yang sedang login
$id = $_SESSION['id_user'];
$stmt = $db->prepare("SELECT * FROM pengguna WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$data = $stmt->get_result()->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Profil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-dark">

<nav class="navbar navbar-expand-lg navbar-dark bg-danger mb-4 shadow-sm">
  <div class="container">
    <a class="navbar-brand fw-bold" href="index.php">SIAKAD</a>
    <div class="d-flex align-items-center">
        <span class="navbar-text text-white me-3">
            <i class="bi bi-person-circle me-1"></i>
            <?= htmlspecialchars($_SESSION['nama']); ?>
        </span>
        <a href="logout.php" class="btn btn-light btn-sm">
            <i class="bi bi-box-arrow-right"></i> Logout
        </a>
    </div>
  </div>
</nav>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow border-0">
                <div class="card-header bg-white text-center">
                    <h5 class="mb-0 fw-bold">
                        <i class="bi bi-gear-fill me-1"></i> Edit Profil Pengguna
                    </h5>
                </div>

                <div class="card-body p-4">

                    <?php if(isset($_GET['pesan'])): ?>
                        <div class="alert alert-success text-center">
                            <?= htmlspecialchars($_GET['pesan']); ?>
                        </div>
                    <?php endif; ?>

                    <form action="update_profil.php" method="POST">
                        <input type="hidden" name="id" value="<?= $data['id']; ?>">

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Email (Tidak dapat diubah)</label>
                            <input type="email" class="form-control" value="<?= $data['email']; ?>" readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama_lengkap"
                                   value="<?= htmlspecialchars($data['nama_lengkap']); ?>" required>
                        </div>

                        <hr>

                        <p class="text-muted small mb-2">
                            Kosongkan password jika tidak ingin menggantinya.
                        </p>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Password Baru</label>
                            <input type="password" class="form-control" name="password_baru" placeholder="Password baru">
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="index.php" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-danger" name="update_profil">
                                <i class="bi bi-save"></i> Simpan Perubahan
                            </button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>
