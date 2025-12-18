<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Program Studi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body { background-color: #f0f4f8; }
        .card { border: none; border-radius: 15px; box-shadow: 0 10px 20px rgba(0,0,0,0.05); }
        .btn-blue { background-color: #000000ff; color: white; border: none; }
        .btn-blue:hover { background-color: #000000ff; color: white; }
    </style>
</head>
<body>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card p-4">
                <div class="text-center mb-4">
                    <h3 class="fw-bold text-primary"><i class=""></i> Tambah Prodi</h3>
                    <p class="text-muted">Input Data Program Studi Baru</p>
                </div>
                
                <form method="POST" action="proses_prodi.php">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama Program Studi</label>
                        <input type="text" class="form-control" name="nama_prodi" placeholder="Contoh: Teknik Informatika" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Jenjang</label>
                        <select class="form-select" name="jenjang" required>
                            <option value="" selected disabled>-- Pilih Jenjang --</option>
                            <option value="D2">D2</option>
                            <option value="D3">D3</option>
                            <option value="D4">D4</option>
                            <option value="S2">S2</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Keterangan</label>
                        <textarea class="form-control" name="keterangan" rows="3" placeholder="Deskripsi singkat prodi..."></textarea>
                    </div>

                    <div class="d-grid gap-2 d-flex justify-content-between">
                        <a href="index.php" class="btn btn-light text-secondary fw-bold">Kembali</a>
                        <button type="submit" class="btn btn-blue px-4 fw-bold shadow-sm" name="simpan_prodi">
                            <i class="bi bi-save"></i> Simpan Prodi
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>