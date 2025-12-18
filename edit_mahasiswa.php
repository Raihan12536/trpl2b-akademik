<?php
// 1. Aktifkan pelaporan error untuk debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// 2. Sertakan koneksi database
include "koneksi_akademik.php";

// 3. Validasi apakah NIM ada di URL
if (!isset($_GET['nim']) || empty($_GET['nim'])) {
    die("Error: NIM tidak ditemukan. Pastikan Anda mengakses halaman ini melalui tombol edit.");
}

$nim = $_GET['nim'];

// 4. Ambil data mahasiswa berdasarkan NIM dengan Prepared Statement (Aman dari SQL Injection)
$stmt = $db->prepare("SELECT * FROM mahasiswa WHERE nim = ?");
$stmt->bind_param("s", $nim);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

// Jika data tidak ditemukan di database
if (!$data) {
    die("Error: Data mahasiswa dengan NIM " . htmlspecialchars($nim) . " tidak ditemukan.");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa - <?= htmlspecialchars($data['nama_mahasiswa']); ?></title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        body { background-color: #f0f4f8; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .card { border: none; border-radius: 15px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); }
        .form-label { font-weight: 600; color: #455a64; }
        .input-group-text { background-color: #fff3e0; color: #ff9800; }
        .btn-warning-custom { background-color: #ff9800; color: white; border: none; transition: 0.3s; }
        .btn-warning-custom:hover { background-color: #e68a00; color: white; transform: translateY(-2px); }
        .form-control:focus, .form-select:focus { border-color: #ff9800; box-shadow: 0 0 0 0.25rem rgba(255, 152, 0, 0.2); }
    </style>
</head>
<body>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-6">
            <div class="card p-4">
                <div class="text-center mb-4">
                    <div class="display-6 text-warning mb-2"><i class="bi bi-person-gear"></i></div>
                    <h3 class="fw-bold">Edit Data Mahasiswa</h3>
                    <p class="text-muted">Perbarui informasi profil mahasiswa di bawah ini</p>
                </div>

                <form method="POST" action="update_mahasiswa.php"> 
                    
                    <div class="mb-3">
                        <label class="form-label">NIM (Nomor Induk Mahasiswa)</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-card-text"></i></span>
                            <input type="text" class="form-control bg-light" name="nim" value="<?= $data['nim']; ?>" readonly>
                        </div>
                        <small class="text-muted">NIM tidak dapat diubah.</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama_mahasiswa" 
                               value="<?= htmlspecialchars($data['nama_mahasiswa']); ?>" required placeholder="Masukkan nama lengkap">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Program Studi</label>
                        <select class="form-select" name="prodi_id" required>
                            <option value="" disabled>-- Pilih Program Studi --</option>
                            <?php
                            $sql_prodi = "SELECT * FROM prodi ORDER BY nama_prodi ASC";
                            $result_prodi = $db->query($sql_prodi);
                            
                            if ($result_prodi) {
                                while($p = $result_prodi->fetch_assoc()) {
                                    $selected = ($data['prodi_id'] == $p['id']) ? "selected" : "";
                                    echo "<option value='".$p['id']."' $selected>".$p['jenjang']." - ".$p['nama_prodi']."</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tanggal_lahir" value="<?= $data['tanggal_lahir']; ?>" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Alamat Lengkap</label>
                        <textarea class="form-control" name="alamat" rows="3" required placeholder="Alamat domisili saat ini"><?= htmlspecialchars($data['alamat']); ?></textarea>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-between">
                        <a href="index.php" class="btn btn-outline-secondary px-4"><i class="bi bi-arrow-left"></i> Kembali</a>
                        <button type="submit" class="btn btn-warning-custom px-4 fw-bold shadow-sm" name="update">
                            <i class="bi bi-save"></i> Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>