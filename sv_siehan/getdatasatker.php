<?php 
header('Access-Control-Allow-Origin: *');

include_once "koneksi_plasadata.php";
$matra    = $_GET['matra'];
$kategori = $_GET['kategori'];

$kt = str_replace("-", " ", $kategori);
$mt = str_replace("-", " ", $matra);

$qu = "SELECT kategori, subkategori, jenis, tahun, subsatker,  sum(jumlah) as jlh , SUM(kondisi_s) AS knd 
FROM tbl_alutmatra 
WHERE matra='$mt' AND satker='$kt'
GROUP BY subsatker, kategori, subkategori
ORDER BY urutan, kategori ASC";
// echo $qu;
$select = mysqli_query($con, $qu);

while ($x = mysqli_fetch_assoc($select)){

	$arrayjson[] = $x;

}

echo json_encode($arrayjson);