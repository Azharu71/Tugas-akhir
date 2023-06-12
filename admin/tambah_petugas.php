<h1 class="bg-info">Tambahkan data</h1>
<form method="post">
	<div class="form-group mb2">
		<label>Nama</label>
		<input type="text" name="nama" placeholder="Nama" required class="form-control">
	</div>
	<div class="form-group mb-2">
		<label>Username</label>
		<input type="text" name="uname" placeholder="Username" required class="form-control">
	</div>
	<div class="form-group mb-2">
		<label>Password</label>
		<input type="password" name="pswd" placeholder="Password" required class="form-control">
	</div>
	<div class="form-group mb-2">
		<label>Level</label>
		<select name="level" required>
			<option>--Pilih Level--</option>
			<option value="admin">Admin</option>
			<option value="petugas">Petugas</option>
		</select>
	</div>
	<button type="submit" name="submit" class="btn btn-primary">Tambahkan</button>
	<a href="?page=petugas" class="btn btn-secondary ml-4">Kembali</a>
</form>
<!-- php -->
<?php
if (isset($_POST['submit'])) {
	$dt1 = addslashes($_POST['nama']);
	$dt2 = addslashes($_POST['uname']);
	$dt3 = addslashes($_POST['pswd']);
	$dt4 = addslashes($_POST['level']);
	$query = $db->query("INSERT INTO petugas SET nama_petugas = '$dt1', username = '$dt2', password = '$dt3', level = '$dt4'");
	if ($query) {
		echo "<script>alert('Data ditambahkan'); document.location.href = '?page=petugas';</script>";
	} else {
		echo "<script>alert('Gagal dtambahkan'); document.location.href = '?page=petugas';</script>";
	}
}
?>