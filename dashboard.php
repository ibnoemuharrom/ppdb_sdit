<?php
// koneksi
include 'koneksi.php';

// session_start
session_start();

if (!isset($_SESSION['pendaftaran']['no_pendaftaran']) || empty($_SESSION['pendaftaran']['no_pendaftaran'])) {
  echo "<script>location='login.php?failed';</script>";
}

?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <!-- font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
  <!-- style -->
  <link rel="stylesheet" href="assets/css/style.css">

  <!-- favicon -->
  <link rel="icon" type="image/png" href="assets/favicon/favicon-32x32.png" sizes="32x32" />
  <link rel="icon" type="image/png" href="assets/favicon/favicon-16x16.png" sizes="16x16" />

  <title>PPDB SDIT IBNU ABBAS</title>
</head>

<body>

  <!-- nav -->
  <nav class="navbar navbar-expand-lg navbar-dark py-3 shadow-sm fixed-top" style="background-color: #00BFA6">
    <div class="container">
      <a class="navbar-brand" id="head" href="dashboard.php">Dashboard Siswa <i class="bi bi-house"></i></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-auto">
          <a class="nav-link active" aria-current="page" href="dashboard.php">Beranda <i class="bi bi-house"></i></a>
          <a class="nav-link active" aria-current="page" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </nav>
  <!-- end nav -->

  <!-- card -->
  <section id="card" style="padding-top: 7rem;">
    <div class="container">
      <div class="row text-center">
        <div class="col-md-4">
          <a href="bukti-ppdb.php?no_pendaftaran=<?php echo $_SESSION['pendaftaran']['no_pendaftaran']; ?>" target="_blank" style="text-decoration: none;">
            <div class="card text-white bg-primary mb-3">
              <div class="card-body">
                <h5 class="card-title display-1"><i class="bi bi-printer"></i></h5>
                <p class="card-text">Cetak Bukti Pendaftaran.</p>
              </div>
            </div>
          </a>
        </div>
        <div class="col-md-4">
          <a href="data-siswa.php" target="_blank" style="text-decoration: none;">
            <div class="card text-white bg-info mb-3">
              <div class="card-body">
                <h5 class="card-title display-1"><i class="bi bi-person-square"></i></h5>
                <p class="card-text">Data Siswa Baru.</p>
              </div>
            </div>
          </a>
        </div>
        <div class="col-md-4">
          <a href="edit-data.php?no_pendaftaran=<?php echo $_SESSION['pendaftaran']['no_pendaftaran']; ?>" style="text-decoration: none;">
            <div class="card text-white bg-success mb-3">
              <div class="card-body">
                <h5 class="card-title display-1"><i class="bi bi-pen"></i></h5>
                <p class="card-text">Edit Data Biodata.</p>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </section>
  <!-- end card -->

  <!-- pengumuman -->
  <section id="pengumuman">
    <div class="container mt-3">
      <div class="row text-center">
        <div class="col-md-12">
          <div class="alert alert-info" role="alert">
            <h3>Hallo, Assalamualaikum ...</h3>
            <p>Selamat Datang <?= $_SESSION['pendaftaran']['nama']; ?> <i class="bi bi-person"></i></p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end pengumuman -->

  <scetion id="content">
    <div class="container">
      <div class="row my-5">
        <div class="col-md-6">
          <div class="card text-center mb-3">
            <div class="card-header">
              <h5>Proses Penilaian</h5>
            </div>
            <div class="card-body">
              <p class="card-text display-1"><img src="assets/img/dashboard/wellcome.png" class="img-fluid" width="300"></p>
              <p class="card-text lead">Terimakasih telah melakukan pendaftaran di SDIT IBNU ABBAS, pada tanggal :</p>
              <p class="btn btn-sm btn-danger"><?= $_SESSION['pendaftaran']['tanggal_daftar']; ?></p>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card text-center">
            <div class="card-header">
              <h5>Pengumuman Hasil Seleksi</h5>
            </div>
            <div class="card-body">
              <p class="card-text display-1"><img src="assets/img/dashboard/success.png" class="img-fluid" width="300"></p>
              <p class="card-text lead">Selamat anda diterima sebagai siswa di SDIT IBN ABBAS, silahkan registrasi ulang pada :</p>
              <?php
              $tanggal = mysqli_query($koneksi, "SELECT * FROM ppdb");
              $row = mysqli_fetch_array($tanggal);
              ?>
              <p class="btn btn-sm btn-danger"><?= $row['tanggal_registrasi']; ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </scetion>

  <!-- biodata -->
  <section id="biodata">
    <div class="container">
      <div class="row my-5">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              Biodata Siswa <i class="bi bi-person"></i>
            </div>
            <div class="card-body">
              <table class="table table-striped">
                <tbody>
                  <tr>
                    <td scope="col">No. Pendaftaran</td>
                    <td>:</td>
                    <td><?= $_SESSION['pendaftaran']['no_pendaftaran']; ?></td>
                  </tr>
                  <tr>
                    <td scope="col">No. Induk Siswa Nasional</td>
                    <td>:</td>
                    <td><?= $_SESSION['pendaftaran']['nisn']; ?></td>
                  </tr>
                  <tr>
                    <td scope="col">No. Kartu Keluarga</td>
                    <td>:</td>
                    <td><?= $_SESSION['pendaftaran']['no_kk']; ?></td>
                  </tr>
                  <tr>
                    <td scope="col">No. KIP</td>
                    <td>:</td>
                    <td><?= $_SESSION['pendaftaran']['no_kip']; ?></td>
                  </tr>
                  <tr>
                    <td scope="col">Nama</td>
                    <td>:</td>
                    <td><?= $_SESSION['pendaftaran']['nama']; ?></td>
                  </tr>
                  <tr>
                    <td scope="col">Jenis Kelamin</td>
                    <td>:</td>
                    <td><?= $_SESSION['pendaftaran']['jk']; ?></td>
                  </tr>
                  <tr>
                    <td scope="col">Tempat Lahir</td>
                    <td>:</td>
                    <td><?= $_SESSION['pendaftaran']['tempatlahir']; ?></td>
                  </tr>
                  <tr>
                    <td scope="col">Tanggal Lahir</td>
                    <td>:</td>
                    <td><?= $_SESSION['pendaftaran']['tanggal']; ?> - <?= $_SESSION['pendaftaran']['bulan']; ?> - <?= $_SESSION['pendaftaran']['tahun']; ?></td>
                  </tr>
                  <tr>
                    <td scope="col">Agama</td>
                    <td>:</td>
                    <td><?= $_SESSION['pendaftaran']['agama']; ?></td>
                  </tr>
                  <tr>
                    <td scope="col">Status Dalam Keluarga</td>
                    <td>:</td>
                    <td><?= $_SESSION['pendaftaran']['statuskeluarga']; ?></td>
                  </tr>
                  <tr>
                    <td scope="col">Alamat</td>
                    <td>:</td>
                    <td><?= $_SESSION['pendaftaran']['alamat']; ?></td>
                  </tr>
                  <tr>
                    <td scope="col">Nama Ayah</td>
                    <td>:</td>
                    <td><?= $_SESSION['pendaftaran']['nama_ayah']; ?></td>
                  </tr>
                  <tr>
                    <td scope="col">Nama Ibu</td>
                    <td>:</td>
                    <td><?= $_SESSION['pendaftaran']['nama_ibu']; ?></td>
                  </tr>
                  <tr>
                    <td scope="col">Nama Wali</td>
                    <td>:</td>
                    <td><?= $_SESSION['pendaftaran']['nama_wali']; ?></td>
                  </tr>
                  <tr>
                    <td scope="col">Anak Ke -</td>
                    <td>:</td>
                    <td><?= $_SESSION['pendaftaran']['anak_ke']; ?> Dalam Keluarga</td>
                  </tr>
                  <tr>
                    <td scope="col">No. Handphone</td>
                    <td>:</td>
                    <td><?= $_SESSION['pendaftaran']['no_hp']; ?></td>
                  </tr>
                  <tr>
                    <td scope="col">Foto Siswa</td>
                    <td>:</td>
                    <td><img src="foto-siswa/<?= $_SESSION['pendaftaran']['foto_siswa']; ?>" alt="foto-siswa" width="100"></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-md-4">
        </div>
      </div>
    </div>
  </section>
  <!-- end biodata -->

  <!-- footer -->
  <footer id="footer">
    <div class="container py-3">
      <div class="row text-center text-white">
        <p class="lead">Copyright &copy; 2023 PPDB SDIT IBNU ABBAS</p>
      </div>
    </div>
  </footer>
  <!-- end footer -->

  <!-- Popper -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>