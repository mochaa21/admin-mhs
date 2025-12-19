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

<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- 404 Error Text -->
                    <div class="text-center">
                        <div class="error mx-auto" data-text="404">404</div>
                        <p class="lead text-gray-800 mb-5">Halaman ini masih dalam tahap pembuatan</p>
                        <p class="text-gray-500 mb-0">Jika kelupaan password, mohon maaf bikin akun baru lagi...</p>
                        <a href="index.php">&larr; Back to Dashboard</a>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
<!-- End of Main Content -->
<?php include 'includes/footer.php'; ?>