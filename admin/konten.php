<?php
include "../koneksi.php";
include "../fungsi/fungsi_indotgl.php";
include "../fungsi/class_paging.php";

//Mengambil modul
$module = $_GET['module'];

if ($module == 'calon'){
	include "modul/mod_calon/calon.php";
}
elseif ($module == 'pemilih'){
	include "modul/mod_pemilih/pemilih.php";
}
elseif ($module == 'hasil'){
	include "modul/mod_report/hasil.php";
}
elseif ($module == 'pertanyaan'){
	include "modul/mod_pertanyaan/pertanyaan.php";
}
elseif ($module == 'user'){
	include "modul/mod_user/user.php";
}

else{
	include "modul/mod_home/home.php";
}
?>
