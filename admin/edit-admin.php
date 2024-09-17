<?php 
// session start
session_start();
// koneksi
include '../koneksi.php';

if (!isset($_SESSION['admin']['id_admin']) || empty($_SESSION['admin']['id_admin'])) {
    echo "<script>location='login.php';</script>";
}

// id
$id_admin = $_GET['id_admin'];
?>
<!DOCTYPE html>
<html lang="en">

<?php include 'include/head.php'; ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include 'include/sidebar.php'; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include 'include/navbar.php'; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Edit Data Admin</h6>
                        </div>
                        <div class="card-body">
                            <?php
                            $sql = mysqli_query($koneksi, "SELECT * FROM admin WHERE id_admin='$id_admin'");
                            $row = mysqli_fetch_array($sql, MYSQLI_ASSOC);
                            ?>
                            <form action="" method="post">
                                <input type="hidden" name="id_admin" value="<?= $row['id_admin']; ?>">
                                <div class="mb-3">
                                  <label for="email" class="form-label">Email</label>
                                  <input type="email" name="email" class="form-control" id="email" value="<?= $row['email']; ?>">
                                </div>
                                <div class="mb-3">
                                  <label for="nama_depan" class="form-label">Nama Depan</label>
                                  <input type="text" name="nama_depan" class="form-control" id="nama_depan" value="<?= $row['nama_depan']; ?>">
                                </div>
                                <div class="mb-3">
                                  <label for="nama_belakang" class="form-label">Nama Belakang</label>
                                  <input type="text" name="nama_belakang" class="form-control" id="nama_belakang" value="<?= $row['nama_belakang']; ?>">
                                </div>
                                <div class="mb-3">
                                  <input type="submit" class="btn btn-md btn-primary" name="edit" value="Edit">
                                  <a href="data-admin.php" class="btn btn-md btn-danger">Batal</a>
                                </div>
                            </form>
                            <?php
                            if (isset($_POST['edit'])) {
                                $edit = mysqli_query($koneksi, "UPDATE admin SET id_admin='$_POST[id_admin]', email='$_POST[email]', nama_depan='$_POST[nama_depan]', nama_belakang='$_POST[nama_belakang]' WHERE id_admin='$id_admin'");
                                if ($edit) {
                                    echo "<script>location='data-admin.php?edit-success';</script>";
                                }
                            }
                            ?>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include 'include/footer.php'; ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php include 'include/script.php'; ?>

</body>

</html>