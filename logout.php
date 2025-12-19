<?php
// Mulai session
session_start();

// Hapus semua data session
session_unset();

// Hancurkan session
session_destroy();

// Alihkan ke halaman login
header("Location: login.php?status=logout_sukses");
exit;
?>