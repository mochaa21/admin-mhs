<?php
// Mulai session di paling atas
session_start();
include 'koneksi.php';

$email = $_POST['email'];
$password = $_POST['password'];

// 1. Cari user berdasarkan email
$sql = "SELECT * FROM users WHERE email='$email'";
$query = mysqli_query($koneksi, $sql);
$user = mysqli_fetch_assoc($query);

// 2. Cek apakah user ada DAN password-nya cocok
if ($user && password_verify($password, $user['password'])) {
  // Login sukses
  $_SESSION['email'] = $user['email'];
  $_SESSION['nama'] = $user['nama'];
  $_SESSION['foto_profil'] = $user['foto_profil'];
  $_SESSION['status'] = "login";
  
  // Arahkan ke halaman dashboard
  header("Location: index.php"); 
} else {
  // Login gagal
  header("Location: login.php?status=gagal_login");
}
?>