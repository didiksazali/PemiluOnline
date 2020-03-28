
<?php
$aksi = "modul/mod_pertanyaan/aksi_pertanyaan.php";
switch($_GET[act]){
	
	default:
	?>
	<div class="row">
	    <div class="col-lg-12">
	        <h1 class="page-header">
	            <i class="glyphicon glyphicon-question-sign"></i> Kelola Pertanyaan
	        </h1>
	        <ol class="breadcrumb">
	            <li class="active">
	                 <a href="master.php?module=pertanyaan">Kelola Pertanyaan</a>
	            </li>
	        </ol>
	    </div>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading">

			<div class="panel-title"><span class="glyphicon glyphicon-question-sign"></span> Kelola Pertanyaan
			</div>
		</div>
		<div class="panel-body">
			<table id="tablekonten" class="table table-striped table-bordered table-responsive" style="">
				<thead >
					<th align="center" width="1%"><div id="konten">No</div></th>
					<th align="center" width="20%"><div id="konten">NIM</div></th>
					
					<th align="center" width="60%"><div id="konten">Pertanyaan</div></th>

					<th width="10%"><div id="konten">Aksi</div></th>
					
				</thead>
				<tbody>
					<?php 
					
						$p      = new PagingPertanyaan();
						$batas  = 10;
						$posisi = $p->cariPosisi($batas);
					    $tampil = mysql_query("SELECT * FROM pertanyaan order by id desc limit $posisi,$batas ");
					    $no = $posisi+1;
						while ($data = mysql_fetch_array($tampil)){
							?>
							<tr>
								<td><div id="kontentd"><?php echo $no; ?></div></td>
								<td><div id="kontentd"><?php echo $data['nim'];?></div></td>
								
								
								<td><div id="kontentd"><?php echo $data['pertanyaan'];?></div></td>
						
								<td><div id="kontentd"><?php if($_SESSION['level']=="Super"){?><a href="<?php echo $aksi;?>?module=pertanyaan&act=hapus&id=<?php echo $data['id'];?>"><button class="btn btn-danger btn-sm" onclick="return confirm('Hapus Pertanyaan?')"><span class="glyphicon glyphicon-trash"></span> Hapus</button></a><?php } ?></div>
								</td>
							</tr>

							<?php
							$no++;
						}
						$jmldata = mysql_num_rows(mysql_query("SELECT * FROM pertanyaan"));
						$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
						$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

						
					?>
				</tbody>
			</table>
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="panel-title">
						Statistik Pertanyaan
					</div>
				</div>
				<div class="panel-body">
				<?php 
				$total = mysql_num_rows(mysql_query("SELECT * FROM pertanyaan"));
				
				?>
					<table class="table table-striped">
						<tr>
							<td width="250px;">Jumlah Pertanyaan</td><td width="10px;">: </td><td><?php echo $total." Pertanyaan";?></td>
						</tr>
						
					</table>
				</div>
				
			</div>
			<?php echo "<ul class='pagination'>$linkHalaman </ul>"; ?>
		</div>
		<div class="panel-footer">
			<i ><?php if($_SESSION['level']=="Super"){?><button class="btn btn-success btn-sm " onclick="window.location.href='?module=pertanyaan&act=tanyajawab'"><span class="glyphicon glyphicon-plus"></span> Tanya Jawab</button></i><?php } ?>
		</div>
	</div>


	<?php
	break;
  
	// Form Tambah Deskripsi
	case "tanyajawab":
	?>
	<div class="row">
	    <div class="col-lg-12">
	        <h1 class="page-header">
	            <i class="glyphicon glyphicon-question-sign"></i> Tanya JAwab
	        </h1>
	        <ol class="breadcrumb">
	            <li class="active">
	                 <a href="master.php?module=pertanyaan">Kelola Pertanyaan</a> / <a href="master.php?module=pertanyaan&act=tanyajawab">Tanya jawab</a>
	            </li>
	        </ol>
	    </div>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading">

			<div class="panel-title"><span class="glyphicon glyphicon-question-sign"></span> Tanya Jawab
			</div>
		</div>
		<div class="panel-body">
		<?php 
			$sg =mysql_query("SELECT * FROM calon order by no_urut");
			
			while ($tampil = mysql_fetch_array($sg)) {
				?>
				<div class="panel panel-info">
					<div class="panel-heading">
						<div class="panel-title">
							Pertanyaan Untuk No Urut <?php echo $tampil[no_urut]; ?>
						</div>
					</div>
					<div class="panel-body">
						<?php 
						if(empty($_GET[gen])&&empty($_GET[id]))
						{
							echo "Silahkan Generate Pertanyaan Telebih dahulu";
							?>
							<a href="?module=pertanyaan&act=tanyajawab&gen=q&id=<?php echo $tampil[no_urut]; ?>"><button class="btn btn-primary">Generate</button></a>
							<?php 
						}
						else
						{
							if($_GET['id']!=$tampil[no_urut])
							{
								echo "Silahkan Generate Pertanyaan Telebih dahulu";
								?>
								<a href="?module=pertanyaan&act=tanyajawab&gen=q&id=<?php echo $tampil[no_urut]; ?>"><button class="btn btn-primary">Generate</button></a>
								<?php 

							}
							else
							{
								$sql=mysql_query("SELECT * from pertanyaan where status='belum' order by rand()");
								$ass=mysql_fetch_array($sql);
								if(!empty($ass[pertanyaan]))
								{
								echo $ass[pertanyaan];
								mysql_query("UPDATE pertanyaan set status='sudah' where id='$ass[id]'");
								}
								else
								{
									echo"Pertanyaan sudah habis";
								}
							}
						}

						?>
					</div>
				</div>
				<?php
			}
		?>
				
		
		</div>
		<div class="panel-footer">
			<i><?php if($_SESSION['level']=="Super"){?><button class="btn btn-success btn-sm " onclick="window.location.href='?module=pertanyaan'"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</button></i><?php } ?>
		</div>
	</div>

	
	<?php
     break;
  
  // Form Edit deskripsi
  case "editpemilih":
    break;  
}
?>