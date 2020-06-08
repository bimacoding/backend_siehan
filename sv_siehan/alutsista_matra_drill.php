<?php 
error_reporting(1);
header('Access-Control-Allow-Origin: *');
header("Content-type: application/json; charset=utf-8");

include_once "koneksi_plasadata.php";

$qu1 = "SELECT matra FROM tbl_alutmatra GROUP BY matra";

$rs1 = mysqli_query($con, $qu1);

while($rw1 = mysqli_fetch_array($rs1)) {

	$qu2 = "SELECT matra, kategori, SUM(CAST(REPLACE(jumlah,',','') AS UNSIGNED)) AS jumlah FROM tbl_alutmatra WHERE matra='$rw1[matra]' AND bln = 1 AND thn = 2020 GROUP BY kategori";

	$rs2 = mysqli_query($con, $qu2);	

	while($rw2 = mysqli_fetch_array($rs2)) {
		$rpl = strtolower(str_replace(" ", "-", $rw2['kategori'].'-'. $rw2['matra']));

		$qu3 = "SELECT subkategori, SUM(CAST(REPLACE(jumlah,',','') AS UNSIGNED)) AS jumlah, SUM(CAST(REPLACE(kondisi_s,',','') AS UNSIGNED)) AS kondisi FROM tbl_alutmatra WHERE  kategori='$rw2[kategori]' AND matra='$rw1[matra]' AND bln = 1 AND thn = 2020 GROUP BY subkategori";

		$rs3 = mysqli_query($con, $qu3);
		while ($rw3 = mysqli_fetch_array($rs3)) {

			$datasub0[$rw1['matra']][$rw2['kategori']][] =  $rw3['subkategori'];
			$datasub1[$rw1['matra']][$rw2['kategori']][] =  (double)$rw3['jumlah'];
			$datasub2[$rw1['matra']][$rw2['kategori']][] =  (double)$rw3['kondisi'];

		}

		$result[$rpl][] = $datasub0[$rw1['matra']][$rw2['kategori']];
		$result[$rpl][] = $datasub1[$rw1['matra']][$rw2['kategori']];
		$result[$rpl][] = $datasub2[$rw1['matra']][$rw2['kategori']];
	}
}

echo json_encode($result);

?>