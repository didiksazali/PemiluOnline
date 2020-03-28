<ul class="nav navbar-nav side-nav">

						<!--Mengambil modul home-->
                        <li class="<?php if($_GET['module']=='home'){echo'active';} ?>" >
                            <a href="?module=home"><i class="glyphicon glyphicon-home"></i> Home</a>
                        </li>
						
						<!--Mengambil modul user-->
                        <li class="<?php if($_GET['module']=='user'){echo'active';} ?>">
                            <a href="?module=user"><i class="glyphicon glyphicon-user"></i> Kelola User</a>
                        </li>
						
						<!--Mengambil modul calon-->
                        <li class="<?php if($_GET['module']=='calon'){echo'active';} ?>">
                            <a href="?module=calon"><i class="glyphicon glyphicon-list"></i> Kelola Calon</a>
                        </li>
						
						<!--Mengambil modul pemilih-->
                        <li class="<?php if($_GET['module']=='pemilih'){echo'active';} ?>">
                            <a href="?module=pemilih"><i class="glyphicon glyphicon-book"></i> Kelola Pemilih </a>
                        </li>
						
						<!--Mengambil modul pertanyaan-->
                        <li class="<?php if($_GET['module']=='pertanyaan'){echo'active';} ?>">
                            <a href="?module=pertanyaan"><i class="glyphicon glyphicon-question-sign"></i> Kelola Pertanyaan </a>
                        </li>
						
						<!--Mengambil modul hasil-->
                        <li class="<?php if($_GET['module']=='hasil'){echo'active';} ?>">
                            <a href="?module=hasil&sub=all"><i class="glyphicon glyphicon-new-window"></i> Hasil Pemilu</a>
                        </li>
                        
</ul>