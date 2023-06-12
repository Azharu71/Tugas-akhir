<?php require '../koneksi.php';
if (!isset($_SESSION['login'])) {
    header('location: ../login.php');
} ?>

<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<div class="container-fluid">
    <h1 class="bg-primary text-center "> APLIKASI PEMBAYARAN SPP SMK AL-IHYA 2023</h1>

    <div class="nav mb-4">
        <a href="?page=data_siswa" class="nav-link">siswa</a>
        <a href="?page=kelas" class="nav-link">Kelas</a>
        <a href="?page=histori_pembayaran" class="nav-link">Histori Pembayaran</a>
        <a href="../logout.php" class="nav-link" onclick="return confirm('keluar?')">Logout</a>
    </div>
    <hr>
    <!-- kode php -->
    <?php if (isset($_GET['page'])) {
        require  $_GET['page'] . '.php';
    } else { ?>
        <h3 class="bg-info p-2 text-center">Selamat datang di aplikasi pembayaran spp</h3>
    <?php } ?>
</div>
<p>&copy; Bella Azhar Kautsar <?= date('Y'); ?></p>