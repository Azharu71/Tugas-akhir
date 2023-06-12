<?php
require '../koneksi.php';
if (!isset($_SESSION['login'])) {
	header('location: ../login.php');
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Aplikasi pembayaran SPP</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>

<body>
	<div class="container-fluid">
		<h1 class="bg-primary text-center "> APLIKASI PEMBAYARAN SPP SMK AL-IHYA 2023</h1>

		<div class="nav mb-4 d-flex">
			<a href="petugas.php" class="nav-link">Petugas</a>
			<a href="?page=pembayaran" class="nav-link">Pembayaran</a>
			<a href="../logout.php" class="nav-link" onclick="return confirm('keluar?')">Logout</a>
			<p class="border border-info d-inline-block p-2 mb-2 mr-2">Anda login sebagai Petugas (<?= $_SESSION['logname']; ?>)</p>
		</div>
		<hr>
		<!-- kode php -->
		<?php if (isset($_GET['page'])) {
			require  $_GET['page'] . '.php';
		} else { ?>
			<h3 class="bg-info p-2 text-center">Selamat datang di aplikasi pembayaran spp</h3>

		<?php }
		?>
	</div>
	<p>&copy; Bella Azhar Kautsar <?= date('Y'); ?></p>
</body>

</html>