<?php 
ini_set('memory_limit', '1024M');
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once "koneksi_plasadata.php";
// echo "string";
$data = mysqli_query($con, "SELECT * FROM master_satker_xy ");
while ($dt = mysqli_fetch_array($data)) {
		
		$text1 = "<strong style=\"font-family:sans-serif;font-size:12px;\">".$dt['nama']."</strong>";
		$xx[strtolower(str_replace(" ", "", $dt['gid']))] = array(
			$dt['keterangan'], (double)$dt['ycoord'], (double)$dt['xcoord'], $dt['icon'], $text1
		);
		$result['lieur'][] = array(
			'label'=> $dt['nama'],
			'data' => $xx[strtolower(str_replace(" ", "", $dt['gid']))]
		);
	
}

echo json_encode($result);
?>