<?php 
header('Access-Control-Allow-Origin: *');

include_once "koneksi_plasadata.php";

if(isset($_GET['matra'])){

	$matra = $_GET['matra'];

}

if($matra == 'tniad'){

$diklat_ad = mysqli_query($con, "SELECT kategori, COUNT(id) AS total FROM tbl_diklatdetil WHERE matra = 'TNI AD' GROUP BY kategori") or die (mysqli_error());
		
		while($ad = mysqli_fetch_assoc($diklat_ad)){

		$result['diklattni'][] = array(

			'name' => $ad['kategori'],
			'y'    => (int)$ad['total']

		);

		
}
	$result['namamatra'] = "TNI ANGKATAN DARAT";
	echo json_encode($result);

}
elseif($matra == 'tnial'){

$diklat_al = mysqli_query($con, "SELECT kategori, COUNT(id) AS total FROM tbl_diklatdetil WHERE matra = 'TNI AL' GROUP BY kategori") or die (mysqli_error());
		
		while($al = mysqli_fetch_assoc($diklat_al)){

		$result['diklattni'][] = array(

			'name' => $al['kategori'],
			'y'    => (int)$al['total']

		);
}
	$result['namamatra'] = "TNI ANGKATAN LAUT";
	echo json_encode($result);

}
elseif($matra == 'tniau'){

$diklat_au = mysqli_query($con, "SELECT kategori, COUNT(id) AS total FROM tbl_diklatdetil WHERE matra = 'TNI AU' GROUP BY kategori") or die (mysqli_error());
		
		while($au = mysqli_fetch_assoc($diklat_au)){

		$result['diklattni'][] = array(

			'name' => $au['kategori'],
			'y'    => (int)$au['total']

		);
}

$result['namamatra'] = "TNI ANGKATAN UDARA";
echo json_encode($result);

}
elseif($matra == 'fulldiklat'){

$diklat = mysqli_query($con, "SELECT matra, COUNT(id) AS total FROM tbl_diklatdetil GROUP BY matra") or die (mysqli_error());
		
		while($row = mysqli_fetch_assoc($diklat)){

		$result['diklattni'][] = array(

			'name' => $row['matra'],
			'y'    => (int)$row['total']

		);
}

$result['namamatra'] = "TNI";
echo json_encode($result);

}



?>