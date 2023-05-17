<?php 
		$mhs_nik = $_POST['mhs_nik'];
		$mhs_nama_lengkap = $_POST['mhs_nama_lengkap'];
		$mhs_foto= $_FILES['mhs_foto']['name'];
		$mhs_awal= $_FILES['mhs_foto'] ['tmp_name'];
		move_uploaded_file($mhs_awal, 'gambar/'.$mhs_foto);


		include 'mhs_koneksi.php';
		$query_validasi = "SELECT * FROM mhs_user WHERE mhs_nik= '$mhs_nik'";
		$query = mysqli_query($conn, $query_validasi);

		if (mysqli_num_rows($query)==0) {
			$query_mhs_register = mysqli_query($conn,"INSERT INTO mhs_user (mhs_nik,mhs_nama_lengkap,mhs_role,mhs_foto) VALUES ('$mhs_nik','$mhs_nama_lengkap','admin','$mhs_foto')");
			if ($query_mhs_register) { ?>
				<script>
					alert("Tambah Admin Behasil Dilakukan, silakan Login");
					window.location.assign("mhs_admin.php");
				</script>
			<?php }
		}else{
			?>
				<script> 
					alert("NIK yang anda gunakan sudah terdaftar");
					window.location.assign("mhs_admin.php");
				</script>
			<?php
		}?>