<div class="row">
	<div class="col-md-10">
		<div class="form-grup">
			<h2>Daftar Produk</h2>
		</div>
	</div>
	<div class="col-md-2">
		<div class="form-grup">
			<a href="index.php?halaman=tambahproduk" class="btn btn-primary">Tambah Produk</a>
		</div>
	</div>
</div>
<table class="table table-bordered" id="table">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Kategori</th>
			<th>Harga</th>
			<th>Foto</th>
			<th>Stok</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1;?>
		<?php $ambil=$koneksi->query("SELECT*FROM produk LEFT JOIN kategori ON produk.id_kategori=kategori.id_kategori ORDER BY id_produk DESC"); ?>
		<?php while($pecah=$ambil->fetch_assoc()){?>
		<tr>
			<td><?php echo $nomor;?></td>
			<td><?php echo $pecah['nama_produk']?></td>
			<td><?php echo $pecah['nama_kategori']?></td>
			<td>Rp. <?php echo number_format($pecah['harga_produk'])?></td>
			<td>
				<img src="../foto_produk/<?php echo $pecah['foto_produk']?>" width="100px">
			</td>
			<td><?php echo $pecah['stok_produk']?></td>
			<td>
				<a href="index.php?halaman=hapusproduk&id=<?php echo $pecah['id_produk'];?>" class= "btn btn-danger" onclick="return confirm('Yakin Mau di Hapus?')" ><i class="fa fa-trash"></i> Hapus</a>
				<a href="index.php?halaman=ubahproduk&id=<?php echo $pecah['id_produk'];?>" class= "btn btn-warning"><i class="fa fa-edit"></i> Ubah</a>
				<a href="index.php?halaman=detailproduk&id=<?php echo $pecah['id_produk'];?>" class= "btn btn-info" ><i class="fa fa-eye"></i> Detail</a>
			</td>
		</tr>
		<?php $nomor++;?>
		<?php }?>
	</tbody>
</table>