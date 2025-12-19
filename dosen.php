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
    <h1 class="h3 mb-4 text-gray-800">Data Dosen</h1>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Dosen</h6>
            <a href="tambah_dosen.php" class="btn btn-primary btn-sm float-right"><i class="fas fa-plus"></i> Tambah Dosen</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NIDN</th>
                            <th>Nama Dosen</th>
                            <th>Email</th>
                            <th>Mata Kuliah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = mysqli_query($koneksi, "SELECT * FROM dosen");
                        while ($data = mysqli_fetch_assoc($query)) {
                        ?>
                        <tr>
                            <td><?php echo $data['nidn']; ?></td>
                            <td><?php echo $data['nama']; ?></td>
                            <td><?php echo $data['email']; ?></td>
                            <td><?php echo $data['mata_kuliah']; ?></td>
                            <td>
                                <a href="edit_dosen.php?nidn=<?php echo $data['nidn']; ?>" class="btn btn-success btn-circle btn-sm"><i class="fas fa-edit"></i></a>
                                <a href="hapus_dosen.php?nidn=<?php echo $data['nidn']; ?>" onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include 'includes/footer.php'; ?>