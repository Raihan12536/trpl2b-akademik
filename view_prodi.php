<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Program Studi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body { background-color: #f0f4f8; font-family: 'Segoe UI', sans-serif; }
        
        .navbar { background: linear-gradient(90deg, #000000ff, #000000ff); }
        .btn-teal { background-color: #000000ff; color: white; border: none; }
        .btn-teal:hover { background-color: #000000ff; color: white; }

        .nav-link { color: rgba(255,255,255,0.85) !important; font-weight: 500; }
        .nav-link.active { color: white !important; font-weight: bold; border-bottom: 2px solid white; }
        .nav-link:hover { color: white !important; }
        .card { border: none; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark mb-4 shadow-sm">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#"><i class=""></i>SIAKAD</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Data Mahasiswa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="view_prodi.php">Data Program Studi</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
    
    <?php
    if (isset($_GET['pesan'])) {
        $pesan = $_GET['pesan'];
        $text = "";
        if ($pesan == "sukses_input_prodi") $text = "Prodi baru berhasil disimpan!";
        elseif ($pesan == "sukses_update_prodi") $text = "Data Prodi diperbarui!";
        elseif ($pesan == "sukses_hapus_prodi") $text = "Data Prodi dihapus!";
        
        if ($text) {
            echo "<div class='alert alert-success alert-dismissible fade show shadow-sm' role='alert'>
                    <i class='bi bi-check-circle-fill me-2'></i> $text
                    <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                  </div>";
        }
    }
    ?>

    <div class="card">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
            <h5 class="mb-0 fw-bold" style="color: #000000ff;">Daftar Program Studi</h5>
            <a href="create_prodi.php" class="btn btn-teal shadow-sm">
                <i class="bi bi-plus-lg"></i> Tambah Prodi
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center" style="width: 50px;">No</th>
                            <th>Nama Prodi</th>
                            <th>Jenjang</th>
                            <th>Keterangan</th>
                            <th class="text-center" style="width: 150px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        include "koneksi_akademik.php";
                        $no = 1;
                        $sql = "SELECT * FROM prodi ORDER BY jenjang ASC, nama_prodi ASC";
                        $tampil = $db->query($sql);
                        
                        if ($tampil->num_rows > 0) {
                            while ($data = $tampil->fetch_assoc()) :
                    ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td class="fw-bold text-dark"><?= htmlspecialchars($data['nama_prodi']); ?></td>
                            <td><span class="badge bg-secondary"><?= $data['jenjang']; ?></span></td>
                            <td class="text-muted small"><?= htmlspecialchars($data['keterangan']); ?></td>
                            <td class="text-center">
                                <a href="edit_prodi.php?id=<?= $data['id']; ?>" class="btn btn-sm btn-warning text-white rounded-circle shadow-sm" title="Edit">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                                <a href="delete_prodi.php?id=<?= $data['id']; ?>" class="btn btn-sm btn-danger rounded-circle shadow-sm" title="Hapus" onclick="return confirm('Yakin hapus prodi ini?');">
                                    <i class="bi bi-trash-fill"></i>
                                </a>
                            </td>
                        </tr>
                    <?php 
                            endwhile; 
                        } else {
                            echo "<tr><td colspan='5' class='text-center py-4 text-muted'>Belum ada data prodi.</td></tr>";
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>