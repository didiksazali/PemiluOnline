<?php
include "../../koneksi.php";
error_reporting(0);
?>
<script src="../../js/jquery.1.11.3.min.js"></script>
<script src="../../js/html-docx.js"></script>
<script src="../../js/FileSaver.js"></script>
<script src="../../js/skrip.js"></script>
<button type="button" onclick="cetakkartu('#area-cetak')">Cetak</button>
<div id="area-cetak">
<hr>
<center>
	<h1>DAFTAR PEMILIH TETAP</h1>
</center>
<hr>
<center>
	<table border="1" cellpadding="6" cellspacing="5">
		<thead>
			<tr>
				<th>No</th><th>NIM</th><th>Nomor Pemilih</th><th>Prodi</th><th>Angkatan</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no=1;
			$data=mysql_query("SELECT * from pemilih");
			while ($q=mysql_fetch_array($data)) {
			?>
			<tr>
				<td><?php echo $no;?></td><td><?php echo $q[nim];?></td><td><?php echo $q[no_pemilih];?></td><td><?php echo $q[prodi];?></td><td><?php echo $q[angkatan];?></td>
			</tr>
			<?php
			$no++;
			}
			?>
		</tbody>
	</table>
</center>
</div>

						
