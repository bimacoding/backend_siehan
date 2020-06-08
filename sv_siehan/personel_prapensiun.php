<?php 
header('Access-Control-Allow-Origin: *');

include_once "koneksi_plasadata.php";

$idxperson = mysqli_query($con, "SELECT kode_uo, nama_uo, SUM(tni) AS total_tni, SUM(pns) total_pns FROM tbl_pers_r_pensiun_satker GROUP BY kode_uo") or die (mysqli_error());
		
		while($row = mysqli_fetch_assoc($idxperson)){

		$result['penpersonel'][] = array(

			'name' => $row['nama_uo'],
			'y'    => (int)($row['total_tni'] + $row['total_pns']),
			'drilldown'  => str_replace(" ","",strtolower($row['nama_uo']))

		);
}

$drillperson = mysqli_query($con, "SELECT kode_uo, nama_uo, SUM(tni) AS total_tni, SUM(pns) total_pns FROM tbl_pers_r_pensiun_satker GROUP BY kode_uo") or die (mysqli_error());

while($d = mysqli_fetch_assoc($drillperson)){		


	$result['drillpenpersonel'][] = array(

			'name' => $d['nama_uo'],
			'id'   => str_replace(" ","", strtolower($d['nama_uo'])),
			'data' => array(

							array('TNI', (double)$d['total_tni']), 
							array('PNS', (double)$d['total_pns'])

					)
					
	);
		

}

echo json_encode($result);

?>