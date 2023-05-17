<?php 

include 'mhs_koneksi.php';

$mhs_id_user = $_POST ['mhs_id_user'];
$mhs_nama_lengkap = $_POST ['mhs_nama_lengkap'];
$mhs_role = $_POST ['mhs_role'];

if(isset($_POST['mhs_gantifoto'])){
	$mhs_foto = $_FILES['mhs_foto']['name'];
	$mhs_nama_foto = $_FILES['mhs_foto']['tmp_name'];

	$mhs_path= "gambar/".$mhs_foto;
	if(move_uploaded_file($mhs_nama_foto, $mhs_path)){
		$mhs_query = mysqli_query($conn, "SELECT * FROM mhs_user WHERE mhs_id_user = $mhs_id_user");
		$mhs_data = mysqli_fetch_array($mhs_query);
		if(is_file("gambar/".$mhs_data['mhs_foto']))
		unlink("gambar/".$mhs_data['mhs_foto']);

		$mhs_query = mysqli_query($conn, "UPDATE `mhs_user` SET `mhs_nama_lengkap` = '$mhs_nama_lengkap', `mhs_foto` = '$mhs_foto' WHERE `mhs_user`.`mhs_id_user` = '$mhs_id_user';");
		if($mhs_query){
			header("location:mhs_admin.php?berhasil");
		}else{
			header("location:mhs_admin.php?gagal");
		}
	}else{
		header("location:mhs_edituser.php?foto=gagal=diubah");
	}
}else{
	$mhs_query = mysqli_query($conn, "UPDATE `mhs_user` SET `mhs_nama_lengkap` = '$mhs_nama_lengkap' WHERE `mhs_user`.`mhs_id_user` = '$mhs_id_user';");
	if($mhs_query){
		header("location:mhs_admin.php?berhasil");
	}else{
		header("location:mhs_admin.php?gagal=diubah");
	}
}
?>