<?php include '../koneksi.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register</title>

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

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
                                        <h1 class="h4 text-gray-900 mb-4">Registrasi Admin Baru</h1>
                                    </div>
                                    <form class="user" action="" method="post">
                                        <input type="hidden" name="id_admin">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user" placeholder="Alamat Email">
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="password" name="password" class="form-control form-control-user" placeholder="Password">
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="password" name="password2" class="form-control form-control-user" placeholder="Ulangi Password">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" name="nama_depan" class="form-control form-control-user" placeholder="Nama Depan">
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" name="nama_belakang" class="form-control form-control-user" placeholder="Nama Belakang">
                                            </div>
                                        </div>
                                        <input type="submit" name="register" value="Registrasi" class="btn btn-success btn-user btn-block">
                                        <hr>
                                    </form>
                                    <?php

                                        if (isset($_POST['register'])) {

                                          $password = $_POST['password'];
                                          $password2 = $_POST['password2'];

                                          // cek password
                                          if ($password !== $password2) {
                                          echo "<script>location='register.php?password-failed';</script>";
                                          return false;
                                          }

                                          // enkripsi
                                          $password = password_hash($password, PASSWORD_DEFAULT);

                                          $save = mysqli_query($koneksi, "INSERT INTO admin(id_admin,email,password,nama_depan,nama_belakang)VALUES
                                          ('$_POST[id_admin]','$_POST[email]','$password','$_POST[nama_depan]','$_POST[nama_belakang]')");

                                          if ($save) {
                                                echo "<script>location='login.php?success';</script>";
                                            } else {
                                                echo "<script>location='register.php?failed';</script>";
                                          }
                                        }

                                        ?>
                                    <hr>
                                    <?php if (isset($_GET['password-failed'])) { ?>
                                        <div class="text-center text-danger">
                                            <p>Password yang anda masukan tidak sesuai.</p>
                                        </div>
                                    <?php } ?>
                                    <?php if (isset($_GET['failed'])) { ?>
                                        <div class="text-center text-danger">
                                            <p>Registrasi admin gagal.</p>
                                        </div>
                                    <?php } ?>
                                    <div class="text-center">
                                        <a class="small" href="login.php">Sudah mempunyai akun? Login.</a>
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
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

</body>

</html>