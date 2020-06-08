<?php 
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once "koneksi_plasadata.php";

$pers = mysqli_query($con, "SELECT kdkelamin as jk FROM tbl_pers_r_matra_gol WHERE kdkelamin!='' AND kdkelamin!=0 AND blnadk=01 AND thnadk=2020 GROUP BY kdkelamin") or die (mysqli_error());
	while($row = mysqli_fetch_assoc($pers)){
		if ($row['jk']==1) {
			$jk = 'Laki-Laki';
		}elseif ($row['jk']==2) {
			$jk = 'Perempuan';
		}else{
			$jk = 'Laki-Laki';
		}
		$subpers = mysqli_query($con, "SELECT nama_matra as nama, SUM(jml) total, kdkelamin as jk FROM tbl_pers_r_matra_gol WHERE kdkelamin!=''  AND kdkelamin = '$row[jk]' AND blnadk=01 AND thnadk=2020 GROUP BY kode_matra, kdkelamin") or die (mysqli_error());
		while ($s = mysqli_fetch_assoc($subpers)) {
			
			$resultx[$row['jk']][] = array(

				'name' => $s['nama'],
				'y'    => (int)$s['total'],
				'drilldown'  =>  str_replace(" ","",strtolower($s['nama']."-".$s['jk']))

			);
		}

		$result['personel'][] = array(

			'name' => $jk,
			'data' => $resultx[$row['jk']]

		);
}

$drilltniad = mysqli_query($con, "SELECT a.nama_matra as nama, a.kdkelamin as jk FROM tbl_pers_r_matra_gol a WHERE a.kode_matra = 1 AND a.kdkelamin != '' AND a.blnadk=01 AND a.thnadk=2020 GROUP BY a.kdkelamin ORDER BY a.kdkelamin ASC;") or die (mysqli_error());
while($ad = mysqli_fetch_assoc($drilltniad)){
		if ($ad['jk']==1) {
			$jk = 'Laki-Laki';
		}elseif ($ad['jk']==2) {
			$jk = 'Perempuan';
		}else{
			$jk = 'Laki-Laki';
		}

		$subdrilltniad = mysqli_query($con, "SELECT b.ad, SUM(a.jml) as jml, kdkelamin FROM tbl_pers_r_matra_gol a, tbl_pers_gol_pangkat_bak2 b WHERE a.kode_matra = 1 AND a.kode_gol = b.kdgol AND ad != '' AND a.kdkelamin = '$ad[jk]' AND a.blnadk=01 AND a.thnadk=2020 GROUP BY b.kdgol, a.kdkelamin ORDER BY kdgol DESC") or die (mysqli_error());
		while ($subad = mysqli_fetch_assoc($subdrilltniad)) {
			$datasubtniad[$ad['jk']][] =  array(
					$subad['ad'],
					(double)$subad['jml']
			);
		}

		$resultad['tniad'][] = array(

			'id'=>str_replace(" ","",strtolower($ad['nama']."-".$ad['jk'])),
			'name'=> $ad['nama']." ( ".$jk." )",
			'data'=> $datasubtniad[$ad['jk']]

		);
}

$drilltnial = mysqli_query($con, "SELECT a.nama_matra as nama, a.kdkelamin as jk FROM tbl_pers_r_matra_gol a WHERE a.kode_matra = 2 AND a.kdkelamin != '' AND a.blnadk=01 AND a.thnadk=2020 GROUP BY a.kdkelamin ORDER BY a.kdkelamin ASC;") or die (mysqli_error());
while($al = mysqli_fetch_assoc($drilltnial)){
		if ($al['jk']==1) {
			$jk = 'Laki-Laki';
		}elseif ($al['jk']==2) {
			$jk = 'Perempuan';
		}else{
			$jk = 'Laki-Laki';
		}

		$subdrilltnial = mysqli_query($con, "SELECT b.al, SUM(a.jml) as jml, kdkelamin FROM tbl_pers_r_matra_gol a, tbl_pers_gol_pangkat_bak2 b WHERE a.kode_matra = 2 AND a.kode_gol = b.kdgol AND al != '' AND a.kdkelamin = '$al[jk]' AND a.blnadk=01 AND a.thnadk=2020 GROUP BY b.kdgol, a.kdkelamin ORDER BY kdgol DESC") or die (mysqli_error());
		while ($subal = mysqli_fetch_assoc($subdrilltnial)) {
			$datasubtnial[$al['jk']][] =  array(
					$subal['al'],
					(double)$subal['jml']
			);
		}

		$resultal['tnial'][] = array(

			'id'=>str_replace(" ","",strtolower($al['nama']."-".$al['jk'])),
			'name'=> $al['nama']." ( ".$jk." )",
			'data'=> $datasubtnial[$al['jk']]

		);
}

