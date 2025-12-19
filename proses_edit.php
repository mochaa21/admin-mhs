<?php
session_start();
if ($_SESSION['status'] != "login") {
  header("Location: login.php?pesan=belum_login");
  exit; // Hentikan eksekusi script
}
// ... sisa kode halaman Anda ...
?>
<?php
include 'koneksi.php';

// Ambil data dari form
$nim_lama = $_POST['nim_lama']; // perlu input hidden untuk NIM asli
$nim_baru = $_POST['nim'];
$nama = $_POST['nama'];
$prodi = $_POST['prodi'];
$fakultas = $_POST['fakultas'];

// Query SQL untuk update data
$sql = "UPDATE mahasiswa SET nim='$nim_baru', nama='$nama', prodi='$prodi', fakultas='$fakultas' WHERE nim='$nim_lama'";
$query = mysqli_query($koneksi, $sql);

if ($query) {
  header("Location: mahasiswa.php?status=sukses_edit");
} else {
  die("Gagal mengedit data: " . mysqli_error($koneksi));
}
?>