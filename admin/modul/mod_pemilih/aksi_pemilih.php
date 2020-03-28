<?php
session_start();
error_reporting(1);
include "../../../koneksi.php";
$module = $_GET[module];
$act = $_GET[act];

// Hapus Deskripsi
if ($module=='pemilih' AND $act=='hapus'){
	mysql_query("DELETE FROM pemilih WHERE id='$_GET[id]'");
	header('location:../../master.php?module=pemilih');
}

// Input Pemilih
elseif ($module=='pemilih' AND $act=='input'){
	$nim 	= strtoupper($_POST['nim']);
	$no	= $_POST['nopem']; 
	$angkatan= $_POST['angkatan'];
	$prodi=$_POST['prodi'];
	if($angkatan=='Pilih angkatan..' || $prodi=='Pilih prodi..'){
	echo"<script lang='javascript'>window.alert('Isi tahun angkatan dan prodi');window.history.back()</script>";
	//header('location:../../master.php?module=pemilih&act=tambahpemilih');
	} else {
		$masuk = mysql_query("INSERT INTO pemilih (nim,no_pemilih,angkatan,prodi,status_milih) VALUES('$nim','$no','$angkatan','$prodi','belum')");
		if($masuk){
			header('location:../../master.php?module=pemilih');
		}
		else{
			echo"<script lang='javascript'>window.alert('Pemilih Sudah Terdaftar');window.history.back()</script>";
		}
	}
}

// Update Pemilih
elseif ($module=='pemilih' AND $act=='update'){
	include "../../../koneksi.php";
	$nim =strtoupper($_POST['nim']);
	$angkatan=$_POST['angkatan'];
	$prodi=$_POST['prodi'];
	
	$aksi=mysql_query("UPDATE pemilih SET nim='$nim', angkatan='$angkatan', prodi='$prodi' WHERE id = '$_POST[id]'") or die("gagal melaksanakan kueri");
	if($aksi)
	{
		
		header('location:../../master.php?module=pemilih');
	}
	else
	{
		echo "gagal";
	}
}
?>
