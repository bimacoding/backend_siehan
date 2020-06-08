<?php;
ini_set('memory_limit', '1024M');
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once "koneksi_plasadata.php";
error_reporting(0);
	$data1 = mysqli_query($con, "SELECT gid, parent_gid, kd_uo, nama, kd_satker, ycoord, xcoord, icon, keterangan FROM master_satker_xy WHERE parent_gid = 0 ORDER BY kd_uo");
	while ($i = mysqli_fetch_array($data1)) {

		$data2 = mysqli_query($con, "SELECT gid, parent_gid, kd_uo, nama, kd_satker, ycoord, xcoord, icon, keterangan FROM master_satker_xy WHERE parent_gid = ".$i['gid']." ORDER BY nama ");
			while ($ii = mysqli_fetch_array($data2)) {

					$data3 = mysqli_query($con, "SELECT gid, parent_gid, kd_uo, nama, kd_satker, ycoord, xcoord, icon, keterangan FROM master_satker_xy WHERE parent_gid = ".$ii['gid']." ORDER BY nama");
					while ($iii = mysqli_fetch_array($data3)) {

						$data4 = mysqli_query($con, "SELECT gid, parent_gid, kd_uo, nama, kd_satker, ycoord, xcoord, icon, keterangan FROM master_satker_xy WHERE parent_gid = ".$iii['gid']." ORDER BY nama");
							while ($x = mysqli_fetch_array($data4)) {

								$data5 = mysqli_query($con, "SELECT gid, parent_gid, kd_uo, nama, kd_satker, ycoord, xcoord, icon, keterangan FROM master_satker_xy WHERE parent_gid = ".$x['gid']." ORDER BY nama");
								while ($xx = mysqli_fetch_array($data5)) {

									$textv = "<strong style=\"font-family:sans-serif;font-size:12px;\">".$v['nama']."</strong>";
									$result[strtolower(str_replace(" ", "", $v['kd_satker']))][] = array(

										$v['keterangan'], 
										(double)$v['ycoord'], 
										(double)$v['xcoord'], 
										$v['icon'], $textv

									);
								}

								$textiiii = "<strong style=\"font-family:sans-serif;font-size:12px;\">".$iiii['nama']."</strong>";
								$result[strtolower(str_replace(" ", "", $iiii['kd_satker']))][] = array(

									$iiii['keterangan'], 
									(double)$iiii['ycoord'], 
									(double)$iiii['xcoord'], 
									$iiii['icon'], $textiiii

								);

							}

						$textiii = "<strong style=\"font-family:sans-serif;font-size:12px;\">".$iii['nama']."</strong>";
						$result[strtolower(str_replace(" ", "", $iii['kd_satker']))][] = array(

							$iii['keterangan'], 
							(double)$iii['ycoord'], 
							(double)$iii['xcoord'], 
							$iii['icon'], $textiii

						);

					}

					$textii = "<strong style=\"font-family:sans-serif;font-size:12px;\">".$ii['nama']."</strong>";
					$result[strtolower(str_replace(" ", "", $ii['kd_satker']))][] = array(

						$ii['keterangan'], 
						(double)$ii['ycoord'], 
						(double)$ii['xcoord'], 
						$ii['icon'], $textii

					);
			}

		$texti = "<strong style=\"font-family:sans-serif;font-size:12px;\">".$i['nama']."</strong>";
		$result[strtolower(str_replace(" ", "", $i['kd_satker']))][] = array(

			$i['keterangan'], 
			(double)$i['ycoord'], 
			(double)$i['xcoord'], 
			$i['icon'], $texti

		);

	}

	echo json_encode($result);
?>