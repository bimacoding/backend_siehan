<?php 
header('Access-Control-Allow-Origin: *');

include_once "koneksi_plasadata.php";


$post = mysqli_query($con, "SELECT id, urutan, matra, satker, subsatker, uraiansatker, kategori, subkategori, sub2kategori, sub3kategori, jenis, satuan, negara, tahun, CAST(REPLACE(jumlah,',','') AS UNSIGNED) AS jumlah, CAST(REPLACE(kondisi_s,',','') AS UNSIGNED) AS kondisi_s, CAST(REPLACE(kondisi_uss,',','') AS UNSIGNED) AS kondisi_uss FROM tbl_alutmatra");
$result = "";
$no = 1;
while($row = mysqli_fetch_assoc($post)){
		if($no > 1){ $result .= ",";}

		$result .= '("'.$row['id'].'","'.$row['urutan'].'","'.$row['matra'].'","'.strtoupper($row['satker']).'","'.$row['subsatker'].'","'.$row['uraiansatker'].'","'.$row['kategori'] .'","'.$row['subkategori'].'","'.$row['sub2kategori'].'","'.$row['sub3kategori'].'","'.$row['jenis'].'","'.$row['satuan'].'","'.$row['negara'].'","'.$row['tahun'].'","'.$row['jumlah'].'","'.$row['kondisi_s'].'","'.$row['kondisi_uss'].'")';	
$no++; }
echo $result;

?>