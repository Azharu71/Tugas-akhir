<?php 
$query = $db->query("DELETE FROM petugas WHERE id_petugas = '$_GET[id]'");
if ($query) {
	echo "<script>alert('Data dihapus'); document.location.href = '?page=petugas';</script>";
}else{
	echo "<script>alert('Gagal dihapus'); document.location.href = '?page=petugas';</script>";
}
 ?>
