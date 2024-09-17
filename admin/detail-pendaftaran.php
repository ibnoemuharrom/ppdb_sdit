<?php 
// session start
session_start();
// koneksi
include '../koneksi.php';

if (!isset($_SESSION['admin']['id_admin']) || empty($_SESSION['admin']['id_admin'])) {
    echo "<script>location='login.php';</script>";
}

$no_pendaftaran = $_GET['no_pendaftaran'];

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
                            <h6 class="m-0 font-weight-bold text-primary">Data Pendaftaran</h6>
                        </div>
                        <div class="card-body">
                            <?php
                            $sql = mysqli_query($koneksi, "SELECT * FROM pendaftaran WHERE no_pendaftaran='$no_pendaftaran'");
                            $row = mysqli_fetch_array($sql, MYSQLI_ASSOC);
                            ?>
                            <table class="table table-striped">
                              <tbody>
                                <tr>
                                  <td scope="col">No. Pendaftaran</td>
                                  <td>:</td>
                                  <td><?= $row['no_pendaftaran']; ?></td>
                                </tr>
                                <tr>
                                  <td scope="col">No. Induk Siswa Nasional</td>
                                  <td>:</td>
                                  <td><?= $row['nisn']; ?></td>
                                </tr>
                                <tr>
                                  <td scope="col">No. Kartu Keluarga</td>
                                  <td>:</td>
                                  <td><?= $row['no_kk']; ?></td>
                                </tr>
                                <tr>
                                  <td scope="col">No. KIP</td>
                                  <td>:</td>
                                  <td><?= $row['no_kip']; ?></td>
                                </tr>
                                <tr>
                                  <td scope="col">Nama</td>
                                  <td>:</td>
                                  <td><?= $row['nama']; ?></td>
                                </tr>
                                <tr>
                                  <td scope="col">Jenis Kelamin</td>
                                  <td>:</td>
                                  <td><?= $row['jk']; ?></td>
                                </tr>
                                <tr>
                                  <td scope="col">Tempat Lahir</td>
                                  <td>:</td>
                                  <td><?= $row['tempatlahir']; ?></td>
                                </tr>
                                <tr>
                                  <td scope="col">Tanggal Lahir</td>
                                  <td>:</td>
                                  <td><?= $row['tanggal']; ?> - <?= $row['bulan']; ?> - <?= $row['tahun']; ?></td>
                                </tr>
                                <tr>
                                  <td scope="col">Agama</td>
                                  <td>:</td>
                                  <td><?= $row['agama']; ?></td>
                                </tr>
                                <tr>
                                  <td scope="col">Status Dalam Keluarga</td>
                                  <td>:</td>
                                  <td><?= $row['statuskeluarga']; ?></td>
                                </tr>
                                <tr>
                                  <td scope="col">Alamat</td>
                                  <td>:</td>
                                  <td><?= $row['alamat']; ?></td>
                                </tr>
                                <tr>
                                  <td scope="col">Nama Ayah</td>
                                  <td>:</td>
                                  <td><?= $row['nama_ayah']; ?></td>
                                </tr>
                                <tr>
                                  <td scope="col">Nama Ibu</td>
                                  <td>:</td>
                                  <td><?= $row['nama_ibu']; ?></td>
                                </tr>
                                <tr>
                                  <td scope="col">Nama Wali</td>
                                  <td>:</td>
                                  <td><?= $row['nama_wali']; ?></td>
                                </tr>
                                <tr>
                                  <td scope="col">Anak Ke -</td>
                                  <td>:</td>
                                  <td><?= $row['anak_ke']; ?> Dalam Keluarga</td>
                                </tr>
                                <tr>
                                  <td scope="col">No. Handphone</td>
                                  <td>:</td>
                                  <td><?= $row['no_hp']; ?></td>
                                </tr>
                                <tr>
                                  <td scope="col">Foto</td>
                                  <td>:</td>
                                  <td><img src="../foto-siswa/<?= $row['foto_siswa']; ?>" alt="foto-siswa" width="100px"></td>
                                </tr>
                              </tbody>
                            </table>
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