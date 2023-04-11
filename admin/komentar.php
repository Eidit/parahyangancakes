<h3>Komentar</h3>	
<hr>
<table class="table table-bordered" id="table">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Komentar</th>
			<th>Tanggal</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1;?>

		<?php include '../koneksi.php'; 
		$ambil= $koneksi->query("SELECT * FROM komentar JOIN pelanggan ON komentar.id_pelanggan=pelanggan.id_pelanggan ORDER BY tgl_komentar DESC");?>
		<?php while($pecah=$ambil->fetch_assoc()){?>
		
		<tr>
			<td><?php echo $nomor ?></td>
			<td><?php echo $pecah["nama_pelanggan"] ?></td>
			<td><?php echo $pecah["komentar"] ?></td>
			<td><?php echo $pecah["tgl_komentar"] ?></td>
			<td>
				<a href="hapuskomentar.php?nomor=<?php echo $pecah['id_pelanggan'];?>" class="btn btn-warning btn-sm">Hapus</a>
			</td>

		</tr>
		<?php $nomor++;?>
		<?php };?>
		

	</tbody>

</table>