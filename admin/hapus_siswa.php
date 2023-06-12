<?php 
$query = $db->query("DELETE FROM siswa WHERE nisn = '$_GET[id]'");
if ($query) {
	echo "<script>alert('Data dihapus'); document.location.href = '?page=siswa';</script>";
}else{
	echo "<script>alert('Gagal dihapus'); document.location.href = '?page=siswa';</script>";
}
 ?>
