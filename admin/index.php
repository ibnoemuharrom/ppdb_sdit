<?php
// koneksi
include '../koneksi.php';

// session_start
session_start();

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

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Jumlah Pendaftar</div>
                                            <?php
                                            $total = mysqli_query($koneksi, "SELECT * FROM pendaftaran");
                                            $jtotal = mysqli_num_rows($total);
                                            ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jtotal; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Laki - Laki</div>
                                            <?php
                                            $totall = mysqli_query($koneksi, "SELECT * FROM pendaftaran WHERE jk='L'");
                                            $jtotall = mysqli_num_rows($totall);
                                            ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jtotall; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-male fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Perempuan
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                <?php
                                                $totalp = mysqli_query($koneksi, "SELECT * FROM pendaftaran WHERE jk='P'");
                                                $jtotalp = mysqli_num_rows($totalp);
                                                ?>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jtotalp; ?></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-female fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Kontak Masuk</div>
                                            <?php
                                            $totalcontact = mysqli_query($koneksi, "SELECT * FROM contact");
                                            $jtotalcontact = mysqli_num_rows($totalcontact);
                                            ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jtotalcontact; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Status PPDB</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <form action="" method="post">
                                        <input type="hidden" name="id" value="1">
                                        <div class="mb-3">
                                            <label>Status PPDB</label>
                                            <select class="form-control" name="status_ppdb" required="required">
                                                <option>-Pilih Status PPDB-</option>
                                                <option value="Enabled">Aktif</option>
                                                <option value="Disabled">Tidak Aktif</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label>Tanggal Registrasi</label>
                                            <input type="text" class="form-control" name="tanggal_registrasi" placeholder="hari-bulan-tahun" required="required">
                                            <p class="text-danger">*data tidak boleh kosong</p>
                                        </div>
                                        <?php
                                        $cek = mysqli_query($koneksi, "SELECT * FROM ppdb");
                                        $cek_data = mysqli_num_rows($cek);
                                        if ($cek_data == 1) { ?>
                                            <input type="submit" class="btn btn-md btn-primary" value="Simpan" disabled="disabled">
                                            <input type="submit" class="btn btn-md btn-success" value="Edit" name="edit">
                                        <?php } else { ?>
                                            <input type="submit" class="btn btn-md btn-primary" value="Simpan" name="simpan">
                                            <input type="submit" class="btn btn-md btn-success" value="Edit" name="edit" disabled="disabled">
                                        <?php } ?>
                                    </form>
                                    <?php
                                    // simpan
                                    if (isset($_POST['simpan'])) {
                                        $status = mysqli_query($koneksi, "INSERT INTO ppdb(id,status_ppdb,tanggal_registrasi)VALUES('$_POST[id]','$_POST[status_ppdb]','$_POST[tanggal_registrasi]')");
                                        if ($status) {
                                            echo "<script>location='index.php?success';</script>";
                                        }
                                    }

                                    // edit
                                    if (isset($_POST['edit'])) {
                                        $edit = mysqli_query($koneksi, "UPDATE ppdb SET status_ppdb = '$_POST[status_ppdb]', tanggal_registrasi = '$_POST[tanggal_registrasi]'");
                                        if ($edit) {
                                            echo "<script>location='index.php?edit-success';</script>";
                                        }
                                    }
                                    ?>
                                </div>
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