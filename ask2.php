<?php
include "koneksi.php";
$pemilih=strtoupper($_POST['nim']);
$no_pemilih=$_POST['no_pemilih'];
$ask=$_POST['ask'];
$sql=mysql_query("SELECT *from pemilih where nim='$pemilih' and no_pemilih ='$no_pemilih'");
if(mysql_num_rows($sql) > 0)
{
	$aksi2=mysql_query("INSERT INTO pertanyaan(nim,no_pemilih,pertanyaan,status) VALUES ('$pemilih','$no_pemilih','$ask','belum')" );
	if($aksi2)
	{
		echo "berhasil";
	}
	else
	{
		echo "gagal";
	}
}
else
{
	echo "gagal";
}
?>