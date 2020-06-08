<?php 

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');


include_once "koneksi_plasadata.php";



$qu1 = "SELECT kategori, SUM(jumlah) as total FROM tbl_lingstra GROUP BY kategori";

$rs1 = mysqli_query($con, $qu1);

while($rw1 = mysqli_fetch_array($rs1)) {

	if ($rw1['kategori']=='PENYAKIT') {

		$qu2 = "SELECT wilayah, SUM(jumlah) AS total FROM tbl_lingstra WHERE kategori = 'PENYAKIT' GROUP BY wilayah
				UNION
				SELECT 'COVID-19', SUM(total) AS total FROM tbl_covid19";

		$rs2 = mysqli_query($con, $qu2);

			
		while($rw2 = mysqli_fetch_array($rs2)) {
			
			$result[$rw1['kategori']][] = array(
											'name' => $rw2['wilayah'],
											'y'    => (double)$rw2['total']
										  );
			
		}
	}else{
		$qu2 = "SELECT wilayah, SUM(jumlah) as total FROM tbl_lingstra WHERE kategori = '$rw1[kategori]' GROUP BY wilayah";

		$rs2 = mysqli_query($con, $qu2);

			
		while($rw2 = mysqli_fetch_array($rs2)) {
			
			$result[$rw1['kategori']][] = array(
											'name' => $rw2['wilayah'],
											'y'    => (double)$rw2['total']
										  );
			
		}
	}


}


echo json_encode($result);



?>