<?php 
include 'mhs_koneksi.php';
$mhs_id_catatan_perjalanan = $_GET['mhs_id_catatan_perjalanan'];
$sql = "SELECT * FROM mhs_catatan_perjalanan WHERE mhs_id_catatan_perjalanan='$mhs_catatan_perjalanan'";
$query = mysqli_query($sql,$query);
$value = mysqli_fetch_array($query);
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
		<form method="POST" action="mhs_simpan_editcatatan.php">
			<input type="hidden" value="<?= $mhs_id_catatan_perjalanan ?>" name="mhs_id_catatan_perjalanan">
			<div class="form-group">
				<label>Tanggal Perjalanan</label>
				<input value="<?= $value['mhs_tanggal']?>" name="mhs_tanggal" class="form-control" type="date" placeholder="Pilih Tanggal" required>	
			</div>
			<div class="form-group">
				<label>Waktu Perjalanan</label>
				<input value="<?= $value['mhs_waktu']?>" name="mhs_waktu" class="form-control" type="time" placeholder="Pilih Waktu" required>	
			</div>
			<div class="form-group">
				<label>Lokasi Perjalanan</label>
				<input value="<?= $value['mhs_id_lokasi']?>" name="mhs_id_lokasi" class="form-control" type="text" placeholder="Masukan Lokasi" required>	
			</div>
			<div class="form-group">
				<label>Suhu Tubuh</label>
				<input value="<?= $value['mhs_catatan']?>" name="mhs_catatan" class="form-control" type="text" placeholder=" Masukan Suhu Tubuh" required>	
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
				<button type="reset" class="btn btn-warning"><i class="fa fa-trash"></i> Kosongkan</button>
			</div>
		</form>
	</div>
</div>