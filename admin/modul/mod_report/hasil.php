
<script type="text/javascript" src="fusion/JS/jquery-1.4.js"></script>
<script type="text/javascript" src="fusion/JS/jquery.fusioncharts.js"></script>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <i class="glyphicon glyphicon-new-window"></i> Hasil Pemilu
        </h1>
        <ol class="breadcrumb">
        	<li class="active">
                 <a href="master.php?module=hasil&sub=all">Hasil Pemilu</a>
            </li>
        	<?php if ($_GET['sub']=='all'){ ?>
            <li class="active">
                 <a href="master.php?module=hasil&sub=all">Grafik Hasil Pemilu</a>
            </li>
            <?php } ?>
			
            <?php if ($_GET['sub']=='laporan'){ ?>
            
            <?php } ?>
        </ol>
    </div>
</div>
<!--<nav class="navbar navbar-inverse" >
	<ul class="nav navbar-nav">
		<li class="<?php if($_GET['sub']=='all'){echo'active';} ?>"><a href="?module=hasil&sub=all">Grafik Hasil Pemilu</a></li>
		
	</ul>
</nav>-->
<?php if ($_GET['sub']=='all'){ ?>
	<div class="panel panel-primary">
		<div class="panel-heading">
			<div class="panel-title">Grafik Hasil Pemilu</div>
		</div>
		<div class="panel-body">
			<style type="text/css">
			#myHTMLTable{display: none}
			</style>
			<table id="myHTMLTable" class="table table striped">
				<tr>
					<th>No Urut</th>Semua Suara Masuk<th></th><th>Perolehan Suara</th>
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
				<table  class="table table-striped table-bordered">
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
						<td>Jumlah belum Memilih</td><td>:</td><td><?php echo $bm." orang" ?></td>
					</tr>
					<tr>
						<td>Jumlah Semua Pemilih</td><td>:</td><td><?php echo $p." orang" ?></td>
					</tr>
				</table>
			</div>
			
			
			<script type="text/javascript">
			$('#myHTMLTable').convertToFusionCharts({
				swfPath: "fusion/Charts/",
				type: "MSColumn3D",
				data: "#myHTMLTable",
				dataFormat: "HTMLTable",
				width:1000,
				height:500,
			});
			</script>
		</div>
		<?php 
		//FOOTER MENU
		include "footer.php" 
		?>
	</div>
	
<?php } ?>

 <?php if ($_GET['sub']=='laporan')
 { ?>
			<div class="panel panel-primary">
				<div class="panel-heading">
					<div class="panel-title">
						<b>Daftar Responden</b><button style="margin-left:710px;"  class='btn btn-sm btn-success' value='Print All to Excel' onclick=location.href='modul/mod_report/all_responden.php'><span class="glyphicon glyphicon-zoom-in"></span> Rekap Semua Kuisioner</button>
					</div>
				</div>
				
				<div class="panel-body">
					<div class="row">
						<div class="col-md-5">
							<div class="panel panel-default">
								<div class="panel-heading">
									<div class="panel-title"> Tampilkan Berdasarkan Tanggal</div>
								</div>
								<div class="panel-body">
									<form action="?module=hasil&sub=laporan&tampilkan=pertanggal" method="post" class="form-horizontal">
									<?php include "../fungsi/fungsi_combobox.php"; include "../fungsi/library.php";?>
										<div class="form-group">
											<label for="tanggal1" class="control-label col-sm-4">Dari tanggal</label>
											<div class="col-sm-7">
											
											<?php	combotgl(01,31,'tgl_mulai',$tgl_skrg);
											combobln(01,12,'bln_mulai',$bln_sekarang);
											combothn(2000,$thn_sekarang,'thn_mulai',$thn_sekarang); 
											?>
					 						</div>
										</div>
										<div class="form-group">
											<label for="tanggal2" class="control-label col-sm-4">s/d Tanggal</label>
											<div class="col-sm-7">
												
												<?php	combotgl(01,31,'tgl_selesai',$tgl_skrg);
												combobln(01,12,'bln_selesai',$bln_sekarang);
												combothn(2000,$thn_sekarang,'thn_selesai',$thn_sekarang); 
												?>
						 					</div>
						 				</div>
						 				<div class="col-sm-4">
						 				<input type="hidden" name="pertanggal" value="pertanggal">
						 				</div>
						 				<div class="col-sm-4">
						 					<button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-search"></span>  Oke</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>

					<?php if($_GET['tampilkan']=='pertanggal'){ 
							$tgl_awal= $_POST['thn_mulai']."-".$_POST['bln_mulai']."-".$_POST['tgl_mulai'];
							$tgl_akhir= $_POST['thn_selesai']."-".$_POST['bln_selesai']."-".$_POST['tgl_selesai'];
							$awalindo=tgl_indo($tgl_awal);
							$akhirindo=tgl_indo($tgl_akhir);

						?>
							<div class="alert alert-info" role="alert">
 								 Menampilkan data dari tanggal <b><?php echo $awalindo." Sampai dengan ".$akhirindo ?><b/> 
							</div>
							<table id="tablekonten" class="table table-striped table-bordered">
						         <th><div id='kontentd'>No</div>
						         </th>
						         <th><div id='kontentd'>Nama Responden</div></th>
						         <th>Tanggal Isi Survey</th>
						         <th><div id='kontentd'>Aksi</div></th></tr>
									<?php
									include "../../koneksi.php";
									include "../../fungsi/fungsi_indotgl.php";
									error_reporting(1);
										$jumlahdata = mysql_num_rows(mysql_query("SELECT * FROM tcompany WHERE dateSurvey BETWEEN '$tgl_awal' AND '$tgl_akhir'"));
										$sql = mysql_query("SELECT * FROM tcompany WHERE dateSurvey BETWEEN '$tgl_awal' AND '$tgl_akhir' ORDER by companyName ");
										$no =1;
									while ($data = mysql_fetch_array($sql)){
										$dateIndo = tgl_indo($data['dateSurvey']);
										?>
										<tr><td><div id='kontentd'><?php echo $no;?></div></td>
												 <td><div id='kontentd'><?php echo $data['companyName'] ?></div></td>
												 <td><?php echo $dateIndo ?></td>
												 <td><div id='kontentd'><a target='_blank' href='modul/mod_report/responden.php?act=detail&id=<?php echo $data[companyId];?>' >
												 <button class='btn btn-sm btn-success'><span class=\"glyphicon glyphicon-zoom-in\"></span> Detail</button></a>
												 <?php if($_SESSION['level']=="Super"){?><a href='modul/mod_report/responden.php?act=hapus&id=<?php echo $data[companyId]?>'>
												 <button class='btn btn-sm btn-danger' onclick=\"return confirm('Hapus Deskripsi?')\"><span class=\"glyphicon glyphicon-trash\"></span> Hapus</button></a><?php } ?>
												 </div>
									   </td></tr>
											<?php
										$no++;
									}
									?>
									
							</table>
							<div class="col-md-12">
								<div class="well">
									<?php echo "Jumlah Responden : <font face='tahoma' size='3'><b>$jumlahdata </b> Responden</font>"; ?>
								</div>
							</div>
							<?php	
							}
							else
							{ ?>
							<div class="alert alert-info" role="alert">
 								 <strong>Menampilkan semua hasil survey</strong> 
							</div>
									<table id="tablekonten" class="table table-striped table-bordered">
						         <th><div id='kontentd'>No</div>
						         </th>
						         <th><div id='kontentd'>Nama Responden</div></th>
						         <th>Tanggal Isi Survey</th>
						         <th><div id='kontentd'>Aksi</div></th></tr>
									<?php
											include "../../koneksi.php";
											include "../../fungsi/fungsi_indotgl.php";
											error_reporting(1);
											
											
												$jumlahdata = mysql_num_rows(mysql_query("SELECT * FROM tcompany "));
												$p      = new PagingHasil;
												$batas  = 10;
												$posisi = $p->cariPosisi($batas);
												$sql = mysql_query("SELECT * FROM tcompany  ORDER by companyName ASC LIMIT $posisi,$batas");
												$no = $posisi+1;
											while ($data = mysql_fetch_array($sql)){
												$dateIndo = tgl_indo($data['dateSurvey']);
												?>
												<tr><td><div id='kontentd'><?php echo $no;?></div></td>
														 <td><div id='kontentd'><?php echo $data['companyName'] ?></div></td>
														 <td><?php echo $dateIndo ?></td>
														 <td><div id='kontentd'><a target='_blank' href='modul/mod_report/responden.php?act=detail&id=<?php echo $data[companyId];?>' >
														 <button class='btn btn-sm btn-success'><span class=\"glyphicon glyphicon-zoom-in\"></span> Detail</button></a>
														 <?php if($_SESSION['level']=="Super"){?><a href='modul/mod_report/responden.php?act=hapus&id=<?php echo $data[companyId]?>'>
														 <button class='btn btn-sm btn-danger' onclick=\"return confirm('Hapus Deskripsi?')\"><span class=\"glyphicon glyphicon-trash\"></span> Hapus</button></a><?php } ?>
														 </div>
											   		</td>
											   </tr>
													<?php
												$no++;
											}
											?>
									</table>
									<div class="col-md-12">
										<div class="well">
											<?php echo "Jumlah Responden : <font face='tahoma' size='3'><b>$jumlahdata </b> Responden</font>"; ?>
										</div>
									</div>
							<?php

								$jmldata = mysql_num_rows(mysql_query("SELECT * FROM tcompany "));
								$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
								$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);
							
								echo "<ul class='pagination'>$linkHalaman</ul> ";
							
							}
						?>
				</div>
			</div>
 <?php 
 } ?>



	

