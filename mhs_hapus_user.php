<?php 

$mhs_id_user = $_GET['mhs_id_user'];

include 'mhs_koneksi.php';
$sql = "DELETE FROM `mhs_user` WHERE `mhs_user`.`mhs_id_user` = '$mhs_id_user'";

$query = mysqli_query($conn,$sql);

if ($query) { ?>
		<script> 
			alert("Data Catatan Sudah Terhapus");
			window.location.assign("mhs_admin.php");
		</script>
<?php
	
}
else { ?>
		<script> 
			alert("Data Catatan Tidak Terhapus!");
			window.location.assign("mhs_admin.php");
		</script>
<?php
	
}
	
