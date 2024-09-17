<?php
// koneksi
include 'koneksi.php';

// session_start
session_start();

if (!isset($_SESSION['pendaftaran']['no_pendaftaran']) || empty($_SESSION['pendaftaran']['no_pendaftaran'])) {
  echo "<script>location='login.php?failed';</script>";
}

// no_pendaftaran
$no_pendaftaran = $_SESSION['pendaftaran']['no_pendaftaran'];

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
  <!-- sweetalert -->
  <link rel="stylesheet" href="assets/css/sweetalert.css">
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
              <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                  <label class="form-label">Nomor Pendaftaran</label>
                  <input type="text" name="no_pendaftaran" class="form-control" readonly="readonly" value="<?php echo $_SESSION['pendaftaran']['no_pendaftaran']; ?>">
                </div>
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label class="form-label">Nomor Induk Siswa Nasional</label>
                    <input type="number" name="nisn" class="form-control" readonly="readonly" placeholder="Nomor Induk Siswa Nasional" required="required" value="<?php echo $_SESSION['pendaftaran']['nisn']; ?>">
                  </div>
                  <div class="col-md-6 mb-3">
                    <label class="form-label">Nomor Kartu Keluarga</label>
                    <input type="number" name="no_kk" class="form-control" placeholder="Nomor Kartu Keluarga" required="required" value="<?php echo $_SESSION['pendaftaran']['no_kk']; ?>">
                  </div>
                </div>
                <div class="mb-3">
                  <label class="form-label">Nomor Kartu Indonesia Pintar</label>
                  <input type="number" name="no_kip" placeholder="Nomor Kartu Indonesia Pintar" class="form-control" value="<?php echo $_SESSION['pendaftaran']['no_kip']; ?>">
                </div>
                <div class="mb-3">
                  <label class="form-label">Nama Lengkap</label>
                  <input type="text" name="nama" placeholder="Nama Lengkap" class="form-control" required="required" value="<?php echo $_SESSION['pendaftaran']['nama']; ?>">
                </div>
                <div class="mb-3">
                  <label class="form-label">Jenis Kelamin</label>
                  <select name="jk" class="form-control" required="required">
                    <option>- Pilih Jenis Kelamin -</option>
                    <?php
                    if ($_SESSION['pendaftaran']['jk'] == 'L') {
                      echo '
                      <option value="L" selected>Laki-Laki</option>
                      <option value="P">Perempuan</option>';
                    } elseif ($_SESSION['pendaftaran']['jk'] == 'P') {
                      echo '
                      <option value="L">Laki-Laki</option>
                      <option value="P" selected>Perempuan</option>';
                    }
                    ?>
                  </select>
                </div>
                <div class="mb-3">
                  <label class="form-label">Tempat Lahir</label>
                  <input type="text" name="tempatlahir" placeholder="Tempat Lahir" class="form-control" required="required" value="<?php echo $_SESSION['pendaftaran']['tempatlahir']; ?>">
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="mb-3">
                      <label class="form-label">Tanggal</label>
                      <input type="text" name="tanggal" placeholder="Tempat Lahir" class="form-control" required="required" value="<?php echo $_SESSION['pendaftaran']['tanggal']; ?>">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="mb-3">
                      <label class="form-label">Bulan</label>
                      <input type="text" name="bulan" placeholder="Tempat Lahir" class="form-control" required="required" value="<?php echo $_SESSION['pendaftaran']['bulan']; ?>">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="mb-3">
                      <label class="form-label">Tahun</label>
                      <input type="text" name="tahun" placeholder="Tempat Lahir" class="form-control" required="required" value="<?php echo $_SESSION['pendaftaran']['tahun']; ?>">
                    </div>
                  </div>
                </div>
                <div class="mb-3">
                  <label class="form-label">Alamat</label>
                  <textarea name="alamat" placeholder="Alamat" class="form-control" required="required"><?php echo $_SESSION['pendaftaran']['alamat']; ?></textarea>
                </div>
                <div class="row">
                  <div class="col-md-4 mb-3">
                    <label class="form-label">Nama Ayah</label>
                    <input type="text" name="nama_ayah" placeholder="Nama Ayah" class="form-control" required="required" value="<?php echo $_SESSION['pendaftaran']['nama_ayah']; ?>">
                  </div>
                  <div class="col-md-4 mb-3">
                    <label class="form-label">Nama Ibu</label>
                    <input type="text" name="nama_ibu" placeholder="Nama Ibu" class="form-control" required="required" value="<?php echo $_SESSION['pendaftaran']['nama_ibu']; ?>">
                  </div>
                  <div class="col-md-4 mb-3">
                    <label class="form-label">Nama Wali</label>
                    <input type="text" name="nama_wali" placeholder="Nama Wali" class="form-control" value="<?php echo $_SESSION['pendaftaran']['nama_wali']; ?>">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label class="form-label">Anak Ke- Berapa Di Kartu Keluarga</label>
                    <input type="text" name="anak_ke" placeholder="Anak Ke- Di Kartu Keluarga" class="form-control" value="<?php echo $_SESSION['pendaftaran']['anak_ke']; ?>">
                  </div>
                  <div class="col-md-6 mb-3">
                    <label class="form-label">No. Handphone Ortu/Wali</label>
                    <input type="text" name="no_hp" placeholder="No. Handphone/Whatsapp" class="form-control" value="<?php echo $_SESSION['pendaftaran']['no_hp']; ?>">
                  </div>
                   <div class="mb-3">
                    <img src="foto-siswa/<?= $_SESSION['pendaftaran']['foto_siswa']; ?>" alt="images" width="200" class="img-thumbnail">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Foto Siswa</label>
                    <input type="file" class="form-control" name="foto_siswa">
                  </div>
                </div>
                <button type="submit" class="btn btn-success" name="edit">Edit Data <i class="bi bi-pen"></i></button>
              </form>
              <?php

              if (isset($_POST['edit'])) {

                $nama_file = $_FILES['foto_siswa']['name'];
                $nama_foto = date('YmdHis') . $nama_file;
                $source = $_FILES['foto_siswa']['tmp_name'];
                $folder = './foto-siswa/';

                if (!empty($source)) {
                  // directory
                  move_uploaded_file($source, $folder.$nama_foto);
                  $save = mysqli_query($koneksi, "UPDATE pendaftaran SET no_pendaftaran = '$_POST[no_pendaftaran]', nisn = '$_POST[nisn]', no_kk = '$_POST[no_kk]', no_kip = '$_POST[no_kip]', nama = '$_POST[nama]', jk = '$_POST[jk]', tempatlahir = '$_POST[tempatlahir]', tanggal = '$_POST[tanggal]', bulan = '$_POST[bulan]', tahun = '$_POST[tahun]', alamat = '$_POST[alamat]', nama_ayah = '$_POST[nama_ayah]', nama_ibu = '$_POST[nama_ibu]', nama_wali = '$_POST[nama_wali]', anak_ke = '$_POST[anak_ke]', no_hp = '$_POST[no_hp]', foto_siswa='$nama_foto'  WHERE no_pendaftaran = '$no_pendaftaran'");
                } else {
                   $save = mysqli_query($koneksi, "UPDATE pendaftaran SET no_pendaftaran = '$_POST[no_pendaftaran]', nisn = '$_POST[nisn]', no_kk = '$_POST[no_kk]', no_kip = '$_POST[no_kip]', nama = '$_POST[nama]', jk = '$_POST[jk]', tempatlahir = '$_POST[tempatlahir]', tanggal = '$_POST[tanggal]', bulan = '$_POST[bulan]', tahun = '$_POST[tahun]', alamat = '$_POST[alamat]', nama_ayah = '$_POST[nama_ayah]', nama_ibu = '$_POST[nama_ibu]', nama_wali = '$_POST[nama_wali]', anak_ke = '$_POST[anak_ke]', no_hp = '$_POST[no_hp]'  WHERE no_pendaftaran = '$no_pendaftaran'");
                }

                if ($save) {
                  echo "
                          <script type='text/javascript'>
                          setTimeout(function () { 
                                  
                            swal({
                                      title: 'Data Berhasil Diedit.',
                                      type: 'success',
                                      timer: 10000,
                                      showConfirmButton: true
                                  });   
                          },10);  
                          window.setTimeout(function(){ 
                            window.location.replace('logout.php');
                          } ,2000); 
                            </script>";
                } else {
                  echo "
                          <script type='text/javascript'>
                          setTimeout(function () { 
                                  
                            swal({
                                      title: 'Data gagal diedit.',
                                      type: 'error',
                                      timer: 5000,
                                      showConfirmButton: true
                                  });   
                          },10);  
                          window.setTimeout(function(){ 
                            window.location.replace('edit-data.php?no_pendaftaran=$_SESSION[pendaftaran][no_pendaftaran]);
                          } ,2000); 
                            </script>";
                }
              }

              ?>
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
  <!-- sweetalert -->
  <script src="assets/js/sweetalert.min.js"></script>

</body>

</html>