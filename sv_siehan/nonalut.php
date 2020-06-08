<?php 
header('Access-Control-Allow-Origin: *');

include_once "koneksi_plasadata.php";

$post = mysqli_query($con, "SELECT * FROM tbl_alutnonkemhan");
$result = "";
$no = 1;
while($row = mysqli_fetch_assoc($post)){
		if($no > 1){ $result .= ",";}
		$result .= '("'.$row['id'].'","'.$row['judul'].'","'.str_replace('"', '', $row['isi']).'","'.$row['created_on'].'","'.$row['created_by'].'","'.$row['sumber'] .'","'.$row['kategori'].'")';	
$no++; }
echo $result;
?>