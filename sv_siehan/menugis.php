<?php;
ini_set('memory_limit', '1024M');
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once "koneksi_plasadata.php";
error_reporting(0);
	$data1 = mysqli_query($con, "SELECT gid, parent_gid, kd_uo, nama, kd_satker FROM master_satker_xy WHERE parent_gid = 0 ORDER BY kd_uo");
	while ($i = mysqli_fetch_array($data1)) {
		$data2 = mysqli_query($con, "SELECT gid, parent_gid, kd_uo, nama, kd_satker FROM master_satker_xy WHERE parent_gid = ".$i['gid']." ORDER BY nama");
			while ($ii = mysqli_fetch_array($data2)) {
					$data3 = mysqli_query($con, "SELECT gid, parent_gid, kd_uo, nama, kd_satker FROM master_satker_xy WHERE parent_gid = ".$ii['gid']." ORDER BY nama");
					while ($iii = mysqli_fetch_array($data3)) {
						$data4 = mysqli_query($con, "SELECT gid, parent_gid, kd_uo, nama, kd_satker FROM master_satker_xy WHERE parent_gid = ".$iii['gid']." ORDER BY nama");
							while ($x = mysqli_fetch_array($data4)) {
								$data5 = mysqli_query($con, "SELECT gid, parent_gid, kd_uo, nama, kd_satker FROM master_satker_xy WHERE parent_gid = ".$x['gid']." ORDER BY nama");
								while ($xx = mysqli_fetch_array($data5)) {
									$sub4[$x['kd_satker']][] = array(
									'nama' 		=> $xx['nama'],
									'kdsatker'  => (double)$xx['kd_satker'],
									'kdsatkerup'  => (double)$x['kd_satker'],
									);
								}
								$sub3[$iii['kd_satker']][] = array(
								'nama' 		=> $x['nama'],
								'kdsatker'  => (double)$x['kd_satker'],
								'kdsatkerup'  => (double)$iii['kd_satker'],
								'submenu4'  => $sub4[$x['kd_satker']]		
								);
							}
						$sub2[$ii['kd_satker']][] = array(
							'nama' 		=> $iii['nama'],
							'kdsatker'  => (double)$iii['kd_satker'],
							'kdsatkerup'  => (double)$ii['kd_satker'],
							'submenu3'  => $sub3[$iii['kd_satker']]	
						);
					}

					$sub1[$i['kd_satker']][] = array(
					'nama' 		=> $ii['nama'],
					'kdsatker'  => (double)$ii['kd_satker'],
					'kdsatkerup'  => (double)$i['kd_satker'],
					'submenu2'  => $sub2[$ii['kd_satker']]
					);
			}
		$result[] = array(
			'nama' 		=> $i['nama'],
			'kdsatker'  => (double)$i['kd_satker'],
			'submenu1'  => $sub1[$i['kd_satker']]		
		);
	}
	echo json_encode($result);
?>