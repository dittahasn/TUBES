<?php 

$mhs_id_catatan_perjalanan = $_GET['mhs_id_catatan_perjalanan'];

include 'mhs_koneksi.php';
$sql = "DELETE FROM `mhs_catatan_perjalanan` WHERE `mhs_catatan_perjalanan`.`mhs_id_catatan_pejalan` = '$mhs_id_catatan_perjalanan'";

$query = mysqli_query($conn,$sql);

if ($query) { ?>
		<script> 
			alert("Data Catatan Sudah Terhapus");
			window.location.assign("mhs_user.php?url=mhs_catatan_perjalanan");
		</script>
<?php
	
}
else { ?>
		<script> 
			alert("Data Catatan Tidak Terhapus!");
			window.location.assign("mhs_user.php?url=mhs_catatan_perjalanan");
		</script>
<?php
	
}
	
