<?php
include '../koneksi.php';
// id
$no_pendaftaran = $_GET['no_pendaftaran'];
$hapus = mysqli_query($koneksi, "DELETE FROM pendaftaran WHERE no_pendaftaran='$no_pendaftaran'");
if ($hapus) {
	echo "<script>location='data-pendaftaran.php?delete-success';</script>";
}

?>