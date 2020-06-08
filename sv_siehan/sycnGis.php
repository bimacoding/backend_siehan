<?php 
header('Access-Control-Allow-Origin: *');

include_once "koneksi_plasadata.php";
$tbl = $_POST['table'];
$sts = $_POST['status'];
$whr = $_POST['where'];
$id  = $_POST['autono'];

if (!empty($id)) {
	$qu = "UPDATE $tbl SET flag = $sts WHERE flag = $whr AND autono = $id";
}else{
	$qu = "UPDATE $tbl SET flag = $sts WHERE flag = $whr";
}

// echo $qu;
$sync = mysqli_query($con, $qu);
if ($sync) {
	echo 1;
}else{
	echo 0;
}
?>