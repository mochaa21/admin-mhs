<?php
session_start();
if ($_SESSION['status'] != "login") header("Location: login.php");
include 'includes/header.php';
include 'includes/navbar.php';
include 'includes/topbar.php';
?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Dosen</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="proses_tambah_dosen.php">
                <div class="form-group">
                    <label>NIDN</label>
                    <input type="text" name="nidn" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Nama Dosen</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Mata Kuliah</label>
                    <input type="text" name="mata_kuliah" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="dosen.php" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
<?php include 'includes/footer.php'; ?>