<?php 
// session start
session_start();
// koneksi
include '../koneksi.php';

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
                            <h6 class="m-0 font-weight-bold text-primary">Data Admin</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Email</th>
                                            <th>Nama Depan</th>
                                            <th>Nama Belakang</th>
                                            <th><i class="fa fa-cog"></i> Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = mysqli_query($koneksi, "SELECT * FROM admin");
                                        while($row = mysqli_fetch_array($sql, MYSQLI_ASSOC)) {
                                        ?>
                                        <tr>
                                            <td><?= $row['email']; ?></td>
                                            <td><?= $row['nama_depan']; ?></td>
                                            <td><?= $row['nama_belakang']; ?></td>
                                            <td>
                                                <a href="edit-admin.php?id_admin=<?= $row['id_admin']; ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                                <a href="hapus-admin.php?id_admin=<?= $row['id_admin']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
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