<?php
include 'koneksi.php';

//fungsi anti sql injection untuk username
function antiinjeksuser($user)
{
	$u_aman=mysql_escape_string(stripcslashes(strip_tags(htmlspecialchars($user,ENT_QUOTES))));
	return $u_aman;
}

//fungsi anti sql injection untuk password
function antiinjekpas($pass)
{
	$p_aman=mysql_escape_string(stripcslashes(strip_tags(htmlspecialchars($pass,ENT_QUOTES))));
	return $p_aman;
}
$user=antiinjeksuser($_POST['username']);
$pass=md5(antiinjekpas($_POST['password']));

//mengecek username dan password
$cek=mysql_query("SELECT *from tbl_admin WHERE username='$user' and password='$pass'");
$ambil=mysql_fetch_array($cek);
$keadaan=mysql_num_rows($cek);

if($keadaan > 0)
{
	session_start();
	$_SESSION['id']=$ambil['id'];
	$_SESSION['username']=$ambil['username'];
	$_SESSION['password']=$ambil['password'];
	$_SESSION['level']=$ambil['level'];
	$_SESSION['timeout']=time()+3600;
	
	header("location:admin/master.php");
}
else
{
	echo "<center>Login gagal,Username atau password salah, silahkan<br />";
	echo "<a href='index.php'>Login Kembali</a></center>";
}
?>