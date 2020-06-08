<?php 
header('Access-Control-Allow-Origin: *');

include_once "koneksi_plasadata.php";

$post = mysqli_query($con, "SELECT * FROM tbl_diklatdetil ");
$result = "";
$no = 1;
while($row = mysqli_fetch_assoc($post)){
		if($no > 1){ $result .= ",";}
		$result .= '("'.$row['id'].'","'.$row['matra'].'","'.$row['wilayah'].'","'.$row['subwilayah'].'","'.$row['lokasi'].'","'.$row['luas'].'","'.$row['kategori'] .'","'.$row['status'].'")';	
$no++; }
echo $result;
?>