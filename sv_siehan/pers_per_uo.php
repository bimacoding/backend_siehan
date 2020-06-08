<?php 

header('Access-Control-Allow-Origin: *');


include_once "koneksi_plasadata.php";



$qu1 = "SELECT nama_uo FROM tbl_pers_r_uo_korp_gol GROUP BY nama_uo ORDER BY uuo";

$rs1 = mysqli_query($con, $qu1);

while($rw1 = mysqli_fetch_array($rs1)) {

	$qu2 = "SELECT kode_matra, nama_uo, nama_matra, SUM(jml) AS jmlh 
FROM tbl_pers_r_uo_korp_gol WHERE nama_uo='$rw1[nama_uo]' AND blnadk = '01' AND thnadk = '2020'
GROUP BY nama_uo,nama_matra ORDER BY kode_matra ASC";

	$rs2 = mysqli_query($con, $qu2);	

	while($rw2 = mysqli_fetch_array($rs2)) {
		$rpl = strtolower(str_replace(" ", "_", $rw1['nama_uo']));

		$result[$rpl][] = (double)$rw2['jmlh'];

	}

}



echo json_encode($result);







?>