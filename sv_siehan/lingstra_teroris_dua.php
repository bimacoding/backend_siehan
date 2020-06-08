<?php 

header('Access-Control-Allow-Origin: *');

include_once "koneksi_plasadata.php";

$idxlstr = mysqli_query($con, "SELECT kondisi, COUNT(kondisi) AS total FROM tbl_teroris WHERE kondisi!='' AND ( kondisi='LUAR NEGERI' 
OR kondisi = 'DALAM NEGERI' ) AND kategori='ENTITAS' GROUP BY kondisi") or die (mysqli_error());
while($i = mysqli_fetch_assoc($idxlstr)){

	$result['idxterorispie'][] = array(

			'name' 		=> $i['kondisi'],
			'y'   		=> (double)$i['total']
					
	);
}		
echo json_encode($result);
?>
