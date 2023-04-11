<h2>Data Pembayaran</h2>

<?php  
$id_pembelian=$_GET['id'];

$ambil=$koneksi->query("SELECT*FROM pembayaran WHERE id_pembelian='$id_pembelian'");
while ($detail=$ambil->fetch_assoc()){
?>

<?php $am=$koneksi->query("SELECT*FROM pembelian WHERE id_pembelian='$id_pembelian'");
$det=$am->fetch_assoc(); ?>
<div class="container">
<div class="row">
	<div class="col-md-6">
		<table class="table">
			<tr><br>
				<th>Nama</th>
				<th><?php  echo $detail['nama'];?></th>
			</tr>
			<tr>
				<th>Bank</th>
				<th><?php  echo $detail['bank']; ?></th>
			</tr>
			<tr>
				<th>Jumlah</th>
				<th>Rp. <?php  echo number_format($detail['jumlah']); ?></th>
			</tr>
			<tr>
				<th>Tanggal</th>
				<th><?php echo date("d F Y", strtotime($detail['tanggal']))?></th>
			</tr>
			
			<?php if (!empty($det['resipengiriman'])): ?>
			<tr>
				<th>Resi Pengiriman</th>
				<th><?php  echo $det['resipengiriman'] ?></th>
			</tr>
			<?php else: ?>
			<form method="post">
				<div class="form-group">
					<label>No Whatsapp Pengirim / Driver</label>
					<input  type="text" class="form-control" name="resi" required>
				</div>
				<button class=" btn btn-primary" name="proses">Proses</button>
			</form>
			<?php endif ?>

		</table>
	</div>
	<div class="col-md-4"><br>
		<label>Foto Bukti Pembayaran</label>
		<img src="../buktipembayaran/<?php echo $detail['bukti']; ?>" align="right"  class="img-responsive" style="width:300px;height:400px;" >
	</div>
</div>
<?php }?>
</div>

<?php  
if (isset($_POST["proses"])) 
{
	$resi=$_POST["resi"];
	$koneksi->query("UPDATE pembelian SET resipengiriman='$resi', status_pembelian='barang dikirim'
		WHERE id_pembelian='$id_pembelian'");
	echo "<script>alert('Pembayaran Berhasil Diupdate')</script>";
	echo "<script>location='index.php?halaman=pembelian';</script>";
}?>