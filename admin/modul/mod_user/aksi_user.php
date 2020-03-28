<?php
error_reporting(0);
session_start();
include "../../../koneksi.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus user
if ($module=='user' AND $act=='hapus'){
	mysql_query("DELETE FROM tbl_admin WHERE id = '$_GET[id]'");
	header('location:../../master.php?module=user');
}

// Input user
elseif ($module=='user' AND $act=='input'){
	$pass = md5($_POST['password']);
	$aksi =mysql_query("INSERT INTO tbl_admin(username,
								   password,
								   fullname,
								   email,level) 
							VALUES('$_POST[username]',
								   '$pass',
								   '$_POST[nama]',
								   '$_POST[email]','$_POST[level]')");
	
	if($aksi)
	{

	header('location:../../master.php?module=user');
	}
	else {echo "gagal";}
}

// Update user
elseif ($module=='user' AND $act=='update'){
	if (empty($_POST[password])) {
		mysql_query("UPDATE tbl_admin SET username	= '$_POST[username]',
									fullname	= '$_POST[nama]',
									email		= '$_POST[email]',
									level       = '$_POST[level]'
									WHERE userId = '$_POST[id]'");
	}
	else{
		$pass = md5($_POST[password]);
		mysql_query("UPDATE tuser SET username   = '$_POST[username]',
                                 password        = '$pass',
                                 fullname	     = '$_POST[nama]',
                                 email		     = '$_POST[email]',
                                 level       = '$_POST[level]'
                                 WHERE userId	 = '$_POST[id]'");
	}
	header('location:../../master.php?module=user');
}


?>
