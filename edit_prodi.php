<?php
include "koneksi_akademik.php";

// Cek apakah ada ID yang dikirim
if (!isset($_GET['id'])) {
    header("Location: view_prodi.php");
    exit();
}

$id = $_GET['id'];
$stmt = $db->prepare("SELECT * FROM prodi WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$data = $stmt->get_result()->fetch_assoc();

// Jika data tidak ditemukan
if (!$data) {
    echo "Data tidak ditemukan!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Program Studi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body { background-color: #f0f4f8; }
        .card { border: none; border-radius: 15px; box-shadow: 0 10px 20px rgba(0,0,0,0.05); }
        .btn-warning-custom { background-color: #ffca2c; color: #000; font-weight: bold; border: none; }
        .btn-warning-custom:hover { background-color: #ffc107; }
    </style>
</head>
<body>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card p-4">
                <div class="text-center mb-4">
                    <h3 class="fw-bold text-warning"><i class="bi bi-pencil-square"></i> Edit Prodi</h3>
                    <p class="text-muted">Perbarui Informasi Program Studi</p>
                </div>

                <form method="POST" action="update_prodi.php">
                    <input type="hidden" name="id" value="<?= $data['id']; ?>">
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama Program Studi</label>
                        <input type="text" class="form-control" name="nama_prodi" value="<?= htmlspecialchars($data['nama_prodi']); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Jenjang</label>
                        <select class="form-select" name="jenjang" required>
                            <option value="D2" <?= ($data['jenjang'] == 'D2') ? 'selected' : '' ?>>D2</option>
                            <option value="D3" <?= ($data['jenjang'] == 'D3') ? 'selected' : '' ?>>D3</option>
                            <option value="D4" <?= ($data['jenjang'] == 'D4') ? 'selected' : '' ?>>D4</option>
                            <option value="S2" <?= ($data['jenjang'] == 'S2') ? 'selected' : '' ?>>S2</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Keterangan</label>
                        <textarea class="form-control" name="keterangan" rows="3"><?= htmlspecialchars($data['keterangan']); ?></textarea>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="view_prodi.php" class="btn btn-light text-secondary fw-bold">
                            <i class="bi bi-arrow-left"></i> Batal
                        </a>
                        <button type="submit" class="btn btn-warning-custom px-4 shadow-sm" name="update_prodi">
                            <i class="bi bi-save"></i> Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>