<div class="form-group">
				<label>Nama Lokasi Perjalanan</label>
				<td><select name="mhs_id_lokasi" id="">
			<?php 
				$mhs = mysqli_query($conn,"SELECT * FROM mhs_lokasi");
				while ($mhslokasi = mysqli_fetch_assoc($mhs)){
			?>
			<option value="<?php echo $mhslokasi['mhs_id_lokasi'] ?>"><?php echo $mhsloksi['mhs_nama_lokasi'] ?></option>
			<?php } ?>
			</div>