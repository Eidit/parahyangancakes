<h2>Tambah Pengguna</h2>

<form method="post">
	<div class="row">
		<div class="col-sm-6">
			<div class="form-group">
				<label>Nama</label>
				<input class="form-control" type="text-area" name="nama">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-6">
			<div class="form-group">
        		<label>Alamat</label>
        		<textarea class="form-control" name="alamat"></textarea>
    		</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3 col-sm-6">
			<div class="form-group">
				<label>Telepon</label>
				<input class="form-control" type="number" name="no_hp">
			</div>
		</div>
		<div class="col-lg-3 col-sm-6">
			<div class="form-group">
        		<label>Sebagai</label>
        			<select class="form-control" name="level">
        				<option value="Admin">Admin</option>
            			<option value="Pemilik">Pemilik</option>
        			</select>
    		</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3 col-sm-6">
			<div class="form-group">
				<label>Username</label>
				<input class="form-control" type="text" name="username">
			</div>
		</div>
		<div class="col-lg-3 col-sm-6">
			<div class="form-group">
        		<label>Password</label>
        		<input class="form-control" type="password" name="password">
    		</div>
		</div>
	</div>
	<button class="btn btn-success" name="tambahpengguna">Tambah Pengguna</button>
</form><br>
	<a href="index.php?halaman=pengguna"><button class="btn btn-primary">Kembali</button></a>
<?php
if(isset($_POST['username'])){
$password=$_POST['password'];
$username		= $_POST['username'];
$nama		= $_POST['nama'];
$alamat		= $_POST['alamat'];
$no_hp		= $_POST['no_hp'];
$level		= $_POST['level'];

	
	$input = $koneksi->query("INSERT INTO admin VALUES(NULL, '$username','$password', '$nama', '$alamat', '$no_hp', '$level')") or die(mysqli_error());
	if($input){
		
		 ?>
	    <script language="JavaScript">
		alertify.confirm('Data pengguna berhasil Ditambah!', function(){window.location.href="pengguna.php"}).setHeader(' ').set({closable:false,transition:'fade'}).autoOk(3); 
		</script>
		<?php
	}else{
		
		echo 'Gagal menambahkan data! ';	
		echo '<a href="pengguna.php?menu=admin">Kembali</a>';	
		
	}
  
}
?>
	