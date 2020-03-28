function kosongkan()
{
   $("#validasi").empty();
   $("#validasi2").empty();
   $("#validasi3").empty(); 
}
function cekpasslama()
    {
        
        var pass_lama=$("#pass_lama").val();
        if(pass_lama=='')
        {
            $("#validasi").html("Password Tidak boleh kosong");
        }
        else
        {
            $.post('gantipass.php',{pass_lama:pass_lama,aksi:'cekpass'}, function(data) {
            if(data=="oke")
            {
                $("#validasi").html("Password Sesuai");    
            }
            else
            {
             $("#validasi").html("Password Tidak Sesuai");
                
            }
             });
             
        }
    }
function konfirmasi()
    {
        var stat2;
        var pass_baru = $("#pass_baru").val();
        var kon_pass_baru = $("#konpassbaru").val();
        if(kon_pass_baru==''||pass_baru=='')
        {
            $("#validasi3").html("password tidak boleh kosong");
            
            $("#validasi2").html("konfirmasi password tidak boleh kosong");
        }
        else
        {
            if(pass_baru!=kon_pass_baru)
        {
            $("#validasi2").html("Konfirmasi Password Baru tidak sesuai");
            var stat2='no'; 
        }
            else
            {
                $("#validasi2").html("Password Cocok");
                var stat2='oke';
                
            }
        }
        return stat2;
    }
function gantipass()
    {
       
        var stat=konfirmasi();
        if(stat=='oke')
        {
            var pass_lama=$("#pass_lama").val();
            var pass_baru =$("#pass_baru").val();
            $.post('gantipass.php',{pass_lama:pass_lama,aksi:'cekpass'}, function(data) {
                if(data=="oke")
                {
                    $.post('gantipass.php', {newpass:pass_baru,aksi:'gantipass'}, function(data) {
                        alert(data);
                      window.location.reload();
                    });
                }
                else
                {
                 $("#validasi").html("Password Tidak Sesuai");
                    alert("Password lama tidak sesuai dengan yang di database");
                }
            });
        }
        else
        {
            alert("Konfirmasi password tidak sesuai")
        }
    }
    
function pilihcalon (nim,nopemilih,pilihan1) {
	if($(nim).val()==''||$(nopemilih).val()=='')
	{
			alertify.alert("Peringatan","Lengkapi isian form!");
	}
	else
	{
        var nim =$(nim).val();
        var nopemilih=$(nopemilih).val();
        var pilihan2=pilihan1;
		alertify.confirm("Submit Pilihan","Apakah anda yakin memilih calon no urut "+pilihan2+" ini?",function(){
			
			$.post('proses.php',{nim:nim,nopemilih:nopemilih,pilihan:pilihan2},function(hasil){
				if(hasil=='berhasil')
				{
					alertify.alert("Berhasil","Berhasil Memasukan Pilihan,Terima kasih sudah ikut berpartisipasi!!",function(){
						window.location.reload();
						$('input').val('');
					});
					
				}
				else
				{
					alertify.alert("Gagal","Nim atau Nomor pemilih salah atau Anda sudah pernah memilih atau tidak Terdaftar sebagai pemilih,Silahkan Ulangi lagi",function(){
						alertify.error("Gagal memilih");
						window.location.reload();
					});
				}
			});
		},function(){
			alertify.error("Batal memilih")
		});
	}
}
function inputask()
{
	if($("#nim").val()==''||$("#ask").val()==''||$("#no_pemilih").val()=='')
	{
			alertify.alert("Peringatan","Lengkapi isian form!");
	}
	else
	{
		alertify.confirm("Submit Pilihan","Apakah anda yakin Akan memasukan Pertanyaan ini?",function(){
			var data =$("#fask").serialize();
			$.post('ask2.php',data,function(hasil){
				if(hasil=='berhasil')
				{
					alertify.alert("Berhasil","Berhasil Memasukan Pertanyaan,Terima kasih sudah ikut berpartisipasi!!",function(){
						window.location.reload();
						$('input').val('');
						$('textarea').val('');
					});
					
				}
				else
				{
					alertify.alert("Gagal","NIM atau Nomor Pemilih salah atau anda sudah pernah memasukan pertanyaan sebelumnya, Silahkan Ulangi lagi",function(){
						alertify.error("Gagal Input");

					});
				}
			});
		},function(){
			alertify.error("Batal Input")
		});
	}
}
function cetakkartu(id)
{
    var content=document.getElementById('area-cetak').innerHTML;
    var converted = htmlDocx.asBlob(content, {orientation: 'potrait', margins: 

        {
            top: 720,
            bottom: 720,
            left :400,
            right:400,

        }


    });
    saveAs(converted, 'Cetak Kartu.docx');
}