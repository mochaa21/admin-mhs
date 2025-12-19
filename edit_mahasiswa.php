<?php
// 1. Mulai Session TERLEBIH DAHULU (Wajib di baris paling atas)
session_start();

// Pastikan user sudah login (Opsional tapi disarankan)
if (empty($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("Location: login.php");
    exit;
}

// 1. Hubungkan ke database
include 'koneksi.php';
// (Pastikan Anda sudah memulai session jika perlu)

// 2. Ambil NIM dari URL
if (isset($_GET['nim'])) {
  $nim = $_GET['nim'];
  
  // 3. Buat query untuk mengambil data mahasiswa
  $sql = "SELECT * FROM mahasiswa WHERE nim = '$nim'";
  $query = mysqli_query($koneksi, $sql);
  $mhs = mysqli_fetch_assoc($query);
  
  // 4. Jika data tidak ditemukan, tampilkan pesan
  if (mysqli_num_rows($query) < 1) {
    die("Data tidak ditemukan...");
  }
  
} else {
  die("NIM tidak ditemukan di URL.");
}

// 5. Sekarang, variabel $mhs sudah berisi data
//    (Contoh: $mhs['nama'], $mhs['prodi'], dll.)

?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>
<?php include 'includes/topbar.php'; ?>

                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Edit Mahasiswa</h6>
                                    </div>
                                    <div class="card-body">
                                    <form class="user" method="POST" action="proses_edit.php">
                                        <input type="hidden" name="nim_lama" value="<?php echo $mhs['nim']; ?>">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="nim" name="nim" aria-describedby="emailHelp"
                                                placeholder="Masukan NIM" value="<?php echo $mhs['nim']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="nama" name="nama" placeholder="Masukan Nama" value="<?php echo $mhs['nama']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="prodi" name="prodi" placeholder="Masukan Prodi"value="<?php echo $mhs['prodi']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="fakultas" name="fakultas" placeholder="Masukan Fakultas" value="<?php echo $mhs['fakultas']; ?>" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Perbarui
                                        </button>
                                    </form>
                                </div>
                            </div>
<?php include 'includes/footer.php'; ?>