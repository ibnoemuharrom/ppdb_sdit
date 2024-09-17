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
                    <!-- pencarian data -->
                    <form action="" method="GET">
                        <input type="text" class="form-control mb-3" name="cari" placeholder="Pencarian....">
                        <input type="submit" class="btn btn-primary mb-3" value="Cari Data">
                    </form>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Pendaftaran</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No Pendaftaran</th>
                                            <th>Foto</th>
                                            <th>NISN</th>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Status</th>
                                            <th><i class="fa fa-cog"></i> Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // pencarian
                                        if (isset($_GET['cari'])) {
                                            $cari = $_GET['cari'];
                                            $sql = mysqli_query($koneksi, "SELECT * FROM pendaftaran WHERE no_pendaftaran LIKE '%".$cari."%' OR nisn LIKE '%".$cari."%' OR nama LIKE '%".$cari."%'"); 
                                        } else {
                                            $sql = mysqli_query($koneksi, "SELECT * FROM pendaftaran");
                                        }
                                        while($row = mysqli_fetch_array($sql, MYSQLI_ASSOC)) {
                                        ?>
                                        <tr>
                                            <td><?= $row['no_pendaftaran']; ?></td>
                                            <td><img src="../foto-siswa/<?= $row['foto_siswa']; ?>" alt="foto-siswa" width="100px"></td>
                                            <td><?= $row['nisn']; ?></td>
                                            <td><?= $row['nama']; ?></td>
                                            <td><?= $row['jk']; ?></td>
                                            <?php
                                            if ($row['status_diterima'] == 'Y') {
                                                $text = '<p class="text-success">Sudah dikonfirmasi</p>';
                                            } elseif ($row['status_diterima'] == 'N') {
                                                $text = '<p class="text-danger">Belum dikonfirmasi</p>';
                                            }
                                            ?>
                                            <td><?= $text; ?></td>
                                            <td>
                                                <a href="detail-pendaftaran.php?no_pendaftaran=<?= $row['no_pendaftaran']; ?>" class="btn btn-info btn-sm"><i class="fa fa-search"></i></a>
                                                <a href="edit-pendaftaran.php?no_pendaftaran=<?= $row['no_pendaftaran']; ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                                <a href="hapus-pendaftar.php?no_pendaftaran=<?= $row['no_pendaftaran']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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