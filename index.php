<?php
session_start();
include "koneksi_akademik.php";


if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("Location: login.php?pesan=Silakan Login Terlebih Dahulu");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-dark">

<nav class="navbar navbar-expand-lg navbar-dark bg-danger mb-4 shadow-sm">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">SIAKAD</a>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link active" href="index.php">Data Mahasiswa</a></li>
        <li class="nav-item"><a class="nav-link" href="view_prodi.php">Data Program Studi</a></li>
      </ul>

      <ul class="navbar-nav">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active fw-semibold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person-circle me-1"></i> 
                Halo, <?= htmlspecialchars($_SESSION['nama']); ?>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <a class="dropdown-item" href="edit_profil.php">
                        <i class="bi bi-gear me-2"></i> Edit Profil
                    </a>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <a class="dropdown-item text-danger" href="logout.php">
                        <i class="bi bi-box-arrow-right me-2"></i> Logout
                    </a>
                </li>
            </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
    <?php if (isset($_GET['pesan'])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Pesan: <strong><?= htmlspecialchars($_GET['pesan']); ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <div class="card shadow-sm">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Daftar Mahasiswa</h5>
            <a href="create_mahasiswa.php" class="btn btn-primary btn-sm">
                <i class="bi bi-plus-lg"></i> Tambah Mahasiswa
            </a>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-3">No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Prodi</th>
                            <th>Alamat</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $no = 1;
                        $sql = "SELECT m.*, p.nama_prodi, p.jenjang FROM mahasiswa m LEFT JOIN prodi p ON m.prodi_id = p.id ORDER BY m.nim ASC";
                        $tampil = $db->query($sql);
                        while ($data = $tampil->fetch_assoc()) :
                    ?>
                        <tr>
                            <td class="ps-3"><?= $no++; ?></td>
                            <td><?= $data['nim']; ?></td>
                            <td><?= htmlspecialchars($data['nama_mahasiswa']); ?></td>
                            <td>
                                <?php if($data['nama_prodi']): ?>
                                    <span class="badge bg-info text-dark"><?= $data['jenjang']; ?> - <?= $data['nama_prodi']; ?></span>
                                <?php else: ?>
                                    -
                                <?php endif; ?>
                            </td>
                            <td><?= htmlspecialchars($data['alamat']); ?></td>
                            <td class="text-center">
                                <a href="edit_mahasiswa.php?nim=<?= $data['nim']; ?>" class="btn btn-warning btn-sm text-white"><i class="bi bi-pencil-fill"></i></a>
                                <a href="delete_mahasiswa.php?nim=<?= $data['nim']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?');"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>