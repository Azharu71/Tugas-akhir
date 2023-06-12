<?php 
session_start();
$db = mysqli_connect("localhost","root","","db_spp_bellaaz");
if (!$db) {
	echo "koneksi gagal";
}
 ?>