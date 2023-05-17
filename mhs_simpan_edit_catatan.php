<?php 

$mhs_id_user = $_POST['mhs_id_user'];
$mhs_nik = $_POST['mhs_nik'];
$mhs_nama_lengkap = $_POST['mhs_nama_lengkap'];
$mhs_role = $_POST['mhs_role'];
$mhs_foto= $_FILES['mhs_foto']['name'];
$mhs_awal= $_FILES['mhs_foto'] ['tmp_name'];
move_uploaded_file($mhs_awal, 'gambar/'.$mhs_foto)

include 'mhs_koneksi.php';
$sql = "UPDATE mhs_user SET mhs_nik = '$mhs_nik', mhs_nama_lengkap = '$mhs_nama_lengkap, mhs_role = '$mhs_role ', mhs_foto = '$mhs_foto' WHERE mhs_id_user = '$mhs_id_user'";
var_dump($sql);
$query = mysqli_query($conn,$sql);

if ($query) { ?>
		<script> 
			alert("Data Catatan Sudah Teredit");
			window.location.assign("mhs_admin.php?url=mhs_edit");
		</script>
<?php
	
}
else { ?>
		<script> 
			alert("Data Catatan Tidak Teredit!");
			window.location.assign("mhs_admin.php?url=mhs_edit");
		</script>
<?php
	
}
	
