<?php 
$id_komentar=$_GET["id"];
unset($_SESSION["komentar"][$id_komentar]);
include '../koneksi.php';

echo "<script> alert('komentar Terhapus');</script>";
echo "<script> location ='index.php?halaman=komentar';</script>";
?>
<?php 
// koneksi database
include '../koneksi.php';
 
// menangkap data id yang di kirim dari url
$id = $_GET['id_komentar'];
 
 
// menghapus data dari database
mysqli_query($koneksi,"DELETE FROM komentar WHERE id_komentar='$id'");
if ($query) {
		echo "<script>alert('Data berhasil dihapus')</script>";
		header("location:index.php?halaman=komentar");
	} else {
		echo "Data anda gagal dihapus. Ulangi sekali lagi";
		header("location:index.php?halaman=komentar");
	}
 
?>