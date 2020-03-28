
<?php 
include 'koneksi.php';

?>
<script type="text/javascript" src="./admin/fusion/JS/jquery-1.4.js"></script>
<script type="text/javascript" src="./admin/fusion/JS/jquery.fusioncharts.js"></script>



<div class="wlcome">
		<div class="container">
			<div class="wlcome-grids">
				<div class="col-md-12 wlcome-grid-left">
					<div class="election_grid">
					
					
					

	<div class="panel panel-primary">
		<div class="panel-heading">
			<div class="panel-title"><h3 style="color:white"> Grafik Hasil Pemilu</h3></div>
		</div>
		<div class="panel-body">
			<style type="text/css">
			#myHTMLTable{display: none}
			</style>
			<table id="myHTMLTable" class="table table striped">
				<tr>
					<th>No Urut</th><th></th><th>Perolehan Suara</th>
				</tr>
			
			<?php 
			$s=mysql_query("SELECT * from calon group by no_urut");
			$h=mysql_num_rows(mysql_query("SELECT * from suara "));
			$p=mysql_num_rows(mysql_query("SELECT * from pemilih "));
			$sm=mysql_num_rows(mysql_query("SELECT * from pemilih where status_milih='sudah' "));
			$bm=mysql_num_rows(mysql_query("SELECT * from pemilih where status_milih='belum' "));

			$i=1;
				while($f=mysql_fetch_array($s))
				{
					$cek[$i]=mysql_query("SELECT * from suara where no_urut='$f[no_urut]'");
					$cek2[$i]=mysql_num_rows($cek[$i]);
					?>
					<tr>
						<td>Nomor Urut <?php echo $f[no_urut]; ?></td><td><?php echo $cek2[$i];  ?></td>
					</tr>
					<?php
					$i++;
				}

			?>
			</table>
			<div class="col-md-8">
				<table class="table table-striped table-bordered">
					<tr >
						<td width="5%">No Urut</td><td align="center">Nama Ketua</td><td align="center">Nama Wakil</td><td align="center" width="20%">Perolah Suara</td><td align="center" width="15%">Persentase Suara</td>
					</tr>
					<?php 
					$s=mysql_query("SELECT * from calon group by no_urut");
					$i=1;
						while($f=mysql_fetch_array($s))
						{
							$cek[$i]=mysql_query("SELECT * from suara where no_urut='$f[no_urut]'");
							$cek2[$i]=mysql_num_rows($cek[$i]);
							$persentase[$i]=($cek2[$i]/$h)*100; 
							?>
							<tr>
								<td><?php echo $f[no_urut]; ?></td><td><?php echo $f[c_ketua]; ?></td><td><?php echo $f[cw_ketua]; ?></td><td align="center"><?php echo $cek2[$i];  ?></td><td align="center"><?php echo number_format($persentase[$i],2)." %";  ?></td>
							</tr>
							<?php
							$i++;
						}

					?>
					<tr>
						<td colspan="3" align="center">Total Semua Suara Masuk</td><td align="center" colspan="2"><?php echo $h." Suara"; ?></td>
					</tr>
				</table>
			</div>
			<div class="col-md-4">
				<table class="table">
					<tr>
						<td>Jumlah Sudah Memilih</td><td>:</td><td><?php echo $sm." orang" ?></td>
					</tr>
					<tr>
						<td>Jumlah Belum Memilih</td><td>:</td><td><?php echo $bm." orang" ?></td>
					</tr>
					<tr>
						<td>Jumlah Semua Pemilih</td><td>:</td><td><?php echo $p." orang" ?></td>
					</tr>
				</table>
			</div>
			
			<script type="text/javascript">
			$('#myHTMLTable').convertToFusionCharts({
				swfPath: "admin/fusion/Charts/",
				type: "MSColumn3D",
				data: "#myHTMLTable",
				dataFormat: "HTMLTable",
				width:1000,
				height:600,
			});
			</script>
			<script type="text/javascript" src="js/jquery.1.11.3.min.js"></script>
		</div>
	</div>



</div>
					
				</div>
				
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>

	

