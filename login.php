<?php
require 'koneksi.php';
if (isset($_POST['submit'])) {
	$dt1 = addslashes($_POST['unama']);
	$dt2 = addslashes($_POST['pswd']);
	$query = $db->query("SELECT * FROM  petugas WHERE username = '$dt1' AND password = '$dt2'");
	if (mysqli_num_rows($query)) {
		$data = $query->fetch_assoc();
		$_SESSION['login'] = true;
		$_SESSION['logid'] = $data['id_petugas'];
		$_SESSION['logname'] = $data['nama_petugas'];
		$_SESSION['loglevel'] = $data['level'];
		echo "<script>alert('Berhasil login'); document.location.href = 'index.php';</script>";
	} else {
		echo "Username/Password salah";
	}
}
?>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<div class="container-fluid">
	<form method="post" class="bg-info mx-auto p-3 rounded" style="width: 36rem; margin-top: 8rem;">
		<h1 class="text-center">Silahkan Login</h1>
		<div class="form-group mb2">
			<label>Username</label>
			<input type="text" name="unama" placeholder="Username" required class="form-control">
		</div>
		<div class="form-group mb-2">
			<label>Password</label>
			<input type="password" name="pswd" placeholder="Password" required class="form-control">
		</div>
		<button type="submit" name="submit" class="btn btn-primary">Login</button>
		<a href="login2.php">Login sebagai siswa</a>

	</form>
</div>