<h1 class="container-md text-center bg-info">Data petugas</h1>
<a href="?page=tambah_petugas" class="btn btn-primary">Tambah data</a>
<table class="table table-bordered table-striped">
	<tr>
		<th>No</th>
		<th>Nama</th>
		<th>Username</th>
		<th>Password</th>
		<th>Level</th>
		<th>Opsi</th>
	</tr>
	<?php $no = 1;
$query = $db->query("SELECT * FROM petugas");
foreach ($query as $data):
	 ?>
	 <tr>
	 	<td><?= $no++; ?></td>
	 	<td><?= $data['nama_petugas']; ?></td>
	 	<td><?= $data['username']; ?></td>
	 	<td><?= $data['password']; ?></td>
	 	<td><?= $data['level']; ?></td>
	 	<td align="center"><a href="?page=edit_petugas&id=<?=$data['id_petugas'] ?>" class="btn btn-primary">Edit</a> | <a href="?page=hapus_petugas&id=<?=$data['id_petugas'] ?>" class="btn btn-primary" onclick="return confirm('Hapus?')">Hapus</a></td>
	 </tr>
	<?php endforeach; ?>
</table>

