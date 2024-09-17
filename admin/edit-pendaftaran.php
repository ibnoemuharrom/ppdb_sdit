<?php 
// session start
session_start();
// koneksi
include '../koneksi.php';

$no_pendaftaran = $_GET['no_pendaftaran'];

if (!isset($_SESSION['admin']['id_admin']) || empty($_SESSION['admin']['id_admin'])) {
    echo "<script>location='login.php';</script>";
}

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
                            <h6 class="m-0 font-weight-bold text-primary">Edit Data Pendaftaran</h6>
                        </div>
                        <div class="card-body">
                            <?php
                            $sql = mysqli_query($koneksi, "SELECT * FROM pendaftaran WHERE no_pendaftaran='$no_pendaftaran'");
                            $row = mysqli_fetch_array($sql, MYSQLI_ASSOC);
                            ?>
                            <form action="" method="post">
                                <div class="mb-3">
                                  <label for="status" class="form-label">Email</label>
                                  <select name="status_diterima" class="form-control" id="status">
                                    <option>-Status Diterima-</option>
                                        <?php
                                        if ($row['status_diterima'] == 'N') {
                                            echo "
                                                <option value='N' selected>Belum dikonfirmasi</option>
                                                <option value='Y'>Sudah dikonfirmasi</option>";
                                        } elseif ($row['status_diterima'] == 'Y') {
                                            echo "
                                                <option value='N'>Belum dikonfirmasi</option>
                                                <option value='Y' selected>Sudah dikonfirmasi</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                  <input type="submit" class="btn btn-md btn-primary" name="edit" value="Edit">
                                  <a href="data-admin.php" class="btn btn-md btn-danger">Batal</a>
                              </form>
                            </div>
                            <?php
                            if (isset($_POST['edit'])) {
                                $edit = mysqli_query($koneksi, "UPDATE pendaftaran SET status_diterima='$_POST[status_diterima]' WHERE no_pendaftaran='$no_pendaftaran'");
                                if ($edit) {
                                    echo "<script>location='data-pendaftaran.php?edit-success';</script>";
                                }
                            }
                            ?>
                        </div>
                    </div>

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