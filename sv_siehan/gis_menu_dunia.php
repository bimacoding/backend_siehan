<?php;
ini_set('memory_limit', '1024M');
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once "koneksi_plasadata.php";
error_reporting(0);

if ($_GET['p']=='anggun') {

	$data1 = mysqli_query($con, "SELECT a.`subbenua`, (SELECT SUM(strength) FROM tbl_countrystrength WHERE subbenua=a.`subbenua` AND subcategory = 'Anggaran Pertahanan' AND category='FINANCIALS' AND  strength != 0) as subtot FROM tbl_country a GROUP BY a.`subbenua` ORDER BY a.`subbenua`");

	while ($i = mysqli_fetch_array($data1)) {

		$data2 = mysqli_query($con, "SELECT b.`subbenua`, b.`negara`, a.`code`, SUM(b.`strength`) AS total FROM tbl_country a LEFT JOIN tbl_countrystrength b ON a.`negara`=b.`negara` WHERE a.`code`!='' AND category='FINANCIALS' AND b.`subcategory` = 'Anggaran Pertahanan' AND b.`strength` != 0 AND b.`subbenua` = '".$i['subbenua']."' GROUP BY a.`code`");

			while ($ii = mysqli_fetch_array($data2)) {

					$sub1[$i['subbenua']][] = array(
					'nama' 		=> $ii['negara'],
					'subbenua'  => $ii['code'],
					'jumlah'		=> (double)$ii['total'],
					'subbenuaup'  => $i['subbenua']
					);
			}

		$result[] = array(
			'nama' 		=> $i['subbenua'],
			'id' 		=> strtolower(str_replace(" ", "-", $i['subbenua'])),
			'subtotal'  => (double)$i['subtot'],
			'submenu1'  => $sub1[$i['subbenua']]		
		);
	}
	echo json_encode($result);
}
elseif ($_GET['p']=='oil') {

	$data1 = mysqli_query($con, "SELECT a.`subbenua`, (SELECT SUM(strength) FROM tbl_countrystrength WHERE subbenua=a.`subbenua` AND subcategory = 'Cadangan Minyak Tersedia' AND category='PETROLEUM RESOURCES' AND  strength != 0) as subtot FROM tbl_country a GROUP BY a.`subbenua` ORDER BY a.`subbenua`");

	while ($i = mysqli_fetch_array($data1)) {

		$data2 = mysqli_query($con, "SELECT b.`subbenua`, b.`negara`, a.`code`, SUM(b.`strength`) AS total FROM tbl_country a LEFT JOIN tbl_countrystrength b ON a.`negara`=b.`negara` WHERE a.`code`!='' AND b.`strength` != 0 AND b.`category`='PETROLEUM RESOURCES' AND b.`subcategory` = 'Cadangan Minyak Tersedia' AND b.`subbenua` = '".$i['subbenua']."' GROUP BY a.`code`");

			while ($ii = mysqli_fetch_array($data2)) {

					$sub1[$i['subbenua']][] = array(
					'nama' 		=> $ii['negara'],
					'subbenua'  => $ii['code'],
					'jumlah'		=> (double)$ii['total'],
					'subbenuaup'  => $i['subbenua']
					);
			}

		$result[] = array(
			'nama' 		=> $i['subbenua'],
			'id' 		=> strtolower(str_replace(" ", "-", $i['subbenua'])),
			'subtotal'  => (double)$i['subtot'],
			'submenu1'  => $sub1[$i['subbenua']]		
		);
	}
	echo json_encode($result);

}elseif ($_GET['p']=='lnd') {

	$data1 = mysqli_query($con, "SELECT a.`subbenua`, (SELECT SUM(strength) FROM tbl_countrystrength WHERE subbenua=a.`subbenua` AND subcategory = 'Luas Tanah Persegi' AND category='GEOGRAPHY' AND  strength != 0) as subtot FROM tbl_country a GROUP BY a.`subbenua` ORDER BY a.`subbenua`");

	while ($i = mysqli_fetch_array($data1)) {

		$data2 = mysqli_query($con, "SELECT b.`subbenua`, b.`negara`, a.`code`, SUM(b.`strength`) AS total FROM tbl_country a LEFT JOIN tbl_countrystrength b ON a.`negara`=b.`negara` WHERE a.`code`!='' AND b.`strength` != 0 AND category='GEOGRAPHY' AND b.`subcategory` = 'Luas Tanah Persegi' AND b.`subbenua` = '".$i['subbenua']."' GROUP BY a.`code`");

			while ($ii = mysqli_fetch_array($data2)) {

					$sub1[$i['subbenua']][] = array(
					'nama' 		=> $ii['negara'],
					'subbenua'  => $ii['code'],
					'jumlah'		=> (double)$ii['total'],
					'subbenuaup'  => $i['subbenua']
					);
			}

		$result[] = array(
			'nama' 		=> $i['subbenua'],
			'id' 		=> strtolower(str_replace(" ", "-", $i['subbenua'])),
			'subtotal'  => (double)$i['subtot'],
			'submenu1'  => $sub1[$i['subbenua']]		
		);
	}
	echo json_encode($result);

}
elseif ($_GET['p']=='pers') {
	
	$data1 = mysqli_query($con, "SELECT a.`subbenua`, (SELECT SUM(strength) FROM tbl_countrystrength WHERE subbenua=a.`subbenua` AND subcategory = 'Total Personil Militer' AND category='MANPOWER' AND  strength != 0) as subtot FROM tbl_country a GROUP BY a.`subbenua` ORDER BY a.`subbenua`");

	while ($i = mysqli_fetch_array($data1)) {

		$data2 = mysqli_query($con, "SELECT b.`subbenua`, b.`negara`, a.`code`, SUM(b.`strength`) AS total FROM tbl_country a LEFT JOIN tbl_countrystrength b ON a.`negara`=b.`negara` WHERE a.`code`!='' AND b.`strength` != 0 AND category='MANPOWER' AND b.`subcategory` = 'Total Personil Militer' AND b.`subbenua` = '".$i['subbenua']."' GROUP BY a.`code`");

			while ($ii = mysqli_fetch_array($data2)) {

					$sub1[$i['subbenua']][] = array(
					'nama' 		=> $ii['negara'],
					'subbenua'  => $ii['code'],
					'jumlah'		=> (double)$ii['total'],
					'subbenuaup'  => $i['subbenua']
					);
			}

		$result[] = array(
			'nama' 		=> $i['subbenua'],
			'id' 		=> strtolower(str_replace(" ", "-", $i['subbenua'])),
			'subtotal'  => (double)$i['subtot'],
			'submenu1'  => $sub1[$i['subbenua']]		
		);
	}
	echo json_encode($result);
	
}elseif ($_GET['p']=='pop') {
	$pop = mysqli_query($con, "SELECT wilayah,idcountry,max(tahun) FROM tbl_populasi GROUP BY wilayah ORDER BY jumlah DESC;") or die (mysqli_error());
		
	while($row = mysqli_fetch_assoc($pop)){

		$subpop = mysqli_query($con, "SELECT a.`tahun`, a.`wilayah`, a.`jumlah`, b.`code`, b.`coord` FROM tbl_populasi a LEFT JOIN tbl_country b ON a.`idcountry`=b.`idcountry` WHERE a.`wilayah` = '$row[wilayah]' AND a.`tahun` = YEAR(CURRENT_TIMESTAMP) GROUP BY b.`idcountry` ORDER BY a.`jumlah`") or die (mysqli_error());

			$postx = mysqli_query($con, "SELECT `lat`, `long` FROM tbl_country where `idcountry`='$row[idcountry]' ORDER BY `idcountry` DESC");

			while($rowx = mysqli_fetch_assoc($postx)){
				$rr[$row['idcountry']] =  array((double)$rowx['lat'], (double)$rowx['long']);
			}
			
			while($sad = mysqli_fetch_assoc($subpop)){

					$result[] =  array(
						'name'  => $sad['wilayah'],
						'tahun' => $sad['tahun'],
						'code'  => $sad['code'],
						'latLng'=> $rr[$row['idcountry']],
						'drill' => str_replace(" ","",strtolower($sad['tahun']."-".$sad['wilayah'])),
						'coord' => (double)$sad['coord'],
						'y'     => (double)$sad['jumlah']
					);

			}
	}
	echo json_encode($result);

}elseif ($_GET['p']=='menurs') {

	$mn = mysqli_query($con, "SELECT kd_prov, nama_prop FROM tbl_rumahsakit_detil GROUP BY kd_prov") or die (mysqli_error());
		
	while($i = mysqli_fetch_assoc($mn)){

		$mnsub = mysqli_query($con, "SELECT kd_prov, kode_rs, nama_rs FROM tbl_rumahsakit_detil WHERE kd_prov = '$i[kd_prov]' ") or die (mysqli_error());

			while($ii = mysqli_fetch_assoc($mnsub)){

				$sub1[$i['kd_prov']][] = array(
					'nama' 		=> htmlentities($ii['nama_rs']),
					'koders'  => $ii['kode_rs'],
					'kdprov'  => (double)$ii['kd_prov'],
					'kdprovup'  => (double)$i['kd_prov']
				);

			}

		$result[] =  array(
			'nama' 		=> $i['nama_prop'],
			'kdprov'  => (double)$i['kd_prov'],
			'submenu1'  => $sub1[$i['kd_prov']]
		);

	}

	echo json_encode($result);

}elseif ($_GET['p']=='menurscovid') {

	$mn = mysqli_query($con, "SELECT kd_prov, nama_prop FROM tbl_rumahsakit_detil WHERE covid19='Y' GROUP BY kd_prov") or die (mysqli_error());
		
	while($i = mysqli_fetch_assoc($mn)){

		$mnsub = mysqli_query($con, "SELECT kd_prov, kode_rs, nama_rs FROM tbl_rumahsakit_detil WHERE covid19='Y' AND kd_prov = '$i[kd_prov]' ") or die (mysqli_error());

			while($ii = mysqli_fetch_assoc($mnsub)){

				$sub1[$i['kd_prov']][] = array(
					'nama' 		=> htmlentities($ii['nama_rs']),
					'koders'  => $ii['kode_rs'],
					'kdprov'  => (double)$ii['kd_prov'],
					'kdprovup'  => (double)$i['kd_prov']
				);

			}

		$result[] =  array(
			'nama' 		=> $i['nama_prop'],
			'kdprov'  => (double)$i['kd_prov'],
			'submenu1'  => $sub1[$i['kd_prov']]
		);
	}
	echo json_encode($result);
}
	
?>