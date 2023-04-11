<h2>Silahkan Masukkan Tanggal Untuk Cetak</h2>
<hr>

<form method="post" action="proses-cetak-laporan.php" target="_blank">
	<div class="row">
		<div class="col-md-5">
			<div class="form-group">
				<label>Tanggal Mulai</label>
				<input type="date" name="tgl1" class="form-control">
			</div>
		</div>
		<div class="col-md-5">
			<div class="form-group">
				<label>Tanggal Selesai</label>
				<input type="date" name="tgl2" class="form-control">
			</div>
		</div>
		<div class="col-md-1">
			<div class="form-group">
				<label></label><br>
				<button class="btn btn-warning" type="submit" name="tampilkan"><i class="fa fa-print"></i> Cetak</button>
			</div>
		</div>
	</div>
</form>
