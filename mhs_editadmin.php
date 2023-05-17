<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body{
            background-color: #6495ED;
        }
        input{
            padding : 5px;
            width : 245px;
            border-radius: 5px;
            margin-top: 5px;
        }
        .tombol{
            margin : 5px 5px;
            background-color: #009879;
            border: none;
            border: 1px solid #000;
        }
        h1{
            margin-top: 60px;
        }
        a{
            text-decoration: none;
            color: black;
        }
        button{
            width: 245px;
            height: 30px;
            border-radius: 5px;
            margin-right: 15px;
            margin-top: 10px;
            background-color: gray;
        }
        .simpan{
            padding : 5px;
            width : 245px;
            border-radius: 5px;
            margin-top: 50px;
            background-color: gray;
            color: black;
        }
        .checkbox{
            margin-left: -120px;
        }
        
    </style>
</head>
<body>
        <center><h1>EDIT BIODATA</h1></center>

        <?php
            if(isset($_GET['alert'])){
                if ($_GET['alert']=="Gagal"){
                    echo "<div style='color:red;'>Gagal</div>";
                } else if ($_GET['alert']=="Berhasil"){
                    echo "<div style='color:red;'>Berhasil</div>";
                }
            }
        ?>

                <?php
                    session_start();
                    include 'mhs_koneksi.php';
                    $mhs_id_user = $_SESSION['mhs_id_user'];
                    $d = mysqli_query($conn,"SELECT * FROM mhs_user WHERE mhs_id_user='$mhs_id_user'");
                    while($data = mysqli_fetch_array($d)){
                ?>

    
        <form method="post" action="mhs_proses_editadmin.php" style="margin-left: 450px; margin-top: 60px;" enctype="multipart/form-data">
			<table>
				<tr>			
					<td>NIK :</td>
					<td>
						<input type="hidden" class="border" name="mhs_id_user" value="<?php echo $data['mhs_id_user']; ?>">
						<input type="number" class="border" name="mhs_nik" value="<?php echo $data['mhs_nik']; ?>" readonly>
					</td>
				</tr>
				<tr>
					<td>NAMA LENGKAP :</td>
					<td>
						<input type="text" class="border" name="mhs_nama_lengkap" value="<?php echo $data['mhs_nama_lengkap']; ?>">
					</td>
				</tr>
				<tr>
					<td><input type="hidden" class="border" name="mhs_role" value="<?php echo $data['mhs_role']; ?>" readonly></td>
				</tr>
				<tr>
					<td>FOTO :</td>
                    <td><img src="gambar/<?php echo $data['mhs_foto']?>" width="100px"><br>
					<input type="checkbox" name="mhs_gantifoto" style="margin-right: -110px;" class="checkbox">
                    <input type="file" name="mhs_foto"></td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="submit" value="SIMPAN" class="simpan" name="edit-menu"><br>
						<center><button style="margin-right: 50px;"><a href="mhs_admin.php">KEMBALI</a></button></center>
					</td>
				</tr>		
			</table>
		</form>
    <?php
                    }?>
</body>
</html>