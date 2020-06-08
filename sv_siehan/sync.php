<?php 
header('Access-Control-Allow-Origin: *');

include_once "koneksi_plasadata.php";
$tbl = $_POST['table'];
$sts = $_POST['status'];
$whr = $_POST['where'];
$qu = "UPDATE $tbl SET status = $sts WHERE status = $whr ";
// echo $qu;
$sync = mysqli_query($con, $qu);
if ($sync) {
	echo 1;
}else{
	echo 0;
}
?>