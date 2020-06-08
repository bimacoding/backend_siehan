<?php 
header('Access-Control-Allow-Origin: *');
header("Content-type: application/json; charset=utf-8");

include_once "koneksi_plasadata.php";

$wil = mysqli_query($con, "SELECT wilayah, jumlah FROM tbl_populasi WHERE tahun=(SELECT MAX(tahun) FROM tbl_populasi) ORDER BY jumlah DESC") or die (mysqli_error());
		
		while($row = mysqli_fetch_assoc($wil)){

		$result['idxwil'][] = array(

			'name' => $row['wilayah'],
			'y'    => (int)$row['jumlah'],
			'drilldown' => str_replace(" ","",strtolower($row['wilayah']))

		);
}

$drillwil = mysqli_query($con, "SELECT tahun, wilayah, jumlah FROM tbl_populasi WHERE tahun=(SELECT MAX(tahun) FROM tbl_populasi) ORDER BY jumlah DESC") or die (mysqli_error());
while($d = mysqli_fetch_assoc($drillwil)){		

		$sub = mysqli_query($con, "SELECT tahun, jumlah FROM tbl_populasi WHERE wilayah = '$d[wilayah]' ORDER BY tahun ASC") or die (mysqli_error());
		
		while($s = mysqli_fetch_assoc($sub)){

				$datasub[$d['wilayah']][] =  array($s['tahun'], (double)$s['jumlah']);

		}

	$result['drillwil'][] = array(

			'name' => $d['wilayah'],
			'id'   => str_replace(" ","",strtolower($d['wilayah'])),
			'data' => str_replace('"', '', $datasub[$d['wilayah']])
					
	);
		

}

echo json_encode($result);
?>