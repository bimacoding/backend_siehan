<?php 

header('Access-Control-Allow-Origin: *');

include_once "koneksi_plasadata.php";

$idxtanah = mysqli_query($con, "SELECT uo, kategori, COUNT(uo) AS jml FROM tbl_tanah WHERE kotama!='' AND kategori='BANGUNAN' GROUP BY uo") or die (mysqli_error());
while($i = mysqli_fetch_assoc($idxtanah)){

	$result['idxbangunan'][] = array(

			'name' 		=> $i['uo'],
			'y'   		=> (double)$i['jml'],
			'drilldown' => str_replace(" ","",strtolower($i['uo']))
					
	);

}		

$drilltanah = mysqli_query($con, "SELECT uo FROM tbl_tanah GROUP BY uo") or die (mysqli_error());
while($d = mysqli_fetch_assoc($drilltanah)){		

		$sub = mysqli_query($con, "SELECT kotama, COUNT(kotama) AS jmlh FROM tbl_tanah WHERE kategori='BANGUNAN' AND uo = '$d[uo]' GROUP BY kotama  ") or die (mysqli_error());
		
		while($s = mysqli_fetch_assoc($sub)){

				$datasub[$d['uo']][] =  array($s['kotama'], (double)$s['jmlh']);

		}

	$result['drillbangunan'][] = array(

			'name' => $d['uo'],
			'id'   => str_replace(" ","",strtolower($d['uo'])),
			'data' => str_replace('"', '', $datasub[$d['uo']])
					
	);
		

}
// $idxbangun = mysqli_query($con, "SELECT kategori, uo, SUM(abs(nilai)) AS nilai FROM tbl_tanah WHERE kategori = 'BANGUNAN' GROUP BY uo") or die (mysqli_error());
// while($i = mysqli_fetch_assoc($idxbangun)){

// 	$result['idxbangunan'][] = array(

// 			'name' 		=> $i['uo'],
// 			'y'   		=> (double)$i['nilai'],
// 			'drilldown' => str_replace(" ","",strtolower($i['uo']))
					
// 	);

// }		

// $drillbangun = mysqli_query($con, "SELECT uo FROM tbl_tanah GROUP BY uo") or die (mysqli_error());
// while($d = mysqli_fetch_assoc($drillbangun)){		

// 		$sub = mysqli_query($con, "SELECT kategori, uo, kotama, abs(nilai) AS nilai FROM tbl_tanah WHERE kategori = 'BANGUNAN' AND uo = '$d[uo]' ") or die (mysqli_error());
		
// 		while($s = mysqli_fetch_assoc($sub)){

// 				$datasub[$d['uo']][] =  array($s['kotama'], (double)$s['nilai']);

// 		}

// 	$result['drillbangunan'][] = array(

// 			'name' => $d['uo'],
// 			'id'   => str_replace(" ","",strtolower($d['uo'])),
// 			'data' => str_replace('"', '', $datasub[$d['uo']])
					
// 	);
		

// }
	
echo json_encode($result);



?>