<?php
session_start();
include '../koneksi.php';
if($_POST['aksi']=='gantipass')

{
  $id=$_SESSION['id'];
  $passbaru=md5($_POST['newpass']);
    $aksi =mysql_query("UPDATE tbl_admin SET password= '$passbaru' WHERE id='$id'");
  if($aksi==true)
  {
   echo "password dengan usename ".$_SESSION['username']." berhasil diganti";
  }
  else
  {
    echo "password dengan usename ".$_SESSION['username']." gagal diganti";
  }
}
else
{
  $passlama=md5($_POST['pass_lama']);
  $passdb =mysql_fetch_array(mysql_query("SELECT password from tbl_admin where id='$_SESSION[id]'"));
  if ($passlama==$passdb['password']) {
  echo "oke";
  }
  else
  {
    echo "no";
  }  
}
?>
