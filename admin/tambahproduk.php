<div class="row">
	<div class="col-md-10">
		<div class="form-grup">
			<h2>Tambah Produk</h2>
		</div>
	</div>
	<div class="col-md-2">
		<div class="form-grup">
			<a href="index.php?halaman=produk" class="btn btn-primary">Kembali</a>
		</div>
	</div>
</div>
<?php
$datakategori=array();
$ambil= $koneksi->query("SELECT * FROM kategori");
while($tiap=$ambil->fetch_assoc())
{
	$datakategori[]=$tiap;
}
?>
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" class="form-control" name="nama" required>
	</div>
	<div class="form-group">
 		<label>Nama Kategori</label>
 		<select class="form-control" name="id_kategori">
 			<option value="">Pilih Kategori</option>
 			<?php foreach ($datakategori as $key => $value): ?>

 			<option value="<?php echo $value["id_kategori"] ?>"><?php echo $value["nama_kategori"] ?></option>
 				
 			<?php endforeach ?>
 		</select>
 	</div>
	<div class="form-group">
		<label>Harga (Rp)</label>
		<input type="number" class="form-control" name="harga" required>
	</div>
	<div class="form-group">
		<label>Deskripsi</label>
		<textarea class="form-control" name="deskripsi" id="deskripsi" rows="10" required></textarea>
	<script>
                CKEDITOR.replace( 'deskripsi' );
        </script>
	</div>
	<div class="form-group">
		<label>Foto</label>
		<div class="letak-input" style="margin-bottom: 10px;">
			<input type="file" class="form-control" name="foto[]">
		</div>
		<span class="btn btn-primary btn-tambah">
			<i class="fa fa-plus"></i>
		</span>
	</div>
	<div class="form-group">
		<label>Stok Produk</label>
		<input type="number" class="form-control" name="stok" required>
	</div>
	<button class ="btn btn-primary" name="save"><i class="glyphicon glyphicon-saved"></i>Simpan</a></button>
		
</form>
<?php
if (isset ($_POST['save']))
{
	$namanamafoto = $_FILES['foto']['name'];
	$lokasilokasifoto =$_FILES['foto']['tmp_name'];
	move_uploaded_file($lokasilokasifoto[0], "../foto_produk/".$namanamafoto[0]);
	$koneksi->query("INSERT INTO produk
		(nama_produk,id_kategori, harga_produk,foto_produk,deskripsi_produk, stok_produk)
		VALUES('$_POST[nama]','$_POST[id_kategori]','$_POST[harga]','$namanamafoto[0]','$_POST[deskripsi]','$_POST[stok]')");
	$id_produk_barusan=$koneksi->insert_id;
	foreach ($namanamafoto as $key => $tiap_nama) 
	{
		$tiap_lokasi =$lokasilokasifoto[$key];

		move_uploaded_file($tiap_lokasi, "../foto_produk/".$tiap_nama);

		$koneksi->query("INSERT INTO produk_foto(id_produk, nama_produk_foto)
			VALUES('$id_produk_barusan','$tiap_nama')");
	}

	echo "<div class='alert alert-info'>Data Tersimpan</div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";
	echo "<pre>";
	print_r($_FILES["foto"]);
	echo "</pre>";

}
?>

<script>
	$(document).ready(function(){
		$(".btn-tambah").on("click",function(){
			$(".letak-input").append("<input type='file' class='form-control' name='foto[]'>");
		})
	})
</script>