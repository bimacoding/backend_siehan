<?php 
header('Access-Control-Allow-Origin: *');
header("Content-type: application/json; charset=utf-8");


include_once "koneksi_plasadata.php";

$alut_ad = mysqli_query($con, "SELECT negara, subbenua, subcategory, SUM(strength) AS total FROM tbl_countrystrength 
									WHERE category='LAND SYSTEMS' AND subbenua = 'Asia Tenggara'
									GROUP BY negara ORDER BY SUM(strength) DESC") or die (mysqli_error());
		
		while($ad = mysqli_fetch_assoc($alut_ad)){

		$result['alutad'][] = array(

			'name' => $ad['negara'],
			'y'    => (int)$ad['total']

		);

		
}

$alut_al = mysqli_query($con, "SELECT negara, subbenua, subcategory, SUM(strength) AS total FROM tbl_countrystrength 
							WHERE category='NAVAL POWER' AND subcategory != 'Total Naval Strength' AND subbenua = 'Asia Tenggara'
							GROUP BY negara ORDER BY SUM(strength) DESC") or die (mysqli_error());
		
		while($al = mysqli_fetch_assoc($alut_al)){

		$result['alutal'][] = array(

			'name' => $al['negara'],
			'y'    => (int)$al['total']

		);
}


$alut_au = mysqli_query($con, "SELECT negara, subbenua,subcategory, SUM(strength) AS total FROM tbl_countrystrength 
							WHERE category='AIR POWER' AND subcategory != 'Total Aircraft' AND subbenua = 'Asia Tenggara'
							GROUP BY negara ORDER BY SUM(strength) DESC") or die (mysqli_error());
		
		while($au = mysqli_fetch_assoc($alut_au)){

		$result['alutau'][] = array(

			'name' => $au['negara'],
			'y'    => (int)$au['total']

		);
}

$result['judulad'] = "ANGKATAN DARAT";
$result['judulal'] = "ANGKATAN LAUT";
$result['judulau'] = "ANGKATAN UDARA";

echo json_encode($result);


?>