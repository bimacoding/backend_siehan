<?php 

header('Access-Control-Allow-Origin: *');

include_once "koneksi_plasadata.php";
$nm = $_GET['p'];
if ($nm=='agun') {
	$idxagun = mysqli_query($con, "SELECT subbenua, SUM(strength) AS total FROM tbl_countrystrength WHERE subcategory = 'Anggaran Pertahanan' GROUP BY subbenua ORDER BY subbenua DESC") or die (mysqli_error());
	while($i = mysqli_fetch_assoc($idxagun)){

		$resultagun['idxagun'][] = array(

				'name' 		=> $i['subbenua'],
				'y'   		=> floatval($i['total'])
						
		);

	}	

	echo json_encode($resultagun);

}elseif ($nm=='per') {

	$idxper = mysqli_query($con, "SELECT subbenua, SUM(strength) AS total FROM tbl_countrystrength WHERE subcategory = 'Total Personil Militer' GROUP BY subbenua ORDER BY subbenua DESC") or die (mysqli_error());
	while($i = mysqli_fetch_assoc($idxper)){

		$resultper['idxper'][] = array(

				'name' 		=> $i['subbenua'],
				'y'   		=> floatval($i['total'])
						
		);

	}	

	echo json_encode($resultper);

}elseif ($nm=='lnd') {

	$idxlnd = mysqli_query($con, "SELECT subbenua, SUM(strength) AS total FROM tbl_countrystrength WHERE subcategory = 'Luas Tanah Persegi' GROUP BY subbenua ORDER BY subbenua DESC") or die (mysqli_error());
	while($i = mysqli_fetch_assoc($idxlnd)){

		$resultlnd['idxlnd'][] = array(

				'name' 		=> $i['subbenua'],
				'y'   		=> floatval($i['total'])
						
		);

	}	

	echo json_encode($resultlnd);

}elseif ($nm=='oil') {

	$idxoil = mysqli_query($con, "SELECT subbenua, SUM(strength) AS total FROM tbl_countrystrength WHERE subcategory = 'Cadangan Minyak Tersedia' GROUP BY subbenua ORDER BY subbenua DESC") or die (mysqli_error());
	while($i = mysqli_fetch_assoc($idxoil)){

		$resultoil['idxoil'][] = array(

				'name' 		=> $i['subbenua'],
				'y'   		=> floatval($i['total'])
						
		);

	}	

	echo json_encode($resultoil);
		
}

?>

