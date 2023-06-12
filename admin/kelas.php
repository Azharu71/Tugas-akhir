<h1 class="container-md text-center bg-info">Data Kelas</h1>
<a href="?page=tambah_kelas" class="btn btn-primary">Tambah data</a>
<table class="table table-bordered table-striped">
	<tr>
		<th>No</th>
		<th>Nama Kelas</th>
		<th>Kompetensi keahlian</th>
		<th>Opsi</th>
	</tr>
	<?php $no = 1;
	$query = $db->query("SELECT * FROM kelas");
	foreach ($query as $data) :
	?>
		<tr>
			<td><?= $no++; ?></td>
			<td><?= $data['nama_kelas']; ?></td>
			<td><?= $data['kompetensi_keahlian']; ?></td>
			<td align="center">
				<a href="?page=edit_kelas&id=<?= $data['id_kelas'] ?>" class="btn btn-primary">Edit</a> |
				<a href="?page=hapus_kelas&id=<?= $data['id_kelas'] ?>" class="btn btn-primary" onclick="return confirm('Hapus?')">Hapus</a>
			</td>
		</tr>
	<?php endforeach; ?>
</table>