<?php 
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once "koneksi_plasadata.php";

set_time_limit(60);

$pers = mysqli_query($con, "SELECT COUNT(*) AS total, 'TNI AD' AS nama FROM tp_ad WHERE TGLDEAD IS NULL
						UNION ALL
						SELECT COUNT(*) AS total, 'TNI AL' AS nama FROM tp_al WHERE TGLDEAD IS NULL
						UNION ALL
						SELECT COUNT(*) AS total, 'TNI AU' AS nama FROM tp_au WHERE TGLDEAD IS NULL
						UNION ALL
						SELECT SUM(t1.pns) AS total, 'PNS' AS nama FROM 
						(SELECT COUNT(*) AS pns FROM tp_ad_pns a 
						UNION ALL
						SELECT COUNT(*) AS pns FROM tp_al_pns b
						UNION ALL
						SELECT COUNT(*) AS pns FROM tp_au_pns c) AS t1") or die (mysqli_error());
		
		while($row = mysqli_fetch_assoc($pers)){

		$result['personel'][] = array(

			'name' => $row['nama'],
			'y'    => (int)$row['total'],
			'drilldown'  => str_replace(" ","",strtolower($row['nama']))

		);
}

$tniad = mysqli_query($con, "SELECT b.ad, COUNT(a.KDGOL) AS jml FROM tp_ad a, `tbl_pers_gol_pangkat` b 
WHERE a.KDGOL!='' AND a.KDGOL=b.kdgol GROUP BY a.KDGOL DESC") or die (mysqli_error());
while($ad = mysqli_fetch_assoc($tniad)){

		$result['tniad'][] = array(

			$ad['ad'],
			(int)$ad['jml']

		);
}

$tnial = mysqli_query($con, "SELECT b.al, COUNT(a.KDGOL) AS jml FROM tp_al a, `tbl_pers_gol_pangkat` b 
WHERE a.KDGOL!='' AND a.KDGOL=b.kdgol GROUP BY a.KDGOL DESC") or die (mysqli_error());
while($al = mysqli_fetch_assoc($tnial)){

		$result['tnial'][] = array(

			$al['al'],
			(int)$al['jml']

		);
}

$tniau = mysqli_query($con, "SELECT b.au, COUNT(a.KDGOL) AS jml FROM tp_au a, `tbl_pers_gol_pangkat` b 
WHERE a.KDGOL!='' AND a.KDGOL=b.kdgol GROUP BY a.KDGOL DESC") or die (mysqli_error());
while($au = mysqli_fetch_assoc($tniau)){

		$result['tniau'][] = array(

			$au['au'],
			(int)$au['jml']

		);
}

$pns = mysqli_query($con, "SELECT t1.NIP, t1.KDGOL, t1.source, COUNT(NIP) AS jml, t2.pns, t2.nmgol FROM
					(SELECT NIP, KDGOL, source FROM tp_ad_pns a 
					UNION ALL
					SELECT NIP, KDGOL, source FROM tp_al_pns b
					UNION ALL
					SELECT NIP, KDGOL, source FROM tp_au_pns c) AS t1
					LEFT JOIN tbl_pers_gol_pangkat_bak2 t2 ON t1.KDGOL = t2.kdgol
					GROUP BY t1.KDGOL") or die (mysqli_error());
while($p = mysqli_fetch_assoc($pns)){

		$result['pns'][] = array(

			$p['nmgol'].' '.$p['pns'],
			(int)$p['jml']

		);
}


$goltniad = mysqli_query($con, "SELECT b.group_tni, SUM(a.KDGOL) AS jml FROM tp_ad a, `tbl_pers_gol_pangkat` b 
WHERE a.KDGOL!='' AND a.KDGOL=b.kdgol GROUP BY b.group_tni DESC") or die (mysqli_error());
while($gad = mysqli_fetch_assoc($goltniad)){

		$result['goltniad'][] = array(

			$gad['group_tni'],
			(int)$gad['jml']

		);

}

$goltnial = mysqli_query($con, "SELECT b.group_tni, SUM(a.KDGOL) AS jml FROM tp_al a, `tbl_pers_gol_pangkat` b 
WHERE a.KDGOL!='' AND a.KDGOL=b.kdgol GROUP BY b.group_tni DESC") or die (mysqli_error());
while($gal = mysqli_fetch_assoc($goltnial)){

		$result['goltnial'][] = array(

			$gal['group_tni'],
			(int)$gal['jml']

		);
}

$goltniau = mysqli_query($con, "SELECT b.group_tni, SUM(a.KDGOL) AS jml FROM tp_au a, `tbl_pers_gol_pangkat` b 
WHERE a.KDGOL!='' AND a.KDGOL=b.kdgol GROUP BY b.group_tni DESC") or die (mysqli_error());
while($gau = mysqli_fetch_assoc($goltniau)){

		$result['goltniau'][] = array(

			$gau['group_tni'],
			(int)$gau['jml']

		);
}

// PNS blum
$golpns = mysqli_query($con, "SELECT t3.group_pns, SUM(jml) AS jml FROM 
						(SELECT t1.NIP, t1.KDGOL, t1.source, COUNT(NIP) AS jml, t2.pns, t2.nmgol, t2.`group_pns` FROM
						(SELECT NIP, KDGOL, source FROM tp_ad_pns a 
						UNION ALL
						SELECT NIP, KDGOL, source FROM tp_al_pns b
						UNION ALL
						SELECT NIP, KDGOL, source FROM tp_au_pns c) AS t1
						LEFT JOIN tbl_pers_gol_pangkat_bak2 t2 ON t1.KDGOL = t2.kdgol
						GROUP BY t1.KDGOL) AS t3
						GROUP BY t3.group_pns") or die (mysqli_error());
while($gp = mysqli_fetch_assoc($golpns)){

		$result['golpns'][] = array(

			$gp['group_pns'],
			(int)$gp['jml']

		);
}


echo json_encode($result);

?>