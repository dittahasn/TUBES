<div class="card">
	<div class="card-header">
		<a href="mhs_user.php" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-arrow-left"></i>
            </span>
            <span class="text">Kembali</span>
        </a>
	</div>
	<div class="card-body">
		<div class="table-responsive">
           	<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>Lokasi</th>
                    <th>Suhu Tubuh</th>
                    <th>Lainnya</th>
                    </tr>
                    </thead>
                   
    
                <tbody>
                	<?php 
                	include 'mhs_koneksi.php';
                		$no = 1;
                		$id_user = $_SESSION['mhs_id_user'];
                		$sql = "SELECT a.*, b.* FROM mhs_catatan_perjalanan as a join mhs_lokasi as b ON a.mhs_id_lokasi = b.mhs_id_lokasi WHERE a.mhs_id_user= '$id_user'";
                		$query = mysqli_query($conn,$sql);
                		foreach ($query as $value) {
                	 ?>
                    <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $value['mhs_tanggal']?></td>
                    <td><?= $value['mhs_waktu']?></td>
                    <td><?= $value['mhs_nama_lokasi']?></td>
                    <td><?= $value['mhs_catatan']?></td>
                    <td>
                    <a onclick class = "btn btn-primary" href = "mhs_cetak.php?mhs_id_catatan_perjalanan=<?= $value['mhs_id_catatan_pejalan']?>" target ="_BLANK">
                    		<i class="fa fa-print">Cetak</i>  
                    	</a>
                        <a href="mhs_hapus_catatan.php?mhs_id_catatan_perjalanan=<?= $value['mhs_id_catatan_pejalan'];?>" class = "btn btn-danger">
                        <i class="fa fa-trash"> Hapus</i> 
                    </a>
                    </td>
                    </tr>
                	<?php } ?>

                </tbody>
            </table>
        </div>
	</div>
</div>