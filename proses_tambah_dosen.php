<?php
include 'koneksi.php';
$nidn = $_POST['nidn'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$matkul = $_POST['mata_kuliah'];

$query = mysqli_query($koneksi, "INSERT INTO dosen VALUES('$nidn', '$nama', '$email', '$matkul')");

if ($query) {
    header("Location: dosen.php?status=sukses");
} else {
    echo "Gagal: " . mysqli_error($koneksi);
}
?>