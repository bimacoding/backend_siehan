<?php 
header('Access-Control-Allow-Origin: *');

include_once "koneksi_plasadata.php";

$rs = mysqli_query($con, "SELECT a.`MATRA` as matra, b.`nama_angkatan` as nama, COUNT(MATRA) AS total FROM tbl_mabestni a LEFT JOIN tbl_angkatan b ON a.`MATRA` = b.id GROUP BY MATRA") or die (mysqli_error());
		
		while($row = mysqli_fetch_assoc($rs)){

		$result['personel'][] = array(

			'name' => $row['nama'],
			'y'    => (int)$row['total'],
			'drilldown'  => str_replace(" ","",strtolower($row['nama']))

		);
}

$tniad = mysqli_query($con, "SELECT b.nm_pkt, COUNT(a.row_id) AS jml FROM tbl_mabestni a, tbl_pkt b WHERE a.`MATRA` = 1 AND a.`KD_PKT` = b.`kd_pkt` GROUP BY b.`kd_pkt` ORDER BY b.`kd_pkt` DESC") or die (mysqli_error());
while($ad = mysqli_fetch_assoc($tniad)){

		$result['tniad'][] = array(

			$ad['nm_pkt'],
			(int)$ad['jml']

		);
}

$tnial = mysqli_query($con, "SELECT b.nm_pkt, COUNT(a.row_id) AS jml FROM tbl_mabestni a, tbl_pkt b WHERE a.`MATRA` = 2 AND a.`KD_PKT` = b.`kd_pkt` GROUP BY b.`kd_pkt` ORDER BY b.`kd_pkt` DESC") or die (mysqli_error());
while($al = mysqli_fetch_assoc($tnial)){

		$result['tnial'][] = array(

			$al['nm_pkt'],
			(int)$al['jml']

		);
}

$tniau = mysqli_query($con, "SELECT b.nm_pkt, COUNT(a.row_id) AS jml FROM tbl_mabestni a, tbl_pkt b WHERE a.`MATRA` = 3 AND a.`KD_PKT` = b.`kd_pkt` GROUP BY b.`kd_pkt` ORDER BY b.`kd_pkt` DESC") or die (mysqli_error());
while($au = mysqli_fetch_assoc($tniau)){

		$result['tniau'][] = array(

			$au['nm_pkt'],
			(int)$au['jml']

		);
}

$pns = mysqli_query($con, "SELECT b.nm_pkt, COUNT(a.row_id) AS jml FROM tbl_mabestni a, tbl_pkt b WHERE a.`MATRA` = 4 AND a.`KD_PKT` = b.`kd_pkt` GROUP BY b.`kd_pkt` ORDER BY b.`kd_pkt` DESC") or die (mysqli_error());
while($p = mysqli_fetch_assoc($pns)){

		$result['pns'][] = array(

			$p['nm_pkt'],
			(int)$p['jml']

		);
}


$goltniad = mysqli_query($con, "SELECT b.nama_gol, COUNT(a.row_id) AS jml FROM tbl_mabestni a, tbl_pkt b WHERE a.`MATRA` = 1 AND a.`KD_PKT` = b.`kd_pkt` GROUP BY b.`kd_gol` ORDER BY b.`kd_gol` ASC") or die (mysqli_error());
while($gad = mysqli_fetch_assoc($goltniad)){

		$result['goltniad'][] = array(

			$gad['nama_gol'],
			(int)$gad['jml']

		);

}

$goltnial = mysqli_query($con, "SELECT b.nama_gol, COUNT(a.row_id) AS jml FROM tbl_mabestni a, tbl_pkt b WHERE a.`MATRA` = 2 AND a.`KD_PKT` = b.`kd_pkt` GROUP BY b.`kd_gol` ORDER BY b.`kd_gol` ASC") or die (mysqli_error());
while($gal = mysqli_fetch_assoc($goltnial)){

		$result['goltnial'][] = array(

			$gal['nama_gol'],
			(int)$gal['jml']

		);
}

$goltniau = mysqli_query($con, "SELECT b.nama_gol, COUNT(a.row_id) AS jml FROM tbl_mabestni a, tbl_pkt b WHERE a.`MATRA` = 3 AND a.`KD_PKT` = b.`kd_pkt` GROUP BY b.`kd_gol` ORDER BY b.`kd_gol` ASC") or die (mysqli_error());
while($gau = mysqli_fetch_assoc($goltniau)){

		$result['goltniau'][] = array(

			$gau['nama_gol'],
			(int)$gau['jml']

		);
}

$golpns = mysqli_query($con, "SELECT b.nama_gol, COUNT(a.row_id) AS jml FROM tbl_mabestni a, tbl_pkt b WHERE a.`MATRA` = 4 AND a.`KD_PKT` = b.`kd_pkt` GROUP BY b.`kd_gol` ORDER BY b.`kd_gol` ASC") or die (mysqli_error());
while($gp = mysqli_fetch_assoc($golpns)){

		$result['golpns'][] = array(

			$gp['nama_gol'],
			(int)$gp['jml']

		);
}


echo json_encode($result);

?>