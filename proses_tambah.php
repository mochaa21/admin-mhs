<?php
include 'koneksi.php';

// Ambil data dari form
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$prodi = $_POST['prodi'];
$fakultas = $_POST['fakultas'];

// Query SQL untuk memasukkan data
$sql = "INSERT INTO mahasiswa (nim, nama, prodi, fakultas) VALUES ('$nim', '$nama', '$prodi', '$fakultas')";
$query = mysqli_query($koneksi, $sql);

// Cek apakah query berhasil
if ($query) {
  // Jika berhasil, kembali ke halaman tabel
  header("Location: mahasiswa.php?status=sukses_tambah");
} else {
  // Jika gagal
  echo "Gagal menambahkan data: " . mysqli_error($koneksi);
}
?>