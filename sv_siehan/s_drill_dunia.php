<?php 

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');



include_once "koneksi_plasadata.php";

$drilnm = $_GET['q'];

if ($drilnm == 'agun') {
	$drillagun = mysqli_query($con, "SELECT subbenua FROM tbl_countrystrength GROUP BY subbenua") or die (mysqli_error());
	while($d = mysqli_fetch_assoc($drillagun)){		

			$sub = mysqli_query($con, "SELECT negara, SUM(strength) AS total FROM tbl_countrystrength WHERE subcategory = 'Anggaran Pertahanan' AND subbenua = '$d[subbenua]' AND strength != 0 GROUP BY negara ORDER BY negara DESC") or die (mysqli_error());
			
			while($s = mysqli_fetch_assoc($sub)){

					$result[$d['subbenua']][] =  array(

						'name' => $s['negara'], 
						'y' => (double)$s['total'],
						'drilldown' =>  str_replace(" ","",strtolower($s['negara']))

					);

			}		

	}

	$drillngts = mysqli_query($con, "SELECT negara FROM tbl_countrystrength GROUP BY negara") or die (mysqli_error());
	while($dc = mysqli_fetch_assoc($drillngts)){		

			$sub = mysqli_query($con, "SELECT negara, subcategory, SUM(strength) AS totals FROM tbl_countrystrength WHERE negara = '$dc[negara]' AND category='FINANCIALS' AND strength != 0 GROUP BY subcategory ORDER BY strength DESC;") or die (mysqli_error());
			
			while($s = mysqli_fetch_assoc($sub)){

					$datasub[$dc['negara']][] =  array($s['subcategory'],(double)$s['totals']);

			}

		$result['drillbgt'][] = array(

				'name' => $dc['negara'],
				'id'   => str_replace(" ","",strtolower($dc['negara'])),
				'data' => str_replace('"', '', $datasub[$dc['negara']])
				
						
		);
			

	}


	echo json_encode($result);

}elseif ($drilnm == 'per') {

	$drillagun = mysqli_query($con, "SELECT subbenua FROM tbl_countrystrength GROUP BY subbenua") or die (mysqli_error());
	while($d = mysqli_fetch_assoc($drillagun)){		

			$sub = mysqli_query($con, "SELECT negara, SUM(strength) AS total FROM tbl_countrystrength WHERE subcategory = 'Total Personil Militer' AND subbenua = '$d[subbenua]' AND strength != 0 GROUP BY negara ORDER BY negara DESC") or die (mysqli_error());
			
			while($s = mysqli_fetch_assoc($sub)){

					$result[$d['subbenua']][] =  array(

						'name' => $s['negara'], 
						'y' => (double)$s['total'],
						'drilldown' =>  str_replace(" ","",strtolower($s['negara']))

					);

			}		

	}

	$drillngts = mysqli_query($con, "SELECT negara FROM tbl_countrystrength GROUP BY negara") or die (mysqli_error());
	while($dc = mysqli_fetch_assoc($drillngts)){		

			$sub = mysqli_query($con, "SELECT negara, subcategory, SUM(strength) AS totals FROM tbl_countrystrength WHERE negara = '$dc[negara]' AND category='MANPOWER' AND category != 'Fit-For-Service' AND strength != 0 GROUP BY subcategory ORDER BY strength DESC;") or die (mysqli_error());
			
			while($s = mysqli_fetch_assoc($sub)){

					$datasub[$dc['negara']][] =  array($s['subcategory'],(double)$s['totals']);

			}

		$result['drillbgt'][] = array(

				'name' => $dc['negara'],
				'id'   => str_replace(" ","",strtolower($dc['negara'])),
				'data' => str_replace('"', '', $datasub[$dc['negara']])
				
						
		);
			

	}


	echo json_encode($result);

}elseif ($drilnm == 'lnd') {

	$drillagun = mysqli_query($con, "SELECT subbenua FROM tbl_countrystrength GROUP BY subbenua") or die (mysqli_error());
	while($d = mysqli_fetch_assoc($drillagun)){		

			$sub = mysqli_query($con, "SELECT negara, SUM(strength) AS total FROM tbl_countrystrength WHERE subcategory = 'Luas Tanah Persegi' AND subbenua = '$d[subbenua]' AND strength != 0 GROUP BY negara ORDER BY negara DESC") or die (mysqli_error());
			
			while($s = mysqli_fetch_assoc($sub)){

					$result[$d['subbenua']][] =  array(

						'name' => $s['negara'], 
						'y' => (double)$s['total'],
						'drilldown' =>  str_replace(" ","",strtolower($s['negara']))

					);

			}		

	}

	$drillngts = mysqli_query($con, "SELECT negara FROM tbl_countrystrength GROUP BY negara") or die (mysqli_error());
	while($dc = mysqli_fetch_assoc($drillngts)){		

			$sub = mysqli_query($con, "SELECT negara, subcategory, SUM(strength) AS totals FROM tbl_countrystrength WHERE negara = '$dc[negara]' AND category='GEOGRAPHY' AND strength != 0 GROUP BY subcategory ORDER BY strength DESC;") or die (mysqli_error());
			
			while($s = mysqli_fetch_assoc($sub)){

					$datasub[$dc['negara']][] =  array($s['subcategory'],(double)$s['totals']);

			}

		$result['drillbgt'][] = array(

				'name' => $dc['negara'],
				'id'   => str_replace(" ","",strtolower($dc['negara'])),
				'data' => str_replace('"', '', $datasub[$dc['negara']])
				
						
		);
			

	}


	echo json_encode($result);

}elseif ($drilnm == 'oil') {
	
	$drillagun = mysqli_query($con, "SELECT subbenua FROM tbl_countrystrength GROUP BY subbenua") or die (mysqli_error());
	while($d = mysqli_fetch_assoc($drillagun)){		

			$sub = mysqli_query($con, "SELECT negara, SUM(strength) AS total FROM tbl_countrystrength WHERE subcategory = 'Cadangan Minyak Tersedia' AND subbenua = '$d[subbenua]' AND strength != 0 GROUP BY negara ORDER BY negara DESC") or die (mysqli_error());
			
			while($s = mysqli_fetch_assoc($sub)){

					$result[$d['subbenua']][] =  array(

						'name' => $s['negara'], 
						'y' => (double)$s['total'],
						'drilldown' =>  str_replace(" ","",strtolower($s['negara']))

					);

			}		

	}

	$drillngts = mysqli_query($con, "SELECT negara FROM tbl_countrystrength GROUP BY negara") or die (mysqli_error());
	while($dc = mysqli_fetch_assoc($drillngts)){		

			$sub = mysqli_query($con, "SELECT negara, subcategory, SUM(strength) AS totals FROM tbl_countrystrength WHERE negara = '$dc[negara]' AND category='PETROLEUM RESOURCES' AND strength != 0 GROUP BY subcategory ORDER BY strength DESC;") or die (mysqli_error());
			
			while($s = mysqli_fetch_assoc($sub)){

					$datasub[$dc['negara']][] =  array($s['subcategory'],(double)$s['totals']);

			}

		$result['drillbgt'][] = array(

				'name' => $dc['negara'],
				'id'   => str_replace(" ","",strtolower($dc['negara'])),
				'data' => str_replace('"', '', $datasub[$dc['negara']])
				
						
		);
			

	}


	echo json_encode($result);
}


?>
