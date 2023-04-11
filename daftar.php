<?php include 'koneksi.php'; ?>
<?php include 'menu.php'; ?><br><br><br>
<!DOCTYPE html>
<html>
<head>
	<title>Daftar</title>
	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
	<link rel="shortcut icon" href="fotoprofil/pry.ico">
</head>
<body>

<div class="container">
	<div class="row">
		<div class="col-md-7 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Daftar Pelanggan</h3>
				</div>
				<div class="panel-body">
					<form method="post" class="form-horizontal">
						<div class="form-group">
							<label class="control-label col-md-3">Nama</label>
							<div class="col-md-7">
								<input type="text" name="nama" class="form-control" required>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Email</label>
							<div class="col-md-7">
								<input type="email" name="email" class="form-control" required>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Password</label>
							<div class="col-md-7">
								<input type="password" name="password" class="form-control" required>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Alamat</label>
							<div class="col-md-7">
								<textarea class="form-control " name="alamat" required></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Telepon</label>
							<div class="col-md-7">
								<input type="text" name="telepon" class="form-control">
							</div>
						</div>
						

                  <div class="col text-right">
                    
                    <a href="login.php">Sudah Punya Akun ? Masuk</a>
                  </div>
                
						<div class="form-group">
							<div class="col-md-7 col-md-offset-3">
								<button class="btn btn-primary" name="daftar">Daftar</button>
								
							</div>
						</div>
						
					</form>
					<?php  
					if (isset($_POST["daftar"])) 
					{
						$id_pelanggan=null;
						$nama_pelanggan = $_POST['nama'];
						$email_pelanggan = $_POST['email'];
						$password_pelanggan = $_POST['password'];
						$alamat = $_POST['alamat'];
						$telepon_pelanggan = $_POST['telepon'];

						//cek apakah email sudah ada
						$ambil=$koneksi->query("SELECT*FROM pelanggan 
							WHERE email_pelanggan='$email_pelanggan'");
						$yangcocok=$ambil->num_rows;
						if ($yangcocok==1) 
						{
							echo "<script>alert('pendaftaran gagal, email sudah ada')</script>";
							echo "<script>location='daftar.php';</script>";
						}
						else
						{
							$input = mysqli_query($koneksi,"INSERT INTO pelanggan (id_pelanggan, nama_pelanggan, email_pelanggan, password_pelanggan, alamat, telepon_pelanggan)
								VALUES('$id_pelanggan','$nama_pelanggan', '$email_pelanggan',  '$password_pelanggan', '$alamat', '$telepon_pelanggan')
								");

							echo "<script>alert('pendaftaran berhasil')</script>";
							echo "<script>location='login.php';</script>";
						}
					}
					?>
				</div>
			</div>
			
		</div>
		
	</div>
	
</div>
<?php include 'footer.php'; ?>
</body>
</html>