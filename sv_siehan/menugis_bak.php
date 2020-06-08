<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once "koneksi_plasadata.php";
error_reporting(0);

	$data1 = mysqli_query($con, "SELECT treeview, parent_id, nama FROM master_satker_xy WHERE parent_id = '0' ORDER BY treeview");
	while ($i = mysqli_fetch_array($data1)) {
		
		$data2 = mysqli_query($con, "SELECT treeview, parent_id, nama FROM master_satker_xy WHERE parent_id = '".$i['treeview']."' ORDER BY treeview");

			while ($ii = mysqli_fetch_array($data2)) {

					$data3 = mysqli_query($con, "SELECT treeview, parent_id, nama, tipe_org, kd_satker, xcoord, ycoord FROM master_satker_xy WHERE parent_id = '".$ii['treeview']."' ORDER BY treeview");

					while ($iii = mysqli_fetch_array($data3)) {

						if($i['treeview'] == '1000000'){

						$data4 = mysqli_query($con, "SELECT treeview, parent_id, nama, tipe_org, kd_satker, xcoord, ycoord FROM master_satker_xy WHERE parent_id = '".$iii['treeview']."' ORDER BY treeview");

							while ($x = mysqli_fetch_array($data4)) {
								
								$sub3[$iii['treeview']][] = array(

								'nama' 		=> $x['nama'],
								'treeview'  => (double)$x['treeview'],
								'treeviewup'  => (double)$iii['treeview'],
									
								);

							}
						}

						$sub2[$ii['treeview']][] = array(

							'nama' 		=> $iii['nama'],
							'treeview'  => (double)$iii['treeview'],
							'treeviewup'  => (double)$ii['treeview'],
							'submenu3'  => $sub3[$iii['treeview']]	
						);

					

					}

					$sub1[$i['treeview']][] = array(

					'nama' 		=> $ii['nama'],
					'treeview'  => (double)$ii['treeview'],
					'treeviewup'  => (double)$i['treeview'],
					'submenu2'  => $sub2[$ii['treeview']]
						
					);

			}

		$result[] = array(

			'nama' 		=> $i['nama'],
			'treeview'  => (double)$i['treeview'],
			'submenu1'  => $sub1[$i['treeview']]
					
		);

	}

	echo json_encode($result);


?>