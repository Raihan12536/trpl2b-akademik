<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Mahasiswa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-dark d-flex align-items-center" style="min-height:100vh;">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-lg border-0">
                <div class="card-header bg-danger text-white text-center py-3">
                    <h5 class="mb-0 fw-bold">
                        <i class="bi bi-person-plus-fill me-1"></i> Input Data Mahasiswa
                    </h5>
                </div>

                <div class="card-body p-4">
                    <form method="POST" action="proses_mahasiswa.php"> 

                        <div class="mb-3">
                            <label class="form-label fw-semibold">NIM</label>
                            <input type="text" class="form-control" name="nim" placeholder="Masukkan NIM" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama_mahasiswa" placeholder="Masukkan nama lengkap" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Program Studi</label>
                            <select class="form-select" name="prodi_id" required>
                                <option value="" disabled selected>-- Pilih Program Studi --</option>
                                <?php
                                include "koneksi_akademik.php";
                                $res = $db->query("SELECT * FROM prodi ORDER BY nama_prodi ASC");
                                while($p = $res->fetch_assoc()) {
                                    echo "<option value='".$p['id']."'>".$p['jenjang']." - ".$p['nama_prodi']."</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tanggal_lahir" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Alamat</label>
                            <textarea class="form-control" name="alamat" rows="3" placeholder="Masukkan alamat lengkap" required></textarea>
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="index.php" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> Batal
                            </a>
                            <button type="submit" class="btn btn-danger" name="submit">
                                <i class="bi bi-save"></i> Simpan
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
