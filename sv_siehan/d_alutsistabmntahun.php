<?php 
error_reporting(1) ;
header('Access-Control-Allow-Origin: *');

include_once "koneksi_plasadata.php";
$getTahunNow = date('Y');
if(isset($_GET['matra'])){

	$matra = $_GET['matra'];

}

if($matra == 'tniadtahun'){


$drill_ad  = mysqli_query($con, "SELECT kategori FROM tbl_alutmatra WHERE ('$getTahunNow'-tahun) > 50 
AND (tahun!='' OR tahun!='-') AND matra = 'TNI AD'
GROUP BY kategori") or die (mysqli_error());
while($ad = mysqli_fetch_assoc($drill_ad)){

		$subad = mysqli_query($con, "SELECT subkategori, SUM(CAST(REPLACE(jumlah,',','') AS UNSIGNED)) AS jumlahs 
FROM tbl_alutmatra WHERE ('$getTahunNow'-tahun) > 50 
AND (tahun!='' OR tahun!='-') AND matra = 'TNI AD' AND kategori='$ad[kategori]'
GROUP BY subkategori") or die (mysqli_error());
		
		while($sad = mysqli_fetch_assoc($subad)){

				$datasubad[$ad['kategori']][] =  array($sad['subkategori'],(double)$sad['jumlahs']);

		}

	$resultad[] = array(

			'name' => $ad['kategori'],
			'id'   => str_replace(" ","",strtolower($ad['kategori'])),
			'data' => str_replace('"', '', $datasubad[$ad['kategori']])
			
	);

}

echo json_encode($resultad);


}elseif($matra == 'tnialtahun'){

$drill_al  = mysqli_query($con, "SELECT kategori FROM tbl_alutmatra WHERE ('$getTahunNow'-tahun) > 50 
AND (tahun!='' OR tahun!='-') AND matra = 'TNI AL'
GROUP BY kategori") or die (mysqli_error());
while($al = mysqli_fetch_assoc($drill_al)){		

		$subal = mysqli_query($con, "SELECT subkategori, SUM(CAST(REPLACE(jumlah,',','') AS UNSIGNED)) AS jumlah 
FROM tbl_alutmatra WHERE ('$getTahunNow'-tahun) > 50 
AND (tahun!='' OR tahun!='-') AND matra = 'TNI AL' AND kategori='$al[kategori]'
GROUP BY subkategori") or die (mysqli_error());
		
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

}elseif($matra == 'tniautahun'){

$drill_au  = mysqli_query($con, "SELECT kategori FROM tbl_alutmatra WHERE ('$getTahunNow'-tahun) > 50 
AND (tahun!='' OR tahun!='-') AND matra = 'TNI AU'
GROUP BY kategori") or die (mysqli_error());
while($au = mysqli_fetch_assoc($drill_au)){		

		$subau = mysqli_query($con, "SELECT subkategori, SUM(CAST(REPLACE(jumlah,',','') AS UNSIGNED)) AS jumlah 
FROM tbl_alutmatra WHERE ('$getTahunNow'-tahun) > 50 
AND (tahun!='' OR tahun!='-') AND matra = 'TNI AU' AND kategori='$au[kategori]'
GROUP BY subkategori") or die (mysqli_error());
		
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