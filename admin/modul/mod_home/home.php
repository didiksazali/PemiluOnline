
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <i class="glyphicon glyphicon-home"></i> Home 
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                 <a href="master.php?module=home">Home</a>
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
		
<!--Fungsi untuk waktu-->		
<script type="text/javascript">
// 1 detik = 1000
window.setTimeout("waktu()",1000);  
function waktu() {   
	var tanggal = new Date();  
	setTimeout("waktu()",1000);  
	document.getElementById("output").innerHTML = tanggal.getHours()+":"+tanggal.getMinutes()+":"+tanggal.getSeconds();
}
</script>

<!--Fungsi untuk hari-->
<script language="JavaScript">
var tanggallengkap = new String();
var namahari = ("Minggu Senin Selasa Rabu Kamis Jumat Sabtu");
namahari = namahari.split(" ");
var namabulan = ("Januari Februari Maret April Mei Juni Juli Agustus September Oktober November Desember");
namabulan = namabulan.split(" ");
var tgl = new Date();
var hari = tgl.getDay();
var tanggal = tgl.getDate();
var bulan = tgl.getMonth();
var tahun = tgl.getFullYear();
tanggallengkap = namahari[hari] + ", " +tanggal + " " + namabulan[bulan] + " " + tahun;

	var popupWindow = null;
	function centeredPopup(url,winName,w,h,scroll){
	LeftPosition = (screen.width) ? (screen.width-w)/2 : 0;
	TopPosition = (screen.height) ? (screen.height-h)/2 : 0;
	settings ='height='+h+',width='+w+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',resizable'
	popupWindow = window.open(url,winName,settings)
}
</script>

			
            	<?php
				$tanggal = date('Y-m-d');
				$tanggalFinal = tgl_indo($tanggal);
				$time = date('h:i:s');
				?>
				
				
				<div class="panel-title"><span class="glyphicon glyphicon-calendar"></span> 
				<script language="JavaScript">document.write(tanggallengkap);
            </script> 
			<div id="output"></div>
				<?php //echo "<font face='tahoma' size='3'>$tanggalFinal |</font>"; ?></div>
                <!--<div class="panel-title" align="right"><i class="glyphicon glyphicon-calendar"></i> <?php //echo "<font face='tahoma' size='3'>$tanggalFinal |</font>"; ?></div> -->
				
            </div>
            <div class="panel-body">
            	<!-- <div class="well"> -->
                    <div class="alert alert-info">
            		<?php if($_SESSION['level']=='Super')
                    {
                        echo "Selamat Datang Petugas Pemilu <strong>".$_SESSION['username']. "</strong> Selamat bertugas !!";
                    }
                    else
                    {
                       echo "Selamat Datang Pemantau <strong>".$_SESSION['username']."</strong> Silahkan untuk melihat data"; 
                    }
                    ?>	
                    <!-- </div>	-->
            	</div>
                <div class="col-sm-12">
                <?php
                $jcalon=mysql_num_rows(mysql_query("SELECT * from calon"));
                $jpemilih=mysql_num_rows(mysql_query("SELECT * from pemilih"));
                $jbelum=mysql_num_rows(mysql_query("SELECT * from pemilih where status_milih='belum'"));
                $jsudah=mysql_num_rows(mysql_query("SELECT * from pemilih where status_milih='sudah'"));
                $jpertanyaan=mysql_num_rows(mysql_query("SELECT * from pertanyaan"));
                $pbelum=mysql_num_rows(mysql_query("SELECT * from pertanyaan where status='belum'"));
                $psudah=mysql_num_rows(mysql_query("SELECT * from pertanyaan where status='sudah'"));

                ?> 
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panel-title">
                                Update Terbaru Saat ini
                            </div>
                        </div>
                        <div class="panel-body">
                            <table class="table table-stripped ">
                                <tr>
                                    <td width="200px">Jumlah Calon</td><td width="10px">:</td><td><?php echo $jcalon." Pasangan" ?></td>
                                </tr>
                                <tr>
                                    <td width="200px">Jumlah Pemilih</td><td width="10px">:</td><td><?php echo $jpemilih." Orang" ?></td>
                                </tr>
                                <tr>
                                    <td width="200px">Jumlah Belum Memilih</td><td width="10px">:</td><td><?php echo $jbelum." Orang" ?></td>
                                </tr>
                                 <tr>
                                    <td width="200px">Jumlah Sudah Memilih</td><td width="10px">:</td><td><?php echo $jsudah." Orang" ?></td>
                                </tr>
                                 <tr>
                                    <td width="200px">Jumlah Pertanyaan Masuk</td><td width="10px">:</td><td><?php echo $jpertanyaan." Pertanyaan" ?></td>
                                </tr>
                                <tr>
                                    <td width="200px">Jumlah Pertanyaan Belum dijawab</td><td width="10px">:</td><td><?php echo $pbelum." Pertanyaan" ?></td>
                                </tr>
                                <tr>
                                    <td width="200px">Jumlah Pertanyaan Sudah dijawab</td><td width="10px">:</td><td><?php echo $psudah." Pertanyaan" ?></td>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>
              
            </div>
			<?php 
			//FOOTER MENU
			include "footer.php" 
			?>
        </div>
    </div>
</div>
