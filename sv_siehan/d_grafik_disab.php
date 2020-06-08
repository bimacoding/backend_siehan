<?php 

header('Access-Control-Allow-Origin: *');

include_once "koneksi_plasadata.php";

$disab 	 = mysqli_query($con, "SELECT uo FROM tbl_penca GROUP BY uo") or die (mysqli_error());
while($d = mysqli_fetch_assoc($disab)){		

		$sub = mysqli_query($con, "SELECT kotama, jumlah FROM tbl_penca WHERE uo = '$d[uo]' ") or die (mysqli_error());
		
		while($s = mysqli_fetch_assoc($sub)){

				$datasub[$d['uo']][] =  array($s['kotama'],(double)$s['jumlah']);

		}

	$result[] = array(

			'name' => $d['uo'],
			'id'   => str_replace(" ","",strtolower($d['uo'])),
			'data' => str_replace('"', '', $datasub[$d['uo']])
					
	);
		

}
	
echo json_encode($result);



?>