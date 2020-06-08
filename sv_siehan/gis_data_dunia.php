<?php 
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once "koneksi_plasadata.php";

if ($_GET['q']=='anggun') {
	$qw = "SELECT b.`subbenua`,b.`negara`, a.`code`,a.`coord`,a.`lat`,a.`long`,
		   (SELECT SUM(strength) FROM `tbl_countrystrength` WHERE subcategory = 'Anggaran Pertahanan' AND category='FINANCIALS' AND negara = b.negara AND strength != 0) AS anggaran,
		   (SELECT SUM(strength) FROM `tbl_countrystrength` WHERE subcategory = 'Utang Luar Negeri' AND category='FINANCIALS' AND negara = b.negara AND strength != 0) AS utang,
		   (SELECT SUM(strength) FROM `tbl_countrystrength` WHERE subcategory = 'Paritas Daya Beli ' AND category='FINANCIALS' AND negara = b.negara AND strength != 0) AS daya_beli,
		   (SELECT SUM(strength) FROM `tbl_countrystrength` WHERE subcategory = 'Cadangan Devisa / Emas' AND category='FINANCIALS' AND negara = b.negara AND strength != 0) AS cadangan
		   FROM tbl_country a LEFT JOIN tbl_countrystrength b ON a.`negara`=b.`negara` 
		   WHERE a.`code`!='' GROUP BY a.`code`";
	$post = mysqli_query($con, $qw);

	while($row = mysqli_fetch_assoc($post)){

			$postx = mysqli_query($con, "SELECT * FROM tbl_country WHERE negara = '$row[negara]' AND code!= '' ORDER BY idcountry DESC");

			while($rowx = mysqli_fetch_assoc($postx)){
				$rr[$row['idcountry']] =  array((double)$rowx['lat'], (double)$rowx['long']);
			}


		$result[] = array(
			"code"=>$row['code'],
			"latLng"=> $rr[$row['idcountry']],
			"subbenua"=>$row['subbenua'],
			"name"=>$row['negara'],
			"lat"=> (double)$row['lat'],
			"long"=> (double)$row['long'],
			"coord"=> (double)$row['coord'],
			"anggaran"=> (double)$row['anggaran'],
			"utang"=> (double)$row['utang'],
			"daya_beli"=> (double)$row['daya_beli'],
			"cadangan"=> (double)$row['cadangan']
		);	
	}
	echo json_encode($result);
}
elseif ($_GET['q']=='oil') {
	$qw = "SELECT b.`subbenua`,b.`negara`, a.`code`,a.`coord`,a.`lat`,a.`long`,
		   (SELECT SUM(strength) FROM `tbl_countrystrength` WHERE subcategory = 'Cadangan Minyak Tersedia' AND category='PETROLEUM RESOURCES' AND negara = b.negara AND strength != 0) AS minyak,
		   (SELECT SUM(strength) FROM `tbl_countrystrength` WHERE subcategory = 'Produksi Minyak' AND category='PETROLEUM RESOURCES' AND negara = b.negara AND strength != 0) AS produksi,
		   (SELECT SUM(strength) FROM `tbl_countrystrength` WHERE subcategory = 'Konsumsi minyak' AND category='PETROLEUM RESOURCES' AND negara = b.negara AND strength != 0) AS konsumsi
		   FROM tbl_country a LEFT JOIN tbl_countrystrength b ON a.`negara`=b.`negara` 
		   WHERE a.`code`!='' GROUP BY a.`code`";
	$post = mysqli_query($con, $qw);

	while($row = mysqli_fetch_assoc($post)){

			$postx = mysqli_query($con, "SELECT * FROM tbl_country WHERE negara = '$row[negara]' AND code!= '' ORDER BY idcountry DESC");

			while($rowx = mysqli_fetch_assoc($postx)){
				$rr[$row['idcountry']] =  array((double)$rowx['lat'], (double)$rowx['long']);
			}


		$result[] = array(
			"code"=>$row['code'],
			"latLng"=> $rr[$row['idcountry']],
			"subbenua"=>$row['subbenua'],
			"name"=>$row['negara'],
			"lat"=> (double)$row['lat'],
			"long"=> (double)$row['long'],
			"coord"=> (double)$row['coord'],
			"total"=> (double)$row['minyak'],
			"produksi"=> (double)$row['produksi'],
			"konsumsi"=> (double)$row['konsumsi']
		);	
	}
	echo json_encode($result);
}
elseif ($_GET['q']=='lnd') {
	$qw = "SELECT b.`subbenua`,b.`negara`, a.`code`,a.`coord`,a.`lat`,a.`long`,
		   (SELECT SUM(strength) FROM `tbl_countrystrength` WHERE subcategory = 'Luas Tanah Persegi' AND category='GEOGRAPHY' AND negara = b.negara AND strength != 0) AS luas,
		   (SELECT SUM(strength) FROM `tbl_countrystrength` WHERE subcategory = 'Jalur Air Aktif' AND category='GEOGRAPHY' AND negara = b.negara AND strength != 0) AS jalur,
		   (SELECT SUM(strength) FROM `tbl_countrystrength` WHERE subcategory = 'Perbatasan' AND category='GEOGRAPHY' AND negara = b.negara AND strength != 0) AS perbatasan,
		   (SELECT SUM(strength) FROM `tbl_countrystrength` WHERE subcategory = 'Garis Pantai' AND category='GEOGRAPHY' AND negara = b.negara AND strength != 0) AS garis
		   FROM tbl_country a LEFT JOIN tbl_countrystrength b ON a.`negara`=b.`negara` 
		   WHERE a.`code`!='' GROUP BY a.`code`";
	$post = mysqli_query($con, $qw);

	while($row = mysqli_fetch_assoc($post)){

			$postx = mysqli_query($con, "SELECT * FROM tbl_country WHERE negara = '$row[negara]' AND code!= '' ORDER BY idcountry DESC");

			while($rowx = mysqli_fetch_assoc($postx)){
				$rr[$row['idcountry']] =  array((double)$rowx['lat'], (double)$rowx['long']);
			}


		$result[] = array(
			"code"=>$row['code'],
			"latLng"=> $rr[$row['idcountry']],
			"subbenua"=>$row['subbenua'],
			"name"=>$row['negara'],
			"lat"=> (double)$row['lat'],
			"long"=> (double)$row['long'],
			"coord"=> (double)$row['coord'],
			"luas"=> (double)$row['luas'],
			"jalur"=> (double)$row['jalur'],
			"perbatasan"=> (double)$row['perbatasan'],
			"garis"=> (double)$row['garis']
		);	
	}
	echo json_encode($result);
}
elseif ($_GET['q']=='pers') {
	$qw = "SELECT b.`subbenua`,b.`negara`, a.`code`,a.`coord`,a.`lat`,a.`long`,
		   (SELECT SUM(strength) FROM `tbl_countrystrength` WHERE subcategory = 'Total Personil Militer' AND category='MANPOWER' AND negara = b.negara AND strength != 0) AS total,
		   (SELECT SUM(strength) FROM `tbl_countrystrength` WHERE subcategory = 'Mencapai Usia Militer' AND category='MANPOWER' AND negara = b.negara AND strength != 0) AS usia,
		   (SELECT SUM(strength) FROM `tbl_countrystrength` WHERE subcategory = 'Personel Cadangan' AND category='MANPOWER' AND negara = b.negara AND strength != 0) AS cadangan,
		   (SELECT SUM(strength) FROM `tbl_countrystrength` WHERE subcategory = 'Personil aktif' AND category='MANPOWER' AND negara = b.negara AND strength != 0) AS aktif,
		   (SELECT SUM(strength) FROM `tbl_countrystrength` WHERE subcategory = 'Total populasi' AND category='MANPOWER' AND negara = b.negara AND strength != 0) AS populasi,
		   (SELECT SUM(strength) FROM `tbl_countrystrength` WHERE subcategory = 'Tenaga Kerja tersedia' AND category='MANPOWER' AND negara = b.negara AND strength != 0) AS tersedia,
		   (SELECT SUM(strength) FROM `tbl_countrystrength` WHERE subcategory = 'Warga Siap Tempur' AND category='MANPOWER' AND negara = b.negara AND strength != 0) AS tempur
		   FROM tbl_country a LEFT JOIN tbl_countrystrength b ON a.`negara`=b.`negara` 
		   WHERE a.`code`!='' GROUP BY a.`code`";
	$post = mysqli_query($con, $qw);

	while($row = mysqli_fetch_assoc($post)){

			$postx = mysqli_query($con, "SELECT * FROM tbl_country WHERE negara = '$row[negara]' AND code!= '' ORDER BY idcountry DESC");

			while($rowx = mysqli_fetch_assoc($postx)){
				$rr[$row['idcountry']] =  array((double)$rowx['lat'], (double)$rowx['long']);
			}


		$result[] = array(
			"code"=>$row['code'],
			"latLng"=> $rr[$row['idcountry']],
			"subbenua"=>$row['subbenua'],
			"name"=>$row['negara'],
			"lat"=> (double)$row['lat'],
			"long"=> (double)$row['long'],
			"coord"=> (double)$row['coord'],
			"total"=> (double)$row['total'],
			"usia"=> (double)$row['usia'],
			"cadangan"=> (double)$row['cadangan'],
			"aktif"=> (double)$row['aktif'],
			"populasi"=> (double)$row['populasi'],
			"tersedia"=> (double)$row['tersedia'],
			"tempur"=> (double)$row['tempur']
		);	
	}
	echo json_encode($result);
}
elseif ($_GET['q']=='nuklir') {
	$rs = mysqli_query($con, "SELECT a.`wilayah`, a.`jumlah`, b.`code`, b.`lat`, b.`long`, b.`coord`, a.`data1` FROM tbl_nuklir a LEFT JOIN tbl_country b ON a.`data1`=b.`idcountry` ORDER BY a.`jumlah` DESC") or die (mysqli_error());
		
		while($row = mysqli_fetch_assoc($rs)){

			$postx = mysqli_query($con, "SELECT `lat`, `long` FROM tbl_country where `idcountry`='$row[data1]' ORDER BY `idcountry` DESC");

		while($rowx = mysqli_fetch_assoc($postx)){
			$rr[$row['data1']] =  array((double)$rowx['lat'], (double)$rowx['long']);
		}

		$result[] = array(

			'name'  => $row['wilayah'],
			'code'  => $row['code'],
			'latLng'=> $rr[$row['data1']],
			'coord' => (double)$row['coord'],
			'y'     => (int)$row['jumlah'],


		);
	}

	echo json_encode($result);
}
elseif ($_GET['q']=='pop') {
	$pop = mysqli_query($con, "SELECT tahun, wilayah FROM tbl_populasi GROUP BY wilayah ORDER BY jumlah DESC;") or die (mysqli_error());
		
while($row = mysqli_fetch_assoc($pop)){

	$subpop = mysqli_query($con, "SELECT tahun, wilayah, jumlah FROM tbl_populasi WHERE wilayah = '$row[wilayah]' GROUP BY tahun ORDER BY jumlah") or die (mysqli_error());
		
			while($sad = mysqli_fetch_assoc($subpop)){

					$result[$row['wilayah']][] =  array(
						'name' => $sad['tahun'],
						'y' => (double)$sad['jumlah'],
						'drilldown' => str_replace(" ","",strtolower($sad['tahun']."-".$sad['wilayah']))
					);

			}
	}


	$drillpops = mysqli_query($con, "SELECT a.wilayah AS wil , b.tahun AS th FROM (SELECT tahun FROM tbl_populasi GROUP BY tahun) AS b, (SELECT wilayah FROM tbl_populasi GROUP BY wilayah) AS a ORDER BY wilayah, tahun ASC") or die (mysqli_error());
	while($dsc = mysqli_fetch_assoc($drillpops)){
		
		$subdrillpops = mysqli_query($con, "SELECT wilayah, tahun, (wanita*jumlah)/100 as wn, (pria*jumlah)/100 as pr FROM tbl_populasi WHERE tahun = '$dsc[th]' AND wilayah = '$dsc[wil]'  ORDER BY wilayah ASC");
		
		while ( $xsc = mysqli_fetch_assoc($subdrillpops)) {

			$datas[$dsc['wil']][$dsc['th']] = array(
				array(
					'name'=>'Pria',
					'y'   =>(int)$xsc['pr'],
				),
				array(
					'name'=>'Wanita',
					'y'   =>(int)$xsc['wn'],
				)
			);

		}
		
		$resultsx[] = array(
			'name' => 'Tahun '.$dsc['th'],
			'colorByPoint'=> true,
			'inverted' => false,
			'id'   => str_replace(" ","",strtolower($dsc['th']."-".$dsc['wil'])),
			'data' => $datas[$dsc['wil']][$dsc['th']],
			'stack'=> $dsc['th'],
		); 

	}

	$x['drillpop'] = $resultsx;
	$bc = array_merge($result, $x);
	echo json_encode($bc);
}


?>
