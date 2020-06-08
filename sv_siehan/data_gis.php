<?php;
error_reporting(1);
ini_set('memory_limit', '1024M');
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once "koneksi_plasadata.php";

function gis($id, $con){

	$datas = array();
	$rows = array();
	$query  = "SELECT gid, parent_gid, kd_uo, nama, kd_satker, ycoord, xcoord, icon, keterangan FROM master_satker_xy WHERE parent_gid = $id OR  gid = parent_gid = $id ORDER BY parent_gid, nama";
	$result = mysqli_query($con, $query);
    while($data = mysqli_fetch_assoc($result)) {
    	$rows['keterangan'] =  $data['keterangan'];
    	$rows['ycoord'] = (double) $data['ycoord'];
    	$rows['xcoord'] = (double) $data['xcoord'];
    	$rows['icon'] =  $data['icon'];
    	$rows['nm_satker'] =  "<strong style=\"font-family:sans-serif;font-size:12px;\">".$data['nama']."</strong>";
    	array_push($datas, $rows);
    }
    return $datas;
}

// Data 0 ->> UO AND KOTAMA
$data0 = mysqli_query($con, "SELECT gid, parent_gid, kd_uo, nama, kd_satker, ycoord, xcoord, icon, keterangan FROM master_satker_xy WHERE parent_gid = 0 ORDER BY parent_gid, nama") or die(mysqli_error($con));
while ($i = mysqli_fetch_array($data0)) {

	foreach ($data1 as $key => $value1) {
		$texti = "<strong style=\"font-family:sans-serif;font-size:12px;\">".$i['nama']."</strong>";
		
		$result[strtolower(str_replace(" ", "", $i['kd_satker']))][] = array(
			$value1['keterangan'], 
			$value1['ycoord'], 
			$value1['xcoord'], 
			$value1['icon'], 
			$value1['nm_satker']
		);
	} 
} // End Data 0 ->> UO AND KOTAMA

// Data 1 ->> KOTAMA AND SATKER
$data2 = mysqli_query($con, "SELECT gid, parent_gid, kd_uo, nama, kd_satker, ycoord, xcoord, icon, keterangan FROM master_satker_xy WHERE  parent_gid != 0");
while ($x = mysqli_fetch_array($data2)) {
	$data3 = gis($x['gid'], $con);
	foreach ($data3 as $key => $value3) {
		$text2 = "<strong style=\"font-family:sans-serif;font-size:12px;\">".$x['nama']."</strong>";
		$result[strtolower(str_replace(" ", "", $x['kd_satker']))][] = array(
			$value3['keterangan'], 
			$value3['ycoord'], 
			$value3['xcoord'], 
			$value3['icon'], 
			$value3['nm_satker']
		);
	} 
} // End Data 1 ->> KOTAMA AND SATKER

$data2 = mysqli_query($con, "SELECT gid, parent_gid, kd_uo, nama, kd_satker, ycoord, xcoord, icon, keterangan FROM master_satker_xy 
WHERE parent_gid = '373' OR  gid = parent_gid = '373' ORDER BY parent_gid, nama");
while ($x = mysqli_fetch_array($data2)) {
		$text2 = "<strong style=\"font-family:sans-serif;font-size:12px;\">".$x['nama']."</strong>";
		$result[strtolower(str_replace(" ", "", $x['kd_satker']))][] = array(
			$x['keterangan'], 
			(double)$x['ycoord'], 
			(double)$x['xcoord'], 
			$x['icon'], 
			$x['nama']
		);
	 
}

echo json_encode($result);
?>
