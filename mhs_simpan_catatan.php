<?php 
session_start();

$mhs_id_user = $_SESSION['mhs_id_user'];
$mhs_tanggal = $_POST['mhs_tanggal'];
$mhs_waktu = $_POST['mhs_waktu'];
$mhs_nama_lokasi = $_POST['mhs_nama_lokasi'];
$mhs_alamat_lokasi = $_POST['mhs_alamat_lokasi'];
$mhs_catatan = $_POST['mhs_catatan'];
include 'mhs_koneksi.php';
$sql1 = "INSERT INTO mhs_lokasi VALUES(null, '$mhs_nama_lokasi', '$mhs_alamat_lokasi')";
$query1 = mysqli_query($conn,$sql1);

$mhs_lokasi = mysqli_fetch_assoc(mysqli_query($conn, "SELECT mhs_id_lokasi FROM mhs_lokasi WHERE mhs_alamat = '$mhs_alamat_lokasi'"));
$mhs_id_lokasi = $mhs_lokasi['mhs_id_lokasi'];
$sql2 = "INSERT INTO mhs_catatan_perjalanan( mhs_id_user, mhs_tanggal, mhs_waktu, mhs_id_lokasi, mhs_catatan) VALUES ('$mhs_id_user', '$mhs_tanggal', '$mhs_waktu', '$mhs_id_lokasi', '$mhs_catatan')";
$query2 = mysqli_query($conn,$sql2);

if ($query2) { ?>
		<script> 
			alert("Data Catatan Sudah Tersimpan");
			window.location.assign("mhs_user.php");
		</script>
<?php
	
}
else { ?>
		<script> 
			alert("Data Catatan Tidak Tersimpan!");
			window.location.assign("mhs_user.php?url=mhs_tulis_catatan");
		</script>
<?php
	
}
	
