<?php 

header('Access-Control-Allow-Origin: *');

include_once "koneksi_plasadata.php";

$anggaranthn = mysqli_query($con, "SELECT tahun, SUM(jumlah) AS total FROM tbl_anggarantotal GROUP BY tahun ORDER BY tahun ASC") or die (mysqli_error());
		
		while($row = mysqli_fetch_assoc($anggaranthn)){

		$result['anggaranthn'][] = array(

			'name' => $row['tahun'],
			'y'    => (int)$row['total'],
			'drilldown'  => str_replace(" ","",strtolower($row['tahun']))

		);
}

$drillanggaranthn = mysqli_query($con, "SELECT tahun FROM tbl_anggarantotal GROUP BY tahun ORDER BY tahun ASC") or die (mysqli_error());
while($ag = mysqli_fetch_assoc($drillanggaranthn)){

		$sub = mysqli_query($con, "SELECT uo, jumlah FROM tbl_anggarantotal WHERE tahun='$ag[tahun]' ORDER BY urutan asc") or die (mysqli_error());
		
		while($s = mysqli_fetch_assoc($sub)){

				$datasub[$ag['tahun']][] =  array($s['uo'], (double)$s['jumlah']);

		}

		$result['drillanggaranthn'][] = array(

			'name'=>$ag['tahun'],
			'id'  =>str_replace(" ", "", strtolower($ag['tahun'])),
			'data'=>$datasub[$ag['tahun']]

		);
}


	
echo json_encode($result);



?>