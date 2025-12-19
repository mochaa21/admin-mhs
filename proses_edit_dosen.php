<?php
include 'koneksi.php';
$nidn_lama = $_POST['nidn_lama'];
$nidn = $_POST['nidn'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$matkul = $_POST['mata_kuliah'];

$query = mysqli_query($koneksi, "UPDATE dosen SET nidn='$nidn', nama='$nama', email='$email', mata_kuliah='$matkul' WHERE nidn='$nidn_lama'");

if ($query) {
    header("Location: dosen.php?status=sukses_edit");
} else {
    echo "Gagal: " . mysqli_error($koneksi);
}
?>