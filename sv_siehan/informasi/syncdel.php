<?php 
header('Access-Control-Allow-Origin: *');

include_once "../koneksi_plasadata.php";
$tbl = $_POST['table'];
$whr = $_POST['where'];
$qu = "DELETE FROM $tbl WHERE id = $whr ";
// echo $qu;
$sync = mysqli_query($con, $qu);
if ($sync) {
	echo 1;
}else{
	echo 0;
}
?>