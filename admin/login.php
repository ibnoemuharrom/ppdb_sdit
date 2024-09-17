<?php
// koneksi
include '../koneksi.php';

session_start();
// Cek session login
if (isset($_SESSION['admin']['id_admin']) || !empty($_SESSION['admin']['id_admin'])) {
  echo "<script>location='index.php';</script>";
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
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

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
                                        <h1 class="h4 text-gray-900 mb-4">Login Admin</h1>
                                    </div>
                                    <form class="user" action="" method="post">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user" placeholder="Email" autofocus="autofocus">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user" placeholder="Password">
                                        </div>
                                        <input type="submit" name="login" value="Login" class="btn btn-success btn-user btn-block">
                                        <hr>
                                    </form>
                                    <?php
                                    if (isset($_POST['login'])) {

                                      $email = $_POST['email'];
                                      $password = $_POST['password'];

                                      $login = mysqli_query($koneksi, "SELECT * FROM admin WHERE email = '$email'");
                                      $cek = mysqli_num_rows($login);
                                      $row = mysqli_fetch_array($login, MYSQLI_ASSOC);

                                      if ($cek >= 1) {
                                        // alihkan halaman
                                        echo "<script>location='index.php';</script>";

                                        // verifikasi password
                                        if (password_verify($password, $row['password'])) {
                                          $_SESSION['admin']['id_admin'] = $row['id_admin'];
                                          $_SESSION['admin']['email'] = $row['email'];
                                          $_SESSION['admin']['nama_depan'] = $row['nama_depan'];
                                          $_SESSION['admin']['nama_belakang'] = $row['nama_belakang'];
                                        } else {
                                          echo "<script>location='index.php';</script>";
                                        }

                                      } else {
                                        echo "
                                            <script>location='login.php?login-failed';</script>";
                                      }

                                    }

                                    ?>
                                    <?php if (isset($_GET['success'])) { ?>
                                        <div class="text-center text-success">
                                            <p>Berhasil Registrasi, Silahkan Login.</p>
                                        </div>
                                    <?php } ?>
                                    <?php if (isset($_GET['login-failed'])) { ?>
                                        <div class="text-center text-danger">
                                            <p>Login gagal, periksan email dan password anda.</p>
                                        </div>
                                    <?php } ?>
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