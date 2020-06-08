<?php 

header('Access-Control-Allow-Origin: *');
$years = date('Y');
include_once "koneksi_plasadata.php";

$kemhan = mysqli_query($con, "SELECT uo, thang, SUM(pagu) AS d FROM tbl_anggaran WHERE uo = 'KEMHAN' AND thang = '$years' GROUP BY uo, thang") or die (mysqli_error());
		
		while($p = mysqli_fetch_assoc($kemhan)){

		$result[] = array(

			'name' => $p['uo'],
			'y'    => (int)$p['d']

		);

}

$mabes = mysqli_query($con, "SELECT uo, thang, SUM(pagu) AS d FROM tbl_anggaran WHERE uo = 'MABES TNI' AND thang = '$years' GROUP BY uo, thang") or die (mysqli_error());
		
		while($p = mysqli_fetch_assoc($mabes)){

		$result[] = array(

			'name' => $p['uo'],
			'y'    => (int)$p['d']

		);

}

$tniad = mysqli_query($con, "SELECT uo, thang, SUM(pagu) AS d FROM tbl_anggaran WHERE uo = 'TNI AD' AND thang = '$years' GROUP BY uo, thang") or die (mysqli_error());
		
		while($p = mysqli_fetch_assoc($tniad)){

		$result[] = array(

			'name' => $p['uo'],
			'y'    => (int)$p['d']

		);

}

$tnial = mysqli_query($con, "SELECT uo, thang, SUM(pagu) AS d FROM tbl_anggaran WHERE uo = 'TNI AL' AND thang = '$years' GROUP BY uo, thang") or die (mysqli_error());
		
		while($p = mysqli_fetch_assoc($tnial)){

		$result[] = array(

			'name' => $p['uo'],
			'y'    => (int)$p['d']

		);

}

$tniau = mysqli_query($con, "SELECT uo, thang, SUM(pagu) AS d FROM tbl_anggaran WHERE uo = 'TNI AU' AND thang = '$years' GROUP BY uo, thang") or die (mysqli_error());
		
		while($p = mysqli_fetch_assoc($tniau)){

		$result[] = array(

			'name' => $p['uo'],
			'y'    => (int)$p['d']

		);

}	
echo json_encode($result);



?>