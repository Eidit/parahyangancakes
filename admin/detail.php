<h2>Detail Pembelian</h2>
<?php 
$ambil =$koneksi->query("SELECT*FROM pembelian JOIN pelanggan
	ON pembelian.id_pelanggan=pelanggan.id_pelanggan
	WHERE pembelian.id_pembelian='$_GET[id]'");
$detail =$ambil->fetch_assoc();
?>
<!-- <pre><?php //print_r($detail) ?></pre>
<strong><?php //echo $detail['nama_pelanggan']; ?></strong><br>
<p>
	<?php //echo $detail['telepon_pelanggan']; ?><br>
	<?php //echo $detail['email_pelanggan']; ?>
</p>

<p>
	tanggal:<?php //echo $detail['tanggal_pembelian']; ?><br>
	total: <?php //echo $detail['total_pembelian']; ?>
</p> -->
<div class="row">
	<div class="col-md-4">
		<h3>Pembelian</h3>
		<strong>NO PEMBELIAN: <?php echo $detail['id_pembelian']; ?></strong><br>
		Tanggal : <?php echo date("d F Y", strtotime($detail['tanggal_pembelian']))?><br>
		Status Barang : <?php  echo $detail['status_pembelian']; ?><br>
		Total Bayar : Rp. <?php echo number_format($detail['total_pembelian']); ?>
	</div>
	<div class="col-md-4">
		<h3>Pelanggan</h3>
		<strong>NAMA : <?php echo $detail['nama_pelanggan']; ?></strong><br>
		Telepon : <?php echo $detail['telepon_pelanggan']; ?><br>
		Email : <?php echo $detail['email_pelanggan']; ?>
	</div>
	<div class="col-md-4">
		<h3>Pengiriman</h3>
		<strong>ALAMAT : <?php echo $detail['distrik']; ?> <?php echo $detail['provinsi']; ?></strong><br>
		Ongkos Kirim : Rp. 10,000<br>
		Alamat Pengiriman: <?php echo $detail['alamatpengiriman']; ?>
	</div>

</div>
<br>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Produk</th>
			<th>Harga</th>
			<th>Jumlah</th>
			<th>Ongkos Kirim</th>
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
			<td><?php echo $pecah['jumlah'];?> Pcs</td>
			<td>Rp. 10,000</td>
			<td>Rp. <?php echo number_format($pecah['subharga']);?></td>
			
		</tr>
		<?php $nomor++;?>
		<?php } ?>
	</tbody>
</table>
<a href="cetak.php?id=<?php echo $detail['id_pembelian'] ?>" target="_blank" class="btn btn-warning"><i class="fa fa-print"></i> Cetak</a>