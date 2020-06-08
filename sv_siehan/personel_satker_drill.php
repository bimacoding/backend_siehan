<?php 
error_reporting(1);
header('Access-Control-Allow-Origin: *');


include_once "koneksi_plasadata.php";



$qu1 = "SELECT nama_uo FROM tbl_pers_r_uo_korp_gol WHERE uuo != '' GROUP BY nama_uo";

$rs1 = mysqli_query($con, $qu1);

while($rw1 = mysqli_fetch_array($rs1)) {

	$qu2 = "SELECT a.nama_satker, (SELECT singkatan FROM tbl_pers_r_uo_korp_gol WHERE usatker=a.usatker AND usubsatker=1 LIMIT 1) as singkatan, SUM(a.jml) AS jmlh FROM tbl_pers_r_uo_korp_gol a WHERE a.nama_uo='$rw1[nama_uo]' AND usatker != '' AND singkatan != '' AND nama_satker != ''  GROUP BY a.usatker ORDER BY a.usatker ASC";

	$rs2 = mysqli_query($con, $qu2);	

	while($rw2 = mysqli_fetch_array($rs2)) {

		$rpl = strtolower(str_replace(" ", "_", $rw1['nama_uo']));

		$qu3 = "SELECT nama_satker, SUM(jml) AS total FROM tbl_pers_r_uo_korp_gol WHERE nama_uo='$rw1[nama_uo]' AND singkatan='$rw2[singkatan]' AND usatker != '' AND singkatan != '' AND nama_satker != '' GROUP BY usubsatker ORDER BY usubsatker ASC";

		$rs3 = mysqli_query($con, $qu3);
		while ($rw3 = mysqli_fetch_array($rs3)) {

			$datasub[$rw1['nama_uo']][$rw2['usatker']][] =  array(
																	$rw3['nama_satker'], 
																	(double)$rw3['total']
																 );

		}

		$result[$rpl][] = array(
			'name' => $rw2['singkatan'],
			'id'   => str_replace(" ","",strtolower($rw2['nama_satker'].'-'.$rw2['usatker'])),
			'data' => $datasub[$rw1['nama_uo']][$rw2['usatker']]
		);
	}


	 

}



echo json_encode($result);







?>