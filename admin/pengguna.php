<h2>Data Pengguna</h2>

<table class="table table-bordered" id="table">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Alamat</th>
			<th>Telepon</th>
			<th>Username</th>
			<th>Level</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1;?>
		<?php $ambil= $koneksi->query("SELECT * FROM admin");?>
		<?php while($pecah=$ambil->fetch_assoc()){?>
		<tr>
			<td><?php echo $nomor;?></td>
			<td><?php echo $pecah['nama']?></td>
			<td><?php echo $pecah['username']?></td>
			<td><?php echo $pecah['alamat']?></td>
			<td><?php echo $pecah['no_hp']?></td>
			<td><?php echo $pecah['level']?></td>
			<td>
				<a href="index.php?halaman=editpengguna&id=<?php echo $pecah['id_admin'] ?>" class= "btn btn-warning">Edit</a>
						
			</td>
		</tr>
		<?php $nomor++;?>
		<?php }?>
	</tbody>
</table>
<a href="index.php?halaman=tambahpengguna" class="btn btn-primary"> Tambah Pengguna</a>