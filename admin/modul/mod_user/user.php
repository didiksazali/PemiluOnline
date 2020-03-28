<script language="javascript">
	function validasi(form){
		if (form.username.value == ""){
			alert("Anda belum mengisikan username.");
			form.username.focus();
			return (false);
		}
		
		if (form.password.value == ""){
			alert("Anda belum mengisikan password.");
			form.password.focus();
			return (false);
		}
		
		if (form.nama.value == ""){
			alert("Anda belum mengisikan Nama Lengkap.");
			form.nama.focus();
			return (false);
		}
	}
</script>
<?php
if ($_SESSION[level] == 'Super'){
	$aksi = "modul/mod_user/aksi_user.php";
	switch($_GET[act]){
		// Tampil User
		default:
		?> 
		<div class="row">
		    <div class="col-lg-12">
		        <h1 class="page-header">
		            <i class="glyphicon glyphicon-user"></i> Manajemen User
		        </h1>
		        <ol class="breadcrumb">
		            <li class="active">
		                 <a href="master.php?module=user">Manajemen User</a>
		            </li>
		        </ol>
		    </div>
		</div>
		<div class="panel panel-primary">
			<div class="panel-heading">

				<div class="panel-title"><span class="glyphicon glyphicon-user"></span> Daftar User </div>
			</div>
			<div class="panel-body">
				<table id="tablekonten" class="table table-striped table-bordered table-responsive" style="">
					<thead>
						<th width="1%"><div id="konten">No</div></th>
						<th width="10%"><div id="konten">Username</div></th>
						<th width="10%"><div id="konten">Nama Lengkap</div></th>
						<th width="10%"><div id="konten">Email</div></th>
						<th width="10%"><div id="konten">Level</div></th>
						<th width="10%"><div id="konten">Aksi</div></th>
						
					</thead>
					<tbody>
						<?php 
						$tampil = mysql_query("SELECT * FROM tbl_admin ORDER BY id ASC");
						$no=1;
						while ($r=mysql_fetch_array($tampil)){
						?>
						<tr>
						<td><div id="kontentd"><?php echo $no; ?></div></td>
						<td><div id="kontentd"><?php echo $r['username'];?></div></td>
						<td><div id="kontentd"><?php echo $r['fullname'];?></div></td>
						<td><div id="kontentd"><a href="mailto:<?php echo$r['email']; ?>"><?php echo $r['email'];?></a>
						<td><div id="kontentd"><?php echo $r['level'];?></div></td>
						<td><div id="kontentd"><a href="?module=user&act=edituser&id=<?php echo $r['id'];?>"><button class="btn btn-success btn-sm" ><span class="glyphicon glyphicon-wrench"></span> Edit</button></a> | <a href="<?php echo $aksi;?>?module=user&act=hapus&id=<?php echo $r['id'];?>"><button class="btn btn-danger btn-sm" ><span class="glyphicon glyphicon-trash"></span> Hapus</button></a></div>
						</td>
						</tr>
						<?php $no++; } ?>
					</tbody>
				</table>
			</div>
			<div class="panel-footer">
				<button class="btn btn-success btn-sm " onclick="window.location.href='?module=user&act=tambahuser'"><span class="glyphicon glyphicon-plus"></span> Tambah User</button>
			</div>
		</div>
		<?php
	break;
  
	case "tambahuser":

	?>
	<div class="row">
	    <div class="col-lg-12">
	        <h1 class="page-header">
	            <i class="glyphicon glyphicon-user"></i> Manajemen User
	        </h1>
	        <ol class="breadcrumb">
	            <li class="active">
	                 <a href="master.php?module=user">Manajemen User</a> / <a href="master.php?module=user&act=tambahuser">Tambah User</a>
	            </li>
	        </ol>
	    </div>
	</div>
	<div class="panel panel-primary">
    	<div class="panel-heading">
			<div class="panel-title"><span class="glyphicon glyphicon-list"></span> Tambah User </div>
		</div>
		<div class="panel-body">
			<form method="POST" action="<?php echo $aksi;?>?module=user&act=input" onSubmit="return validasi(this)" class="form-horizontal" >
				<div class="form-group">
					<label for="username" class="col-sm-2 control-label">Username</label>
					<div class="col-sm-5">
						<div class="input-group">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-user"></span>
							</div>
							<input type="text" name="username" class="form-control" placeholder="Username">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="password" class="col-sm-2 control-label">Password</label>
					<div class="col-sm-5">
						<div class="input-group">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-lock"></span>
							</div>
							<input type="password" name="password" class="form-control" placeholder="Password">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="nama" class="col-sm-2 control-label">Nama Lengkap</label>
					<div class="col-sm-5">
						<div class="input-group">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-tags"></span>
							</div>
							<input type="text" name="nama" class="form-control" placeholder="Nama Lengkap">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="Email" class="col-sm-2 control-label">Email</label>
					<div class="col-sm-5">
						<div class="input-group">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-envelope"></span>
							</div>
							<input type="text" name="email" class="form-control" placeholder="Email">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="level" class="col-sm-2 control-label">Level Admin</label>
					<div class="col-sm-5">
						<div class="input-group">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-random"></span>
							</div>
							<select name="level" id="" class="form-control">
								<option value="Biasa">Admin Biasa</option>
								<option value="Super">Super Admin</option>
							</select>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="Email" class="col-sm-2 control-label"></label>
					<div class="col-sm-6">
						<button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-floppy-save"></span> Simpan</button> &nbsp;<button class="btn btn-danger" type="button" onclick="self.history.back()"><span class="glyphicon glyphicon-remove"></span> Batal</button>
					</div>
					
				</div>
				<blockquote class="blockquote-reverse">
					<i><font size="1">Super admin mengizinkan untuk mengakses modul User sedangkan admin biasa tidak dapat mengakses modul user</font>	</i>
				</blockquote>
			</form>
		</div>
		<div class="panel-footer">
			<i ><button class="btn btn-success btn-sm " onclick="window.location.href='?module=user'"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</button></i>
		</div>
    </div>
	<?php
	break;

	case "edituser":
		$edit=mysql_query("SELECT * FROM tbl_admin WHERE id='$_GET[id]'");
		$r=mysql_fetch_array($edit);
		?> 
		<div class="row">
		    <div class="col-lg-12">
		        <h1 class="page-header">
		            <i class="glyphicon glyphicon-user"></i> Manajemen User
		        </h1>
		        <ol class="breadcrumb">
		            <li class="active">
		                 <a href="master.php?module=user">Manajemen User</a> / <a href="?module=user&act=edituser&id=<?php echo $r['id'];?>">Edit User</a>
		            </li>
		        </ol>
		    </div>
		</div>
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="panel-title">
					<i class="glyphicon glyphicon-wrench"></i> Edit User
				</div>
			</div>
			<div class="panel-body">
				<form method="POST" action="<?php echo $aksi ?>?module=user&act=update"  class="form-horizontal" >
					<input type="hidden" name="id" value="<?php echo $r[id]; ?>">
					<div class="form-group">
						<label for="username" class="col-sm-2 control-label">Username</label>
						<div class="col-sm-5">
							<div class="input-group">
								<div class="input-group-addon">
									<span class="glyphicon glyphicon-user"></span>
								</div>
								<input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $r[username];?>">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="password" class="col-sm-2 control-label">Password</label>
						<div class="col-sm-5">
							<div class="input-group">
								<div class="input-group-addon">
									<span class="glyphicon glyphicon-lock"></span>
								</div>
								<input type="text" name="password" class="form-control" placeholder="Password">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="nama" class="col-sm-2 control-label">Nama Lengkap</label>
						<div class="col-sm-5">
							<div class="input-group">
								<div class="input-group-addon">
									<span class="glyphicon glyphicon-tags"></span>
								</div>
								<input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="<?php echo $r[fullname];?>">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="Email" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-5">
							<div class="input-group">
								<div class="input-group-addon">
									<span class="glyphicon glyphicon-envelope"></span>
								</div>
								<input type="text" name="email" class="form-control" placeholder="Email" value="<?php echo $r[email];?>">
							</div>
						</div>
					</div>
					<div class="form-group">
					<label for="level" class="col-sm-2 control-label">Level Admin</label>
					<div class="col-sm-5">
						<div class="input-group">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-random"></span>
							</div>
							<select name="level" id="" class="form-control">
								<option value="Biasa">Admin Biasa</option>
								<option value="Super">Super Admin</option>
							</select>
						</div>
					</div>
				</div>		
					
				<div class="form-group">
					<label for="Email" class="col-sm-2 control-label"></label>
					<div class="col-sm-6">
						<button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-floppy-save"></span> Simpan</button> &nbsp;<button class="btn btn-danger" type="button" onclick="self.history.back()"><span class="glyphicon glyphicon-remove"></span> Batal</button>
					</div>
					
				</div>
					<blockquote class="blockquote-reverse">
						<i><font size="1">*) Apa bila password tidak dirubah maka kosongkan saja..!</font>	</i>
					</blockquote>
				</form>
			</div>
		</div>
		<?php
	break;  
	
	}
}
else{
 ?>
 <div class="alert alert-danger"><p><i>"Anda Tidak Berhak Mengakses Modul ini"</i></p></div>
 <?php
}
?>
