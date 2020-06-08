<?php 
ini_set('memory_limit', '1024M');
error_reporting(1);
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once "koneksi_plasadata.php";

$qu1 = "SELECT b.gid, a.NRP, a.KDSATKER, a.KDANAK, a.NMPEG, a.SEBUTJAB, a.nmsatker ,b.xcoord, b.ycoord, a.MATRA , b.keterangan
		FROM tp_ad a LEFT JOIN master_satker_xy b ON a.KDSATKER = b.kd_satker 
		AND a.KDANAK = b.kd_subsatker 
		WHERE (a.KDGOL BETWEEN 43 AND 47) 
		AND a.TGLDEAD IS NULL 
		AND b.xcoord != '' 
		AND b.ycoord != '' 
		ORDER BY b.gid ASC 
		LIMIT 100";

$rs1 = mysqli_query($con, $qu1);

while($rw1 = mysqli_fetch_array($rs1)) {

	$text1 = "<strong style=\"font-family:sans-serif;font-size:12px;\">".$rw1['NMPEG']."</strong><br>
			  <span>NRP : ".$rw1['NRP']."</span><br>
			  <span>JABATAN : ".$rw1['SEBUTJAB']."</span>";
	$xx[strtolower(str_replace(" ", "", $rw1['gid']))] = array(
		$rw1['keterangan'].$text1, (double)$rw1['ycoord'],(double)$rw1['xcoord'], $text1
	);

	$result['lieur'][] = array(
		'label'=> $rw1['NMPEG'],
		'data' => $xx[strtolower(str_replace(" ", "", $rw1['NRP']))]
	);

}
echo json_encode($result);

?>
