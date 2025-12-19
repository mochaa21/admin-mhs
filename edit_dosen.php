<?php
session_start();
include 'koneksi.php';
if (!isset($_GET['nidn'])) header("Location: dosen.php");

$nidn = $_GET['nidn'];
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM dosen WHERE nidn='$nidn'"));

include 'includes/header.php';
include 'includes/navbar.php';
include 'includes/topbar.php';
?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Dosen</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="proses_edit_dosen.php">
                <input type="hidden" name="nidn_lama" value="<?php echo $data['nidn']; ?>">
                
                <div class="form-group">
                    <label>NIDN</label>
                    <input type="text" name="nidn" class="form-control" value="<?php echo $data['nidn']; ?>" required>
                </div>
                <div class="form-group">
                    <label>Nama Dosen</label>
                    <input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="<?php echo $data['email']; ?>" required>
                </div>
                <div class="form-group">
                    <label>Mata Kuliah</label>
                    <input type="text" name="mata_kuliah" class="form-control" value="<?php echo $data['mata_kuliah']; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Perbarui</button>
                <a href="dosen.php" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
<?php include 'includes/footer.php'; ?>