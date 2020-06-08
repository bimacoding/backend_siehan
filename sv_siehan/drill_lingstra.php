<?php 

header('Access-Control-Allow-Origin: *');

include_once "koneksi_plasadata.php";

$data = $_GET['data'];

$idxlstr = mysqli_query($con, "SELECT wilayah, SUM(jumlah) AS total FROM tbl_lingstra WHERE kategori = '$data' GROUP BY wilayah") or die (mysqli_error());
while($i = mysqli_fetch_assoc($idxlstr)){

	$result['idxme'][] = array(

			'name' 		=> $i['wilayah'],
			'y'   		=> (double)$i['total']		
	);
}
	
echo json_encode($result);