<?php
// koneksi
include 'koneksi.php';

session_start();
// Cek session login
if (isset($_SESSION['pendaftaran']['no_pendaftaran']) || !empty($_SESSION['pendaftaran']['no_pendaftaran'])) {
  echo "<script>location='dashboard.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="admin/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="admin/assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- sweetalert -->
    <link rel="stylesheet" href="assets/css/sweetalert.css">

    <!-- favicon -->
    <link rel="icon" type="image/png" href="assets/favicon/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="assets/favicon/favicon-16x16.png" sizes="16x16" />

</head>

<body class="bg-gradient-success">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-md-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login Siswa</h1>
                                        <p>Silahkan login menggunakan NISN dan Password.</p>
                                    </div>
                                    <form class="user" action="" method="post">
                                        <div class="form-group">
                                            <input type="number" name="nisn" class="form-control form-control-user" placeholder="Masukan NISN">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user" placeholder="Masukan Password">
                                        </div>
                                        <input type="submit" name="login" value="Login" class="btn btn-success btn-user btn-block">
                                        <hr>
                                    </form>
                                    <?php
                                    if (isset($_POST['login'])) {

                                      $nisn = $_POST['nisn'];
                                      $password = $_POST['password'];

                                      $login = mysqli_query($koneksi, "SELECT * FROM pendaftaran WHERE nisn = '$nisn'");
                                      $cek = mysqli_num_rows($login);
                                      $row = mysqli_fetch_array($login, MYSQLI_ASSOC);

                                      if ($cek >= 1) {
                                        // alihkan halaman
                                        echo "<script>location='dashboard.php';</script>";

                                        // verifikasi password
                                        if (password_verify($password, $row['password'])) {
                                          $_SESSION['pendaftaran']['no_pendaftaran'] = $row['no_pendaftaran'];
                                          $_SESSION['pendaftaran']['nisn'] = $row['nisn'];
                                          $_SESSION['pendaftaran']['no_kk'] = $row['no_kk'];
                                          $_SESSION['pendaftaran']['no_kip'] = $row['no_kip'];
                                          $_SESSION['pendaftaran']['nama'] = $row['nama'];
                                          $_SESSION['pendaftaran']['jk'] = $row['jk'];
                                          $_SESSION['pendaftaran']['tempatlahir'] = $row['tempatlahir'];
                                          $_SESSION['pendaftaran']['tanggal'] = $row['tanggal'];
                                          $_SESSION['pendaftaran']['bulan'] = $row['bulan'];
                                          $_SESSION['pendaftaran']['tahun'] = $row['tahun'];
                                          $_SESSION['pendaftaran']['agama'] = $row['agama'];
                                          $_SESSION['pendaftaran']['statuskeluarga'] = $row['statuskeluarga'];
                                          $_SESSION['pendaftaran']['alamat'] = $row['alamat'];
                                          $_SESSION['pendaftaran']['nama_ayah'] = $row['nama_ayah'];
                                          $_SESSION['pendaftaran']['nama_ibu'] = $row['nama_ibu'];
                                          $_SESSION['pendaftaran']['nama_wali'] = $row['nama_wali'];
                                          $_SESSION['pendaftaran']['anak_ke'] = $row['anak_ke'];
                                          $_SESSION['pendaftaran']['no_hp'] = $row['no_hp'];
                                          $_SESSION['pendaftaran']['tanggal_daftar'] = $row['tanggal_daftar'];
                                          $_SESSION['pendaftaran']['status_diterima'] = $row['status_diterima'];
                                          $_SESSION['pendaftaran']['foto_siswa'] = $row['foto_siswa'];
                                        } else {
                                          echo "<script>location='dashboard.php';</script>";
                                        }

                                      } else {
                                        echo "
                                            <script type='text/javascript'>
                                            setTimeout(function () { 
                                                    
                                              swal({
                                                        title: 'Login gagal.',
                                                        text: 'Periksa NISN atau Password Anda.',
                                                        type: 'error',
                                                        timer: 10000,
                                                        showConfirmButton: true
                                                    });   
                                            },10);  
                                            window.setTimeout(function(){ 
                                              window.location.replace('login.php');
                                            } ,2000); 
                                              </script>";
                                      }

                                    }

                                    ?>

                                    <?php if (isset($_GET['failed'])) { ?>
                                        <div class="alert alert-danger text-center" role="alert">
                                            Proses login gagal, periksa nisn dan password anda.
                                        </div>
                                    <?php } ?>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="index.php">Halaman Home <i class="fa fa-home"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="admin/assets/vendor/jquery/jquery.min.js"></script>
    <script src="admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="admin/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="admin/assets/js/sb-admin-2.min.js"></script>

    <!-- sweetalert -->
    <script src="assets/js/sweetalert.min.js"></script>

</body>

</html>