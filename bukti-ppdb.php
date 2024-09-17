<?php
session_start();
require_once 'dompdf/autoload.inc.php';

require_once 'koneksi.php';
$no_pendaftaran = $_SESSION['pendaftaran']['no_pendaftaran'];

// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();

$sql = mysqli_query($koneksi, "SELECT * FROM pendaftaran WHERE no_pendaftaran='$no_pendaftaran'");
$row = mysqli_fetch_array($sql, MYSQLI_ASSOC);
// html file
$html = '
<!DOCTYPE html>
<html>
<head>
	<title>Bukti Pendaftaran PPDB</title>
</head>
<body>
	<center>
		<!-- KOP SURAT -->
		<table width="500">
			<tr>
				<td>
					<center>
						<font size="4">PANITIA PENERIMAAN PESERTA DIDIK BARU</font><br/>
						<font size="3">SEKOLAH DASAR ISLAM TERPADU IBNU ABBAS</font><br/>
						<font size="2"><i>Jl. Angsana Raya No.87-91, Cirebon Girang, Kec. Talun, Cirebon, Jawa Barat 45171</i></font>
					</center>
				</td>
			</tr>
			<tr>
				<td colspan="2"><hr></td>
			</tr>
		</table>
		<table width="525">
			<tr>
				<td align="center"><b><u>BUKTI PENDAFTARAN</u></b></td>
			</tr>
		</table>
		<br/>
		<!-- NOMOR SURAT -->
		<table width="525">
			<tr>
				<td>Nomor Pendaftaran</td>
				<td width="350">: '.$row["no_pendaftaran"].'</td>
			</tr>
		</table>
		<br/>
		<!-- ISI -->
		<table width="500">
			<tr>
				<td>
					<font size="3">
						<table width="525">
							<tr>
								<td>1. NISN</td>
								<td width="350">: '.$row["nisn"].'</td>
							</tr>
							<tr>
								<td>2. Nama</td>
								<td width="350">: '.$row["nama"].'</td>
							</tr>
							<tr>
								<td>3. Tempat, Tanggal Lahir</td>
								<td width="350">: '.$row["tempatlahir"].', '.$row["tanggal"].' '.$row["bulan"].' '.$row["tahun"].'</td>
							</tr>
							<tr>
								<td>4. Jenis Kelamin</td>
								<td width="350">: '.$row["jk"].'</td>
							</tr>
							<tr>
								<td>5. Agama</td>
								<td width="350">: '.$row["agama"].'</td>
							</tr>
							<tr>
								<td>8. Alamat</td>
								<td width="350">: '.$row["alamat"].'</td>
							</tr>
							<tr>
								<td>6. Nama Ayah</td>
								<td width="350">: '.$row["nama_ayah"].'</td>
							</tr>
							<tr>
								<td>7. Nama Ibu</td>
								<td width="350">: '.$row["nama_ibu"].'</td>
							</tr>
							<tr>
								<td>7. Tanggal Daftar</td>
								<td width="350">: '.$row["tanggal_daftar"].'</td>
							</tr>
						</table>
					</font>
				</td>
			</tr>
		</table>
		<br/>
		<!-- PENUTUPAN -->
		<table width="500">
			<tr>
				<td>
					<font size="3">
						Nama tersebut telah diterima sebagai siswa baru SDIT IBNU ABBAS Kabupaten Cirebon Tahun Ajaran 2020/2021.
					</font>
				</td>
			</tr>
		</table>
		<br/>
		<!-- TTD -->
		<table width="500">
			<tr>
				<td width="430"></td>
				<td>Kepala Sekolah<br/><br/><br/><br/><br/><u>Nama Kepala Sekolah</u></td>
			</tr>
		</table>
	</center>
	<br/><br/>
	<script type="text/javascript">
		window.print();
	</script>
</body>
</html>';
// function call html file
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'potrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream("Bukti-PPDB", array("Attachment"=>0));


?>