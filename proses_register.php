<?php
include 'koneksi.php';

$nama = $_POST['nama'];
$email = $_POST['email'];
$password = $_POST['password'];
$ulangi_password = $_POST['ulangi_password']; // Ambil input repeat password

// 1. VALIDASI: Cek apakah ada kolom kosong
if (empty($nama) || empty($email) || empty($password)) {
    echo "<script>
            alert('Semua kolom wajib diisi!');
            window.location.href = 'register.php';
          </script>";
    exit;
}

// 2. VALIDASI: Cek apakah Password dan Ulangi Password sama
if ($password !== $ulangi_password) {
    echo "<script>
            alert('Password tidak sama!');
            window.location.href = 'register.php';
          </script>";
    exit;
}

// 3. Hash Password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// 4. Simpan ke Database
$sql = "INSERT INTO users (nama, email, password) VALUES ('$nama', '$email', '$hashed_password')";

if (mysqli_query($koneksi, $sql)) {
    echo "<script>
            alert('Registrasi Berhasil! Silakan Login.');
            window.location.href = 'login.php';
          </script>";
} else {
    echo "Error: " . mysqli_error($koneksi);
}
?>