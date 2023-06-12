<h1 class="bg-info">Tambahkan data</h1>
<form method="post">
	<div class="form-group mb-2">
		<label>Nama kelas</label>
		<select name="kelas" required>
			<option value="X">X</option>
			<option value="XI">XI</option>
			<option value="XII">XII</option>
		</select>
	</div>

	<div class="form-group mb-2">
		<label>Kompetensi Keahlian</label>
		<select name="komkel" required>
			<option value="RPL">Rekayasa perangkat lunak</option>
			<option value="TKJ">Teknik komputer jaringan</option>
			<option value="TKR">Teknik kendaraan ringan otomotif</option>
		</select>
	</div>
	<button type="submit" name="submit" class="btn btn-primary">Tambahkan</button>
	<a href="?page=kelas" class="btn btn-secondary ml-4">Kembali</a>
</form>
<!-- php -->
<?php
if (isset($_POST['submit'])) {
	$dt1 = addslashes($_POST['kelas']);
	$dt2 = addslashes($_POST['komkel']);
	$query = $db->query("INSERT INTO kelas SET nama_kelas = '$dt1', kompetensi_keahlian = '$dt2'");
	if ($query) {
		echo "<script>alert('Data ditambahkan'); document.location.href = '?page=kelas';</script>";
	} else {
		echo "<script>alert('Gagal dtambahkan'); document.location.href = '?page=kelas';</script>";
	}
}
?>