<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>

<div class="container my-5">
    <h2 class="text-center mb-4">Daftar Mahasiswa</h2>

    <?php
    if (isset($_GET['pesan'])) {
        $pesan = $_GET['pesan'];
        $alertType = "success";
        $text = "";
        
        if ($pesan == "sukses_update") {
            $text = "Data berhasil diperbarui!";
        } elseif ($pesan == "sukses_hapus") {
            $text = "Data berhasil dihapus!";
        } elseif ($pesan == "gagal") {
            $alertType = "danger";
            $text = "Terjadi kesalahan sistem.";
        }

        if ($text) {
            echo "<div class='alert alert-$alertType alert-dismissible fade show' role='alert'>
                    $text
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                  </div>";
        }
    }
    ?>

    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Data Mahasiswa</h5>
            <a href="create_mahasiswa.php" class="btn btn-success btn-sm">
                <i class="bi bi-plus-circle"></i> Tambah Data
            </a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover align-middle">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama Mahasiswa</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    include "koneksi_akademik.php";
                    $no = 1;
                    $tampil = $db->query("SELECT * FROM mahasiswa ORDER BY nim ASC");
                    
                    while ($data = $tampil->fetch_assoc()) :
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $data['nim']; ?></td>
                        <td><?= htmlspecialchars($data['nama_mahasiswa']); ?></td>
                        <td><?= $data['tanggal_lahir']; ?></td>
                        <td><?= htmlspecialchars($data['alamat']); ?></td>
                        <td class="text-center">
                            <a href="edit_mahasiswa.php?nim=<?= $data['nim']; ?>" class="btn btn-warning btn-sm" title="Edit">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <a href="delete_mahasiswa.php?nim=<?= $data['nim']; ?>" class="btn btn-danger btn-sm" title="Hapus" onclick="return confirm('Yakin ingin menghapus data mahasiswa ini?');">
                                <i class="bi bi-trash-fill"></i>
                            </a>
                        </td>
                    </tr>
                <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>