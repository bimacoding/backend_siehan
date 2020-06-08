<?php 
header('Access-Control-Allow-Origin: *');
// header('Content-Type: application/json');
include_once "koneksi_plasadata.php";

$post = mysqli_query($con, "SELECT * FROM tbl_covid19 WHERE code!= '' AND flag = 1");

while($row = mysqli_fetch_assoc($post)){
		$result[] = array($row['code']=> (double)$row['coord']);	
	}
$r = json_encode($result);
echo str_replace(array('{','}','[',']'), array('','','{','}'), $r);
?>