<?php
// Load file koneksi.php
include '../koneksi.php';
	$semuadata=array();
    if(isset($_POST["tampilkan"])){
        $dt1 = $_POST['tgl1']; // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)
        $dt2 = $_POST['tgl2']; // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)
            
            // Buat query untuk menampilkan data transaksi sesuai periode tanggal
        $qy = mysqli_query ($koneksi, "SELECT*FROM pembelian pm LEFT JOIN pelanggan pl ON pm.id_pelanggan=pl.id_pelanggan WHERE tanggal_pembelian BETWEEN '$dt1' AND '$dt2' ORDER BY id_pembelian DESC "); 
	WHILE ($pecah =mysqli_fetch_assoc($qy))
	{
		$semuadata[]=$pecah;
	}
}
?>
<!DOCTYPE html>
	<html>
	<head>
    <link rel="shortcut icon" href="assets/img/swastamita.ico">
		<title>Transaksi</title>
		<style type="text/css">
			table {
			  border-collapse: collapse;
			}
		</style>
	</head>
	<body>

		<table align="center" border="0" cellpadding="1" style="width: 700px;">
			<tbody>
				<tr><td colspan="3"><div align="center">
				<span style="font-family: Verdana; font-size: x-small;"><img src="../fotoprofil/lg.png" width="50px"><b><h1>PARAHYANGAN CAKES & PASTRY</h1></b></span></div>
        <span style="font-family: Verdana; font-size: x-small;"><h3>LAPORAN TRANSAKSI</h3></span>
        <span> +62 857-2281-0274</span></br>
        <span> Jl. Buah Batu No.271, Turangga, Kec. Lengkong, Kota Bandung</span>
				<hr color="black"></td>
				</tr>
			</tbody>
		</table>
      <table align="center" border="0" cellpadding="1" style="width: 700px;">
			<tbody>
				<tr><td colspan="3"><div align="center">
				</div></td>
				</tr>
			</tbody>
		</table>
		<table border="1" width="100%" align="center">

			<thead>
        <tr>
			<th>No</th>
			<th>Pelanggan</th>
			<th>Tanggal</th>
			<th>Jumlah</th>
			<th>Status</th>
		</tr>
      </thead>
      <tbody>
		<?php $total=0; ?>
		<?php $nomor=1;?>
		<?php foreach ($semuadata as $key => $value): ?>
		<?php $total+=$value['total_pembelian'] ?>
			
		
		<tr>
			<td><?php echo $nomor;?></td>
			<td><?php echo $value["nama_pelanggan"] ?></td>
			<td><?php echo date("d F Y", strtotime($value['tanggal_pembelian']))?></td>
			<td>Rp. <?php echo number_format($value["total_pembelian"]) ?></td>
			<td><?php echo $value["status_pembelian"] ?></td>
		</tr>
		<?php $nomor++;?>
		<?php endforeach ?>
	</tbody>
	<tfoot>
		<tr>
			<th colspan="3">Total</th>
			<th>Rp. <?php echo number_format($total) ?></th>
			<th></th>
		</tr>
	</tfoot>
        </table><br><br><br>
        <?php
 $tgl=date('d-m-Y');
 ?>
    <div align="right">
    	<span>Bandung, <?php echo $tgl?></span><br><br><br><br><br>
    	<span align="center">Endah Indriyanti</span>
    </div>
	</body>
	<script>
		 window.load = print_d();
		 function print_d(){
		 window.print();
		 }
	 </script>
	</html>