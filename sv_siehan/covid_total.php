<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once "koneksi_plasadata.php";

$idx = mysqli_query($con, "SELECT * FROM tbl_covid19_total WHERE flag = 1 LIMIT 1") or die (mysqli_error());
	while($i = mysqli_fetch_assoc($idx)){

		$result['covid'][] = array(

				'total' 		=> doubleval($i['total']),
				'meninggal'     => doubleval($i['meninggal']),
				'sembuh'        => doubleval($i['sembuh'])
						
		);

	}	

echo json_encode($result);

?>