<?php 
		$mhs_nik = $_POST['mhs_nik'];
		$mhs_nama_lengkap = $_POST['mhs_nama_lengkap'];

		include 'mhs_koneksi.php';
		$query = mysqli_query($conn,"SELECT * FROM mhs_user WHERE mhs_nik = '$mhs_nik' AND mhs_nama_lengkap = '$mhs_nama_lengkap'");

		if (mysqli_num_rows($query)==0) { ?>
				<script> 
					alert("NIK dan Nama Lengkap tidak ditemukan.");
					window.location.assign("mhs_index.php");
				</script>
			<?php
			
		}else{
			$mhs_data = mysqli_fetch_assoc($query);
			session_start();
			$_SESSION['mhs_id_user'] = $mhs_data['mhs_id_user'];
			$_SESSION['mhs_nik'] = $mhs_data['mhs_nik'];
			$_SESSION['mhs_nama_lengkap'] = $mhs_data['mhs_nama_lengkap'];
			$_SESSION['mhs_role'] = $mhs_data['mhs_role'];
			$_SESSION['mhs_foto'] = $mhs_data['mhs_foto'];

			if ($_SESSION['mhs_role'] == 'user' ) {
				header("location:mhs_user.php");
			}elseif ($_SESSION['mhs_role'] == 'admin') {
				header("location:mhs_admin.php");
			}

			
		}