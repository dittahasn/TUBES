<!DOCTYPE html>
<html>
<head>
	<title>Cetak Data Perjalanan Admin</title>
</head>
<style>
     h2{
        margin-top: 50px;
        margin-left: 10px;
    }
    table{
            text-align: left;
            border-collapse: collapse;
            margin: 30px 0;
            font-size: 0.9em;
            font-family: sans-serif;
            margin-right: 5px;
        }
        table thead tr {
            background-color: white;
            color: black;
            text-align: left;
        }
        table th,
            table td {
            padding: 10px 20px ;
            background-color: white;
        }
        table tbody tr{
            border-bottom : 1px solid black;
        }

            table tbody tr:last-of-type {
            border-bottom: 2px solid black;
        }table thead td{
            background-color: #D3D3D3;
        }
        li{
            padding: 10px;
        }
        p{
            border: 1px solid black;
        }
        h4{
            margin-left: 500px;
            margin-top: 400px;
        }
        h5{
            margin-left: 500px;
        }
</style>
<body>
<?php
        session_start();
    ?>

<div class="content">
    <br><br>
        <center>
        <h2>Travel Log</h2>
        <h3>Catatan perjalanan Aplikasi Travel Log</h3>
        </center>
        <p></p>
        <center><h2>CATATAN PERJALANAN</h2></center>

        <h3>Nama Pencetak : <?php echo $_SESSION['mhs_nama_lengkap']?></h3>
        <h3>Tanggal : <?php echo date('d M Y') ?> </h3>
       
        <center><table  border="1" cellpadding="4" cellspacing="0">
        <thead>
        <tr>
            <td><b>No</b></td>
            <td><b>Nama Lengkap</b></td>
            <td><b>Tanggal</b></td>
            <td><b>WAKTU</b></td>
            <td><b>SUHU TUBUH</b></td>
            <td><b>LOKASI</b></td>
        </tr>
        </thead>

        <?php 
            include 'mhs_koneksi.php';
            $mhs_id_catatan_perjalanan= $_GET['mhs_id_catatan_perjalanan'];
            $mhs_id_user = $_SESSION['mhs_id_user'];
            $no = 1;
            $mhsdata = mysqli_query($conn, "SELECT * FROM mhs_catatan_perjalanan 
                                                    INNER JOIN mhs_lokasi
                                                    ON  mhs_lokasi.mhs_id_lokasi= mhs_catatan_perjalanan.mhs_id_lokasi
                                                    INNER JOIN mhs_user
                                                    ON mhs_user.mhs_id_user= mhs_catatan_perjalanan.mhs_id_user");
            while($data = mysqli_fetch_array($mhsdata)){
        ?>
        
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $data['mhs_nama_lengkap']?></td>
            <td><?php echo $data['mhs_tanggal'] ?></td>
            <td><?php echo $data['mhs_waktu'] ?></td>
            <td><?php echo $data['mhs_catatan'] ?></td>
            <td><?php echo $data['mhs_nama_lokasi'] ?></td>
        </tr>
        <?php } ?>
    </table></center>
	</div>
 
	<script>
		window.print();
	</script>

   
	
</body>
</html>