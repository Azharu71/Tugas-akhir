<h1 class="container-md text-center bg-info">Data spp</h1>
<a href="?page=tambah_spp" class="btn btn-primary">Tambah data</a>
<table class="table table-bordered table-striped">
	<tr>
		<th>No</th>
		<th>Tahun</th>
		<th>Nominal</th>
		<th>Opsi</th>
	</tr>
	<?php $no = 1;
$query = $db->query("SELECT * FROM spp");
foreach ($query as $data):
	 ?>
	 <tr>
	 	<td><?= $no++; ?></td>
	 	<td><?= $data['tahun']; ?></td>
	 	<td>Rp. <?=number_format($data['nominal'],2,'.','.'); ?></td>
	 	<td align="center"><a href="?page=edit_spp&id=<?=$data['id_spp'] ?>" class="btn btn-primary">Edit</a> | <a href="?page=hapus_spp&id=<?=$data['id_spp'] ?>" class="btn btn-primary" onclick="return confirm('Hapus?')">Hapus</a></td>
	 </tr>
	<?php endforeach; ?>
</table>

