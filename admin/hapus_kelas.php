<?php 
$query = $db->query("DELETE FROM kelas WHERE id_kelas = '$_GET[id]'");
if ($query) {
	echo "<script>alert('Data dihapus'); document.location.href = '?page=kelas';</script>";
}else{
	echo "<script>alert('Gagal dihapus'); document.location.href = '?page=kelas';</script>";
}
 ?>
