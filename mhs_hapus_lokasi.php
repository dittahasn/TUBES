<?php 

$mhs_id_lokasi = $_GET['mhs_hapus_lokasi'];

include 'mhs_koneksi.php';
$sql = "DELETE FROM `mhs_lokasi` WHERE `mhs_lokasi`.`mhs_id_lokasi` = '$mhs_id_lokasi'";

$query = mysqli_query($conn,$sql);

if ($query) { ?>
		<script> 
			alert("Data Catatan Sudah Terhapus");
			window.location.assign("mhs_admin.php?url=mhs_lokasi");
		</script>
<?php
	
}
else { ?>
		<script> 
			alert("Data Catatan Tidak Terhapus!");
			window.location.assign("mhs_admin.php?url=mhs_lokasi");
		</script>
<?php
	
}
	
