<?php 
header('Access-Control-Allow-Origin: *');

include_once "koneksi_plasadata.php";

$pers = mysqli_query($con, "SELECT nama_matra as nama, SUM(jml) total FROM tbl_pers_r_matra_gol GROUP BY kode_matra") or die (mysqli_error());
		
		while($row = mysqli_fetch_assoc($pers)){

		$result['personel'][] = array(

			'name' => $row['nama'],
			'y'    => (int)$row['total'],
			'drilldown'  => str_replace(" ","",strtolower($row['nama']))

		);
}

$tniad = mysqli_query($con, "SELECT b.ad, SUM(a.jml) as jml FROM tbl_pers_r_matra_gol a, tbl_pers_gol_pangkat_bak2 b 
WHERE a.kode_matra = 1 AND a.kode_gol = b.kdgol AND ad != '' GROUP BY b.kdgol ORDER BY kdgol DESC") or die (mysqli_error());
while($ad = mysqli_fetch_assoc($tniad)){

		$result['tniad'][] = array(

			$ad['ad'],
			(int)$ad['jml']

		);
}

$tnial = mysqli_query($con, "SELECT b.al, SUM(a.jml) AS jml FROM tbl_pers_r_matra_gol a, tbl_pers_gol_pangkat_bak2 b WHERE a.kode_matra = 2 AND a.kode_gol = b.kdgol AND al != '' GROUP BY b.kdgol ORDER BY kdgol DESC ") or die (mysqli_error());
while($al = mysqli_fetch_assoc($tnial)){

		$result['tnial'][] = array(

			$al['al'],
			(int)$al['jml']

		);
}

$tniau = mysqli_query($con, "SELECT b.au, SUM(a.jml) as jml FROM tbl_pers_r_matra_gol a, tbl_pers_gol_pangkat_bak2 b WHERE a.kode_matra = 3 AND a.kode_gol = b.kdgol AND au != '' GROUP BY b.kdgol ORDER BY kdgol DESC ") or die (mysqli_error());
while($au = mysqli_fetch_assoc($tniau)){

		$result['tniau'][] = array(

			$au['au'],
			(int)$au['jml']

		);
}

$pns = mysqli_query($con, "SELECT b.nmgol, b.pns, SUM(a.jml) AS jml FROM tbl_pers_r_matra_gol a, tbl_pers_gol_pangkat_bak2 b WHERE a.kode_matra = 4 AND a.kode_gol = b.kdgol AND pns != '-' GROUP BY b.kdgol ORDER BY kdgol DESC ") or die (mysqli_error());
while($p = mysqli_fetch_assoc($pns)){

		$result['pns'][] = array(

			$p['nmgol'].' '.$p['pns'],
			(int)$p['jml']

		);
}


$goltniad = mysqli_query($con, "SELECT b.group_tni, SUM(a.jml) as jml FROM tbl_pers_r_matra_gol a, tbl_pers_gol_pangkat_bak2 b WHERE a.kode_matra = 1 AND a.kode_gol = b.kdgol AND group_tni != '' GROUP BY b.group_tni ORDER BY b.kdgol") or die (mysqli_error());
while($gad = mysqli_fetch_assoc($goltniad)){

		$result['goltniad'][] = array(

			$gad['group_tni'],
			(int)$gad['jml']

		);

}

$goltnial = mysqli_query($con, "SELECT b.group_tni, SUM(a.jml) AS jml FROM tbl_pers_r_matra_gol a, tbl_pers_gol_pangkat_bak2 b WHERE a.kode_matra = 2 AND a.kode_gol = b.kdgol AND group_tni != '' GROUP BY b.group_tni ORDER BY b.kdgol ") or die (mysqli_error());
while($gal = mysqli_fetch_assoc($goltnial)){

		$result['goltnial'][] = array(

			$gal['group_tni'],
			(int)$gal['jml']

		);
}

$goltniau = mysqli_query($con, "SELECT b.group_tni, SUM(a.jml) as jml FROM tbl_pers_r_matra_gol a, tbl_pers_gol_pangkat_bak2 b WHERE a.kode_matra = 3 AND a.kode_gol = b.kdgol AND group_tni != '' GROUP BY b.group_tni ORDER BY b.kdgol ") or die (mysqli_error());
while($gau = mysqli_fetch_assoc($goltniau)){

		$result['goltniau'][] = array(

			$gau['group_tni'],
			(int)$gau['jml']

		);
}

$golpns = mysqli_query($con, "SELECT b.group_pns, SUM(a.jml) AS jml FROM tbl_pers_r_matra_gol a, tbl_pers_gol_pangkat_bak2 b WHERE a.kode_matra = 4 AND a.kode_gol = b.kdgol AND group_tni != '' GROUP BY b.group_pns ORDER BY b.kdgol ") or die (mysqli_error());
while($gp = mysqli_fetch_assoc($golpns)){

		$result['golpns'][] = array(

			$gp['group_pns'],
			(int)$gp['jml']

		);
}


echo json_encode($result);

?>