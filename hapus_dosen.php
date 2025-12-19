<?php
include 'koneksi.php';

if (isset($_GET['nidn'])) {
    $nidn = $_GET['nidn'];
    $query = mysqli_query($koneksi, "DELETE FROM dosen WHERE nidn='$nidn'");
    
    if ($query) {
        header("Location: dosen.php?status=sukses_hapus");
    } else {
        echo "Gagal hapus";
    }
}
?>