<?php
include '../koneksi.php';
// id
$id_admin = $_GET['id_admin'];
$hapus = mysqli_query($koneksi, "DELETE FROM admin WHERE id_admin='$id_admin'");
if ($hapus) {
	echo "<script>location='data-admin.php?delete-success';</script>";
}

?>