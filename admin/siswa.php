<h1 class="container-md text-center bg-info ">Data siswa</h1>
<a href="?page=tambah_siswa" class="btn btn-primary">Tambah data</a>
<table class="table table-bordered table-striped">
	<tr>
		<th>No</th>
		<th>NISN</th>
		<th>NIS</th>
		<th>NAMA</th>
		<th>KELAS</th>
		<th>ALAMAT</th>
		<th>TELP</th>
		<th>SPP</th>
		<th>Opsi</th>
	</tr>
	<?php $no = 1;
	$query = $db->query("SELECT * FROM siswa,kelas,spp WHERE siswa.id_kelas = kelas.id_kelas AND siswa.id_spp = spp.id_spp ORDER by nama DESC");
	foreach ($query as $data) :
	?>
		<tr>
			<td><?= $no++; ?></td>
			<td><?= $data['nisn']; ?></td>
			<td><?= $data['nis']; ?></td>
			<td><?= $data['nama']; ?></td>
			<td><?= $data['nama_kelas'], ' ', $data['kompetensi_keahlian']; ?></td>
			<td><?= $data['alamat']; ?></td>
			<td><?= $data['no_telp']; ?></td>
			<td>Rp. <?= number_format($data['nominal'], 2, '.', '.'); ?></td>
			<td align="center"><a href="?page=edit_siswa&id=<?= $data['nisn'] ?>" class="btn btn-primary">Edit</a> | <a href="?page=hapus_siswa&id=<?= $data['nisn'] ?>" class="btn btn-primary" onclick="return confirm('Hapus?')">Hapus</a></td>
		</tr>
	<?php endforeach; ?>
</table>