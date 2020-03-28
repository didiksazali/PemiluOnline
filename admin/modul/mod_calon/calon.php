<script language="javascript">
	function validasicalon(form){
		if (form.calon.value == ""){
			alert("Anda belum mengisikan nama calon.");
			form.calon.focus();
			return (false);
		}
	}
</script>

<?php
$aksi = "modul/mod_calon/aksi_calon.php";
switch($_GET[act]){
	// Tampil Group
	default:

	?>
	<div class="row">
	    <div class="col-lg-12">
	        <h1 class="page-header">
	            <i class="glyphicon glyphicon-user"></i> Kelola Calon
	        </h1>
	        <ol class="breadcrumb">
	            <li class="active">
	                 <a href="master.php?module=calon">Kelola Calon</a>
	            </li>
	        </ol>
	    </div>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading">

			<div class="panel-title"><span class="glyphicon glyphicon-list"></span> Calon Ketua dan Wakil Ketua </div>
		</div>
		<div class="panel-body">
			<table id="tablekonten" class="table table-striped table-bordered table-responsive" style="">
				<thead>
					
					<th width="2%"><div id="konten">No Urut</div></th>
					<th width="10%"><div id="konten">Calon Ketua</div></th>
					<th width="10%"><div id="konten">Calon Wakil Ketua</div></th>
					<th width="10%"><div id="konten">Aksi</div></th>
					
				</thead>
				<tbody>
					<?php 
					
						$p      = new PagingCalon();
						$batas  = 10;
						$posisi = $p->cariPosisi($batas);
					    $tampil = mysql_query("SELECT * FROM calon order by no_urut asc limit $posisi,$batas");
					    $no =$posisi+1;
						while ($data = mysql_fetch_array($tampil)){
							?>
							<tr>
								
								<td align="center"><div id="kontentd"><?php echo $data['no_urut'];?></div></td>
								<td align="center"><div id="kontentd"><img height="200px" width="140px" src="../foto_calon/<?php echo $data[foto_ketua];  ?>"><br /><?php echo $data['c_ketua'];?></div> </td>
								<td align="center"><div id="kontentd"><img height="200px" width="140px" src="../foto_calon/<?php echo $data[foto_wakil];  ?>"><br /><?php echo $data['cw_ketua'];?></div> </td>
								<td><?php if($_SESSION['level']=="Super"){?><div id="kontentd"><a href="?module=calon&act=editcalon&id=<?php echo $data['no_urut'];?>"><button class="btn btn-success btn-sm" ><span class="glyphicon glyphicon-wrench"></span> Edit</button></a> | 
								<a href="<?php echo $aksi;?>?module=calon&act=hapus&id=<?php echo $data['no_urut'];?>"><button class="btn btn-danger btn-sm" onclick="return confirm('Hapus calon?')" ><span class="glyphicon glyphicon-trash"></span> Hapus</button></a></div> </div><?php } ?>
								</td>
							</tr>

							<?php
							$no++;
						}
					    
						
						$jmldata = mysql_num_rows(mysql_query("SELECT * FROM tgroup"));
						$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
						$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

						
					?>
				</tbody>
			</table>
			
				<ul class="pagination">
					<?php echo "$linkHalaman"; ?>
				</ul>
			
			
		</div>
		<div class="panel-footer">
			<i><?php if($_SESSION['level']=="Super"){?><button class="btn btn-success btn-sm " onclick="window.location.href='?module=calon&act=tambahcalon'"><span class="glyphicon glyphicon-plus"></span> Tambah Calon</button></i><?php } ?>
		</div>
	</div>

	<?php
	break;
  
	// Form Tambah CAlon
	case "tambahcalon":
	?>
	<div class="row">
	    <div class="col-lg-12">
	        <h1 class="page-header">
	            <i class="glyphicon glyphicon-user"></i> Kelola Calon
	        </h1>
	        <ol class="breadcrumb">
	            <li class="active">
	                 <a href="master.php?module=calon">Kelola Calon</a> / <a href="master.php?module=calon&act=tambahcalon">Tambah Calon</a>
	            </li>
	        </ol>
	    </div>
	</div>
	<div class="panel panel-primary">
    	<div class="panel-heading">
			<div class="panel-title"><span class="glyphicon glyphicon-list"></span> Calon Ketua dan Wakil </div>
		</div>
		<div class="panel-body">
			<form method="POST" enctype="multipart/form-data" action="<?php echo $aksi;?>?module=calon&act=input" onSubmit="return validasi(this)" class="form-horizontal" >
				<div class="form-group">
					<label for="name" class="col-sm-2 control-label">Nama Ketua</label>
					<div class="col-sm-5">
						<div class="input-group">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-tags"></span>
							</div>
							<input required type="text" name="c_ketua" class="form-control" placeholder="Nama Calon Ketua">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="name" class="col-sm-2 control-label">Nama Wakil</label>
					<div class="col-sm-5">
						<div class="input-group">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-tags"></span>
							</div>
							<input required type="text" name="cw_ketua" class="form-control" placeholder="Nama Calon Wakil Ketua">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="name" class="col-sm-2 control-label">Nomor Urut</label>
					<div class="col-sm-5">
						<div class="input-group">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-tags"></span>
							</div>
							<input required type="text" name="no_urut" class="form-control" placeholder="Nomor Urut">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="name" class="col-sm-2 control-label">Foto Ketua</label>
					<div class="col-sm-5">
						<div class="input-group">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-tags"></span>
							</div>
							<input required type="file" name="foto_ck" class="form-control" placeholder="Nama Group">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="name" class="col-sm-2 control-label">Foto Wakil</label>
					<div class="col-sm-5">
						<div class="input-group">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-tags"></span>
							</div>
							<input required type="file" name="foto_cwk" class="form-control" placeholder="Nama Group">
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
			<i><button class="btn btn-success btn-sm " onclick="window.location.href='?module=calon'"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</button></i>
		</div>
    </div>
	<?php
     break;
  
  // Form Edit Calon
  case "editcalon":
    $edit=mysql_query("SELECT * FROM calon WHERE no_urut='$_GET[id]'");
    $r=mysql_fetch_array($edit);
    ?> 
	<div class="row">
	    <div class="col-lg-12">
	        <h1 class="page-header">
	            <i class="glyphicon glyphicon-user"></i> Kelola Calon
	        </h1>
	        <ol class="breadcrumb">
	            <li class="active">
	                 <a href="master.php?module=calon">Kelola Calon</a> / <a href="?module=group&act=editgroup&id=<?php echo $r['groupId'];?>">Edit Group</a>
	            </li>
	        </ol>
	    </div>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading">
			<div class="panel-title">
				<i class="glyphicon glyphicon-wrench"></i> Edit Calon
			</div>
		</div>
		<div class="panel-body">
			<div class="col-sm-6">
				<form method="POST" action="<?php echo $aksi ?>?module=calon&act=update"  class="form-horizontal" enctype="multipart/form-data">
					<input type="hidden" name="id" value="<?php echo $r[id]; ?>">
					<div class="form-group">
						<label for="name" class="col-sm-4 control-label">Nama Ketua</label>
						<div class="col-sm-8">
							<div class="input-group">
								<div class="input-group-addon">
									<span class="glyphicon glyphicon-tags"></span>
								</div>
								<input value="<?php echo $r[c_ketua]; ?>" required type="text" name="c_ketua" class="form-control" placeholder="Nama Group">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="name" class="col-sm-4 control-label">Nama Wakil</label>
						<div class="col-sm-8">
							<div class="input-group">
								<div class="input-group-addon">
									<span class="glyphicon glyphicon-tags"></span>
								</div>
								<input required type="text" value="<?php echo $r[cw_ketua]; ?>" name="cw_ketua" class="form-control" placeholder="Nama Group">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="name" class="col-sm-4 control-label">Nomor Urut</label>
						<div class="col-sm-8">
							<div class="input-group">
								<div class="input-group-addon">
									<span class="glyphicon glyphicon-tags"></span>
								</div>
								<input required type="text" value="<?php echo $r[no_urut]; ?>" name="no_urut" class="form-control" placeholder="Nama Group">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="name" class="col-sm-4 control-label">Foto Ketua</label>
						<div class="col-sm-8">
							<div class="input-group">
								<div class="input-group-addon">
									<span class="glyphicon glyphicon-tags"></span>
								</div>
								<input  type="file" name="foto_ck" class="form-control" placeholder="Nama Group">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="name" class="col-sm-4 control-label">Foto Wakil</label>
						<div class="col-sm-8">
							<div class="input-group">
								<div class="input-group-addon">
									<span class="glyphicon glyphicon-tags"></span>
								</div>
								<input type="file" name="foto_cwk" class="form-control" placeholder="Nama Group">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="col-sm-4 control-label"></label>
						<div class="col-sm-8">
							<button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-floppy-save"></span> Simpan</button> &nbsp;<button class="btn btn-danger" type="button" onclick="self.history.back()"><span class="glyphicon glyphicon-remove"></span> Batal</button>
						</div>
						
					</div>
					
				</form>
			</div>
			<div class="col-sm-6">
				<div class="col-sm-6">
					<div class="panel panel-default">
						<div class="panel-heading">
							<div class="panel-title">
								Foto Ketua
							</div>
						</div>
						<div class="panel-body">
							<img height="200px" width="140px" src="../foto_calon/<?php echo $r[foto_ketua];  ?>">
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="panel panel-default">
						<div class="panel-heading">
							<div class="panel-title">
								Foto Wakil Ketua
							</div>
						</div>
						<div class="panel-body">
							<img height="200px" width="140px" src="../foto_calon/<?php echo $r[foto_wakil];  ?>">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
    <?php
    break;  
}
?>