<?php
include "koneksi_akademik.php";
if (isset($_POST['submit'])) { 
    
    $nim = $_POST['nim'];
    $nama = $_POST['nama_mahasiswa'];
    $tgl = $_POST['tanggal_lahir'];
    $alamat = $_POST['alamat'];

    if (empty($nim) || empty($nama) || empty($tgl) || empty($alamat)) {
        header("Location: create_mahasiswa.php?pesan=kosong");
        exit();
    }

    $sql = "INSERT INTO mahasiswa (nim, nama_mahasiswa, tanggal_lahir, alamat) VALUES (?, ?, ?, ?)";
    $stmt = $db->prepare($sql);

    if ($stmt) {

        $stmt->bind_param("isss", $nim, $nama, $tgl, $alamat);

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