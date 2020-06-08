<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once "koneksi_plasadata.php";

$data = $_GET['data'];

	// uo cth : ad,al,au
	$uo = mysqli_query($con, "SELECT treeview, nama FROM master_satker_xy WHERE parent_id = '0' ORDER BY treeview");
	while ($x = mysqli_fetch_array($uo)) {

		//  kotama cth : kodam
		$list = mysqli_query($con, "SELECT treeview, parent_id, nama FROM master_satker_xy WHERE parent_id = '$x[treeview]' ORDER BY treeview");

		while ($data = mysqli_fetch_array($list)) {

				$text  = '<div class="infoWindow" style="font-family:sans-serif;font-size:12px;"><strong>MABES TNI AD</strong>';
				$text .= '<br/><span style="font-family:sans-serif;font-size:10px;font-style:italic;color:#666;"> Pimpinan : <strong>Tes nama pimpinan</strong></span>';
				$text .= '<br/><span style="font-family:sans-serif;font-size:10px;font-style:italic;color:#666;"> Personel : <strong>Tes Jumlah Personel</strong></span>';
				$text .= '<br/><span style="font-family:sans-serif;font-size:10px;font-style:italic;color:#666;"> Kuat Alut : <strong>Tes Kuat Alut</strong></span>';
				$text .= '<br/><a href="http://localhost/geolocation/assets/includes/detail.php?info=#" target="_blank" onclick="javascript:window.open(this.href, child, scrollbars,width=650,height=600)">Info Detail</a></div>';

				$result[strtolower(str_replace(" ", "", $x['treeview']))][] = array(

					$text, (double)$data['ycoord'], (double)$data['xcoord'], $data['icon']

				);

			//  cth : korem
			$list1 = mysqli_query($con, "SELECT treeview, parent_id, nama, ycoord, xcoord, icon FROM master_satker_xy WHERE parent_id = '$data[treeview]' ORDER BY treeview");

			while ($data1 = mysqli_fetch_assoc($list1)) {

					$textv  = '<div class="infoWindow" style="font-family:sans-serif;font-size:12px;"><strong>MABES TNI AD</strong>';
					$textv .= '<br/><span style="font-family:sans-serif;font-size:10px;font-style:italic;color:#666;"> Pimpinan : <strong>Tes nama pimpinan</strong></span>';
					$textv .= '<br/><span style="font-family:sans-serif;font-size:10px;font-style:italic;color:#666;"> Personel : <strong>Tes Jumlah Personel</strong></span>';
					$textv .= '<br/><span style="font-family:sans-serif;font-size:10px;font-style:italic;color:#666;"> Kuat Alut : <strong>Tes Kuat Alut</strong></span>';
					$textv .= '<br/><a href="http://localhost/geolocation/assets/includes/detail.php?info=#" target="_blank" onclick="javascript:window.open(this.href, child, scrollbars,width=650,height=600)">Info Detail</a></div>';

					$result[strtolower(str_replace(" ", "", $data['treeview']))][] = array(
						$textv, (double)$data1['ycoord'], (double)$data1['xcoord'], $data1['icon']
					);

				// cth : kodim
				$list2 = mysqli_query($con, "SELECT treeview, parent_id, nama, ycoord, xcoord, icon FROM master_satker_xy WHERE parent_id = '$data1[treeview]' ORDER BY treeview");

				while ($data2 = mysqli_fetch_assoc($list2)) {

						$text1  = '<div class="infoWindow" style="font-family:sans-serif;font-size:12px;"><strong>MABES TNI AD</strong>';
						$text1 .= '<br/><span style="font-family:sans-serif;font-size:10px;font-style:italic;color:#666;"> Pimpinan : <strong>Tes nama pimpinan</strong></span>';
						$text1 .= '<br/><span style="font-family:sans-serif;font-size:10px;font-style:italic;color:#666;"> Personel : <strong>Tes Jumlah Personel</strong></span>';
						$text1 .= '<br/><span style="font-family:sans-serif;font-size:10px;font-style:italic;color:#666;"> Kuat Alut : <strong>Tes Kuat Alut</strong></span>';
						$text1 .= '<br/><a href="http://localhost/geolocation/assets/includes/detail.php?info=#" target="_blank" onclick="javascript:window.open(this.href, child, scrollbars,width=650,height=600)">Info Detail</a></div>';

						$result[strtolower(str_replace(" ", "", $data1['treeview']))][] = array(
							$text1, (double)$data2['ycoord'], (double)$data2['xcoord'], $data2['icon']
						);



				}

			}

		}
	}

	echo json_encode($result);


?>