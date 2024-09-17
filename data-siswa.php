<?php
require_once 'dompdf/autoload.inc.php';

require_once 'koneksi.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();

$sql = mysqli_query($koneksi, "SELECT * FROM pendaftaran");
// html file
$html = '
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Daftar Siswa Baru</title>
</head>
<body>
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
				<td align="center"><b><u>DAFTAR SISWA BARU SDIT IBNU ABBAS</u></b></td>
			</tr>
		</table>
		<br/>
		<table width="525" border="1">
			<thead>
				<tr>
					<th>Nama</th>
					<th>NISN</th>
					<th>Jenis Kelamin</th>
					<th>Alamat</th>
				</tr>
			</thead>';
while($row = mysqli_fetch_array($sql, MYSQLI_ASSOC))
{
	if ($row['jk'] == 'L') {
		$jk = 'Laki - Laki';
	} elseif ($row['jk'] == 'P') {
		$jk = 'Perempuan';
	}
	$html .= '
			<tbody>
				<tr>
					<td>'.$row["nama"].'</td>
					<td>'.$row["nisn"].'</td>
					<td>'.$jk.'</td>
					<td>'.$row["alamat"].'</td>
				</tr>
			</tbody>';
}

$html .= '
		</table>
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