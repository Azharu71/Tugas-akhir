<h1 class="bg-info">Tambahkan data</h1>
<form method="post">
	<div class="form-group mb-2">
		<label>Tahun</label>
		<select name="thn" required>
			<option>--Pilih Tahun--</option>
			<?php for ($i = 2015; $i <= date('Y'); $i++) : ?>
				<option value="<?= $i ?>"><?= $i ?></option>
			<?php endfor; ?>
		</select>
	</div>

	<div class="form-group mb-2">
		<label>Nominal</label>
		<input type="number" name="nom" placeholder="Nominal" required class="form-control">
	</div>
	<button type="submit" name="submit" class="btn btn-primary">Tambahkan</button>
	<a href="?page=spp" class="btn btn-secondary ml-4">Kembali</a>
</form>
<!-- php -->
<?php
if (isset($_POST['submit'])) {
	$dt1 = addslashes($_POST['thn']);
	$dt2 = addslashes($_POST['nom']);
	$query = $db->query("INSERT INTO spp SET tahun = '$dt1', nominal= '$dt2'");
	if ($query) {
		echo "<script>alert('Data ditambahkan'); document.location.href = '?page=spp';</script>";
	} else {
		echo "<script>alert('Gagal dtambahkan'); document.location.href = '?page=spp';</script>";
	}
}
?>