<?php
include "koneksi_akademik.php";
if (isset($_POST['submit'])) { 
    
    $nim = $_POST['nim'];
    $nama = $_POST['nama_mahasiswa'];
    $tgl = $_POST['tanggal_lahir'];
    $alamat = $_POST['alamat'];
    $prodi_id = $_POST['prodi_id'];

    if (empty($nim) || empty($nama) || empty($tgl) || empty($alamat) || empty($prodi_id)) {
        header("Location: create_mahasiswa.php?pesan=kosong");
        exit();
    }

    $sql = "INSERT INTO mahasiswa (nim, nama_mahasiswa, tanggal_lahir, alamat, prodi_id) VALUES (?, ?, ?, ?, ?)";
    $stmt = $db->prepare($sql);

    if ($stmt) {

        $stmt->bind_param("isssi", $nim, $nama, $tgl, $alamat, $prodi_id);

        if ($stmt->execute()) {
            header("Location: index.php?pesan=sukses_input");
            exit();
        } else {
            // Jika gagal execute
            echo "Gagal menyimpan data: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error database: " . $db->error;
    }

} else {
    header("Location: index.php");
    exit();
}

$db->close();
?>