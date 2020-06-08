<?php 
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once "koneksi_plasadata.php";

$personel = mysqli_query($con, "SELECT KDKELAMIN as jk FROM `tp_ad` GROUP BY KDKELAMIN") or die (mysqli_error());
		
		while($row = mysqli_fetch_assoc($personel)){
		if ($row['jk']==1) {
			$jk = 'Laki-Laki';
		}elseif ($row['jk']==2) {
			$jk = 'Perempuan';
		}else{
			$jk = 'Laki-Laki';
		}

		$subpersad = mysqli_query($con, "SELECT uo, COUNT(*) AS total, KDKELAMIN as jk FROM `tp_ad` WHERE KDKELAMIN='$row[jk]' AND TGLDEAD IS NULL") or die (mysqli_error());
		while ($s = mysqli_fetch_assoc($subpersad)) {
			
			$resultxad[$row['jk']][] = array(

				'name' => 'TNI '.$s['uo'],
				'y'    => (int)$s['total'],
				'drilldown'  =>  strtolower('TNI'.$s['uo']."-".$s['jk'])

			);
		}
		$subpersal = mysqli_query($con, "SELECT uo, COUNT(*) AS total, KDKELAMIN as jk FROM `tp_al` WHERE KDKELAMIN='$row[jk]' AND TGLDEAD IS NULL") or die (mysqli_error());
		while ($s = mysqli_fetch_assoc($subpersal)) {
			
			$resultxal[$row['jk']][] = array(

				'name' => 'TNI '.$s['uo'],
				'y'    => (int)$s['total'],
				'drilldown'  =>  strtolower('TNI'.$s['uo']."-".$s['jk'])

			);
		}
		$subpersau = mysqli_query($con, "SELECT uo, COUNT(*) AS total, KDKELAMIN as jk FROM `tp_au` WHERE KDKELAMIN='$row[jk]' AND TGLDEAD IS NULL") or die (mysqli_error());
		while ($s = mysqli_fetch_assoc($subpersau)) {
			
			$resultxau[$row['jk']][] = array(

				'name' => 'TNI '.$s['uo'],
				'y'    => (int)$s['total'],
				'drilldown'  =>  strtolower('TNI'.$s['uo']."-".$s['jk'])

			);
		}

		$resultx[$row['jk']] = array_merge($resultxad[$row['jk']],$resultxal[$row['jk']],$resultxau[$row['jk']]);

		$result['personel'][] = array(

			'name' => $jk,
			'data' => $resultx[$row['jk']]

		);

}

$drilltniad = mysqli_query($con, "SELECT MATRA as nama, KDKELAMIN AS jk FROM tp_ad WHERE KDKELAMIN!='' GROUP BY KDKELAMIN ASC") or die (mysqli_error());
while($ad = mysqli_fetch_assoc($drilltniad)){
		if ($ad['jk']==1) {
			$jk = 'Laki-Laki';
		}elseif ($ad['jk']==2) {
			$jk = 'Perempuan';
		}else{
			$jk = 'Laki-Laki';
		}

		$subdrilltniad = mysqli_query($con, "SELECT b.ad, COUNT(a.KDGOL) AS jml, KDKELAMIN FROM tp_ad a, `tbl_pers_gol_pangkat` b 
									  WHERE a.KDGOL!='' AND a.KDGOL=b.kdgol AND KDKELAMIN='$ad[jk]' AND TGLDEAD IS NULL 
									  GROUP BY a.KDGOL DESC") or die (mysqli_error());
		while ($subad = mysqli_fetch_assoc($subdrilltniad)) {
				$datasubtniad[$ad['jk']][] =  array(
					$subad['ad'],
					(double)$subad['jml']
			);
		}

		$resultad['tniad'][] = array(

			'id'=>str_replace(" ","",strtolower('TNI'.$ad['nama']."-".$ad['jk'])),
			'name'=> 'TNI '.$ad['nama']." ( ".$jk." )",
			'data'=> $datasubtniad[$ad['jk']]

		);
}


$drilltnial = mysqli_query($con, "SELECT MATRA as nama, KDKELAMIN AS jk FROM tp_al WHERE KDKELAMIN!='' GROUP BY KDKELAMIN ASC") or die (mysqli_error());
while($al = mysqli_fetch_assoc($drilltnial)){
		if ($al['jk']==1) {
			$jk = 'Laki-Laki';
		}elseif ($al['jk']==2) {
			$jk = 'Perempuan';
		}else{
			$jk = 'Laki-Laki';
		}

		$subdrilltnial = mysqli_query($con, "SELECT b.al, COUNT(a.KDGOL) AS jml, KDKELAMIN FROM tp_al a, `tbl_pers_gol_pangkat` b 
									  WHERE a.KDGOL!='' AND a.KDGOL=b.kdgol AND KDKELAMIN='$al[jk]' AND TGLDEAD IS NULL 
									  GROUP BY a.KDGOL DESC") or die (mysqli_error());
		while ($subal = mysqli_fetch_assoc($subdrilltnial)) {
				$datasubtnial[$al['jk']][] =  array(
					$subal['al'],
					(double)$subal['jml']
			);
		}

		$resultal['tnial'][] = array(

			'id'=>str_replace(" ","",strtolower('TNI'.$al['nama']."-".$al['jk'])),
			'name'=> 'TNI '.$al['nama']." ( ".$jk." )",
			'data'=> $datasubtnial[$al['jk']]

		);
}

$drilltniau = mysqli_query($con, "SELECT MATRA as nama, KDKELAMIN AS jk FROM tp_au WHERE KDKELAMIN!='' GROUP BY KDKELAMIN ASC") or die (mysqli_error());
while($au = mysqli_fetch_assoc($drilltniau)){
		if ($au['jk']==1) {
			$jk = 'Laki-Laki';
		}elseif ($au['jk']==2) {
			$jk = 'Perempuan';
		}else{
			$jk = 'Laki-Laki';
		}

		$subdrilltniau = mysqli_query($con, "SELECT b.au, COUNT(a.KDGOL) AS jml, KDKELAMIN FROM tp_au a, `tbl_pers_gol_pangkat` b 
									  WHERE a.KDGOL!='' AND a.KDGOL=b.kdgol AND KDKELAMIN='$au[jk]' AND TGLDEAD IS NULL 
									  GROUP BY a.KDGOL DESC") or die (mysqli_error());
		while ($subau = mysqli_fetch_assoc($subdrilltniau)) {
				$datasubtniau[$au['jk']][] =  array(
					$subau['au'],
					(double)$subau['jml']
			);
		}

		$resultau['tniau'][] = array(

			'id'=>str_replace(" ","",strtolower('TNI'.$au['nama']."-".$au['jk'])),
			'name'=> 'TNI '.$au['nama']." ( ".$jk." )",
			'data'=> $datasubtniau[$au['jk']]

		);
}

$result['drilldownpers'] = array_merge($resultad['tniad'],$resultal['tnial'],$resultau['tniau']);

echo json_encode($result);


?>