<?php 
header('Access-Control-Allow-Origin: *');

include_once "koneksi_plasadata.php";

$no = 1;
$belneg = mysqli_query($con, "SELECT urutan, wilayah, jumlah FROM tbl_belanegara ORDER BY wilayah") or die (mysqli_error());
		
		while($b = mysqli_fetch_assoc($belneg)){

		$result[] = 
			array(
			'nomor' => $b['urutan'],
			'wilayah' => $b['wilayah'],
			'jumlah'    => (int)$b['jumlah']
			

		);

		
$no++; }

$tot = mysqli_query($con, "SELECT SUM(jumlah) AS total FROM tbl_belanegara") or die (mysqli_error());
		
		while($t = mysqli_fetch_assoc($tot)){

		$total[] = array(
			'total'    => (int)$t['total']

		);

		
}

// $hasil['databelneg'] = array_chunk($result, 4);
$hasil['databelneg'] = $result;
$hasil['totbelneg'] = $total;

echo json_encode($hasil);