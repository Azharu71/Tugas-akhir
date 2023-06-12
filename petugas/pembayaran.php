<h1 class="container-md text-center bg-info ">Data siswa</h1>
<table class="table table-bordered table-striped">
	<tr>
		<th>No</th>
		<th>NISN</th>
		<th>NAMA</th>
		<th>KELAS</th>
		<th>SPP</th>
		<th>STATUS BAYAR</th>
		<th>KURANG</th>
		<th>KETERANGAN</th>
		<th>HISTORI</th>
	</tr>
	<?php $no = 1;
	$query = $db->query("SELECT * FROM siswa,kelas,spp WHERE siswa.id_kelas = kelas.id_kelas AND siswa.id_spp = spp.id_spp ");
	foreach ($query as $data) :
		$bayar = $db->query("SELECT SUM(jumlah_bayar) as jumlah_bayar FROM pembayaran WHERE nisn = '$data[nisn]'")->fetch_assoc();
		$sudah_bayar = $bayar['jumlah_bayar'];
		$kurang = $data['nominal'] - $bayar['jumlah_bayar'];
	?>
		<tr>
			<td><?= $no++; ?></td>
			<td><?= $data['nisn']; ?></td>
			<td><?= $data['nama']; ?></td>
			<td><?= $data['nama_kelas']; ?></td>
			<td><?= $data['nominal']; ?></td>
			<td><?php if ($sudah_bayar < 1) {
					echo "Belum Dibayar";
				} else {
					echo $sudah_bayar;
				} ?></td>
			<td><?= $kurang; ?></td>
			<?php if ($kurang > 0) : ?>
				<td><a href="?page=tambah_pembayaran&id=<?= $data['nisn'] ?>" class="btn btn-warning">Bayarkan</a></td>
			<?php else : ?>
				<td>
					<p class="btn btn-success">Lunas</p>
				</td>
			<?php endif ?>

			<td><a href="?page=histori_pembayaran&id=<?= $data['nisn'] ?>" class="btn btn-info">Histori</a></td>
		</tr>
	<?php endforeach; ?>
</table>