<div class="card">
	<div class="card-header">
		<a href="mhs_admin.php?url=mhs_home" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-arrow-left"></i>
            </span>
            <span class="text">Kembali</span>
        </a>
        <a onclick class = "btn btn-primary" href = "mhs_cetakadmin.php?mhs_id_catatan_perjalanan=<?= $value['mhs_id_catatan_perjalanan']?>" target = "_BLANK">
            <i class="fa fa-print"></i>  
            <span>Cetak</span>
        </a>
	</div>
	<div class="card-body">
		<div class="table-responsive">
           	<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                    <th>Id User</th>
                    <th>Nik</th>
                    <th>Nama Lengkap</th>
                    <th>Role</th>
                    <th>Foto</th>
                    <th>Detail Perjalanan</th>
                    <th>Lainnya</th>
                    </tr>
                    </thead>
                <tbody>
                <?php 
                include 'mhs_koneksi.php';
                                    if (isset($_GET['search'])) {
                                        $search = $_GET['search'];
                                        $mhs_data = mysqli_query($conn,"SELECT * FROM mhs_user WHERE mhs_nama_lengkap LIKE '%'.$search.'%' ");
                                        mysqli_error($conn);
                                    }else{
                                        $mhs_data = mysqli_query($conn,"SELECT * FROM mhs_user");
                                    }
                                        while ($mhs_isi = mysqli_fetch_assoc($mhs_data)) {?>
                                            <tr>
                                                <td>
                                                    <?php echo $mhs_isi['mhs_id_user']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $mhs_isi['mhs_nik']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $mhs_isi['mhs_nama_lengkap']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $mhs_isi['mhs_role']; ?>
                                                </td>
                                                <td>
                                                   <img src="gambar/<?=$mhs_isi['mhs_foto'];?>" width="50">
                                                </td>
                                                <td>
                                                   <a href="?url=detail_perjalanan&id=<?php echo $mhs_isi['mhs_id_user']; ?>">Lihat Detail Perjalanan</a>
                                                </td>
                                                 <td>
                                                 <a href="mhs_simpan_edit_catatan.php?mhs_id_user=<?= $value['mhs_id_catatan_pejalan']; ?>" class= "btn btn-info">
                                                    <i class="fa fa-pencil"></i>Edit
                                                </a>
                        <a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data')" href="mhs_hapus_user.php?mhs_id_user=<?php echo $mhs_isi['mhs_id_user']; ?>" class = "btn btn-danger">
                            <i class="fa fa-trash"></i> Hapus
                        </a>
                    </td>
                                            </tr>
                                        <?php } ?>

                </tbody>
            </table>
        </div>
	</div>
</div>