$drilltniau = mysqli_query($con, "SELECT a.nama_matra as nama, a.kdkelamin as jk FROM tbl_pers_r_matra_gol a WHERE a.kode_matra = 3 AND a.kdkelamin != '' AND a.blnadk=01 AND a.thnadk=2020 GROUP BY a.kdkelamin ORDER BY a.kdkelamin ASC;") or die (mysqli_error());
while($au = mysqli_fetch_assoc($drilltniau)){
		if ($au['jk']==1) {
			$jk = 'Laki-Laki';
		}elseif ($au['jk']==2) {
			$jk = 'Perempuan';
		}else{
			$jk = 'Laki-Laki';
		}

		$subdrilltniau = mysqli_query($con, "SELECT b.au, SUM(a.jml) as jml, kdkelamin FROM tbl_pers_r_matra_gol a, tbl_pers_gol_pangkat_bak2 b WHERE a.kode_matra = 3 AND a.kode_gol = b.kdgol AND au != '' AND a.kdkelamin = '$au[jk]' AND a.blnadk=01 AND a.thnadk=2020 GROUP BY b.kdgol, a.kdkelamin ORDER BY kdgol DESC") or die (mysqli_error());
		while ($subau = mysqli_fetch_assoc($subdrilltniau)) {
			$datasubtniau[$au['jk']][] =  array(
					$subau['au'],
					(double)$subau['jml']
			);
		}

		$resultau['tniau'][] = array(

			'id'=>str_replace(" ","",strtolower($au['nama']."-".$au['jk'])),
			'name'=> $au['nama']." ( ".$jk." )",
			'data'=> $datasubtniau[$au['jk']]

		);
}

$drillpns = mysqli_query($con, "SELECT a.nama_matra as nama, a.kdkelamin as jk FROM tbl_pers_r_matra_gol a WHERE a.kode_matra = 4 AND a.kdkelamin != '' AND a.blnadk=01 AND a.thnadk=2020 GROUP BY a.kdkelamin ORDER BY a.kdkelamin ASC;") or die (mysqli_error());
while($pns = mysqli_fetch_assoc($drillpns)){
		if ($pns['jk']==1) {
			$jk = 'Laki-Laki';
		}elseif ($pns['jk']==2) {
			$jk = 'Perempuan';
		}else{
			$jk = 'Laki-Laki';
		}

		$subdrillpns = mysqli_query($con, "SELECT b.pns, SUM(a.jml) as jml, kdkelamin FROM tbl_pers_r_matra_gol a, tbl_pers_gol_pangkat_bak2 b WHERE a.kode_matra = 4 AND a.kode_gol = b.kdgol AND pns != '' AND a.kdkelamin = '$pns[jk]' AND a.blnadk=01 AND a.thnadk=2020 GROUP BY b.kdgol, a.kdkelamin ORDER BY kdgol DESC") or die (mysqli_error());
		while ($subpns = mysqli_fetch_assoc($subdrillpns)) {
			$datasubpns[$pns['jk']][] =  array(
					$subpns['pns'],
					(double)$subpns['jml']
			);
		}

		$resultpns['pns'][] = array(

			'id'=>str_replace(" ","",strtolower($pns['nama']."-".$pns['jk'])),
			'name'=> $pns['nama']." ( ".$jk." )",
			'data'=> $datasubpns[$pns['jk']]

		);
}

$result['drilldownpers'] = array_merge($resultad['tniad'],$resultal['tnial'],$resultau['tniau'],$resultpns['pns']);

echo json_encode($result);


?>