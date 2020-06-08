<?php 
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once "koneksi_plasadata.php";
// error_reporting(0);
$dataxx = mysqli_query($con, "SELECT * FROM master_satker_xy WHERE kd_uo = '24' AND kd_satker = '888888' AND parent_satker = 0 AND parent_satker IS NOT NULL");
$value1x = mysqli_fetch_array($dataxx);
$text1x = "<strong style=\"font-family:sans-serif;font-size:12px;\">".$value1x['nama']."</strong>";
$result[strtolower(str_replace(" ", "", $value1x['kd_satker']))][] = array(
	$value1x['keterangan'], (double)$value1x['ycoord'], (double)$value1x['xcoord'], $value1x['icon'], $text1x
);

$datamabes = mysqli_query($con, "SELECT * FROM master_satker_xy WHERE kd_uo = '21' AND parent_satker = 0 AND parent_satker IS NOT NULL");
while($value1mabes = mysqli_fetch_array($datamabes)){
	$text1mabes = "<strong style=\"font-family:sans-serif;font-size:12px;\">".$value1mabes['nama']."</strong>";
	$result[strtolower(str_replace(" ", "", $value1mabes['kd_satker']))][] = array(
		$value1mabes['keterangan'], (double)$value1mabes['ycoord'], (double)$value1mabes['xcoord'], $value1mabes['icon'], $text1mabes
	);
}

$data0 = mysqli_query($con, "SELECT * FROM master_satker_xy WHERE tipe_org IN('UO','MABES') AND kd_uo !='' ORDER BY kd_uo ");
while ($value0 = mysqli_fetch_array($data0)) {

	$text0 = "<strong style=\"font-family:sans-serif;font-size:12px;\">".$value0['nama']."</strong>";
	$result[strtolower(str_replace(" ", "", $value0['kd_satker']))][] = array(
		$value0['keterangan'], (double)$value0['ycoord'], (double)$value0['xcoord'], $value0['icon'], $text0
	);

	$data1 = mysqli_query($con, "SELECT * FROM master_satker_xy WHERE kd_uo = '$value0[kd_uo]' AND parent_satker = 0 AND parent_satker IS NOT NULL");
	while ($value1 = mysqli_fetch_array($data1)) {

		$text1 = "<strong style=\"font-family:sans-serif;font-size:12px;\">".$value1['nama']."</strong>";
		$result[strtolower(str_replace(" ", "", $value0['kd_satker']))][] = array(
			$value1['keterangan'], (double)$value1['ycoord'], (double)$value1['xcoord'], $value1['icon'], $text1
		);

		$data2 = mysqli_query($con, "SELECT * FROM master_satker_xy WHERE parent_satker = ".$value1['kd_satker']." AND kd_satker != ''");
		while ($value2 = mysqli_fetch_array($data2)) {

			$text2 = "<strong style=\"font-family:sans-serif;font-size:12px;\">".$value2['nama']."</strong>";
			$result[strtolower(str_replace(" ", "", $value1['kd_satker']))][] = array(
				$value2['keterangan'], (double)$value2['ycoord'], (double)$value2['xcoord'], $value2['icon'], $text2
			);

			$data3 = mysqli_query($con, "SELECT * FROM master_satker_xy WHERE parent_satker = ".$value2['kd_satker']." AND kd_satker != ''");
			while ($value3 = mysqli_fetch_array($data3)) {

				$text3 = "<strong style=\"font-family:sans-serif;font-size:12px;\">".$value3['nama']."</strong>";
				$result[strtolower(str_replace(" ", "", $value2['kd_satker']))][] = array(
					$value3['keterangan'], (double)$value3['ycoord'], (double)$value3['xcoord'], $value3['icon'], $text3
				);

				$data4 = mysqli_query($con, "SELECT * FROM master_satker_xy WHERE parent_satker = ".$value3['kd_satker']." AND kd_satker != ''");
				while ($value4 = mysqli_fetch_array($data4)) {

					$text4 = "<strong style=\"font-family:sans-serif;font-size:12px;\">".$value4['nama']."</strong>";
					$result[strtolower(str_replace(" ", "", $value3['kd_satker']))][] = array(
						$value4['keterangan'], (double)$value4['ycoord'], (double)$value4['xcoord'], $value4['icon'], $text4
					);

				}

			}

		}

	}

}
echo json_encode($result);
?>