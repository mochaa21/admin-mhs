<?php
include 'koneksi.php';

// Ambil NIM dari URL
if (isset($_GET['nim'])) {
  $nim = $_GET['nim'];
  
  // Query SQL untuk menghapus data
  $sql = "DELETE FROM mahasiswa WHERE nim='$nim'";
  $query = mysqli_query($koneksi, $sql);
  
  if ($query) {
    header("Location: mahasiswa.php?status=sukses_hapus");
  } else {
    die("Gagal menghapus data: " . mysqli_error($koneksi));
  }
  
} else {
  die("Akses dilarang...");
}
?>