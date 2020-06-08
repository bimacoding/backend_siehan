<?php 

header('Access-Control-Allow-Origin: *');

include_once "koneksi_plasadata.php";


$idxlstr = mysqli_query($con, "SELECT kategori, SUM(jumlah) AS total, (SELECT SUM(total) FROM tbl_covid19 ) AS jml FROM tbl_lingstra WHERE kategori!='SIBER' GROUP BY kategori ORDER BY tahun ASC") or die (mysqli_error());
while($i = mysqli_fetch_assoc($idxlstr)){

	if ($i['kategori']=='PENYAKIT') {
		$total = (double)$i['total'] + (double)$i['jml'];
	}else{
		$total = (double)$i['total'];
	}

	$result['idxme'][] = array(

			'name' 		=> $i['kategori'],
			'y'   		=> $total
					
	);
}		
echo json_encode($result);
?>