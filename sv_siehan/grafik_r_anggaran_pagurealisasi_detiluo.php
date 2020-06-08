<?php 
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once "koneksi_plasadata.php";


$qu1 = "SELECT uo,thang, MAX(bulan) AS bln FROM tbl_anggaran GROUP BY uo,thang";

$rs1 = mysqli_query($con, $qu1);

while($rw1 = mysqli_fetch_array($rs1)) {

	$qu2 = "SELECT uo, thang, SUM(pagu) AS pagu, SUM(realisasi) AS realisasi, (SUM(pagu)-SUM(realisasi)) AS sisa FROM tbl_anggaran WHERE uo='$rw1[uo]' AND thang='$rw1[thang]' AND bulan='$rw1[bln]' ORDER BY urutan ASC";

	$rs2 = mysqli_query($con, $qu2);	

	while($rw2 = mysqli_fetch_array($rs2)) {

		$rpl = strtolower(str_replace(" ", "-", $rw1['uo'].'-'.$rw1['thang']));

		$result[$rpl] =array(
			array( 
				'name'=>'Pagu',
				'y'   => (double)$rw2['pagu']
			),
			array(
				'name'=>'Realisai',
				'y'   => (double)$rw2['realisasi']
			),
			array(
				'name'=>'Sisa',
				'y'   => (double)$rw2['sisa']
			)
		);
	}
}

	
echo json_encode($result);


?>