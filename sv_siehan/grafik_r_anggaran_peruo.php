<?php 

header('Access-Control-Allow-Origin: *');
header("Content-type: application/json; charset=utf-8");

include_once "koneksi_plasadata.php";

$drillanggaranthn = mysqli_query($con, "SELECT tahun FROM tbl_anggarantotal GROUP BY tahun ORDER BY tahun ASC") or die (mysqli_error());
while($ag = mysqli_fetch_assoc($drillanggaranthn)){

		$sub = mysqli_query($con, "SELECT uo, jumlah FROM tbl_anggarantotal WHERE tahun='$ag[tahun]' ORDER BY urutan asc") or die (mysqli_error());
		
		while($s = mysqli_fetch_assoc($sub)){

				$result[$ag['tahun']][] =  array(
					'name'=>$s['uo'], 
					'y'=>(double)$s['jumlah']
				);

		}

}

	
echo json_encode($result);



?>