<?php include 'koneksi.php'; ?>
<?php
session_start();
if ($_SESSION['status'] != "login") {
  header("Location: login.php?pesan=belum_login");
  exit; // Hentikan eksekusi script
}
// ... sisa kode halaman Anda ...
?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>
<?php include 'includes/topbar.php'; ?>
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Tambah Mahasiswa</h6>
                                    </div>
                                    <div class="card-body">
                                    <form class="user" method="POST" action="proses_tambah.php">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="nim" name="nim" aria-describedby="emailHelp"
                                                placeholder="Masukan NIM" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="nama" name="nama" placeholder="Masukan Nama" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="prodi" name="prodi" placeholder="Masukan Prodi" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="fakultas" name="fakultas" placeholder="Masukan Fakultas" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Perbarui
                                        </a>
                                    </form>
                                </div>
                            </div>
<?php include 'includes/footer.php'; ?>