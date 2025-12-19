<?php
session_start();
if ($_SESSION['status'] != "login") {
    header("Location: login.php?pesan=belum_login");
    exit;
}

include 'koneksi.php';
?>

<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>
<?php include 'includes/topbar.php'; ?>

<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">Tabel Mahasiswa</h1>
    <p class="mb-4">Periode 2025/2026</p>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Mahasiswa</h6>
        </div>

        <div class="card-body">
            
            <form action="" method="GET" class="form-inline mb-3 float-right">
                <div class="form-group">
                    <input type="text" name="cari" class="form-control bg-light border-0 small" 
                           placeholder="Cari data..." 
                           value="<?php if(isset($_GET['cari'])){ echo $_GET['cari']; } ?>">
                    <button type="submit" class="btn btn-primary ml-1">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                    <?php if(isset($_GET['cari'])): ?>
                        <a href="mahasiswa.php" class="btn btn-secondary ml-1">Reset</a>
                    <?php endif; ?>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Prodi</th>
                            <th>Fakultas</th>
                            <th>Edit</th>
                            <th>Hapus</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // --- LOGIKA PAGINATION & PENCARIAN ---
                        
                        // 1. Tentukan batas data per halaman
                        $batas = 10;
                        $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                        $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                        $previous = $halaman - 1;
                        $next = $halaman + 1;

                        // 2. Cek apakah ada pencarian
                        if (isset($_GET['cari'])) {
                            $cari = $_GET['cari'];
                            // Query untuk menghitung jumlah total data hasil pencarian
                            $sql_jum = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nama LIKE '%$cari%' OR nim LIKE '%$cari%' OR prodi LIKE '%$cari%'");
                        } else {
                            // Query untuk menghitung jumlah total data (tanpa pencarian)
                            $sql_jum = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
                        }

                        $jumlah_data = mysqli_num_rows($sql_jum);
                        $total_halaman = ceil($jumlah_data / $batas);

                        // 3. Query utama untuk menampilkan data (ditambah LIMIT)
                        if (isset($_GET['cari'])) {
                            $cari = $_GET['cari'];
                            $sql = "SELECT * FROM mahasiswa WHERE nama LIKE '%$cari%' OR nim LIKE '%$cari%' OR prodi LIKE '%$cari%' LIMIT $halaman_awal, $batas";
                        } else {
                            $sql = "SELECT * FROM mahasiswa LIMIT $halaman_awal, $batas";
                        }
                        
                        $query = mysqli_query($koneksi, $sql);
                        $nomor = $halaman_awal + 1;

                        // 4. Tampilkan Data
                        while ($mhs = mysqli_fetch_assoc($query)) {
                            echo "<tr>";
                            echo "<td>" . $mhs['nim'] . "</td>";
                            echo "<td>" . $mhs['nama'] . "</td>";
                            echo "<td>" . $mhs['prodi'] . "</td>";
                            echo "<td>" . $mhs['fakultas'] . "</td>";
                            echo "<td>
                                    <a href='edit_mahasiswa.php?nim=" . $mhs['nim'] . "' class='btn btn-success btn-sm btn-circle'><i class='fas fa-edit'></i></a>
                                  </td>";
                            echo "<td>
                                    <a href='hapus_mahasiswa.php?nim=" . $mhs['nim'] . "' onclick='return confirm(\"Yakin ingin menghapus?\")' class='btn btn-danger btn-sm btn-circle'><i class='fas fa-trash'></i></a>
                                  </td>";
                            echo "</tr>";
                        }
                        
                        // Jika data kosong
                        if (mysqli_num_rows($query) == 0) {
                            echo "<tr><td colspan='6' class='text-center'>Data tidak ditemukan</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            
            <nav>
                <ul class="pagination justify-content-end">
                    <li class="page-item <?php if($halaman <= 1) { echo 'disabled'; } ?>">
                        <a class="page-link" <?php if($halaman > 1){ 
                            if(isset($_GET['cari'])){
                                echo "href='?halaman=$previous&cari=$cari'";
                            } else {
                                echo "href='?halaman=$previous'";
                            }
                        } ?>>Previous</a>
                    </li>

                    <?php for($x = 1; $x <= $total_halaman; $x++): ?>
                        <li class="page-item <?php if($halaman == $x) { echo 'active'; } ?>">
                            <a class="page-link" href="?halaman=<?php echo $x; ?><?php if(isset($_GET['cari'])){ echo "&cari=$cari"; } ?>"><?php echo $x; ?></a>
                        </li>
                    <?php endfor; ?>

                    <li class="page-item <?php if($halaman >= $total_halaman) { echo 'disabled'; } ?>">
                        <a class="page-link" <?php if($halaman < $total_halaman) { 
                            if(isset($_GET['cari'])){
                                echo "href='?halaman=$next&cari=$cari'";
                            } else {
                                echo "href='?halaman=$next'";
                            }
                        } ?>>Next</a>
                    </li>
                </ul>
            </nav>

        </div>
    </div>

</div>
<?php include 'includes/footer.php'; ?>