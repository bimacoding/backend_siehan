<?php 

header('Access-Control-Allow-Origin: *');

include_once "koneksi_plasadata.php";


$idxbgt = mysqli_query($con, "SELECT benua, SUM(strength) AS total FROM tbl_countrystrength WHERE subcategory = 'Total Military Personnel' GROUP BY benua ORDER BY benua DESC") or die (mysqli_error());
while($i = mysqli_fetch_assoc($idxbgt)){

	$result['idxbgt'][] = array(

			'name' 		=> $i['benua'],
			'y'   		=> floatval($i['total']),
			'drilldown' => str_replace(" ","",strtolower($i['benua']))
					
	);

}		

$drillngt = mysqli_query($con, "SELECT benua FROM tbl_countrystrength GROUP BY benua") or die (mysqli_error());
while($d = mysqli_fetch_assoc($drillngt)){		

		$sub = mysqli_query($con, "SELECT negara, SUM(strength) AS totals FROM tbl_countrystrength WHERE benua = '$d[benua]' AND subcategory='Total Military Personnel' AND strength != 0 GROUP BY negara ORDER BY strength DESC") or die (mysqli_error());
		
		while($s = mysqli_fetch_assoc($sub)){

				$datasub[$d['benua']][] =  array(

					'name' => $s['negara'], 
					'y' => (double)$s['totals'],
					'drilldown' =>  str_replace(" ","",strtolower($s['negara']))

				);

		}

	$result['drillbgt'][] = array(

			'name' => $d['benua'],
			'id'   => str_replace(" ","",strtolower($d['benua'])),
			'data' => str_replace('"', '', $datasub[$d['benua']])
					
	);
		

}

$drillngts = mysqli_query($con, "SELECT negara FROM tbl_countrystrength GROUP BY negara") or die (mysqli_error());
while($dx = mysqli_fetch_assoc($drillngts)){		

		$subs = mysqli_query($con, "SELECT subcategory, strength AS totalss FROM tbl_countrystrength WHERE negara = '$dx[negara]' ORDER BY strength DESC") or die (mysqli_error());
		
		while($sx = mysqli_fetch_assoc($subs)){

				$datasubs[$dx['negara']][] =  array($sx['subcategory'], (double)$sx['totalss']

				);

		}

	$result['drillngts'][] = array(

			'name' => $dx['negara'],
			'id'   => str_replace(" ","",strtolower($dx['negara'])),
			'data' => str_replace('"', '', $datasubs[$dx['negara']])
					
	);
		

}


	
echo json_encode($result);



?>