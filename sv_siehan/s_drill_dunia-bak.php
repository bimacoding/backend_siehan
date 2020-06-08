<?php 

header('Access-Control-Allow-Origin: *');


include_once "koneksi_plasadata.php";

$drilnm = $_GET['q'];

if ($drilnm == 'agun') {
	$drillagun = mysqli_query($con, "SELECT benua FROM tbl_countrystrength GROUP BY benua") or die (mysqli_error());
	while($d = mysqli_fetch_assoc($drillagun)){		

			$sub = mysqli_query($con, "SELECT subbenua, SUM(strength) AS total FROM tbl_countrystrength WHERE subcategory = 'Defense Budget' AND benua = '$d[benua]' GROUP BY subbenua ORDER BY subbenua DESC") or die (mysqli_error());
			
			while($s = mysqli_fetch_assoc($sub)){

					$result[$d['benua']][] =  array(

						'name' => $s['subbenua'], 
						'y' => (double)$s['total'],
						'drilldown' =>  str_replace(" ","",strtolower($s['subbenua']))

					);

			}		

	}

	$drillngts = mysqli_query($con, "SELECT subbenua FROM tbl_countrystrength GROUP BY subbenua") or die (mysqli_error());
	while($dc = mysqli_fetch_assoc($drillngts)){		

			$sub = mysqli_query($con, "SELECT negara, SUM(strength) AS totals FROM tbl_countrystrength WHERE subbenua = '$dc[subbenua]' AND subcategory='Defense Budget' AND strength != 0 GROUP BY negara ORDER BY strength DESC;") or die (mysqli_error());
			
			while($s = mysqli_fetch_assoc($sub)){

					$datasub[$dc['subbenua']][] =  array($s['negara'],(double)$s['totals']);

			}

		$result['drillbgt'][] = array(

				'name' => $dc['subbenua'],
				'id'   => str_replace(" ","",strtolower($dc['subbenua'])),
				'data' => str_replace('"', '', $datasub[$dc['subbenua']])
				
						
		);
			

	}


	echo json_encode($result);

}elseif ($drilnm == 'per') {

	$drillagun = mysqli_query($con, "SELECT benua FROM tbl_countrystrength GROUP BY benua") or die (mysqli_error());
	while($d = mysqli_fetch_assoc($drillagun)){		

			$sub = mysqli_query($con, "SELECT subbenua, SUM(strength) AS total FROM tbl_countrystrength WHERE subcategory = 'Total Military Personnel' AND benua = '$d[benua]' GROUP BY subbenua ORDER BY subbenua DESC") or die (mysqli_error());
			
			while($s = mysqli_fetch_assoc($sub)){

					$result[$d['benua']][] =  array(

						'name' => $s['subbenua'], 
						'y' => (double)$s['total'],
						'drilldown' =>  str_replace(" ","",strtolower($s['subbenua']))

					);

			}		

	}

	$drillngts = mysqli_query($con, "SELECT subbenua FROM tbl_countrystrength GROUP BY subbenua") or die (mysqli_error());
	while($dc = mysqli_fetch_assoc($drillngts)){		

			$sub = mysqli_query($con, "SELECT negara, SUM(strength) AS totals FROM tbl_countrystrength WHERE subbenua = '$dc[subbenua]' AND subcategory='Total Military Personnel' AND strength != 0 GROUP BY negara ORDER BY strength DESC;") or die (mysqli_error());
			
			while($s = mysqli_fetch_assoc($sub)){

					$datasub[$dc['subbenua']][] =  array($s['negara'],(double)$s['totals']);

			}

		$result['drillbgt'][] = array(

				'name' => $dc['subbenua'],
				'id'   => str_replace(" ","",strtolower($dc['subbenua'])),
				'data' => str_replace('"', '', $datasub[$dc['subbenua']])
				
						
		);
			

	}


	echo json_encode($result);

}elseif ($drilnm == 'lnd') {

	$drillagun = mysqli_query($con, "SELECT benua FROM tbl_countrystrength GROUP BY benua") or die (mysqli_error());
	while($d = mysqli_fetch_assoc($drillagun)){		

			$sub = mysqli_query($con, "SELECT subbenua, SUM(strength) AS total FROM tbl_countrystrength WHERE subcategory = 'Square Land Area' AND benua = '$d[benua]' GROUP BY subbenua ORDER BY subbenua DESC") or die (mysqli_error());
			
			while($s = mysqli_fetch_assoc($sub)){

					$result[$d['benua']][] =  array(

						'name' => $s['subbenua'], 
						'y' => (double)$s['total'],
						'drilldown' =>  str_replace(" ","",strtolower($s['subbenua']))

					);

			}		

	}

	$drillngts = mysqli_query($con, "SELECT subbenua FROM tbl_countrystrength GROUP BY subbenua") or die (mysqli_error());
	while($dc = mysqli_fetch_assoc($drillngts)){		

			$sub = mysqli_query($con, "SELECT negara, SUM(strength) AS totals FROM tbl_countrystrength WHERE subbenua = '$dc[subbenua]' AND subcategory='Square Land Area' AND strength != 0 GROUP BY negara ORDER BY strength DESC;") or die (mysqli_error());
			
			while($s = mysqli_fetch_assoc($sub)){

					$datasub[$dc['subbenua']][] =  array($s['negara'],(double)$s['totals']);

			}

		$result['drillbgt'][] = array(

				'name' => $dc['subbenua'],
				'id'   => str_replace(" ","",strtolower($dc['subbenua'])),
				'data' => str_replace('"', '', $datasub[$dc['subbenua']])
				
						
		);
			

	}


	echo json_encode($result);

}elseif ($drilnm == 'oil') {
	
	$drillagun = mysqli_query($con, "SELECT benua FROM tbl_countrystrength GROUP BY benua") or die (mysqli_error());
	while($d = mysqli_fetch_assoc($drillagun)){		

			$sub = mysqli_query($con, "SELECT subbenua, SUM(strength) AS total FROM tbl_countrystrength WHERE subcategory = 'Proven Oil Reserves' AND benua = '$d[benua]' GROUP BY subbenua ORDER BY subbenua DESC") or die (mysqli_error());
			
			while($s = mysqli_fetch_assoc($sub)){

					$result[$d['benua']][] =  array(

						'name' => $s['subbenua'], 
						'y' => (double)$s['total'],
						'drilldown' =>  str_replace(" ","",strtolower($s['subbenua']))

					);

			}		

	}

	$drillngts = mysqli_query($con, "SELECT subbenua FROM tbl_countrystrength GROUP BY subbenua") or die (mysqli_error());
	while($dc = mysqli_fetch_assoc($drillngts)){		

			$sub = mysqli_query($con, "SELECT negara, SUM(strength) AS totals FROM tbl_countrystrength WHERE subbenua = '$dc[subbenua]' AND subcategory='Proven Oil Reserves' AND strength != 0 GROUP BY negara ORDER BY strength DESC;") or die (mysqli_error());
			
			while($s = mysqli_fetch_assoc($sub)){

					$datasub[$dc['subbenua']][] =  array($s['negara'],(double)$s['totals']);

			}

		$result['drillbgt'][] = array(

				'name' => $dc['subbenua'],
				'id'   => str_replace(" ","",strtolower($dc['subbenua'])),
				'data' => str_replace('"', '', $datasub[$dc['subbenua']])
				
						
		);
			

	}


	echo json_encode($result);
}


?>
