<?php 
include 'koneksi.php';
error_reporting(0);
$pemilih =strtoupper($_POST[nim]);
$no=$_POST[nopemilih];
$nourut=$_POST[pilihan];
//$ask=$_POST[pertanyaan];

$cek=mysql_query("SELECT *From pemilih where nim='$pemilih' and no_pemilih='$no' and status_milih='belum'");
if(mysql_num_rows($cek) > 0)
{		

	if($aksi =mysql_query("INSERT INTO suara(id_pemilih,no_urut,jumlah_suara) VALUES ('$no','$nourut','1')" ))
	{
		$aksi3=mysql_query("UPDATE pemilih SET status_milih='sudah' where nim='$pemilih' ");
		echo "berhasil";
		
	}
}
else
	{
		echo"gagal";
	}
