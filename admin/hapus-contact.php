<?php
include '../koneksi.php';
// id
$id_contact = $_GET['id_contact'];
$hapus = mysqli_query($koneksi, "DELETE FROM contact WHERE id_contact='$id_contact'");
if ($hapus) {
	echo "<script>location='data-contact.php?delete-success';</script>";
}

?>