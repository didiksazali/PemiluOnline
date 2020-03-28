<?php
session_start();
error_reporting(1);
include "../../../koneksi.php";
$module = $_GET[module];
$act = $_GET[act];

// Hapus Calon
if ($module=='calon' AND $act=='hapus'){
	$id=$_GET[id];
	$ak=mysql_fetch_array(mysql_query("SELECT *from calon where no_urut='$id'"));
	unlink("../../../foto_calon/".$ak['foto_ketua']);
	unlink("../../../foto_calon/".$ak['foto_wakil']);
	mysql_query("DELETE FROM calon WHERE no_urut='$id'");
	header('location:../../master.php?module=calon');
}

// Input Calon
elseif ($module=='calon' AND $act=='input'){
	$ck=$_POST[c_ketua];
	$cwk=$_POST[cw_ketua];
	$no_urut=$_POST[no_urut];
	$dir="../../../foto_calon/";
	$foto_ck=rand(0,100).$_FILES[foto_ck][name];
	$tmp_foto_ck=$_FILES[foto_ck][tmp_name];
	move_uploaded_file($tmp_foto_ck, $dir.$foto_ck);
	$foto_cwk=rand(0,100).$_FILES[foto_cwk][name];
	$tmp_foto_cwk=$_FILES[foto_cwk][tmp_name];
	move_uploaded_file($tmp_foto_cwk, $dir.$foto_cwk);
	$masuk = mysql_query("INSERT INTO calon(c_ketua,cw_ketua,no_urut,foto_ketua,foto_wakil) VALUES('$ck','$cwk','$no_urut','$foto_ck','$foto_cwk')");
	header('location:../../master.php?module=calon');
}

// Update calon
elseif ($module=='calon' AND $act=='update'){
	$ck=strtoupper($_POST[c_ketua]);
	$cwk=strtoupper($_POST[cw_ketua]);
	$id=$_POST[id];
	$no_urut=$_POST[no_urut];
	if(isset($_FILES[foto_ck][tmp_name])||isset($_FILES[foto_cwk][tmp_name]))
	{
		$dir="../../../foto_calon/";	
		function hapusfotolama($case,$id)
		{
			$d="../../../foto_calon/";
			switch ($case) {
				case 'ketua':
					$a=mysql_fetch_array( mysql_query("SELECT * from calon where id='$id'"));
					$hapusketua=$d.$a[foto_ketua];
					if(file_exists($hapusketua))
					{
						unlink($hapusketua);
						
					}
					
				case'wakil':
					$a=mysql_fetch_array( mysql_query("SELECT * from calon where id='$id'"));
					$hapuswakil=$d.$a[foto_wakil];
					if(file_exists($hapuswakil))
					{
						 unlink($hapuswakil);
					
					}
					break;
			}
		}
		
		$tmp_foto_ck=$_FILES[foto_ck][tmp_name];
		if(!empty($tmp_foto_ck))
		{
			hapusfotolama('ketua',$id);
			$foto_ck=rand(0,100).$_FILES[foto_ck][name];
			move_uploaded_file($tmp_foto_ck, $dir.$foto_ck);
			$aksig=mysql_query("UPDATE calon SET foto_ketua = '$foto_ck' WHERE id = '$id'");
			
		}
		$tmp_foto_cwk=$_FILES[foto_cwk][tmp_name];
		if (!empty($tmp_foto_cwk)) {
			hapusfotolama('wakil',$id);
			$foto_cwk=rand(0,100).$_FILES[foto_cwk][name];
			move_uploaded_file($tmp_foto_cwk, $dir.$foto_cwk);
			$aksih=mysql_query("UPDATE calon SET foto_wakil = '$foto_cwk' WHERE id = '$id'");
			
		}
		$aksi=mysql_query("UPDATE calon SET c_ketua = '$ck', cw_ketua = '$cwk', no_urut = '$no_urut' WHERE id = '$id'");
		if($aksi)
		{
			header('location:../../master.php?module=calon');	
		}
		else{
			echo"Gagal";
		}
	}
	else
	{
		$aksi=mysql_query("UPDATE calon SET c_ketua = '$ck', cw_ketua = '$cwk', no_urut = '$no_urut' WHERE id = '$id'");
		if($aksi)
		{
			header('location:../../master.php?module=calon');
		}
		else{
			echo"Gagal";
		}
	}
	
  
}
?>
