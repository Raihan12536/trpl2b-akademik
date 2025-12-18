<?php
include "koneksi_akademik.php";

if (isset($_POST['update_prodi'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama_prodi'];
    $jenjang = $_POST['jenjang'];
    $ket = $_POST['keterangan'];

    $sql = "UPDATE prodi SET nama_prodi=?, jenjang=?, keterangan=? WHERE id=?";
    $stmt = $db->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("sssi", $nama, $jenjang, $ket, $id);
        
        if ($stmt->execute()) {
            // Redirect ke view_prodi.php (BUKAN index.php)
            header("Location: view_prodi.php?pesan=sukses_update_prodi");
        } else {
            echo "Gagal update: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error: " . $db->error;
    }
}
$db->close();
?>