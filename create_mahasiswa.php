<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        body { background-color: #f0f4f8; font-family: 'Segoe UI', sans-serif; }
        
        /* Tema Warna Teal (Sama dengan Index) */
        .navbar { background: linear-gradient(90deg, #000000ff, #000000ff); }
        .nav-link { color: rgba(255,255,255,0.85) !important; font-weight: 500; }
        .nav-link.active { color: white !important; font-weight: bold; border-bottom: 2px solid white; }
        .nav-link:hover { color: white !important; }

        .card { border: none; border-radius: 15px; box-shadow: 0 10px 20px rgba(0,0,0,0.05); }
        .form-label { font-weight: 600; color: #000101ff; }
        .input-group-text { background-color: #e0f2f1; color: #000000ff; border: 1px solid #ced4da; }
        
        .form-control:focus, .form-select:focus { 
            border-color: #000000ff; 
            box-shadow: 0 0 0 0.25rem rgba(0, 0, 0, 0.25); 
        }
        
        .btn-teal { background-color: #000000ff; color: white; border: none; }
        .btn-teal:hover { background-color: #000000ff; color: white; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark mb-4 shadow-sm">
  <div class="container">
    <a class="navbar-brand fw-bold" href="index.php"><i class="bi bi-mortarboard-fill me-2"></i>SIAKAD</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Kembali ke Daftar Mahasiswa</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card p-4">
                <div class="text-center mb-4">
                    <h3 class="fw-bold" style="color: #000000ff;"><i class=""></i> Input Data Mahasiswa</h3>
                    <p class="text-muted">Lengkapi formulir di bawah ini</p>
                </div>
                
                <form method="POST" action="proses_mahasiswa.php"> 
                    
                    <div class="mb-3">
                        <label for="nim" class="form-label">NIM</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-upc-scan"></i></span>
                            <input type="text" class="form-control" id="nim" name="nim" placeholder="Contoh: 10123456" maxlength="10" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="nama_mahasiswa" class="form-label">Nama Lengkap</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person"></i></span>
                            <input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa" placeholder="Nama Mahasiswa" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="prodi_id" class="form-label">Program Studi</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-mortarboard"></i></span>
                            <select class="form-select" id="prodi_id" name="prodi_id" required>
                                <option value="" selected disabled>-- Pilih Prodi --</option>
                                <?php
                                include "koneksi_akademik.php";
                                // Ambil data prodi untuk ditampilkan di dropdown
                                $sql_prodi = "SELECT * FROM prodi ORDER BY nama_prodi ASC";
                                $result_prodi = $db->query($sql_prodi);
                                
                                while($p = $result_prodi->fetch_assoc()) {
                                    echo "<option value='".$p['id']."'>".$p['jenjang']." - ".$p['nama_prodi']."</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-calendar-event"></i></span>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="alamat" class="form-label">Alamat</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                            <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Alamat lengkap..." required></textarea>
                        </div>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-between">
                        <a href="index.php" class="btn btn-light text-secondary fw-bold">
                             <i class="bi bi-arrow-left"></i> Batal
                        </a>
                        <button type="submit" class="btn btn-teal px-5 fw-bold shadow-sm" name="submit">
                            <i class="bi bi-save"></i> Simpan
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