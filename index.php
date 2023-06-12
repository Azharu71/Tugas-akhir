<?php
require 'koneksi.php';
if (!isset($_SESSION['login'])) {
	header('location: login.php');
}
if (isset($_SESSION['lognisn'])) {
	header('location: siswa/siswa.php');
}
if ($_SESSION['loglevel'] == 'petugas') {
	header('location: petugas/petugas.php');
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Aplikasi pmebyaran SPP</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>

<body>
	<div class="container-fluid">
		<h1 class="bg-primary text-center "> APLIKASI PEMBAYARAN SPP SMK AL-IHYA 2023</h1>

		<div class="nav mb-4">
			<a href="?page=petugas" class="nav-link">Petugas</a>
			<a href="?page=spp" class="nav-link">SPP</a>
			<a href="?page=kelas" class="nav-link">Kelas</a>
			<a href="?page=Siswa" class="nav-link">Siswa</a>
			<a href="?page=pembayaran" class="nav-link">Pembayaran</a>
			<a href="?page=laporan" class="nav-link">Laporan</a>
			<a href="logout.php" class="nav-link" onclick="return confirm('keluar?')">Logout</a>
			<p class=" border border-info d-inline-block p-2 mb-2">Anda Login Sebagai Admin(<?= $_SESSION['logname']; ?>)</p>
		</div>
		<hr>
		<!-- kode php -->
		<?php if (isset($_GET['page'])) {
			require 'admin/' . $_GET['page'] . '.php';
		} else { ?>
			<h3 class="bg-info text-center p-2">Selamat datang di aplikasi pembayaran spp</h3>

		<?php } ?>
	</div>
	<p>&copy; Bella Azhar Kautsar <?= date('Y'); ?></p>
</body>

</html>