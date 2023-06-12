<?php
$pembayaran = $db->query("SELECT SUM(jumlah_bayar) as jumlah_bayar FROM pembayaran WHERE nisn = '$_GET[id]'")->fetch_assoc();
$query = $db->query("SELECT * FROM siswa,kelas,spp WHERE siswa.id_kelas = kelas.id_kelas AND siswa.id_spp = spp.id_spp AND siswa.nisn = '$_GET[id]' ")->fetch_assoc();
?>
<h1 class="bg-info">Tambahkan data</h1>
<form method="post">
	<div class="form-group mb2">
		<label>Nama Petugas</label>
		<input type="text" placeholder="Nama petugas" value="<?= $_SESSION['logname'] ?>" class="form-control" readonly>
		<input type="hidden" name="nisn" value="<?= $_SESSION['logid'] ?>">
	</div>
	<div class="form-group mb-2">
		<label>Nisn/Nama</label>
		<input type="text" name="nis" placeholder="Nis" required class="form-control" value="<?= $query['nisn'], ' / ', $query['nama'] ?>" readonly>
	</div>
	<div class="form-group mb-2">
		<label>Tanggal Bayar</label>
		<input type="text" name="nama" placeholder="Nama Lengkap" value="<?= date('Y/n/j') ?>" required class="form-control">
	</div>
	<div class="form-group mb-2">
		<label>Tahun</label>
		<select name="tahun" required>
			<?php for ($i = 2015; $i <= date('Y'); $i++) : ?>
				<option value="<?= $i ?>"><?= $i ?></option>
			<?php endfor; ?>
		</select>
	</div>
	<div class="form-group mb-2">
		<label>Bulan</label>
		<select name="bulan" required>
			<option value="januari">januari</option>
			<option value="februari">februari</option>
			<option value="maret">maret</option>
			<option value="april">april</option>
			<option value="mei">mei</option>
			<option value="juni">juni</option>
			<option value="juli">juli</option>
			<option value="agustus">agustus</option>
			<option value="september">september</option>
			<option value="november">november</option>
			<option value="desember">desember</option>


		</select>
	</div>
	<?= 'Kurang:' . ($query['nominal'] - $pembayaran['jumlah_bayar']); ?>
	<div class="form-group mb-2">
		<label>Nominal</label>
		<input max="<?= ($query['nominal'] - $pembayaran['jumlah_bayar']); ?>" type="number" name="nom" placeholder="Nominal" required" class="form-control">
	</div>

	<button type="submit" name="submit" class="btn btn-primary">Tambahkan</button>
	<a href="?page=pembayaran" class="btn btn-secondary ml-4">Kembali</a>

</form>
<!-- php -->
<?php
if (isset($_POST['submit'])) {
	$dt1 = addslashes($_POST['nisn']);
	$dt2 = addslashes($_POST['nis']);
	$dt3 = addslashes($_POST['nama']);
	$dt4 = addslashes($_POST['tahun']);
	$dt5 = addslashes($_POST['bulan']);
	$dt6 = addslashes($_POST['nom']);
	$query = $db->query("INSERT INTO pembayaran SET 
		id_petugas = '$dt1', nisn = '$_GET[id]', tgl_bayar = '$dt3', tahun_bayar = '$dt4', bulan_bayar = '$dt5', jumlah_bayar = '$dt6'");
	if ($query) {
		echo "<script>alert('Data ditambahkan'); document.location.href = '?page=pembayaran';</script>";
	} else {
		echo "<script>alert('Gagal dtambahkan'); document.location.href = '?page=pembayaran';</script>";
	}
}
?>