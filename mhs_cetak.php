<!DOCTYPE html>
<html>
<head>
	<title>Cetak Catatan Perjalanan User</title>
</head>
<style>
     table {
        height: 90px;
        width: 300px;
        float: right;
        border: 2px solid gray;
        margin-top: -205px;
        margin-right: -150px;
        padding: 30px;
    }
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
            min-width: 300px;
            margin-right: 20px;
        }
        table thead tr {
            background-color: white;
            color: black;
            text-align: left;
        }
        table th,
            table td {
            padding: 5px 40px ;
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
        form button {
            background-color: gray;
            border: 1px solid gray;
            padding: 2px;
            width: 90px;
            border-radius: 3px;
        }
        p{
            border: 1px solid black;
        }
</style>
<body>
<?php
        session_start();
    ?>

<div class="content">
    <br><br>
        <center>
        <h3>SMKN 2 CIMAHI</h3>
        <h3>Catatan perjalanan User</h3>
        </center>
        <p></p>
        <center><h2>CATATAN PERJALANAN</h2></center>
        <h3>Nama : <?php echo $_SESSION ['mhs_nama_lengkap']; ?></h3>
        <h3> Tanggal : <?php echo date('D M Y'); ?></h3>
       
        <center><table  border="1" cellpadding="4" cellspacing="0">
        <thead>
        <tr>
            <td><b>NO</b></td>
            <td><b>TANGGAL</b></td>
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
                                                        ON mhs_lokasi.mhs_id_lokasi = mhs_catatan_perjalanan.mhs_id_lokasi
                                                        WHERE mhs_id_catatan_pejalan LIKE '$mhs_id_catatan_perjalanan'");
            
            while($data = mysqli_fetch_array($mhsdata)){
        ?>
        
        <tr>
            <td><?php echo $no++ ?></td>
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