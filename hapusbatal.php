
<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data id yang di kirim dari url
$id = $_GET['id_pembelian'];
 
 
// menghapus data dari database
mysqli_query($koneksi,"DELETE FROM pembelian WHERE id_pembelian='$id'");
if ($query) {
		echo "<script>alert('Data berhasil dihapus')</script>";
		header("location:riwayat.php");
	} else {
		echo "Data anda gagal dihapus. Ulangi sekali lagi";
		header("location:riwayat.php");
	}
 
?>