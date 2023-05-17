<?php 
include 'mhs_koneksi.php';

$mhs_lokasi = mysqli_query($conn, "SELECT * FROM mhs_lokasi");

 ?>

 <table class="table table-bordered">
 <div class="card">
	<div class="card-header">
		<a href="mhs_tambah_lokasi.php" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-pen"></i>
            </span>
            <span class="text">Tambah Lokasi</span>
        </a>
	</div>
	<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
 	<tr class="text-center">
 		<td>
 			Nama Lokasi
 		</td>
 		<td>
 			Alamat Lokasi
 		</td>
		 <td>
 			Lainnya
 		</td>
 	</tr>
 	<?php 
 		while ($mhs_isi = mysqli_fetch_assoc($mhs_lokasi)) {?>
 			<tr>
 				<td>
 					<?php echo $mhs_isi['mhs_nama_lokasi']; ?>
 				</td>

 				<td>
 					<?php echo $mhs_isi['mhs_alamat']; ?>
 				</td>
				 <td>
				 <a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data')" href="mhs_hapus_lokasi.php?mhs_hapus_lokasi=<?= $mhs_isi['mhs_id_lokasi']?>" class = "btn btn-danger">
                    		<i class="fa fa-trash"></i>  Hapus
                    	</a>
 				</td>
 			</tr>
 		<?php }
 	 ?>

 </table>