<?php
session_start();
error_reporting(1);
include "../../../koneksi.php";
$module = $_GET[module];
$act = $_GET[act];

// Hapus Deskripsi
if ($module=='pertanyaan' AND $act=='hapus'){
	mysql_query("DELETE FROM pertanyaan WHERE id='$_GET[id]'");
	header('location:../../master.php?module=pertanyaan');
}


?>
