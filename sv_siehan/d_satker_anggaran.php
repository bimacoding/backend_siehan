<?php 

header('Access-Control-Allow-Origin: *');
header("Content-type: application/json; charset=utf-8");

include_once "koneksi_plasadata.php";

$anggaran = mysqli_query($con, "SELECT bulan,thang, autono, kdsatker, nmsatker, pagu, realisasi, (pagu-realisasi) AS sisa 
FROM tbl_anggaran WHERE bulan = (SELECT MAX(bulan) FROM tbl_anggaran) ORDER BY pagu DESC") or die (mysqli_error());
		
		while($a = mysqli_fetch_assoc($anggaran)){

		$result[] = array(

			'name' => $a['nmsatker'],
			'id'    => $a['kdsatker'],
			'data' => array(

			 			array('PAGU', (double)$a['pagu']), 
			 			array('REALISASI', (double)$a['realisasi']),
			 			array('SISA', (double)$a['sisa'])

					)
		
			);
		

}
	
echo json_encode($result);



?>