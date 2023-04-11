<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data id yang di kirim dari url
$id = $_GET['id_pembelian'];
 
 
// mengupdate data dari database
mysqli_query($koneksi,"UPDATE pembelian SET status_pembelian='barang diterima' WHERE id_pembelian='$id'");
if ($query) {
		echo "<script>alert('Data berhasil dihapus')</script>";
		header("location:riwayat.php");
	} else {
		echo "Data anda gagal dihapus. Ulangi sekali lagi";
		header("location:riwayat.php");
	}
 
?>