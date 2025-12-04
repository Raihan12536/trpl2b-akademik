<?php
include "koneksi_akademik.php";


if (!isset($_GET['nim'])) {
    header("Location: index.php");
    exit();
}

$nim = $_GET['nim'];


$stmt = $db->prepare("SELECT * FROM mahasiswa WHERE nim = ?");
$stmt->bind_param("i", $nim);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

if (!$data) {
    echo "Data tidak ditemukan!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3 class="text-center mb-4">Edit Data Mahasiswa</h3>
            <div class="card p-4 shadow-sm">
                <form method="POST" action="update_mahasiswa.php"> 
                    
                    <div class="mb-3">
                        <label class="form-label">NIM</label>
                        <input type="number" class="form-control bg-light" name="nim" value="<?= $data['nim']; ?>" readonly>
                        <small class="text-muted">NIM tidak dapat diubah.</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Mahasiswa</label>
                        <input type="text" class="form-control" name="nama_mahasiswa" value="<?= htmlspecialchars($data['nama_mahasiswa']); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tanggal_lahir" value="<?= $data['tanggal_lahir']; ?>" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Alamat</label>
                        <textarea class="form-control" name="alamat" rows="3" required><?= htmlspecialchars($data['alamat']); ?></textarea>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="index.php" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Batal</a>
                        <button type="submit" class="btn btn-success" name="update"><i class="bi bi-save"></i> Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>