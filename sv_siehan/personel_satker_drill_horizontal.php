<?php 
error_reporting(1);
header('Access-Control-Allow-Origin: *');


include_once "koneksi_plasadata.php";



$qu1 = "SELECT nama_uo,uuo FROM tbl_pers_r_uo_korp_gol GROUP BY nama_uo,uuo";

$rs1 = mysqli_query($con, $qu1);

while($rw1 = mysqli_fetch_array($rs1)) {

	$qu2 = "SELECT a.nama_satker, (SELECT singkatan FROM tbl_pers_r_uo_korp_gol WHERE uuo=a.uuo AND usatker=a.usatker AND usubsatker=1 LIMIT 1) as singkatan, a.usatker, SUM(a.jml) AS jmlh FROM tbl_pers_r_uo_korp_gol a WHERE a.uuo='$rw1[uuo]' GROUP BY a.usatker ORDER BY a.usatker ASC";

	$rs2 = mysqli_query($con, $qu2);	

	while($rw2 = mysqli_fetch_array($rs2)) {

		$rpl = strtolower(str_replace(" ", "_", $rw1['nama_uo']));

		$qu3 = "SELECT nama_matra, SUM(jml) AS jmlh FROM tbl_pers_r_uo_korp_gol 
WHERE nama_uo='$rw1[nama_uo]' AND usatker='$rw2[usatker]'  
GROUP BY kode_matra ORDER BY kode_matra ASC";

		$rs3 = mysqli_query($con, $qu3);
		while ($rw3 = mysqli_fetch_array($rs3)) {

			$datasub[$rw1['nama_uo']][$rw2['usatker']][] =  array(
																	$rw3['nama_matra'], 
																	(double)$rw3['jmlh']
																 );

		}

		$result[$rpl][] = array(
			'name' => $rw2['singkatan'],
			'id'   => str_replace(" ","",strtolower($rw2['nama_satker'].'_'.$rw2['usatker'])),
			'data' => $datasub[$rw1['nama_uo']][$rw2['usatker']]
		);
	}


	 

}



echo json_encode($result);







?>