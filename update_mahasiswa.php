<?php
include "koneksi_akademik.php";

if (isset($_POST['update'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama_mahasiswa'];
    $tgl = $_POST['tanggal_lahir'];
    $alamat = $_POST['alamat'];

    // Query Update
    $sql = "UPDATE mahasiswa SET nama_mahasiswa=?, tanggal_lahir=?, alamat=? WHERE nim=?";
    $stmt = $db->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("sssi", $nama, $tgl, $alamat, $nim);
        
        if ($stmt->execute()) {
            header("Location: index.php?pesan=sukses_update");
        } else {
            header("Location: index.php?pesan=gagal");
        }
        $stmt->close();
    } else {
        echo "Error: " . $db->error;
    }
}
$db->close();
?>