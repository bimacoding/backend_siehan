<?php 

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once "koneksi_plasadata.php";


$idxlstr = mysqli_query($con, "SELECT kategori, SUM(jumlah) AS total, (SELECT SUM(total) FROM tbl_covid19 ) AS jml FROM tbl_lingstra WHERE kategori!='SIBER' GROUP BY kategori ORDER BY kategori DESC") or die (mysqli_error());
while($i = mysqli_fetch_assoc($idxlstr)){

	if ($i['kategori']=='PENYAKIT') {
		$total = (double)$i['total'] + (double)$i['jml'];
	}else{
		$total = (double)$i['total'];
	}

	$result['idxme'][] = array(

			'name' 		=> $i['kategori'],
			'y'   		=> $total,
			'drilldown' => str_replace(" ","",strtolower($i['kategori']))
					
	);
}		

$drilllstr = mysqli_query($con, "SELECT kategori FROM tbl_lingstra GROUP BY kategori") or die (mysqli_error());
while($d = mysqli_fetch_assoc($drilllstr)){		

		$sub = mysqli_query($con, "SELECT wilayah, SUM(jumlah) AS total FROM tbl_lingstra WHERE kategori = '$d[kategori]' GROUP BY wilayah") or die (mysqli_error());

		
		
		while($s = mysqli_fetch_assoc($sub)){
			 

				$datasub[$d['kategori']][] = array($s['wilayah'], (double)$s['total']);

		}

	$dd = mysqli_fetch_assoc(mysqli_query($con, "SELECT SUM(total) as jml FROM tbl_covid19"));
	$kk = [['COVID-19', (double)$dd['jml']]];

	if ($d['kategori']=='PENYAKIT') {

		$mn = array(

			'name' => $d['kategori'],
			'id'   => str_replace(" ","",strtolower($d['kategori'])),
			'data' => array_merge(str_replace('"', '', $datasub[$d['kategori']]), $kk)
						
		);

	}else{

		$mn = array(

			'name' => $d['kategori'],
			'id'   => str_replace(" ","",strtolower($d['kategori'])),
			'data' => str_replace('"', '', $datasub[$d['kategori']])
						
		);

	}

	$result['drillme'][] = $mn;
		

}





echo json_encode($result);



?>