<style>
	.btn {
  display: inline-block;
  padding: 6px 12px;
  font-size: 14px;
  font-weight: normal;
  line-height: 1.42857143;
  text-align: center;
  white-space: nowrap;
  vertical-align: middle;
  -ms-touch-action: manipulation;
      touch-action: manipulation;
  cursor: pointer;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
  background-image: none;
  border: 1px solid transparent;
  border-radius: 4px;
  background-color: #5cb85c; 
  padding: 5px 10px;
  font-size: 12px;
  line-height: 1.5;
  border-radius: 3px;
  margin-top:10px;
  margin-bottom: 10px;
  color: white;
}
@font-face {
  font-family: 'Glyphicons Halflings';

  src: url('../../../fonts/glyphicons-halflings-regular.eot');
  src: url('../../../fonts/glyphicons-halflings-regular.eot?#iefix') format('embedded-opentype'), url('../../../fonts/glyphicons-halflings-regular.woff2') format('woff2'), url('../../../fonts/glyphicons-halflings-regular.woff') format('woff'), url('../../../fonts/glyphicons-halflings-regular.ttf') format('truetype'), url('../../../fonts/glyphicons-halflings-regular.svg#glyphicons_halflingsregular') format('svg');
}
.glyphicon {
  position: relative;
  top: 1px;
  display: inline-block;
  font-family: 'Glyphicons Halflings';
  font-style: normal;
  font-weight: normal;
  line-height: 1;

  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}
.glyphicon-print:before {
  content: "\e045";
}
.glyphicon-arrow-left:before {
  content: "\e091";
}
</style>
<?php
if($_GET['act']=='detail')
{
error_reporting(1);
session_start();


include "../../../koneksi.php";
include "../../../fungsi/fungsi_indotgl.php";
include "../../../fungsi/fungsi_rubah_tanda.php";

$hasil = mysql_query("SELECT * FROM tdescription");
$date = date('Y-m-d');
$time = date('H:i:s');


$responden = mysql_fetch_array(mysql_query("SELECT * FROM tanswer, tcompany WHERE tanswer.companyId = '$_GET[id]' AND tcompany.companyId = tanswer.companyId"));
$dateIndo = tgl_indo($responden['dateSurvey']);

echo "<center><table border=0 cellpadding=10 cellspacing=3 bgcolor= #e6e6e6>
		<tr >
			<td colspan='8'  bgcolor=#337ab7 style='border: none ;color:white;'>
			<a href='../../master.php?module=hasil&sub=laporan'>
			<button style='margin-right:220px;' class='btn'><span class='glyphicon glyphicon-arrow-left'></span> Kembali</button>
			</a>
			<b><font size=5>LAPORAN KUISIONER RESPONDEN</font></b>
			<a href='exportExcelResponden.php?id=$_GET[id]'>
			<button style='margin-left:200px;' class='btn'><span class='glyphicon glyphicon-print'></span> Cetak</button></a>
			</td>
		</tr>
		<tr>
			<td >Nama Responden</td> <td>:</td><td colspan='6'><b>$responden[companyName]</b></td>
		</tr>
		<tr>
			<td >Alamat</td><td width='1'>:</td><td><b>$responden[companyAddress]</b></td>
		</tr>
		<tr>
			<td >Telp / HP</td> <td>:</td><td> <b>$responden[companyPhoneHP]</b></td>
		</tr>
		<tr>
			<td width=150>Tanggal Isi Survey</td> <td width=1>:</td><td > <b>$dateIndo </b></td>
		</tr>
		<tr>
			<td >Kritik dan Saran</td> <td>:</td><td> <b>$responden[suggestion]</b></td>
		</tr>
		
		<tr>
			<td  colspan=8 >
				<table border=1 cellpadding=2 bgcolor='#fff'>
					<tr>
					<td bgcolor=#c6e1f2 align=center><b>NO</b></td>
					<td bgcolor=#c6e1f2 align=center><b>Group ID</b></td>
					<td bgcolor=#c6e1f2 align=center><b>DESCRIPTION</b></td>
					<td bgcolor=#c6e1f2 align=center><b>JAWABAN A</b></td>
					<td bgcolor=#c6e1f2 align=center><b>JAWABAN B</b></td>
					<td bgcolor=#c6e1f2 align=center><b>JAWABAN C</b></td>
					<td bgcolor=#c6e1f2 align=center><b>JAWABAN D</b></td>
					<td bgcolor=#c6e1f2 align=center><b>JAWABAN E</b></td>
					</tr>
				
			";
	$no = 1;
	while ($data = mysql_fetch_array($hasil)){
		$descriptionId = $data[descriptionId];
		$sql = mysql_query("SELECT SUM(jawabanA) As TotalA,
							SUM(jawabanB) As TotalB,
							SUM(jawabanC) As TotalC,
							SUM(jawabanD) As TotalD,
							SUM(jawabanE) As TotalE
							FROM tanswer WHERE descriptionId = '$descriptionId' AND companyId = '$_GET[id]'");
		
		while($oke = mysql_fetch_array($sql)){
      $a=rubah($oke[TotalA]);
      $b=rubah($oke[TotalB]);
      $c=rubah($oke[TotalC]);
      $d=rubah($oke[TotalD]);
      $e=rubah($oke[TotalE]);
			echo "<tr valign=top >
					<td align='center'>$no</td>
					<td align='center'>$data[groupId]</td>
					<td>$data[description]</td>
					<td align='center'>$a</td>
					<td align='center'>$b</td>
					<td align='center'>$c</td>
					<td align='center'>$d</td>
					<td align='center'>$e</td>
				  </tr>

			  ";	 
			 
			$no++;
		}
		}
			$data_count = mysql_fetch_array(mysql_query("SELECT 
								SUM(jawabanA) As TotalA,
								SUM(jawabanB) As TotalB,
								SUM(jawabanC) As TotalC,
								SUM(jawabanD) As TotalD,
								SUM(jawabanE) As TotalE
								FROM tanswer WHERE companyId = '$_GET[id]'"));
		echo "	<tr align='center'>
			
				<td bgcolor=#c6e1f2 align='center' colspan='3'><b>Total</b></td>
				<td bgcolor=#c6e1f2><b>$data_count[TotalA]</b></td>
				<td bgcolor=#c6e1f2><b>$data_count[TotalB]</b></td>
				<td bgcolor=#c6e1f2><b>$data_count[TotalC]</b></td>
				<td bgcolor=#c6e1f2><b>$data_count[TotalD]</b></td>
				<td bgcolor=#c6e1f2><b>$data_count[TotalE]</b></td>
				</tr>
				</table>
			</td>
		</tr>
	</table>
</center>";
}


if($_GET['act']=='hapus')
{
	include "../../../koneksi.php";
	mysql_query("DELETE FROM tcompany WHERE companyId='$_GET[id]'");
	
	header('location:../../master.php?module=hasil&sub=laporan');
	
}
?>
 