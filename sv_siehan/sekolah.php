<?php 
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once "koneksi_plasadata.php";

$sekolah  = mysqli_query($con, "SELECT subcategory FROM tbl_sekolah GROUP BY subcategory ORDER BY nourut ASC") or die (mysqli_error());

while($ad = mysqli_fetch_assoc($sekolah)){		

		$subsekolah = mysqli_query($con, "SELECT subcategory, category, SUM(jumlah) AS total, nourut FROM tbl_sekolah WHERE subcategory = '$ad[subcategory]' GROUP BY category ORDER BY nourut") or die (mysqli_error());
		
		while($sad = mysqli_fetch_assoc($subsekolah)){

				$datasubsekolah[$ad['subcategory']][] =  array(
					'name' => $sad['category'],
					'y' => (double)$sad['total'],
					'drilldown' => str_replace(" ","",strtolower($sad['category']."-".$sad['subcategory']))
				);

		}

	$result['idxsekolah'][] = array(

			'name' => $ad['subcategory'],
			'data' => str_replace('"', '', $datasubsekolah[$ad['subcategory']]),
			'stack'=> $ad['subcategory']
					
	);
}

$drillsekolah = mysqli_query($con, "SELECT category, subcategory FROM tbl_sekolah GROUP BY category, subcategory ORDER BY nourut ASC") or die (mysqli_error());
while($d = mysqli_fetch_assoc($drillsekolah)){		

		$sub = mysqli_query($con, "SELECT wilayah, SUM(jumlah) AS total FROM tbl_sekolah WHERE category = '$d[category]' AND subcategory = '$d[subcategory]' AND jumlah != 0 GROUP BY wilayah") or die (mysqli_error());
		
		while($s = mysqli_fetch_assoc($sub)){

				$datasub[$d['category']][$d['subcategory']][] =  array($s['wilayah'], (double)$s['total']);

		}

	$result['drillsekolah'][] = array(

			'name' => $d['category'].' '.$d['subcategory'],
			'id'   => str_replace(" ","",strtolower($d['category']."-".$d['subcategory'])),
			'data' => $datasub[$d['category']][$d['subcategory']]
					
	);
		

}
	
echo json_encode($result);
?>