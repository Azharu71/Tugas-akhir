<?php 
$query = $db->query("DELETE FROM spp WHERE id_spp = '$_GET[id]'");
if ($query) {
	echo "<script>alert('Data dihapus'); document.location.href = '?page=spp';</script>";
}else{
	echo "<script>alert('Gagal dihapus'); document.location.href = '?page=spp';</script>";
}
 ?>
