<?php
// Amankan halaman
session_start();
if ($_SESSION['status'] != "login") {
  header("Location: login.php?pesan=belum_login");
  exit;
}

include 'koneksi.php';

// Ambil data user yang sedang login dari session
$email_user = $_SESSION['email'];
$sql = "SELECT * FROM users WHERE email = '$email_user'";
$query = mysqli_query($koneksi, $sql);
$user = mysqli_fetch_assoc($query);
?>

<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>
<?php include 'includes/topbar.php'; ?>

<div class="container-fluid">
  <h1 class="h3 mb-4 text-gray-800">Profile Pengguna</h1>
  
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Edit Profile</h6>
    </div>
    <div class="card-body">
      <form action="proses_profile.php" method="POST" enctype="multipart/form-data">
        <div class="form-group text-center">
    <div class="form-group text-center">
        <?php
        $foto_saat_ini = "default.jpg"; 
        if (!empty($user['foto_profil'])) {
            $foto_saat_ini = $user['foto_profil'];
        }
        ?>
        <img src="uploads/<?php echo $foto_saat_ini; ?>" alt="Foto Profil" 
             class="img-thumbnail rounded-circle" width="150" height="150">
        
        <br><br>
        
        <?php if (!empty($user['foto_profil']) && $user['foto_profil'] != 'default.jpg'): ?>
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="hapus_foto" value="true" id="hapusFotoCheck">
                <label class="form-check-label text-danger" for="hapusFotoCheck">
                    Hapus foto saat ini?
                </label>
            </div>
        <?php endif; ?>
        </div>

    <div class="form-group">
        <label>Ganti Foto Profil (Opsional)</label>
        <input type="file" name="foto_baru" class="form-control-file">
        <input type="hidden" name="foto_lama" value="<?php echo $user['foto_profil']; ?>">
    </div>

    <hr>
        
        <div class="form-group">
          <label>Nama Lengkap</label>
          <input type="text" name="nama" class="form-control" value="<?php echo $user['nama']; ?>">
        </div>
        
        <div class="form-group">
          <label>Email</label>
          <input type="email" name="email" class="form-control" value="<?php echo $user['email']; ?>">
          <input type="hidden" name="email_lama" value="<?php echo $user['email']; ?>">
        </div>
        
        <hr>
        
        <div class="form-group">
          <label>Password Baru (Kosongkan jika tidak ingin diubah)</label>
          <input type="password" name="password_baru" class="form-control" placeholder="Masukan password baru">
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
      </form>
    </div>
  </div>
  
</div>
<?php include 'includes/footer.php'; ?>