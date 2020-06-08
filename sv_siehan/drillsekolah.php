<?php 
header('Access-Control-Allow-Origin: *');

include_once "koneksi_plasadata.php";

$sekolah  = mysqli_query($con, "SELECT subcategory FROM tbl_sekolah GROUP BY subcategory ORDER BY nourut ASC") or die (mysqli_error());

while($ad = mysqli_fetch_assoc($sekolah)){		

		$subsekolah = mysqli_query($con, "SELECT wilayah, subcategory, category, jumlah FROM tbl_sekolah WHERE subcategory = '$ad[subcategory]' GROUP BY category ORDER BY nourut") or die (mysqli_error());
		
		while($sad = mysqli_fetch_assoc($subsekolah)){

				$datasubsekolah[$ad['subcategory']][] =  array($sad['wilayah'],(double)$sad['total']);

		}

	$result['idxsekolah'][] = array(

			'name' => $ad['subcategory'],
			'id'   => $ad['subcategory'],
			'data' => str_replace('"', '', $datasubsekolah[$ad['subcategory']])
					
	);
}

// $drillsekolah = mysqli_query($con, "SELECT category, subcategory FROM tbl_sekolah GROUP BY category, subcategory ORDER BY nourut ASC") or die (mysqli_error());
// while($d = mysqli_fetch_assoc($drillsekolah)){		

// 		$sub = mysqli_query($con, "SELECT wilayah, SUM(jumlah) AS total FROM tbl_sekolah WHERE category = '$d[category]' AND subcategory = '$d[subcategory]' GROUP BY wilayah") or die (mysqli_error());
		
// 		while($s = mysqli_fetch_assoc($sub)){

// 				$datasub[$d['subcategory']][] =  array($s['wilayah'], (double)$s['total']);

// 		}

// 	$result['drillsekolah'][] = array(

// 			'name' => $d['category'],
// 			'id'   => str_replace(" ","",strtolower($d['category']."-".$d['subcategory'])),
// 			'data' => str_replace('"', '', $datasub[$d['subcategory']])
					
// 	);
		

// }
	
echo json_encode($result);

?>