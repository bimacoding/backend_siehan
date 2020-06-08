<?php 

header('Access-Control-Allow-Origin: *');

include_once "koneksi_plasadata.php";


$idxibadah = mysqli_query($con, "SELECT kategori, SUM(jumlah) AS total FROM tbl_ibadah GROUP BY kategori ORDER BY kategori DESC") or die (mysqli_error());
while($i = mysqli_fetch_assoc($idxibadah)){

	$result['idxibd'][] = array(

			'name' 		=> $i['kategori'],
			'y'   		=> (double)$i['total'],
			'drilldown' => str_replace(" ","",strtolower($i['kategori']))
					
	);

}		

$drillibadah = mysqli_query($con, "SELECT kategori FROM tbl_ibadah GROUP BY kategori") or die (mysqli_error());
while($d = mysqli_fetch_assoc($drillibadah)){		

		$sub = mysqli_query($con, "SELECT wilayah, jumlah FROM tbl_ibadah WHERE kategori = '$d[kategori]' ORDER BY jumlah DESC") or die (mysqli_error());
		
		while($s = mysqli_fetch_assoc($sub)){

				$datasub[$d['kategori']][] =  array($s['wilayah'], (double)$s['jumlah']);

		}

	$result['drillibd'][] = array(

			'name' => $d['kategori'],
			'id'   => str_replace(" ","",strtolower($d['kategori'])),
			'data' => str_replace('"', '', $datasub[$d['kategori']])
					
	);
		

}
	
echo json_encode($result);



?>