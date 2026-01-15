<?php
session_start();
include "koneksi_akademik.php";

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];


    $stmt = $db->prepare("SELECT * FROM pengguna WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row['password'])) {
            // Set Session
            $_SESSION['status'] = "login";
            $_SESSION['id_user'] = $row['id'];
            $_SESSION['nama'] = $row['nama_lengkap'];
            
 
            header("Location: edit_profil.php");
        } else {
            header("Location: login.php?pesan=Password Salah");
        }
    } else {
        header("Location: login.php?pesan=Email tidak ditemukan");
    }
    $stmt->close();
}
?>