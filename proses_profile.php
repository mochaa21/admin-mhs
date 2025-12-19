<?php
session_start();
include 'koneksi.php';

// Ambil data form teks
$email_lama = $_POST['email_lama'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$password_baru = $_POST['password_baru'];
$foto_lama = $_POST['foto_lama']; 

$nama_foto_db = $foto_lama; 

// --- LOGIKA HAPUS DAN UPLOAD FOTO ---

// 1. Cek apakah user ingin MENGHAPUS foto?
if (isset($_POST['hapus_foto']) && $_POST['hapus_foto'] == 'true') {
    
    // Hapus file fisik foto lama (kecuali jika itu default.jpg)
    if ($foto_lama != 'default.jpg' && file_exists("uploads/" . $foto_lama)) {
        unlink("uploads/" . $foto_lama);
    }
    
    // Set foto di database menjadi kosong atau NULL
    $nama_foto_db = ""; // Atau bisa diisi "default.jpg" jika ingin memaksa default
} 
// cek apakah ada Upload Baru
elseif (!empty($_FILES['foto_baru']['name'])) {
    
    $nama_file_baru = $_FILES['foto_baru']['name'];
    $ukuran_file = $_FILES['foto_baru']['size'];
    $tmp_name = $_FILES['foto_baru']['tmp_name'];
    $error = $_FILES['foto_baru']['error'];

    if ($error === 0) {
        $ekstensi_valid = ['jpg', 'jpeg', 'png', 'gif'];
        $ekstensi_file = strtolower(pathinfo($nama_file_baru, PATHINFO_EXTENSION));
        
        if (in_array($ekstensi_file, $ekstensi_valid)) {
            $nama_file_unik = uniqid() . '-' . $nama_file_baru;
            $tujuan_upload = "uploads/" . $nama_file_unik;
            
            if (move_uploaded_file($tmp_name, $tujuan_upload)) {
                $nama_foto_db = $nama_file_unik;
                
                // Hapus foto lama agar tidak menumpuk
                if (!empty($foto_lama) && $foto_lama != 'default.jpg' && file_exists("uploads/" . $foto_lama)) {
                    unlink("uploads/" . $foto_lama);
                }
            } else {
                echo "Gagal memindahkan file.";
                exit;
            }
        } else {
            echo "Ekstensi file tidak diizinkan!";
            exit;
        }
    }
}
// --- AKHIR LOGIKA FOTO ---

// --- UPDATE DATABASE ---
// Query update

$sql = "UPDATE users SET 
            nama = '$nama', 
            email = '$email', 
            foto_profil = '$nama_foto_db' 
        WHERE email = '$email_lama'";

if (!empty($password_baru)) {
    $hashed_password = password_hash($password_baru, PASSWORD_DEFAULT);
    $sql = "UPDATE users SET 
                nama = '$nama', 
                email = '$email', 
                password = '$hashed_password', 
                foto_profil = '$nama_foto_db' 
            WHERE email = '$email_lama'";
}

$query = mysqli_query($koneksi, $sql);

if ($query) {
    $_SESSION['nama'] = $nama;
    $_SESSION['email'] = $email;
    $_SESSION['foto_profil'] = $nama_foto_db; 
    
    header("Location: profile.php?status=sukses_update");
} else {
    die("Gagal mengupdate profile: " . mysqli_error($koneksi));
}
?>