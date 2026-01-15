<?php
session_start();
include "koneksi_akademik.php";

if (isset($_POST['update_profil'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama_lengkap'];
    $password_baru = $_POST['password_baru'];


    if (empty($nama)) {
        header("Location: edit_profil.php?pesan=Nama tidak boleh kosong");
        exit();
    }

    if (!empty($password_baru)) {

        // Keamanan data: Password di-hash
        $password_hash = password_hash($password_baru, PASSWORD_DEFAULT);
        
        $sql = "UPDATE pengguna SET nama_lengkap = ?, password = ? WHERE id = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("ssi", $nama, $password_hash, $id);
    } else {

        $sql = "UPDATE pengguna SET nama_lengkap = ? WHERE id = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("si", $nama, $id);
    }

    if ($stmt->execute()) {

        $_SESSION['nama'] = $nama;
        header("Location: edit_profil.php?pesan=Profil Berhasil Diupdate");
    } else {
        echo "Error update: " . $db->error;
    }
    $stmt->close();
}
?>