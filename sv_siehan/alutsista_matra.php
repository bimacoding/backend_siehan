<?php 
error_reporting(1);
header('Access-Control-Allow-Origin: *');
header("Content-type: application/json; charset=utf-8");


include_once "koneksi_plasadata.php";

// $quu1 = "SELECT matra, SUM(CAST(REPLACE(jumlah,',','') AS UNSIGNED)) AS jmlh FROM tbl_alutmatra GROUP BY matra"; --old--
$quu1 = "SELECT matra, SUM(CAST(REPLACE(jumlah,',','') AS UNSIGNED)) AS jmlh, MAX(bln) AS blan, MAX(thn) AS thun FROM tbl_alutmatra WHERE bln=1 AND thn = 2020 GROUP BY matra";

$rws1 = mysqli_query($con, $quu1);

while($row1 = mysqli_fetch_array($rws1)) {
	$result['jmlh_alutmatra'][] = (double)$row1['jmlh'];
}


$qu1 = "SELECT matra FROM tbl_alutmatra GROUP BY matra";

$rs1 = mysqli_query($con, $qu1);

while($rw1 = mysqli_fetch_array($rs1)) {

	$qu2 = "SELECT matra, kategori, SUM(CAST(REPLACE(jumlah,',','') AS UNSIGNED)) AS jumlah FROM tbl_alutmatra WHERE matra='$rw1[matra]' AND bln = 1 AND thn = 2020 GROUP BY kategori";

	$rs2 = mysqli_query($con, $qu2);	

	while($rw2 = mysqli_fetch_array($rs2)) {
		$rpl = strtolower(str_replace(" ", "-", $rw1['matra']));

		$result[$rpl][] = array(
			'name' => $rw2['kategori'],
			'y' => (double)$rw2['jumlah'],
			'drilldown'  => str_replace(" ","",strtolower($rw2['kategori'].'-'.$rw2['matra']))
		);
	}
}

echo json_encode($result);

?>