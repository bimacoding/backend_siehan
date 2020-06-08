<?php 
header('Access-Control-Allow-Origin: *');

include_once "koneksi_plasadata.php";

$post = mysqli_query($con, "SELECT * FROM tbl_teroris");
$result = "";
$no = 1;
while($row = mysqli_fetch_assoc($post))
{

    if($no > 1){ $result .= ",";}
    $alt = $row['alamat'];
    $ket = $row['keterangan'];
    $result .= '("'.$row['id'].'","'.$row['kategori'].'","'.$row['kondisi'].'","'.$row['nama'].'","'.$row['alias'].'","'.$row['tempatlahir'].'","'.$row['warganegara'].'","'.$alt.'","'.$ket.'","'.$row['created_on'].'","'.$row['created_by'].'","'.$row['sumber'].'","'.$row['status'].'")';

$no++;

} 

echo $result;
?>