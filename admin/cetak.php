<?php 
session_start();
ob_start();
include '../koneksi.php';
 
?>

<!DOCTYPE html>
<html>
<head>
	<title>Nota Pembelian</title>
	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
</head>
<body>



<section class="konten">
	<div class="container">

		<!--nota disini copy dari folder admin-->
		<h2><img src="../fotoprofil/lg.png" width="50px">Parahyangan Cakes & Pastry</h2>
		<span>Jl. Buah Batu No.271, Turangga, Kec. Lengkong, Kota Bandung</span>
		<span> | +62 857-2281-0274</span>
		<hr>
<?php 
$ambil =$koneksi->query("SELECT*FROM pembelian JOIN pelanggan
	ON pembelian.id_pelanggan=pelanggan.id_pelanggan
	WHERE pembelian.id_pembelian='$_GET[id]'");
$detail =$ambil->fetch_assoc();
?>


<div class="row">
	<div class="col-md-4">
		<h3>Pembelian</h3>
		<strong>NO. PEMBELIAN: <?php echo $detail['id_pembelian']; ?></strong><br>
		<?php if (!empty($detail['resipengiriman'])): ?> No Resi :
				<?php echo $detail['resipengiriman']; ?>	
				<br><?php endif ?>
		Tanggal : <?php echo date("d F Y", strtotime($detail['tanggal_pembelian']))?><br>
		Total Bayar : Rp. <?php echo number_format($detail['total_pembelian']); ?>
	</div>
	<div class="col-md-4">
		<h3>Pelanggan</h3>
		<strong> NAMA :  <?php echo $detail['nama_pelanggan']; ?> </strong><br>

		Telepon : <?php echo $detail['telepon_pelanggan']; ?><br>
		Email : <?php echo $detail['email_pelanggan']; ?>
		
	</div>
	<div class="col-md-4">
		<h3>Pengiriman</h3>
		<strong>ALAMAT : <?php echo $detail['distrik']; ?> <?php echo $detail['provinsi']; ?></strong><br>
		Ongkos Kirim : Rp. 10,000<br>
		Alamat Pengiriman: <?php echo $detail['alamatpengiriman']; ?>
	</div>
</div><br>
<div align="center">
<table border="1">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Produk</th>
			<th>Harga</th>
			<th>Jumlah</th>
			<th>Ongkir</th>
			<th>Total Harga</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1;?>
		<?php $ambil= $koneksi->query("SELECT * FROM pembelian_produk WHERE id_pembelian='$_GET[id]'");?>
		<?php WHILE ($pecah =$ambil->fetch_assoc()){?>
		<tr>
			<td><?php echo $nomor;?></td>
			<td><?php echo $pecah['nama'];?></td>
			<td>Rp. <?php echo number_format($pecah['harga']);?></td>
			<td><?php echo $pecah['jumlah'];?></td>
			<td>Rp. 10,000</td>
			<td>Rp. <?php echo number_format($pecah['subharga']);?></td>
		</tr>
		<?php $nomor++;?>
		<?php } ?>
	</tbody>
</table>
</div>
</section>

</body>
	<script>
		 window.load = print_d();
		 function print_d(){
		 window.print();
		 }
	 </script>
</html>