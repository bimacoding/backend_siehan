<?php 

header('Access-Control-Allow-Origin: *');

include_once "koneksi_plasadata.php";

$anggaran = mysqli_query($con, "SELECT kdsatker, nmsatker, pagu, realisasi FROM tbl_anggaran ORDER BY pagu DESC") or die (mysqli_error());
		
		while($a = mysqli_fetch_assoc($anggaran)){

		$result['indexanggaran'][] = array(

			'name' => $a['nmsatker'],
			'y'    => (double)$a['pagu'],
			'drilldown'  => str_replace(" ","",strtolower($a['kdsatker']))

		);

}
	
echo json_encode($result);



?>