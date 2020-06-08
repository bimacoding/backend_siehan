<?php 
header('Access-Control-Allow-Origin: *');
header("Content-type: application/json; charset=utf-8");

include_once "koneksi_plasadata.php";

if(isset($_GET['matra'])){

	$matra = $_GET['matra'];

}

if($matra == 'tniad'){

$alut_ad = mysqli_query($con, "SELECT negara, subbenua, subcategory, SUM(strength) AS total FROM tbl_countrystrength
									WHERE category = 'LAND SYSTEMS' AND negara = 'Indonesia' 
									GROUP BY subcategory
									ORDER BY SUM(strength) DESC") or die (mysqli_error());
		
		while($ad = mysqli_fetch_assoc($alut_ad)){

		$result['aluttni'][] = array(

			'name' => $ad['subcategory'],
			'y'    => (int)$ad['total']

		);

		
}
	$result['namamatra'] = "TNI ANGKATAN DARAT";
	echo json_encode($result);

}
elseif($matra == 'tnial'){

$alut_al = mysqli_query($con, "SELECT negara, subbenua, subcategory, SUM(strength) AS total FROM tbl_countrystrength
									WHERE category='NAVAL POWER' AND negara = 'Indonesia' 
									GROUP BY subcategory
									ORDER BY SUM(strength) DESC") or die (mysqli_error());
		
		while($al = mysqli_fetch_assoc($alut_al)){

		$result['aluttni'][] = array(

			'name' => $al['subcategory'],
			'y'    => (int)$al['total']

		);
}
	$result['namamatra'] = "TNI ANGKATAN LAUT";
	echo json_encode($result);

}
elseif($matra == 'tniau'){

$alut_au = mysqli_query($con, "SELECT negara, subbenua, subcategory, SUM(strength) AS total FROM tbl_countrystrength
									WHERE category='AIR POWER' AND negara = 'Indonesia' 
									GROUP BY subcategory
									ORDER BY SUM(strength) DESC") or die (mysqli_error());
		
		while($au = mysqli_fetch_assoc($alut_au)){

		$result['aluttni'][] = array(

			'name' => $au['subcategory'],
			'y'    => (int)$au['total']

		);
}
$result['namamatra'] = "TNI ANGKATAN UDARA";
echo json_encode($result);

}elseif($matra == 'fulltni'){

$alut = mysqli_query($con, "SELECT negara, subcategory, category, SUM(strength) AS total FROM tbl_countrystrength 
							     WHERE category IN ('LAND SYSTEMS','NAVAL POWER','AIR POWER') AND subcategory NOT IN ('Total Aircraft','Total Naval Strength') AND negara = 'Indonesia'
							     GROUP BY category, negara") or die (mysqli_error());
		
		while($row = mysqli_fetch_assoc($alut)){

		$result['aluttni'][] = array(

			'name' => $row['category'],
			'y'    => (int)$row['total'],
			'drilldown'  => str_replace(" ","",strtolower($row['category']))

		);
}
$result['namamatra'] = "TNI";
echo json_encode($result);

}



?>