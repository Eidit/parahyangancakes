<?php 
session_start();
include 'koneksi.php';
$id_pembelian=$_GET["id"];
$ambil= $koneksi->query("SELECT*FROM pembelian_produk Join produk ON pembelian_produk.id_produk=produk.id_produk ");
				while($perproduk=$ambil->fetch_assoc()){
				$id_produk=$perproduk['id_produk'];
				$jumlah=$perproduk['jumlah'];
				$hasil=$perproduk['stok_produk'];
				$stok_produk=$hasil+$jumlah;
}
$koneksi->query("UPDATE produk SET stok_produk='$stok_produk'
WHERE id_produk='$id_produk'");	
$koneksi->query("UPDATE pembelian SET status_pembelian='batal'
WHERE id_pembelian='$id_pembelian'");
echo "<script>alert('batal');</script>";
echo "<script>location='riwayat.php';</script>";

?>

