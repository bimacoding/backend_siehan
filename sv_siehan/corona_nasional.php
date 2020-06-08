<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once "koneksi_plasadata.php";

$sql  = "SELECT a.nama, b.provinsi, b.lng, b.lat, b.positif AS jml_pasien, b.sembuh, b.`meninggal`,
		 IF((SELECT COUNT(status_pasien) FROM covid_surveillance WHERE provinsi = b.`kode_provinsi` AND status_pasien = 2 GROUP BY provinsi ) != '', (SELECT COUNT(status_pasien) FROM covid_surveillance WHERE provinsi = b.`kode_provinsi` AND status_pasien = 2 GROUP BY provinsi ),0) AS dirawat,
		 IF((SELECT COUNT(wn) FROM covid_surveillance WHERE provinsi = b.`kode_provinsi` AND wn = 1 GROUP BY provinsi ) != '', (SELECT COUNT(wn) FROM covid_surveillance WHERE provinsi = b.`kode_provinsi` AND wn = 1 GROUP BY provinsi ),0) AS wni,
		 IF((SELECT COUNT(wn) FROM covid_surveillance WHERE provinsi = b.`kode_provinsi` AND wn = 0 GROUP BY provinsi ) != '', (SELECT COUNT(wn) FROM covid_surveillance WHERE provinsi = b.`kode_provinsi` AND wn = 0 GROUP BY provinsi ),0) AS wna
		 FROM wilayah a 
		 LEFT JOIN covid_nasional b ON a.kode = b.`kode_provinsi`
		 WHERE a.parent_id = 0 AND b.`kode_provinsi`!='' GROUP BY b.kode_provinsi ORDER BY a.nama ASC";

$post = mysqli_query($con, $sql);

	while($row = mysqli_fetch_assoc($post)){
		$result[] = array(
							'nama'=>$row['nama'],
							'lat'=>(double)$row['lat'],
							'lng'=>(double)$row['lng'],
							'provinsi'=>$row['provinsi'],
							'meninggal'=>$row['meninggal'],
							'sembuh'=>$row['sembuh'],
							'dirawat'=>$row['dirawat'],
							'wni'=>$row['wni'],
							'wna'=>$row['wna'],
							'jumlah'=>(double)$row['jml_pasien']
						);
	}

echo json_encode($result);
?>