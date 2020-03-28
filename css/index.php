<!DOCTYPE html>
<html>
<head>
	<title>Pemilihan Ketua HIMASI online</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/jquery.1.11.3.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<div class="jumbotron">
		<h1><center>PEMILIHAN KETUA HIMPUNAN MAHASISWA SISTEM INFORMASI ONLINE</center></h1>
	</div>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-collapse">
					<span class="sr-only">Navigasi</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse" id="nav-collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="#pilihan" data-toggle="tab">Pilihan Calon</a></li>
					<li class=""><a href="#pertanyaan" data-toggle="tab">Pertanyaan</a></li>
					<li class=""><a href="#hasil" data-toggle="tab">Hasil Pemilihan</a></li>
					<li class=""><a href="#login" data-toggle="modal">Login Petugas</a></li>
					<div class="modal fade" id="login">
						<div class="modal-content">
							<div class="modal-dialog">
								<form role="form" action="ceklogin.php" method="post">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<div class="modal-title">Login Admin</div>
									</div>
									<div class="modal-body">
										<div class="form-group">	
											<label for="user">Username</label>
											<div class="input-group">
												<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
												<input type="text" class="form-control"name="username">
											</div>
										</div>
										<div class="form-group">
											<label for="user">Password</label>
											<div class="input-group">
												<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
												<input type="password" class="form-control"name="password">
											</div>
										</div>
									</div>
									<div class="modal-footer">
										<button type ="submit"class="btn btn-primary"> <span class="glyphicon glyphicon-log-in"></span>Masuk</button>
										<button class="btn btn-danger" data-dismiss="modal"> <span class="glyphicon glyphicon-remove"></span>Batal</button>
									</div>
								</div>
								</form>
							</div>
						</div>
					</div>
				</ul>
			</div>
		</div>
	</nav>
	
</div>
</body>
</html>