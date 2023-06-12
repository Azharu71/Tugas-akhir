<?php
$querykelas = $db->query("SELECT * FROM kelas ");
$queryspp = $db->query("SELECT * FROM spp ");
$querysiswa = $db->query("SELECT * FROM siswa,spp,kelas WHERE siswa.id_kelas = kelas.id_kelas AND siswa.id_spp = spp.id_spp AND siswa.nisn = '$_GET[id]'")->fetch_assoc();
?>
<h1 class="bg-info">Tambahkan data</h1>
<form method="post">
	<div class="form-group mb2">
		<label>Nisn</label>
		<input type="number" name="nisn" placeholder="Nisn" value="<?= $querysiswa['nisn'] ?>" required class="form-control" readonly>
	</div>
	<div class="form-group mb-2">
		<label>Nis</label>
		<input type="number" name="nis" placeholder="Nis" value="<?= $querysiswa['nis'] ?>" required class="form-control">
	</div>
	<div class="form-group mb-2">
		<label>Nama</label>
		<input type="text" name="nama" placeholder="Nama Lengkap" value="<?= $querysiswa['nama'] ?>" required class="form-control">
	</div>
	<div class="form-group mb-2">
		<label>Kelas</label>
		<select name="kelas" required>
			<option value="<?= $querysiswa['id_kelas'] ?>"><?= $querysiswa['nama_kelas'], ' ', $querysiswa['kompetensi_keahlian'] ?></option>
			<?php foreach ($querykelas as $datakelas) : ?>
				<option value="<?= $datakelas['id_kelas'] ?>"><?= $querysiswa['nama_kelas'], ' ', $datakelas['kompetensi_keahlian'] ?></option>
			<?php endforeach; ?>
		</select>
	</div>
	<div class="form-group mb-2">
		<label>Alamat</label>
		<textarea type="text" name="alamat" placeholder="Alamat lengkap" required class="form-control" value="<?= $querysiswa['alamat'] ?>"><?= $querysiswa['alamat'] ?></textarea>
	</div>
	<div class="form-group mb-2">
		<label>No TELP</label>
		<input type="number" name="no_telp" placeholder="No telpon" value="<?= $querysiswa['no_telp'] ?>" required class="form-control">
	</div>
	<div class="form-group mb-2">
		<label>SPP</label>
		<select name="spp" required>
			<option value="<?= $querysiswa['id_spp'] ?>"><?= $querysiswa['tahun'], ' | ', $querysiswa['nominal'] ?></option>
			<?php foreach ($queryspp as $dataspp) : ?>
				<option value="<?= $dataspp['id_spp'] ?>"><?= $dataspp['tahun'] ?> | <?= $dataspp['nominal'] ?> </option>
			<?php endforeach; ?>
		</select>
	</div>
	<button type="submit" name="submit" class="btn btn-primary">Tambahkan</button>
	<a href="?page=siswa" class="btn btn-secondary ml-4">Kembali</a>
</form>
<!-- php -->
<?php
if (isset($_POST['submit'])) {
	$dt1 = addslashes($_POST['nisn']);
	$dt2 = addslashes($_POST['nis']);
	$dt3 = addslashes($_POST['nama']);
	$dt4 = addslashes($_POST['kelas']);
	$dt5 = addslashes($_POST['alamat']);
	$dt6 = addslashes($_POST['no_telp']);
	$dt7 = addslashes($_POST['spp']);
	$query = $db->query("UPDATE siswa SET 
		nisn = '$dt1', nis = '$dt2', nama = '$dt3', id_kelas = '$dt4', alamat = '$dt5', no_telp = '$dt6', id_spp = '$dt7' WHERE nisn = '$_GET[id]'");
	if ($query) {
		echo "<script>alert('Data ditambahkan'); document.location.href = '?page=siswa';</script>";
	} else {
		echo "<script>alert('Gagal dtambahkan'); document.location.href = '?page=siswa';</script>";
	}
}
?>