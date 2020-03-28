<div class="wlcome">
		<div class="container">
			<div class="wlcome-grids">
				<div class="col-md-12 wlcome-grid-left">
					<div class="election_grid">
						<!--<h3>Selamat Datang di Pemilihan Umum Online  !</h3>
						<p class="nihil">Vote For Real Government.</p>-->

					

	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
			<div class="panel-title"><h3 style="color:white"> Panduan Pemilihan</h3></div>
		</div>
			<div class="panel-body" style="color: black">
				1. Pemilih mendapatkan nomor pemilih yang sifatnya rahasia yang di 
				   distribusikan oleh admin (via email ,sms ataupun komunikasi langsung yang dilakukan oleh petugas penyelenggara pemilu)<br>
				2. Pemilih hadir pada waktu yang telah ditentukan, karena sistem pemilih 
				   baru aktif pada waktu yang ditentukan<br>
				3. Pemilih memasukan nim dan dan nomor pemilih pada form input 
				   masing-masing calon yang ingin dipilih<br>
				4. Pastikan pemilih memasukan input nim dan no pemilih dengan benar<br>
				5. Terdapat mekanisme validasi apakah pemilih yakin memilih no urut yang 
				   dipilih? apa bila yakin pemilih bisa mengkonfirmasi dengan mengklik yes dan kalaupun tidak bisa mengklik no<br>
				6. Hasil bisa langsung di lihat pada tabel hasil

			</div>
		</div>
	</div>
<?php $sql=mysql_query("SELECT *FROM calon order by no_urut asc");
	while($d =mysql_fetch_array($sql)){
	 ?>
	<div class="col-md-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
			<center>
				<div class="panel-title">
					<h1>No Urut <?php echo $d[no_urut];?></h1>
				</div>
			</center>
			</div>
			<div class="panel-body">
				<div class="about-grids">
					<div class="col-md-6 about-grid">
						<div class="about-grid1">
							<figure class="thumb">
								<img src="foto_calon/<?php echo $d[foto_ketua];?>" alt=" " class="img-responsive" />
								<figcaption class="caption">
									<h3><a href="#"><?php echo $d[c_ketua];?></a></h3>
									<span>Calon Ketua</span>
								</figcaption>
							</figure>
						</div>
					</div>
					<div class="col-md-6 about-grid">
						<div class="about-grid1">
							<figure class="thumb">
								<img src="foto_calon/<?php echo $d[foto_wakil];?>" alt=" " class="img-responsive" />
								<figcaption class="caption">
									<h3><a href="#"><?php echo $d[cw_ketua];?></a></h3>
									<span>Calon Wakil</span>
									
								</figcaption>
							</figure>
						</div>
					</div>
					<div class="col-md-1"></div>
					<form id="form-milih<?php echo $d[no_urut];?>">
					<div class="col-md-10">
						<div class="form-horizontal">
							<input type="hidden" id="nourut<?php echo $d[no_urut];?>" value="<?php echo $d[no_urut];?>" name="nourut">
							<div class="form-group">
								<input required name="nim" id="nim<?php echo $d[no_urut];?>" class="form-control" style="margin-top:10px;" placeholder="NIM">
							</div>
							<div class="form-group">
								<input required name="nopemilih" id="nopemilih<?php echo $d[no_urut];?>" class="form-control" style="margin-top:10px;" placeholder="Nomor Pemilih">
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<button type="button" onclick="pilihcalon('#nim<?php echo $d[no_urut];?>','#nopemilih<?php echo $d[no_urut];?>','<?php echo $d[no_urut];?>')" style="margin-top:10px;" class="btn btn-primary btn-lg btn-block">Pilih</button>
					</div>
					</form>
				</div>
			</div>
		</div>

	</div>
	<?php } ?>
	
	</div>
					
				</div>
				
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>