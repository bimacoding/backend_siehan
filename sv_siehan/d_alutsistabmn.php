<?php 

header('Access-Control-Allow-Origin: *');

include_once "koneksi_plasadata.php";

if(isset($_GET['matra'])){

	$matra = $_GET['matra'];

}

if($matra == 'tniad'){


$drill_ad  = mysqli_query($con, "SELECT kategori FROM tbl_trekapalut WHERE matra = 'AD' GROUP BY kategori") or die (mysqli_error());
while($ad = mysqli_fetch_assoc($drill_ad)){		

		$subad = mysqli_query($con, "SELECT subkategori, jumlah FROM tbl_trekapalut WHERE matra = 'AD' AND subkategori != '' AND kategori = '$ad[kategori]' ") or die (mysqli_error());
		
		while($sad = mysqli_fetch_assoc($subad)){

				$datasubad[$ad['kategori']][] =  array($sad['subkategori'],(double)$sad['jumlah']);

		}

	$resultad[] = array(

			'name' => $ad['kategori'],
			'id'   => str_replace(" ","",strtolower($ad['kategori'])),
			'data' => str_replace('"', '', $datasubad[$ad['kategori']])
					
	);
		

}
	
echo json_encode($resultad);


}elseif($matra == 'tnial'){

$drill_al  = mysqli_query($con, "SELECT kategori FROM tbl_trekapalut WHERE matra = 'AL' GROUP BY kategori") or die (mysqli_error());
while($al = mysqli_fetch_assoc($drill_al)){		

		$subal = mysqli_query($con, "SELECT subkategori, jumlah FROM tbl_trekapalut WHERE matra = 'AL' AND subkategori != '' AND kategori = '$al[kategori]' ") or die (mysqli_error());
		
		while($sal = mysqli_fetch_assoc($subal)){

				$datasubal[$al['kategori']][] =  array($sal['subkategori'],(double)$sal['jumlah']);

		}

	$resultal[] = array(

			'name' => $al['kategori'],
			'id'   => str_replace(" ","",strtolower($al['kategori'])),
			'data' => str_replace('"', '', $datasubal[$al['kategori']])
					
	);
		

}
	
echo json_encode($resultal);

}elseif($matra == 'tniau'){

$drill_au  = mysqli_query($con, "SELECT kategori FROM tbl_trekapalut WHERE matra = 'AU' GROUP BY kategori") or die (mysqli_error());
while($au = mysqli_fetch_assoc($drill_au)){		

		$subau = mysqli_query($con, "SELECT subkategori, jumlah FROM tbl_trekapalut WHERE matra = 'AU' AND subkategori != '' AND kategori = '$au[kategori]' ") or die (mysqli_error());
		
		while($sau = mysqli_fetch_assoc($subau)){

				$datasubau[$au['kategori']][] =  array($sau['subkategori'],(double)$sau['jumlah']);

		}

	$resultal[] = array(

			'name' => $au['kategori'],
			'id'   => str_replace(" ","",strtolower($au['kategori'])),
			'data' => str_replace('"', '', $datasubau[$au['kategori']])
					
	);
		

}
	
echo json_encode($resultal);

}

?>