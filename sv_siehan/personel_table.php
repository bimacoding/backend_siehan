<!-- <?php 
// header('Access-Control-Allow-Origin: *');

// include_once "koneksi_plasadata.php";

// 	$post = mysqli_query($con, "SELECT usatker, usubsatker, 
// 		kode_gol, singkatan, nama_gol, nama_matra, sum(jml) as jml 
// 		FROM tbl_pers_r_uo_korp_gol
// 		WHERE uuo='1'
// 		GROUP by usatker, usubsatker, nama_gol, nama_matra
// 		ORDER BY usatker ASC");
// 	$result = "";
// 	$no = 1;
// 	while($row = mysqli_fetch_assoc($post)){
// 			if($no > 1){ $result .= ",";}
// 			$result .= '("'.$row['singkatan'].'","'.$row['nama_gol'].'","'.$row['jml'].'")';	
// 	$no++; }

// echo $result;
// ?> -->

<?php 
header('Access-Control-Allow-Origin: *');

include_once "koneksi_plasadata.php";

$post = mysqli_query($con, "SELECT * FROM tbl_pers_r_uo_korp_gol");
$result = "";
$no = 1;
while($row = mysqli_fetch_assoc($post)){
		if($no > 1){ $result .= ",";}
		$result .= '("'.$row['autono'].'","'.$row['kode_uo'].'","'.$row['nama_uo'].'","'.$row['kode_satker'].'","'.$row['nama_satker'].'","'.$row['kode_matra'].'","'.$row['nama_matra'].'","'.$row['kode_gol'].'","'.$row['nama_gol'].'","'.$row['kode_korp'].'","'.$row['nama_korp'].'","'.$row['jml'].'","'.$row['gaji'].'","'.$row['blnadk'].'","'.$row['thnadk'].'","'.$row['uuo'].'","'.$row['usatker'].'","'.$row['usubsatker'].'","'.$row['udetilsatker'].'","'.$row['singkatan'].'")';	
$no++; }
echo $result;
?>