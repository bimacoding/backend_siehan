<?php 

header('Access-Control-Allow-Origin: *');

include_once "koneksi_plasadata.php";
$nm = $_GET['p'];
if ($nm=='agun') {
	$idxagun = mysqli_query($con, "SELECT benua, SUM(strength) AS total FROM tbl_countrystrength WHERE subcategory = 'Defense Budget' GROUP BY benua ORDER BY benua DESC") or die (mysqli_error());
	while($i = mysqli_fetch_assoc($idxagun)){

		$resultagun['idxagun'][] = array(

				'name' 		=> $i['benua'],
				'y'   		=> floatval($i['total']),
				'drilldown' => str_replace(" ","",strtolower($i['benua']))
						
		);

	}	

	echo json_encode($resultagun);

}elseif ($nm=='per') {

	$idxper = mysqli_query($con, "SELECT benua, SUM(strength) AS total FROM tbl_countrystrength WHERE subcategory = 'Total Military Personnel' GROUP BY benua ORDER BY benua DESC") or die (mysqli_error());
	while($i = mysqli_fetch_assoc($idxper)){

		$resultper['idxper'][] = array(

				'name' 		=> $i['benua'],
				'y'   		=> floatval($i['total']),
				'drilldown' => str_replace(" ","",strtolower($i['benua']))
						
		);

	}	

	echo json_encode($resultper);

}elseif ($nm=='lnd') {

	$idxlnd = mysqli_query($con, "SELECT benua, SUM(strength) AS total FROM tbl_countrystrength WHERE subcategory = 'Square Land Area' GROUP BY benua ORDER BY benua DESC") or die (mysqli_error());
	while($i = mysqli_fetch_assoc($idxlnd)){

		$resultlnd['idxlnd'][] = array(

				'name' 		=> $i['benua'],
				'y'   		=> floatval($i['total']),
				'drilldown' => str_replace(" ","",strtolower($i['benua']))
						
		);

	}	

	echo json_encode($resultlnd);

}elseif ($nm=='oil') {

	$idxoil = mysqli_query($con, "SELECT benua, SUM(strength) AS total FROM tbl_countrystrength WHERE subcategory = 'Proven Oil Reserves' GROUP BY benua ORDER BY benua DESC") or die (mysqli_error());
	while($i = mysqli_fetch_assoc($idxoil)){

		$resultoil['idxoil'][] = array(

				'name' 		=> $i['benua'],
				'y'   		=> floatval($i['total']),
				'drilldown' => str_replace(" ","",strtolower($i['benua']))
						
		);

	}	

	echo json_encode($resultoil);
		
}

?>

