<?php
	include 'mhs_koneksi.php';
	$sql = mysqli_query($conn,'SELECT * FROM mhs_lokasi GROUP BY mhs_nama_lokasi');
	mysqli_error($conn);
?>
<div class="card">
	<div class="card-header">
		<a href="mhs_user.php" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-arrow-left"></i>
            </span>
            <span class="text">Kembali</span>
        </a>
	</div>
	<div class="card-body">
		<form method="POST" action="mhs_simpan_catatan.php">
			<div class="form-group">
				<label>Tanggal Perjalanan</label>
				<input name="mhs_tanggal" class="form-control" type="date" placeholder="Pilih Tanggal" required>	
			</div>
			<div class="form-group">
				<label>Waktu Perjalanan</label>
				<input name="mhs_waktu" class="form-control" type="time" placeholder="Pilih Waktu" required>	
			</div>
			<div class="form-group">
				<label>Nama Lokasi Perjalanan</label>
				<select class = "form-control" name="mhs_nama_lokasi" id="">
					<option value="">Pilih Nama Lokasi</option>
					<?php if (mysqli_num_rows($sql) > 0) { ?>
						<?php while ($row = mysqli_fetch_array($sql)){ ?>
						<option value="<?php echo $row ['mhs_nama_lokasi']?>"><?php echo $row ['mhs_nama_lokasi']?></option>
						<?php } ?>
					<?php	 } ?>
				</select>
			</div>
			<div class="form-group">
				<label>Alamat Lokasi Perjalanan</label>
				<input name="mhs_alamat_lokasi" class="form-control" type="text" placeholder="Masukan Alamat Lokasi" required>	
			</div>
			<div class="form-group">
				<label>Tambahkan Foto</label><br>
				<input type="file"name="mhs_catatan"required>	
			</div>
			<div class="form-group">
				<label>Tambahkan Catatan</label>
				<input name="mhs_alamat_lokasi" class="form-control" type="text" placeholder="Masukan Catatan" required>	
			</div>
			<br>
			<br>
			<div class="form-group">
				<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
				<button type="reset" class="btn btn-warning"><i class="fa fa-trash"></i> Kosongkan</button>
			</div>
		</form>
	</div>
</div>