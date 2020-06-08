<?php 

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once "koneksi_plasadata.php";

$persagama = mysqli_query($con, "SELECT AGAMA as nama, KDAGAMA as ag FROM tbl_agama GROUP BY KDAGAMA ORDER BY KDAGAMA ASC") or die (mysqli_error());
		
		while($row = mysqli_fetch_assoc($persagama)){

		$subagad = mysqli_query($con, "SELECT COUNT(*) AS total FROM `tp_ad` WHERE KDAGAMA = '$row[ag]'") or die (mysqli_error());
		while ($s = mysqli_fetch_assoc($subagad)) {
			
			$resultxad[$row['ag']] = array((double)$s['total']);
		}

		$subagal = mysqli_query($con, "SELECT COUNT(*) AS total FROM `tp_al` WHERE KDAGAMA = '$row[ag]'") or die (mysqli_error());
		while ($s = mysqli_fetch_assoc($subagal)) {
			
			$resultxal[$row['ag']] = array((double)$s['total']);
		}

		$subagau = mysqli_query($con, "SELECT COUNT(*) AS total FROM `tp_au` WHERE KDAGAMA = '$row[ag]'") or die (mysqli_error());
		while ($s = mysqli_fetch_assoc($subagau)) {
			
			$resultxau[$row['ag']] = array((double)$s['total']);
		}

		$subagpns = mysqli_query($con, "SELECT SUM(t1.total) AS total FROM 
								(SELECT COUNT(*) AS total FROM tp_ad_pns a WHERE a.KDAGAMA = '$row[ag]'
								UNION ALL
								SELECT COUNT(*) AS total FROM tp_al_pns b WHERE b.KDAGAMA = '$row[ag]'
								UNION ALL
								SELECT COUNT(*) AS total FROM tp_au_pns c WHERE c.KDAGAMA = '$row[ag]' ) AS t1") or die (mysqli_error());
		while ($s = mysqli_fetch_assoc($subagpns)) {
			
			$resultxpns[$row['ag']] = array((double)$s['total']);
		}

		$resultxc[$row['ag']] = array_merge($resultxad[$row['ag']],$resultxal[$row['ag']],$resultxau[$row['ag']],$resultxpns[$row['ag']]) ;
		$resultno[$row['ag']] = array_sum($resultxc[$row['ag']]);
		$resultxb[] = array(
									'name'=>$row['nama'],
									'y'=>$resultno[$row['ag']],
									'drilldown'=>str_replace(" ","",strtolower($row['nama']))
								);
		$result['persagama'] = $resultxb;
}

$drillpersagama = mysqli_query($con, "SELECT AGAMA as nama, KDAGAMA as ag FROM tbl_agama GROUP BY KDAGAMA ORDER BY KDAGAMA ASC") or die (mysqli_error());
		
		while($row = mysqli_fetch_assoc($drillpersagama)){

		$subagad = mysqli_query($con, "SELECT COUNT(*) AS total, uo FROM `tp_ad` WHERE KDAGAMA = '$row[ag]'") or die (mysqli_error());
		while ($s = mysqli_fetch_assoc($subagad)) {
			
			$resultxad[$row['ag']][$row['nama']][] = array('TNI '.$s['uo'], (double)$s['total']);
		}

		$subagal = mysqli_query($con, "SELECT COUNT(*) AS total, uo FROM `tp_al` WHERE KDAGAMA = '$row[ag]'") or die (mysqli_error());
		while ($s = mysqli_fetch_assoc($subagal)) {
			
			$resultxal[$row['ag']][$row['nama']][] = array('TNI '.$s['uo'], (double)$s['total']);
		}

		$subagau = mysqli_query($con, "SELECT COUNT(*) AS total, uo FROM `tp_au` WHERE KDAGAMA = '$row[ag]'") or die (mysqli_error());
		while ($s = mysqli_fetch_assoc($subagau)) {
			
			$resultxau[$row['ag']][$row['nama']][] = array('TNI '.$s['uo'], (double)$s['total']);
		}

		$subagpns = mysqli_query($con, "SELECT SUM(t1.total) AS total, 'PNS' AS nama FROM 
								(SELECT COUNT(*) AS total FROM tp_ad_pns a WHERE a.KDAGAMA = '$row[ag]'
								UNION ALL
								SELECT COUNT(*) AS total FROM tp_al_pns b WHERE b.KDAGAMA = '$row[ag]'
								UNION ALL
								SELECT COUNT(*) AS total FROM tp_au_pns c WHERE c.KDAGAMA = '$row[ag]' ) AS t1") or die (mysqli_error());
		while ($s = mysqli_fetch_assoc($subagpns)) {
			
			$resultxpns[$row['ag']][$row['nama']][] = array($s['nama'], (double)$s['total']);
		}

		$resultxc[$row['ag']][$row['nama']] = array_merge($resultxad[$row['ag']][$row['nama']],$resultxal[$row['ag']][$row['nama']],$resultxau[$row['ag']][$row['nama']],$resultxpns[$row['ag']][$row['nama']]) ;
		$result['drillpersagama'][] = array(
									'name'=>$row['nama'],
									'id'=>str_replace(" ","",strtolower($row['nama'])),
									'data'=>$resultxc[$row['ag']][$row['nama']]
								);
}
	
echo json_encode($result);



?>