<?php 
header('Access-Control-Allow-Origin: *');
header("Content-type: application/json; charset=utf-8");

include_once "koneksi_plasadata.php";

if(isset($_GET['matra'])){

	$matra = $_GET['matra'];

}

if($matra == 'tniad'){

$alut_ad = mysqli_query($con, "SELECT kategori, SUM(jumlah) AS total FROM tbl_trekapalut WHERE matra = 'AD' GROUP BY kategori") or die (mysqli_error());
		
		while($ad = mysqli_fetch_assoc($alut_ad)){

		$result['aluttni'][] = array(

			'name' => $ad['kategori'],
			'y'    => (int)$ad['total'],
			'drilldown' => str_replace(" ","",strtolower($ad['kategori']))

		);

		
}

$drillad = mysqli_query($con, "SELECT kategori, SUM(jumlah) AS total FROM tbl_trekapalut WHERE matra = 'AD' GROUP BY kategori") or die (mysqli_error());
while($dad = mysqli_fetch_assoc($drillad)){		

		$subad = mysqli_query($con, "SELECT kategori, subkategori AS nama, jumlah FROM tbl_trekapalut WHERE matra = 'AD' AND kategori = '$dad[kategori]' GROUP BY subkategori, kategori, matra ORDER BY jumlah DESC") or die (mysqli_error());
		
		while($sad = mysqli_fetch_assoc($subad)){

				$datasubad[] =  array($sad['nama'], (double)$sad['jumlah']);

		}

	$result['drillad'][] = array(

			'name' => $dad['kategori'],
			'id'   => str_replace(" ","",strtolower($dad['kategori'])),
			'data' => str_replace('"', '', $datasubad)
					
	);
		

}

	$result['namamatra'] = "TNI ANGKATAN DARAT";
	echo json_encode($result);

}
elseif($matra == 'tnial'){

$alut_al = mysqli_query($con, "SELECT kategori, SUM(jumlah) AS total FROM tbl_trekapalut WHERE matra = 'AL' GROUP BY kategori") or die (mysqli_error());
		
		while($al = mysqli_fetch_assoc($alut_al)){

		$result['aluttni'][] = array(

			'name' => $al['kategori'],
			'y'    => (int)$al['total'],
			'drilldown' => str_replace(" ","",strtolower($al['kategori']))

		);
}

$drillal = mysqli_query($con, "SELECT kategori, SUM(jumlah) AS total FROM tbl_trekapalut WHERE matra = 'AL' GROUP BY kategori") or die (mysqli_error());
while($dal = mysqli_fetch_assoc($drillal)){		

		$subal = mysqli_query($con, "SELECT kategori, subkategori AS nama, jumlah FROM tbl_trekapalut WHERE matra = 'AL' AND kategori = '$dal[kategori]' GROUP BY subkategori, kategori, matra ORDER BY jumlah DESC") or die (mysqli_error());
		
		while($sal = mysqli_fetch_assoc($subal)){

				$datasubal[] =  array($sal['nama'], (double)$sal['jumlah']);

		}

	$result['drillal'][] = array(

			'name' => $dal['kategori'],
			'id'   => str_replace(" ","",strtolower($dal['kategori'])),
			'data' => str_replace('"', '', $datasubal)
					
	);
		

}

	$result['namamatra'] = "TNI ANGKATAN LAUT";
	echo json_encode($result);

}
elseif($matra == 'tniau'){

$alut_au = mysqli_query($con, "SELECT kategori, SUM(jumlah) AS total FROM tbl_trekapalut WHERE matra = 'AU' GROUP BY kategori") or die (mysqli_error());
		
		while($au = mysqli_fetch_assoc($alut_au)){

		$result['aluttni'][] = array(

			'name' => $au['kategori'],
			'y'    => (int)$au['total'],
			'drilldown' => str_replace(" ","",strtolower($au['kategori']))

		);
}

$drillau = mysqli_query($con, "SELECT kategori, SUM(jumlah) AS total FROM tbl_trekapalut WHERE matra = 'AU' GROUP BY kategori") or die (mysqli_error());
while($dau = mysqli_fetch_assoc($drillau)){		

		$subau = mysqli_query($con, "SELECT kategori, subkategori AS nama, jumlah FROM tbl_trekapalut WHERE matra = 'AU' AND kategori = '$dau[kategori]' GROUP BY subkategori, kategori, matra ORDER BY jumlah DESC") or die (mysqli_error());
		
		while($sau = mysqli_fetch_assoc($subau)){

				$datasubau[] =  array($sau['nama'], (double)$sau['jumlah']);

		}

	$result['drillau'][] = array(

			'name' => $dau['kategori'],
			'id'   => str_replace(" ","",strtolower($dau['kategori'])),
			'data' => str_replace('"', '', $datasubau)
					
	);
		

}

$result['namamatra'] = "TNI ANGKATAN UDARA";
echo json_encode($result);

}elseif($matra == 'fulltni'){

$alut = mysqli_query($con, "SELECT matra, SUM(jumlah) AS total FROM tbl_trekapalut GROUP BY matra") or die (mysqli_error());
		
		while($row = mysqli_fetch_assoc($alut)){

		$result['aluttni'][] = array(

			'name' => $row['matra'],
			'y'    => (int)$row['total'],
			'drilldown'  => str_replace(" ","",strtolower($row['matra']))

		);
}

$result['namamatra'] = "TNI";
echo json_encode($result);

}



?>