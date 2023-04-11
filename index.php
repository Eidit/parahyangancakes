<style type="text/css">
.share{
position: fixed;
height: 45px;
width: 42px;
left: 1px;
bottom: 300px;
z-index: 9999;
}

	.col-md-3{
		position: relative;
		margin:0 auto;
		overflow: hidden;
	}
	.tumbnail{
		position: absolute;
		top: 0;
		left: 0;
	}
	.thumbnail img{
		padding:1px;
		-webkit-transition:0.4 ease;
		transition: 0.4 ease;
	}
	.col-md-3:hover .thumbnail img{
		-webkit-transform:scale(1.36);
		transform: scale(1.36);
	}

</style>
<?php 
 session_start(); 
include 'koneksi.php';
?>
<?php
$datakategori=array();
$ambil= $koneksi->query("SELECT * FROM kategori");
while($tiap=$ambil->fetch_assoc())
{
	$datakategori[]=$tiap;
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Parahyangan Cakes & Pastry</title>
	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="shortcut icon" href="fotoprofil/pry.ico">
</head>
<body>


<section class="konten">
	<?php include 'menu.php'; ?><br><br><br>
	 <?php include 'buttonup.php'; ?>

		<div class="container"><br>
		
		<?php include 'slider.php'; ?><br><br><br>

		<form action="pencarian.php" method="get" class="navbar-form navbar-right">
			<input type="text" class="form-control" name="keyword" placeholder="Cari Produk">
			<button class="btn btn-black"><i class="fas fa-search"></i></button>
		</form>
		<form method="get" class="navbar-form navbar-right">
			<select class="form-control" name="kategori" onchange="document.location.href= this.options[this.selectedIndex].value;">
	 			<option value="">Pilih Kategori</option>
	 			<?php foreach ($datakategori as $key => $value): ?>
	 			<option value="kategori.php?id=<?php echo $value["id_kategori"] ?>" value="<?php echo $value["id_kategori"] ?>" ><?php echo $value["nama_kategori"] ?> </option>
	 			<?php endforeach ?>
 			</select>
		</form>
		<?php 

		if (empty($_SESSION['keranjang']) OR !isset($_SESSION["keranjang"])):?>
				
		<?php else: ?>
			<?php include 'modal.php'; ?><br>
		<?php endif ?>
		<h1>Produk Terbaru</h1><br>
		<strong>*Pembelian Khusus Wilayah Kota Bandung</strong>

		<div class="row">
	 		<?php  $ambil=$koneksi->query("SELECT *FROM produk post order by id_produk desc LIMIT 4"); ?>
			<?php  WHILE($perproduk =$ambil->fetch_assoc()){?>
			<div class="col-md-3" style="margin:0px;">
				<div class="thumbnail" >
					
					<div class="caption" >
						<img src="foto_produk/<?php echo $perproduk['foto_produk'] ?>" width="75%" alt="">
						<h5><?php echo $perproduk['nama_produk'] ?></h5>
						<h5>Rp <?php echo number_format($perproduk['harga_produk']) ?></h5>
						<a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-primary btn-sm" ><i class="fa fa-shopping-cart fa-sm"></i> Beli</a>
						<a href="detail.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-default btn-sm"i><i class="fas fa-info-circle fa-sm"></i>Detail</a>

					</div>
				</div>
			</div>
			<?php } ?>

	    
	</div>

	
</section>

	<script src="js/creative.min.js"></script>
	<script src="js/alertify.min.js"></script>
</body>
</html>