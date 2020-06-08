<?php 

header('Access-Control-Allow-Origin: *');
header("Content-type: application/json; charset=utf-8");


include_once "koneksi_plasadata.php";

$anggaranthn = mysqli_query($con, "SELECT tahun, SUM(jumlah) AS total FROM tbl_anggarantotal GROUP BY tahun ORDER BY tahun ASC") or die (mysqli_error());
		
		while($row = mysqli_fetch_assoc($anggaranthn)){

		$result['anggaran_tahun'][] = array(

			'name' => $row['tahun'],
			'y'    => (int)$row['total']

		);
}

	
echo json_encode($result);



?>