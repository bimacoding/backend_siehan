<?php 

header('Access-Control-Allow-Origin: *');

include_once "koneksi_plasadata.php";

$disab = mysqli_query($con, "SELECT uo, SUM(jumlah) AS jumlah FROM tbl_penca GROUP BY uo") or die (mysqli_error());
		
		while($d = mysqli_fetch_assoc($disab)){

		$result[] = array(

			'name' 		=> $d['uo'],
			'y'    		=> (double)$d['jumlah'],
			'drilldown' => str_replace(" ","",strtolower($d['uo']))
		
			);
		

}
	
echo json_encode($result);



?>