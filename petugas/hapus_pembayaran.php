<?php
$query = $db->query("DELETE FROM pembayaran WHERE id_pembayaran = '$_GET[id]'");
if ($query) {
    echo "<script>alert('Data dihapus'); document.location.href = '?page=pembayaran';</script>";
} else {
    echo "<script>alert('Gagal dihapus'); document.location.href = '?page=pembayaran';</script>";
}
