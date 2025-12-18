<?php
include "koneksi_akademik.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM prodi WHERE id = ?";
    $stmt = $db->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $id);
        
        try {
            if ($stmt->execute()) {
                header("Location: view_prodi.php?pesan=sukses_hapus_prodi");
            } else {
                header("Location: view_prodi.php?pesan=gagal");
            }
        } catch (mysqli_sql_exception $e) {
            // Menangkap error jika Prodi tidak bisa dihapus karena masih dipakai oleh Mahasiswa
            echo "<script>
                    alert('GAGAL MENGHAPUS! Program Studi ini sedang digunakan oleh data Mahasiswa. Silakan ubah atau hapus data mahasiswa yang terkait terlebih dahulu.');
                    window.location.href='view_prodi.php';
                  </script>";
        }
        $stmt->close();
    }
}
$db->close();
?>  