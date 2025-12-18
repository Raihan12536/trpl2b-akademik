<?php
include "koneksi_akademik.php";

if (isset($_POST['simpan_prodi'])) {
    $nama = $_POST['nama_prodi'];
    $jenjang = $_POST['jenjang'];
    $ket = $_POST['keterangan'];

    $sql = "INSERT INTO prodi (nama_prodi, jenjang, keterangan) VALUES (?, ?, ?)";
    $stmt = $db->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("sss", $nama, $jenjang, $ket);
        
        if ($stmt->execute()) {
            header("Location: index.php?pesan=sukses_input_prodi"); 
        } else {
            echo "Gagal: " . $stmt->error;
        }
    } else {
        echo "Error Prepare: " . $db->error;
    }
} else {
    echo "Akses dilarang. Klik tombol simpan dari form.";
}
?>