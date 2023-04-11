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

		<div class="container"><br><br><br>
		
		<div align="center"><h2><strong><img src="fotoprofil/lg.png" width="5%"> Parahyangan Cakes & Pastry</strong></h2></div>
		<br><br>
		<div align="center"><h4 align="left"><strong>Parahyangan Cakes & Pastry</strong></h4></div>
		<div align="center"><h5 align="justify">Berdiri sejak tahun 2019. Parahyangan Cakes & Pastry pun menyediakan beberapa jenis cakes dengan mempunyai tujuan yaitu menciptakan produk oleh-oleh yang nikmat dan terjangkau untuk segala lingkup masyarakat.</h5></div><br><br>
		<a href="https://api.whatsapp.com/send?phone=6285722810274" target="_blank" class="btn btn-default"><img src="fotoprofil/wa.png" width="25px">&nbsp;&nbsp;+6285722810274</a><br><br>
		<div>
		<a href="https://goo.gl/maps/6j6rHmTtQZvpECMe7" target="_blank" class="btn btn-default"><img src="fotoprofil/map.png" width="25px">&nbsp;&nbsp;Jl. Buah Batu No.271, Turangga, Kec.Lengkong, Kota Bandung</a></div>
		<br>
		<div>
		<a href="https://www.instagram.com/bolensusu/" target="_blank" class="btn btn-default"><img src="fotoprofil/igg.png" width="25px">&nbsp;&nbsp;bolensusu</a></div>
	
</section>

	<script src="js/creative.min.js"></script>
	<script src="js/alertify.min.js"></script>
</body>
</html>