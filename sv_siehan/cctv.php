<?php 
header('Access-Control-Allow-Origin: *');

include_once "koneksi_plasadata.php";

$post = mysqli_query($con, "SELECT * FROM tbl_cctv");
$result = "";
$no = 1;
while($row = mysqli_fetch_assoc($post)){
		if($no > 1){ $result .= ",";}
		$result .= '("'.$row['id'].'","'.$row['nama'].'","'.$row['link'].'","'.$row['sumber'].'","'.$row['status'].'")';	
$no++; }
echo $result;
?>