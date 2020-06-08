<?php 
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once "koneksi_plasadata.php";


$qu1 = "SELECT uo,thang, MAX(bulan) AS bln FROM tbl_anggaran GROUP BY uo,thang";

$rs1 = mysqli_query($con, $qu1);

while($rw1 = mysqli_fetch_array($rs1)) {

	$qu2 = "SELECT nmsatker, pagu, urutan, thang FROM tbl_anggaran WHERE uo='$rw1[uo]' AND thang='$rw1[thang]' AND bulan='$rw1[bln]' ORDER BY urutan ASC";

	$rs2 = mysqli_query($con, $qu2);	

	while($rw2 = mysqli_fetch_array($rs2)) {

		$rpl = strtolower(str_replace(" ", "-", $rw1['uo'].'-'.$rw1['thang']));

		$qu3 = "SELECT pagu, realisasi, (pagu-realisasi) as sisa FROM tbl_anggaran WHERE nmsatker='$rw2[nmsatker]' AND thang ='$rw2[thang]' AND bulan='$rw1[bln]' ORDER BY urutan ASC";

		$rs3 = mysqli_query($con, $qu3);
		while ($rw3 = mysqli_fetch_array($rs3)) {

			$datasub[$rw2['nmsatker']][$rw2['thang']] =  array(
																	array('name'=>'Pagu','y'=>(double)$rw3['pagu']), 
																	array('name'=>'Realisasi','y'=>(double)$rw3['realisasi']),
																	array('name'=>'Sisa','y'=>(double)$rw3['sisa'])
																 );

		}


		$result[$rpl][] = array(
			'name' => $rw2['nmsatker'],
			'id' => str_replace(" ","",strtolower($rw2['nmsatker'].'_'.$rw2['urutan'])),
			'data'  => $datasub[$rw2['nmsatker']][$rw2['thang']]
		);
	}
}

	
echo json_encode($result);



?>