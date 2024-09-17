<?php include 'koneksi.php'; ?>
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
      <a class="navbar-brand" id="head" href="index.php">SDIT IBNU ABBAS</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-auto">
          <a class="nav-link active" aria-current="page" href="index.php">Beranda <i class="bi bi-house-door"></i></a>
          <a class="nav-link active" aria-current="page" href="#information">Informasi</a>
          <a class="nav-link active" aria-current="page" href="#contact">Contact</a>
          <a class="nav-link active" aria-current="page" href="login.php">Login</a>
        </div>
      </div>
    </div>
  </nav>
  <!-- end nav -->

  <!-- jumbotron -->
  <div class="jumbotron" style="padding-top: 6rem;">
    <div class="container">
      <div class="row justify-content-center align-items-center">
        <div class="col-md-6">
          <div data-aos="fade-right" data-aos-delay="200">
            <h2 class="">PPDB ONLINE SDIT IBNU ABBAS</h2>
            <p class="lead">Selamat Datang calon Penerimaan Peserta Didik Baru SDIT IBNU ABBAS, untuk melakukan pendaftaran PPDB online silahkan klik tombol di bawah ini</p>
            <hr class="my-4">
            <p class="lead">Link Login<i class="bi bi-arrow-down-short"></i></p>
            <a class="btn btn btn-outline-success btn-md mb-3" href="login.php" role="button">Login Siswa <i class="bi bi-person"></i></a>
            <a class="btn btn btn-outline-danger btn-md mb-3" href="https://drive.google.com/file/d/1-GQTs5OZuq7huWjtvlkdcOU0LA08-ERo/view?usp=sharing" role="button" target="_blank">Panduan PPDB <i class="bi bi-file-earmark"></i></a>
          </div>
        </div>
        <div class="col-md-6">
          <img src="assets/img/images.png" alt="images" class="img-fluid" data-aos="fade-left" data-aos-delay="200">
        </div>
      </div>
    </div>
  </div>
  <!-- end jumbotron -->

  <!-- form -->
  <section id="form">
    <div class="container">
      <div class="row">
        <div class="card mb-5">
          <div class="card-header">
            <strong>Formulir Pendaftaran Calon Siswa Baru</strong>
          </div>
          <?php
          $cek = mysqli_query($koneksi, "SELECT * FROM ppdb");
          $row = mysqli_fetch_array($cek);
          if ($row['status_ppdb'] == 'Enabled') { ?>
            <div class="card-body">
              <p class="card-text mb-4">Silahkan isi formulir dibawah ini sesuai dengan biodata calon siswa/i yang benar</p>
              <?php
              // Nomor Pendaftaran
              $query = mysqli_query($koneksi, "SELECT max(no_pendaftaran) as nomor FROM pendaftaran");
              $data = mysqli_fetch_array($query);
              $nomor_pendaftaran = $data['nomor'];

              $urutan = (int) substr($nomor_pendaftaran, 3, 3);

              $urutan++;

              $huruf = "NP";
              $nomor_pendaftaran = $huruf . sprintf("%03s", $urutan);

              ?>
              <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                  <label class="form-label">Nomor Pendaftaran</label>
                  <input type="text" name="no_pendaftaran" class="form-control" readonly="readonly" value="<?php echo $nomor_pendaftaran; ?>">
                </div>
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label class="form-label">Nomor Induk Siswa Nasional</label>
                    <input type="number" name="nisn" class="form-control" placeholder="Nomor Induk Siswa Nasional" required="required">
                    <small class="text-success">*NISN ini akan digunakan untuk proses login </small>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label class="form-label">Nomor Kartu Keluarga</label>
                    <input type="number" name="no_kk" class="form-control" placeholder="Nomor Kartu Keluarga" required="required">
                  </div>
                </div>
                <div class="mb-3">
                  <label class="form-label">Nomor Kartu Indonesia Pintar</label>
                  <input type="number" name="no_kip" placeholder="Nomor Kartu Indonesia Pintar" class="form-control">
                  <small class="text-success">*Jika Mempunyai Kartu Indonesia Pintar</small>
                </div>
                <div class="mb-3">
                  <label class="form-label">Nama Lengkap</label>
                  <input type="text" name="nama" placeholder="Nama Lengkap" class="form-control" required="required">
                </div>
                <div class="mb-3">
                  <label class="form-label">Jenis Kelamin</label>
                  <select name="jk" class="form-control" required="required">
                    <option>- Pilih Jenis Kelamin -</option>
                    <option value="L">Laki-Laki</option>
                    <option value="P">Perempuan</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label class="form-label">Tempat Lahir</label>
                  <input type="text" name="tempatlahir" placeholder="Tempat Lahir" class="form-control" required="required">
                </div>
                <div class="row">
                  <div class="col-md-4 mb-3">
                    <label class="form-label">Tanggal Lahir</label>
                    <select name="tanggal" class="form-control" required="required">
                      <option>- Pilih Tanggal Lahir -</option>
                      <?php
                      for ($i = 1; $i <= 31; $i++) {
                        echo "<option value='$i'>$i</option>";
                      }
                      ?>
                    </select>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label class="form-label">Bulan Lahir</label>
                    <select name="bulan" class="form-control" required="required">
                      <option>- Pilih Bulan Lahir -</option>
                      <option value="Januari">Januari</option>
                      <option value="Februari">Februari</option>
                      <option value="Maret">Maret</option>
                      <option value="April">April</option>
                      <option value="Mei">Mei</option>
                      <option value="Juni">Juni</option>
                      <option value="Juli">Juli</option>
                      <option value="Agustus">Agustus</option>
                      <option value="September">September</option>
                      <option value="Oktober">Oktober</option>
                      <option value="November">November</option>
                      <option value="Desember">Desember</option>
                    </select>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label class="form-label">Tahun Lahir</label>
                    <select name="tahun" class="form-control" required="required">
                      <option>- Pilih Tahun Lahir -</option>
                      <option value="2013">2013</option>
                      <option value="2014">2014</option>
                      <option value="2015">2015</option>
                      <option value="2016">2016</option>
                      <option value="2017">2017</option>
                      <option value="2018">2018</option>
                      <option value="2019">2019</option>
                      <option value="2020">2020</option>
                      <option value="2021">2021</option>
                    </select>
                  </div>
                </div>
                <div class="mb-3">
                  <label class="form-label">Agama</label>
                  <select name="agama" class="form-control" required="required">
                    <option>- Pilih Agama -</option>
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Buddha">Buddha</option>
                    <option value="Konghuchu">Konghuchu</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label class="form-label">Status Dalam Keluarga</label>
                  <select name="statuskeluarga" class="form-control" required="required">
                    <option>- Status Dalam Keluarga -</option>
                    <option value="Anak Kandung">Anak Kandung</option>
                    <option value="Anak Angkat">Anak Angkat</option>
                    <option value="Lainnya">Lainnya</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label class="form-label">Alamat</label>
                  <textarea name="alamat" placeholder="Alamat" class="form-control" required="required"></textarea>
                </div>
                <div class="row">
                  <div class="col-md-4 mb-3">
                    <label class="form-label">Nama Ayah</label>
                    <input type="text" name="nama_ayah" placeholder="Nama Ayah" class="form-control" required="required">
                  </div>
                  <div class="col-md-4 mb-3">
                    <label class="form-label">Nama Ibu</label>
                    <input type="text" name="nama_ibu" placeholder="Nama Ibu" class="form-control" required="required">
                  </div>
                  <div class="col-md-4 mb-3">
                    <label class="form-label">Nama Wali</label>
                    <input type="text" name="nama_wali" placeholder="Nama Wali" class="form-control">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label class="form-label">Anak Ke- Berapa Di Kartu Keluarga</label>
                    <input type="text" name="anak_ke" placeholder="Anak Ke- Di Kartu Keluarga" class="form-control">
                  </div>
                  <div class="col-md-6 mb-3">
                    <label class="form-label">No. Handphone Ortu/Wali</label>
                    <input type="text" name="no_hp" placeholder="No. Handphone/Whatsapp" class="form-control">
                  </div>
                </div>
                <hr>
                <div class="alert alert-success" role="alert">
                  <i class="bi bi-info-lg"></i> Password ini digunakan untuk proses login. Pastikan password mudah untuk dingat.
                </div>
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" placeholder="Password" class="form-control">
                  </div>
                  <div class="col-md-6 mb-3">
                    <label class="form-label">Ulangi Password</label>
                    <input type="password" name="password2" placeholder="Ulangi Password" class="form-control">
                  </div>
                </div>
                <div class="mb-3">
                  <label class="form-label">Foto Siswa</label>
                  <input type="file" class="form-control" name="foto_siswa" required='required'>
                </div>
                <input type="hidden" name="tanggal_daftar" value="<?php echo date('d-m-Y'); ?>">
                <input type="hidden" name="status_diterima" value="N">
                <button type="submit" class="btn btn-primary" name="daftar">Daftar <i class="bi bi-file-text"></i></button>
                <button type="reset" class="btn btn-danger" name="reset_daftar">Reset <i class="bi bi-arrow-clockwise"></i></button>
              </form>
              <?php

              if (isset($_POST['daftar'])) {

                $nisn = $_POST['nisn'];
                $password = $_POST['password'];
                $password2 = $_POST['password2'];

                $nama_file = $_FILES['foto_siswa']['name'];
                $nama_foto = date('YmdHis') . $nama_file;
                $source = $_FILES['foto_siswa']['tmp_name'];
                $folder = './foto-siswa/';

                // cek nisn
                $result = mysqli_query($koneksi, "SELECT nisn FROM pendaftaran WHERE nisn = '$nisn'");
                if (mysqli_num_rows($result)) {
                  echo "<script>location='index.php?nisn-failed';</script>";
                  return false;
                }

                // cek password
                if ($password !== $password2) {
                  echo "<script>location='index.php?password-failed';</script>";
                  return false;
                }

                // enkripsi
                $password = password_hash($password, PASSWORD_DEFAULT);

                // directory
                move_uploaded_file($source, $folder . $nama_foto);

                $save = mysqli_query($koneksi, "INSERT INTO pendaftaran(no_pendaftaran,nisn,no_kk,no_kip,nama,jk,tempatlahir,tanggal,bulan,tahun,agama,statuskeluarga,alamat,nama_ayah,nama_ibu,nama_wali,anak_ke,no_hp,password,tanggal_daftar,status_diterima,foto_siswa)VALUES
                  ('$_POST[no_pendaftaran]','$nisn','$_POST[no_kk]','$_POST[no_kip]','$_POST[nama]','$_POST[jk]','$_POST[tempatlahir]','$_POST[tanggal]','$_POST[bulan]','$_POST[tahun]','$_POST[agama]','$_POST[statuskeluarga]','$_POST[alamat]','$_POST[nama_ayah]','$_POST[nama_ibu]','$_POST[nama_wali]','$_POST[anak_ke]','$_POST[no_hp]','$password','$_POST[tanggal_daftar]','$_POST[status_diterima]','$nama_foto')");

                if ($save) {
                  echo "
                          <script type='text/javascript'>
                          setTimeout(function () { 
                                  
                            swal({
                                      title: 'Proses Pendaftaran Berhasil.',
                                      text: 'Silahkan Login Menggunakan NISN dan Password.',
                                      type: 'success',
                                      timer: 10000,
                                      showConfirmButton: true
                                  });   
                          },10);  
                          window.setTimeout(function(){ 
                            window.location.replace('index.php');
                          } ,2000); 
                            </script>";
                } else {
                  echo "
                          <script type='text/javascript'>
                          setTimeout(function () { 
                                  
                            swal({
                                      title: 'Proses Pendaftaran Gagal.',
                                      type: 'error',
                                      timer: 5000,
                                      showConfirmButton: true
                                  });   
                          },10);  
                          window.setTimeout(function(){ 
                            window.location.replace('index.php');
                          } ,2000); 
                            </script>";
                }
              }

              ?>
            </div>
          <?php } elseif ($row['status_ppdb'] == 'Disabled') { ?>
            <div class="card-body">
              <p class="lead text-center">Penerimaan Peserta Didik Baru Sudah Ditutup.</p>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </section>
  <!-- end tentang -->

  <!-- informasi -->
  <section id="information">
    <div class="container">
      <div class="row text-center">
        <h3 data-aos="zoom-in" data-aos-delay="200">Informasi PPDB Online</h3>
      </div>
      <div class="row justify-content-center mt-3" data-aos="zoom-in" data-aos-delay="200">
        <div class="col-md-10">
          <img src="assets/img/alur-ppdb.png" alt="images" class="img-fluid">
        </div>
        <div class="col-md-9 my-3">
          <ul class="list-group list-group-flush">
            <li class="list-group-item">
              <p class="lead">1. Calon Siswa mendaftarkan diri atau melakukan Pendaftaran PPDB online melalui website PPDB SDIT IBNU ABBAS</p>
            </li>
            <li class="list-group-item">
              <p class="lead">2. Setelah Calon Siswa berhasil melakukan pendaftaran, Calon siswa wajib melakukan Print Out Pendaftaran & Mempersiapkan Kelengkapan Berkas PPDB SDIT IBNU ABBAS</p>
            </li>
            <li class="list-group-item">
              <p class="lead">3. Calon siswa datang ke SDIT IBNU ABBAS untuk VERIFIKASI, membawa Bukti pendaftaran & Kelengkapan Berkas PPDB SDIT IBNU ABBAS.</p>
            </li>
            <li class="list-group-item">
              <p class="lead">4. Panitia PPDB melakukan Verifikasi dan Validasi Berkas Pendaftaran.</p>
            </li>
            <li class="list-group-item">
              <p class="lead">5. PENGUMUMAN HASIL PPDB Online bisa dilihat di Web PPDB SDIT IBNU ABBAS.</p>
            </li>
            <li class="list-group-item">
              <p class="lead">6. Jika Calon Siswa dinyatakan LULUS maka Calon Siswa Wajib Registrasi/Daftar Ulang di SDIT IBNU ABBAS.</p>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- end informasi -->

  <!-- kontak -->
  <section id="contact" class="mb-5">
    <div class="container">
      <div class="row text-center justify-content-center mt-5">
        <h2>Kontak Kami</h2>
      </div>
      <div class="row justify-content-center align-items-center mt-3">
        <div class="col-md-5">
          <div data-aos="fade-right" data-aos-delay="200">
            <img src="assets/img/contact.png" alt="images" class="img-fluid">
            <p><i class="bi bi-pin-map"></i> Jl. Angsana Raya No.87-91, Cirebon Girang, Kec. Talun, Cirebon, Jawa Barat 45171</p>
            <p><i class="bi bi-telephone-inbound"></i> +622318304290</p>
          </div>
        </div>
        <div class="col-md-5">
          <div data-aos="fade-left" data-aos-delay="200">
            <form action="" method="post">
              <input type="hidden" name="id_contact">
              <div class="mb-3">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap">
              </div>
              <div class="mb-3">
                <label class="form-label">Alamat Email</label>
                <input type="email" name="email" class="form-control" aria-describedby="emailHelp" placeholder="Alamat Email">
                <div id="emailHelp" class="form-text">Example : user@mail.com.</div>
              </div>
              <div class="mb-3">
                <label class="form-label">Pesan</label>
                <textarea class="form-control" name="pesan" placeholder="Pesan ..."></textarea>
              </div>
              <button type="submit" class="btn btn-outline-success" name="kirim">Kirim Pesan</button>
            </form>
            <?php
            if (isset($_POST['kirim'])) {
              $contact = mysqli_query($koneksi, "INSERT INTO contact(id_contact,nama,email,pesan)VALUES('$_POST[id_contact]','$_POST[nama]','$_POST[email]','$_POST[pesan]')");
              if ($contact) {
                echo "
                      <script type='text/javascript'>
                      setTimeout(function () { 
                              
                        swal({
                                  title: 'Pesan Anda Terkirim.',
                                  text: 'Terima Kasih atas kritik dan saran untuk kami.',
                                  type: 'success',
                                  timer: 10000,
                                  showConfirmButton: true
                              });   
                      },10);  
                      window.setTimeout(function(){ 
                        window.location.replace('index.php');
                      } ,2000); 
                        </script>";
              } else {
                echo "
                      <script type='text/javascript'>
                      setTimeout(function () { 
                              
                        swal({
                                  title: 'Pesan Tidak Terkirim!.',
                                  type: 'error',
                                  timer: 5000,
                                  showConfirmButton: true
                              });   
                      },10);  
                      window.setTimeout(function(){ 
                        window.location.replace('index.php');
                      } ,2000); 
                        </script>";
              }
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end kontak -->

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