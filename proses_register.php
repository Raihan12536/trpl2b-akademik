<?php
include "koneksi_akademik.php";

if (isset($_POST['register'])) {
    $nama = $_POST['nama_lengkap'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $konfirmasi = $_POST['konfirmasi_password'];


    if ($password !== $konfirmasi) {
        header("Location: register.php?pesan=Password dan Konfirmasi tidak cocok");
        exit();
    }

    $cek_email = $db->prepare("SELECT email FROM pengguna WHERE email = ?");
    $cek_email->bind_param("s", $email);
    $cek_email->execute();
    $cek_email->store_result();

    if ($cek_email->num_rows > 0) {
        header("Location: register.php?pesan=Email sudah terdaftar, gunakan email lain");
        exit();
    }



    $password_hash = password_hash($password, PASSWORD_DEFAULT);


    $sql = "INSERT INTO pengguna (nama_lengkap, email, password) VALUES (?, ?, ?)";
    $stmt = $db->prepare($sql);
    
    if ($stmt) {
        $stmt->bind_param("sss", $nama, $email, $password_hash);
        
        if ($stmt->execute()) {

            header("Location: login.php?pesan=Pendaftaran Berhasil, Silakan Login");
        } else {
            header("Location: register.php?pesan=Gagal Mendaftar");
        }
        $stmt->close();
    } else {
        echo "Error Database: " . $db->error;
    }
} else {
    header("Location: register.php");
}
$db->close();
?>