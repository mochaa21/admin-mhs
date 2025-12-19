<?php
session_start();
if ($_SESSION['status'] != "login") {
  header("Location: login.php?pesan=belum_login");
  exit;
}

include 'koneksi.php';

// --- LOGIKA MENGHITUNG DATA ---

// 1. Hitung Jumlah Mahasiswa
$query_mhs = mysqli_query($koneksi, "SELECT count(*) as jumlah FROM mahasiswa");
$data_mhs = mysqli_fetch_assoc($query_mhs);
$jumlah_mahasiswa = $data_mhs['jumlah'];

// 2. Hitung Jumlah Prodi (Menggunakan DISTINCT agar tidak duplikat)
$query_prodi = mysqli_query($koneksi, "SELECT count(DISTINCT prodi) as jumlah FROM mahasiswa");
$data_prodi = mysqli_fetch_assoc($query_prodi);
$jumlah_prodi = $data_prodi['jumlah'];

// 3. Hitung Jumlah Fakultas (Menggunakan DISTINCT)
$query_fakultas = mysqli_query($koneksi, "SELECT count(DISTINCT fakultas) as jumlah FROM mahasiswa");
$data_fakultas = mysqli_fetch_assoc($query_fakultas);
$jumlah_fakultas = $data_fakultas['jumlah'];

// 4. Hitung Jumlah User (Admin)
$query_user = mysqli_query($koneksi, "SELECT count(*) as jumlah FROM users");
$data_user = mysqli_fetch_assoc($query_user);
$jumlah_user = $data_user['jumlah'];

?>

<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>
<?php include 'includes/topbar.php'; ?>

<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>

    <div class="row">

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Mahasiswa</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo $jumlah_mahasiswa; ?> Orang
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Prodi</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo $jumlah_prodi; ?> Prodi
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-graduation-cap fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Total Fakultas</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo $jumlah_fakultas; ?> Fakultas
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-university fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Admin Terdaftar</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo $jumlah_user; ?> User
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-cog fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Selamat Datang!</h6>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                            src="assets/img/undraw_posting_photo.svg" alt="...">
                    </div>
                    <p>Halo <b><?php echo $_SESSION['nama']; ?></b>, selamat datang di sistem informasi akademik mahasiswa.
                    Anda memiliki akses penuh untuk mengelola data mahasiswa, program studi, dan fakultas.</p>
                </div>
            </div>
        </div>
    </div>

</div>
<?php include 'includes/footer.php'; ?>