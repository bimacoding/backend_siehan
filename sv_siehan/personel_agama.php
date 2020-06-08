<?php 

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once "koneksi_plasadata.php";

// $persagama = mysqli_query($con, "SELECT nama_matra as nama, SUM(jml) total FROM tbl_pers_r_matra_gol GROUP BY kode_matra") or die (mysqli_error());
		
// 		while($row = mysqli_fetch_assoc($persagama)){

// 		$result['persagama'][] = array(

// 			'name' => $row['nama'],
// 			'y'    => (int)$row['total'],
// 			'drilldown'  => str_replace(" ","",strtolower($row['nama']))

// 		);
// }

// $drillpersagama = mysqli_query($con, "SELECT nama_matra as nama FROM tbl_pers_r_matra_gol GROUP BY kode_matra") or die (mysqli_error());
// while($ag = mysqli_fetch_assoc($drillpersagama)){

// 		$sub = mysqli_query($con, "SELECT a.nama_matra as nama, b.AGAMA as ag, SUM(a.jml) as total FROM tbl_pers_r_matra_gol a, tbl_agama b WHERE a.kdagama=b.KDAGAMA AND a.nama_matra='$ag[nama]' GROUP BY a.kode_matra, a.kdagama") or die (mysqli_error());
		
// 		while($s = mysqli_fetch_assoc($sub)){

// 				$datasub[$ag['nama']][] =  array($s['ag'], (double)$s['total']);

// 		}

// 		$result['drillpersagama'][] = array(

// 			'name'=>$ag['nama'],
// 			'id'  =>str_replace(" ", "", strtolower($ag['nama'])),
// 			'data'=>$datasub[$ag['nama']]

// 		);
// }

$persagama = mysqli_query($con, "SELECT b.AGAMA as ag, SUM(a.jml) as total FROM tbl_pers_r_matra_gol a, tbl_agama b 
WHERE a.kdagama=b.KDAGAMA AND a.blnadk=01 AND a.thnadk=2020 GROUP BY a.kdagama") or die (mysqli_error());
		
		while($row = mysqli_fetch_assoc($persagama)){

		$result['persagama'][] = array(

			'name' => $row['ag'],
			'y'    => (int)$row['total'],
			'drilldown'  => str_replace(" ","",strtolower($row['ag']))

		);
}

$drillpersagama = mysqli_query($con, "SELECT AGAMA as nama FROM tbl_agama ORDER BY KDAGAMA ASC") or die (mysqli_error());
while($ag = mysqli_fetch_assoc($drillpersagama)){

		$sub = mysqli_query($con, "SELECT a.nama_matra as nama, b.AGAMA as ag, SUM(a.jml) as total FROM tbl_pers_r_matra_gol a, tbl_agama b WHERE a.kdagama=b.KDAGAMA AND b.AGAMA='$ag[nama]' AND a.blnadk=01 AND a.thnadk=2020 GROUP BY a.kode_matra, a.kdagama") or die (mysqli_error());
		
		while($s = mysqli_fetch_assoc($sub)){

				$datasub[$ag['nama']][] =  array($s['nama'], (double)$s['total']);

		}

		$result['drillpersagama'][] = array(

			'name'=>$ag['nama'],
			'id'  =>str_replace(" ", "", strtolower($ag['nama'])),
			'data'=>$datasub[$ag['nama']]

		);
}

	
echo json_encode($result);



?>

