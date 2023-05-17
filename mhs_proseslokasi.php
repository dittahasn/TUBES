<?php 
session_start();
$mhs_nama_lokasi = $_POST['mhs_nama_lokasi'];
$mhs_alamat_lokasi = $_POST['mhs_alamat'];

include 'mhs_koneksi.php';
$sql1 = "INSERT INTO mhs_lokasi VALUES(null, '$mhs_nama_lokasi', '$mhs_alamat_lokasi')";
$query1 = mysqli_query($conn,$sql1);

if ($query1) { ?>
		<script> 
			alert("Data Catatan Anda Tersimpan");
			window.location.assign("mhs_admin.php");
		</script>
<?php
	
}
else  ?>
		<script> 
			alert("Data Catatan Tidak Tersimpan!");
			window.location.assign("mhs_admin.php?url=mhs_tulis_catatan");
		</script>
<?php