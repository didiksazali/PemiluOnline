
<?php
$aksi = "modul/mod_pemilih/aksi_pemilih.php";
switch($_GET[act]){
	// Tampil deskripsi
	default:
	?>
	<div class="row">
	    <div class="col-lg-12">
	        <h1 class="page-header">
	            <i class="glyphicon glyphicon-book"></i> Kelola Pemilih
	        </h1>
	        <ol class="breadcrumb">
	            <li class="active">
	                 <a href="master.php?module=pemilih">Kelola Pemilih</a>
	            </li>
	        </ol>
	    </div>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading">

			<div class="panel-title"><span class="glyphicon glyphicon-book"></span> Kelola Pemilih</div>
		</div>
		<div class="panel-body">
			<table id="tablekonten" class="table table-striped table-bordered table-responsive" style="">
				<thead>
					<th width="1%"><div id="konten">No</div></th>
					<th width="6%"><div id="konten">NIM</div></th>
					<th width="10%"><div id="konten">No Pemilih</div></th>
					<th width="10%"><div id="konten">Prodi</div></th>
					<th width="10%"><div id="konten">Angkatan</div></th>
					<th width="10%"><div id="konten">Status</div></th>
					<th width="10%"><div id="konten">Aksi</div></th>
					
				</thead>
				<tbody>
					<?php 
					
						$p      = new PagingPemilih();
						$batas  = 10;
						$posisi = $p->cariPosisi($batas);
					    $tampil = mysql_query("SELECT * FROM pemilih order by nim asc limit $posisi,$batas ");
					    $no = $posisi+1;
						while ($data = mysql_fetch_array($tampil)){
							?>
							<tr>
								<td><div id="kontentd"><?php echo $no; ?></div></td>
								<td><div id="kontentd"><?php echo $data['nim'];?></div></td>
								<td><div id="kontentd"><?php echo $data['no_pemilih'];?></div></td>
								<td><div id="kontentd"><?php echo $data['prodi'];?></div></td>
								<td><div id="kontentd"><?php echo $data['angkatan'];?></div></td>
								<td><div id="kontentd"><?php if($data['status_milih']=="belum") echo "<span class='label label-primary'>Belum Memilih</span>"; else echo "<span class='label label-success'>Sudah Memilih</span>"; ;?></div></td>
								<td><div id="kontentd"><?php if($_SESSION['level']=="Super"){?><a href="?module=pemilih&act=editpemilih&id=<?php echo $data['id'];?>"><button class="btn btn-success btn-sm" ><span class="glyphicon glyphicon-wrench"></span> Edit</button></a> | <a href="<?php echo $aksi;?>?module=pemilih&act=hapus&id=<?php echo $data['id'];?>"><button class="btn btn-danger btn-sm" onclick="return confirm('Hapus Pemilih?')"><span class="glyphicon glyphicon-trash"></span> Hapus</button></a><?php } ?></div>
								</td>
							</tr>

							<?php
							$no++;
						}
						$jmldata = mysql_num_rows(mysql_query("SELECT * FROM pemilih"));
						$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
						$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

						
					?>
				</tbody>
			</table>
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="panel-title">
						Statistik Pemilih
					</div>
				</div>
				<div class="panel-body">
				<?php 
				$total = mysql_num_rows(mysql_query("SELECT * FROM pemilih"));
				$belum = mysql_num_rows(mysql_query("SELECT * FROM pemilih where status_milih='belum'"));
				$sudah = mysql_num_rows(mysql_query("SELECT * FROM pemilih where status_milih='sudah'"));
				?>
					<table class="table table-striped">
						<tr>
							<td width="250px;">Jumlah Belum Memilih</td><td width="10px;">: </td><td><?php echo $belum." Suara";?></td>
						</tr>
						<tr>
							<td>Jumlah Sudah Memilih</td><td>: </td><td><?php echo $sudah." Suara";?></td>
						</tr>
						<tr>
							<td>Total Pemilih</td><td>: </td><td><?php echo $total." Suara";?></td>
						</tr>
					</table>
				</div>
				
			</div>
			<?php echo "<ul class='pagination'>$linkHalaman </ul>"; ?>
		</div>
		<div class="panel-footer">
			<i ><?php if($_SESSION['level']=="Super"){?> <button class="btn btn-success btn-sm " onclick="window.location.href='?module=pemilih&act=tambahpemilih'"><span class="glyphicon glyphicon-plus"></span> Tambah Pemilih </button></i> <a target="_blank" href='modul/cetakkartu.php'><button class="btn btn-info btn-sm "><span class="glyphicon glyphicon-print"></span> Cetak Semua Kartu </button> </a></i> <?php }?>
		</div>
	</div>


	<?php
	break;
  
	// Form Tambah Deskripsi
	case "tambahpemilih":
	?>
	<div class="row">
	    <div class="col-lg-12">
	        <h1 class="page-header">
	            <i class="glyphicon glyphicon-user"></i> Tambah Pemilih
	        </h1>
	        <ol class="breadcrumb">
	            <li class="active">
	                 <a href="master.php?module=pemilih">Tambah Pemilih</a> / <a href="master.php?module=description&act=tambahpertanyaan">Tambah Deskripsi</a>
	            </li>
	        </ol>
	    </div>
	</div>
	<div class="panel panel-primary">
    	<div class="panel-heading">
			<div class="panel-title"><span class="glyphicon glyphicon-list"></span> Tambah Pemilih </div>
		</div>
		<div class="panel-body">
			<form method="POST" action="<?php echo $aksi;?>?module=pemilih&act=input"  class="form-horizontal" >
				<div class="form-group">
					<label for="nim" class="col-sm-2 control-label">NIM </label>
					<div class="col-sm-5">
						<div class="input-group">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-tags"></span>
							</div>
							<input required class="form-control" name="nim" placeholder="NIM">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="no" class="col-sm-2 control-label">No Pemilih </label>
					<div class="col-sm-5">
						<div class="input-group">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-lock"></span>
							</div>
							<input required  class="form-control" disabled name="nopemilih" placeholder="No pemilih" value="<?php $no=rand(10,99).rand(10.99).rand(10,99).rand(10,99); echo $no;?>"  >
							<input type="hidden" name="nopem" value="<?php echo $no;?>">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="angkatan" class="col-sm-2 control-label">Angkatan </label>
					<div class="col-sm-5">
						<div class="input-group">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-bookmark"></span>
							</div>
							<select required name="angkatan" class="form-control">
								<option>Pilih angkatan..</option>
								<option value="2013">2013</option>
								<option value="2014">2014</option>
								<option value="2015">2015</option>
								<option value="2016">2016</option>
							</select>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="prodi" class="col-sm-2 control-label">Prodi </label>
					<div class="col-sm-5">
						<div class="input-group">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-book"></span>
							</div>
							<!--<input required value="Sistem Informasi" class="form-control" name="prodi" placeholder="Prodi" >-->
							<select required name="prodi" class="form-control">
								<option>Pilih prodi..</option>
								<option value="Teknik Informatika">Teknik Informatika</option>
								<option value="Sistem Informasi">Sistem Informasi</option>
								<option value="Desain Komunikasi Visual">Desain Komunikasi Visual</option>
								<option value="Ilmu Komputer">Ilmu Komputer</option>
							</select>
						</div>
					</div>
				</div>
				
				<div class="form-group">
					<label for="" class="col-sm-2 control-label"></label>
					<div class="col-sm-6">
						<button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-floppy-save"></span> Simpan</button> &nbsp;<button class="btn btn-danger" type="button" onclick="self.history.back()"><span class="glyphicon glyphicon-remove"></span> Batal</button>
					</div>
					
				</div>
			</form>
		</div>
		<div class="panel-footer">
			<i><button class="btn btn-success btn-sm " onclick="window.location.href='?module=pemilih'"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</button></i>
		</div>
    </div>
	<?php
     break;
  
  // Form Edit deskripsi
  case "editpemilih":
    $edit = mysql_query("SELECT * FROM pemilih WHERE id='$_GET[id]'");
    $r = mysql_fetch_array($edit);
    ?>
	
	<div class="row">
	    <div class="col-lg-12">
	        <h1 class="page-header">
	            <i class="glyphicon glyphicon-user"></i> Kelola Pemilih
	        </h1>
	        <ol class="breadcrumb">
	            <li class="active">
	                 <a href="master.php?module=pemilih">Kelola Pemilih</a> / <a href="master.php?module=pemilih&act=editpemilih&id=<?php echo $r['id'];?>">Edit Pemilih</a>
	            </li>
	        </ol>
	    </div>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading">
			<div class="panel-title">
				<i class="glyphicon glyphicon-wrench"></i> Edit Pemilih
			</div>
		</div>
		<div class="panel-body">
			<form method="POST" action="<?php echo $aksi ?>?module=pemilih&act=update"  class="form-horizontal" >
				<input type="hidden" name="id" value="<?php echo $r[id]; ?>">
				<div class="form-group">
					<label for="group" class="col-sm-2 control-label">NIM </label>
					<div class="col-sm-5">
						<div class="input-group">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-user"></span>
							</div>
							<input class="form-control" name="nim" value="<?php echo $r[nim]; ?>">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="group" class="col-sm-2 control-label">No Pemilih</label>
					<div class="col-sm-5">
						<div class="input-group">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-lock"></span>
							</div>
							<input class="form-control" disabled="" name="no" value="<?php echo $r[no_pemilih]; ?>">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="group" class="col-sm-2 control-label">Angkatan </label>
					<div class="col-sm-5">
						<div class="input-group">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</div>
							<select name="angkatan"  class="form-control">
								<?php 
								$sql = mysql_fetch_array(mysql_query("SELECT * FROM pemilih where id='$_GET[id]'"));
								  echo "<option value='$sql[angkatan]' selected>$sql[angkatan]</option>";
								?>
								<option value="2013">2013</option>
								<option value="2014">2014</option>
								<option value="2015">2015</option>
								<option value="2016">2016</option>
							</select>
							
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="group" class="col-sm-2 control-label">Prodi</label>
					<div class="col-sm-5">
						<div class="input-group">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-lock"></span>
							</div>
							<!--<input class="form-control" disabled="" name="no" value="Sistem Informasi">-->
							<select name="prodi" class="form-control">
								<?php 
								$sql = mysql_fetch_array(mysql_query("SELECT * FROM pemilih where id='$_GET[id]'"));
								  echo "<option value='$sql[prodi]' selected>$sql[prodi]</option>";
								?>
								<option value="Teknik Informatika">Teknik Informatika</option>
								<option value="Sistem Informasi">Sistem Informasi</option>
								<option value="Desain Komunikasi Visual">Desain Komunikasi Visual</option>
								<option value="Ilmu Komputer">Ilmu Komputer</option>
							</select>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="group" class="col-sm-2 control-label">Status</label>
					<div class="col-sm-5">
						<?php 
						if($sql['status_milih']=='belum'){echo "<span class='label label-primary'>Belum Memilih</span>";}
						else if($sql['status_milih']=='sudah'){echo "<span class='label label-success'>Sudah Memilih</span>";}
						?>
					</div>
				</div>
		
				<div class="form-group">
					<label for="" class="col-sm-2 control-label"></label>
					<div class="col-sm-6">
						<button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-floppy-save"></span> Simpan</button> &nbsp;<button class="btn btn-danger" type="button" onclick="self.history.back()"><span class="glyphicon glyphicon-remove"></span> Batal</button>
					</div>
					
				</div>
				
			</form>
		</div>
	</div>

    <?php
    break;  
}
?>