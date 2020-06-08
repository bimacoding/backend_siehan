<?php 
header('Access-Control-Allow-Origin: *');

include_once "koneksi_plasadata.php";


$qu1 = "SELECT matra, urutan FROM tbl_alutmatra GROUP BY matra, urutan";

$rs1 = mysqli_query($con, $qu1);

while($rw1 = mysqli_fetch_array($rs1)) {

	$qu2 = "SELECT satker, sum(jumlah) as jlh FROM `tbl_alutmatra` WHERE matra='$rw1[matra]' GROUP BY satker ORDER BY urutan ASC";

	$rs2 = mysqli_query($con, $qu2);	

	while($rw2 = mysqli_fetch_array($rs2)) {
		$rpl = strtolower(str_replace(" ", "-", $rw1['matra']));

		$result[$rpl][] = array(
			'name' => strtoupper($rw2['satker']),
			'y' => (double)$rw2['jlh']
		);
	}

}

echo json_encode($result);


?>