<?php 
session_start();
if (empty($_SESSION['mhs_nik'])) { ?>
    <script type="text/javascript">
        alert("Maaf Anda Harus Login!")
        window.location.assign('mhs_index.php');
    </script>

<?php }?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Memories With Friends</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
      <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fa fa-book"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Memories With Friends</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->

            <li class="nav-item">
                <a class="nav-link" href="mhs_editadmin.php">
                    <span><img src="gambar/<?=$_SESSION['mhs_foto']?>" width="30"></span>
                    <span>Admin</span></a>
            </li>
            <hr class="sidebar-divider my-0">


            <li class="nav-item">
                <a class="nav-link" href="?url=mhs_home">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Home</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="?url=mhs_tambah_admin">
                    <i class="fas fa-fw fa-pen"></i>
                    <span>Tambah Admin</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?url=mhs_id_lokasi">
                    <i class="fas fa-fw fa-map"></i>
                    <span>Lokasi</span></a>
            </li>

             <li class="nav-item">
                <a class="nav-link" href="mhs_logout.php">
                    <i class="fas fa-fw fa-power-off"></i>
                    <span>Logout</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <h3>Travel Log | Catatan Pejalanan</h3>
                    
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class=" mb-4 text-gray-800">
                        <?php 
                            $url = @$_GET['url'];
                            if (!empty($url)) {
                               switch ($url) {
                                   case 'mhs_home':
                                       include 'mhs_home.php';
                                       break;
                                   case 'mhs_id_lokasi':
                                       include 'mhs_lokasi.php'; 
                                       break;
                                    case 'detail_perjalanan':
                                       include 'mhs_detail.php'; 
                                       break;
                                   case 'mhs_tambah_admin':
                                       include 'mhs_tambah_admin.php'; 
                                       break;
                                   default:
                                       echo "Halaman Tidak Ditemukan";
                                       break;
                               }
                            }
                            else{ ?>

                                <?php 
                                include 'mhs_koneksi.php';

                                $mhs_data = mysqli_query($conn, "SELECT * FROM mhs_user");

                                 ?>
                                 <table class="table table-bordered">
                                    <tr class="text-center">
                                        <td>
                                            Id User
                                        </td>
                                        <td>
                                            NIK
                                        </td>
                                        <td>
                                            Nama Lengkap
                                        </td>
                                        <td>
                                            Role
                                        </td>
                                        <td>
                                            Foto
                                        </td>
                                        <td>
                                            Lainnya
                                        </td>
                                    </tr>
                                    <?php 
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
                                                    <a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data')" href="mhs_hapus_user.php?mhs_id_user=<?php echo $mhs_isi['mhs_id_user']; ?>" class = "btn btn-danger">
                                                        <i class="fa fa-trash"></i> Hapus
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                 </table>


                             <?php } ?>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Aplikasi Travel Log 2022 | mhs hasna</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>

                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>


</body>

</html>