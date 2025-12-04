<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <h3 class="text-center mb-4">Input Data Mahasiswa</h3>
            <div class="card p-4 shadow-sm">
                <form method="POST" action="proses_mahasiswa.php"> 

                    <div class="mb-3">
                        <label for="nim" class="form-label">NIM</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person-vcard"></i></span>
                            <input type="number" class="form-control" id="nim" name="nim" placeholder="Masukkan NIM (Contoh: 10123456)" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="nama_mahasiswa" class="form-label">Nama Mahasiswa</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                            <input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa" placeholder="Nama Lengkap" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-calendar-date"></i></span>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat lengkap..." required></textarea>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="index.php" class="btn btn-secondary">
                             <i class="bi bi-arrow-left"></i> Kembali
                        </a>
                        <div>
                            <button type="reset" class="btn btn-outline-secondary me-2" name="reset">
                                <i class="bi bi-x-circle"></i> Reset
                            </button>
                            <button type="submit" class="btn btn-primary" name="submit">
                                <i class="bi bi-save"></i> Simpan Data
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>