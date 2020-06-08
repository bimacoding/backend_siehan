<?php 
header('Access-Control-Allow-Origin: *');

include_once "koneksi_plasadata.php";

$post = mysqli_query($con, "SELECT * FROM tbl_covid19 WHERE flag = 1");
$result = "";
$no = 1;
while($row = mysqli_fetch_assoc($post)){
		if($no > 1){ $result .= ",";}
		$result .= '("'.$row['idcountry'].'","'.$row['benua'].'","'.$row['subbenua'].'","'.$row['negara'].'","'.$row['code'].'","'.$row['coord'] .'","'.$row['long'] .'","'.$row['lat'] .'","'.$row['total'] .'","'.$row['baru'] .'","'.$row['meninggal'] .'","'.$row['baru_meninggal'] .'","'.$row['sembuh'] .'","'.$row['terdampak'] .'","'.$row['kritis'] .'","'.$row['persatujuta'] .'","'.$row['flag'].'")';	
$no++; }
echo $result;
?>