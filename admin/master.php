
<?php
session_start();
error_reporting(1);
include 'fungsi/fungsi_indotgl.php';
include 'fungsi/class_paging.php';
include '../koneksi.php';

//Mengecek session login
if (empty($_SESSION[username]) AND empty($_SESSION[password])){
    echo "<center>Untuk mengakses Halaman, Anda harus login <br>";
    echo "<a href=../index.php><b>LOGIN</b></a></center>";
}
else{
    if(time()<$_SESSION['timeout'])
    {
    
?>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Admin Pemilu</title>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/sb-admin.css" rel="stylesheet">
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">

    </head>
   
    
    <body>
		<!--MODAL DIALOG-->
        <div class="modal fade" id="gantipass">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div  class="form-horizontal">
                        <div class="modal-header">
                            <button class="close" data-dismiss="modal">&times;</button>
                            <div class="modal-title">
                                <h4>Ganti Password</h4>

                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="lama" class="col-sm-4 control-label">Password Lama</label>
                                <div class="col-sm-4">
                                    <input type="password" name="pass_lama" id="pass_lama" class="form-control" onmouseout="cekpasslama()">
                                </div> 
                                <div class="col-sm-4" id="validasi">
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="lama" class="col-sm-4 control-label">Password Baru</label>
                                <div class="col-sm-4">
                                    <input type="password" name="pass_baru" class="form-control" id="pass_baru" onmouseout="konfirmasi()">
                                </div>
                                <div class="col-sm-4" id="validasi3">
                                    
                                </div>
                                
                            </div>
                            <div class="form-group">
                                 <label for="lama" class="col-sm-4 control-label">Konfirmasi Pass Baru</label>
                                <div class="col-sm-4">
                                    <input type="password" class="form-control"  id="konpassbaru" onmouseout="konfirmasi()">
                                </div>
                                <div class="col-sm-4" id="validasi2">
                                    
                                </div>
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" data-dismiss="modal" onclick="kosongkan()"><i class="glyphicon glyphicon-remove"></i> Batal</button>
                            <button class="btn btn-primary" onclick="gantipass()"><i class="glyphicon glyphicon-ok"></i> Ganti</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="wrapper">
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                
				<?php 
				//HEADER MENU
				include "header.php"; 
				?>
				
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                 <?php 
				 //SIDE BAR MENU
				 include "sidebar.php"; 
				?>
                </div>
            </nav>

            <div id="page-wrapper">

                <div class="container-fluid">
				
                <?php 
				//CONTENT 
				include "konten.php"; 
				?>

                </div>
            </div>
        </div>
        <script src="../js/jquery.1.11.3.min.js"></script>
        <script src="../js/skrip.js"></script>
        <script src="../js/bootstrap.min.js"></script>
    </body>

    </html>
    <?php
    }
    else
    {
        session_destroy();
        echo" Sesi anda sudah habis, Silahkan <a href='../index.php'>Login</a> kembali";

    }
}
