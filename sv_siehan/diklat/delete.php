<?php 
header('Access-Control-Allow-Origin: *');

include_once "../koneksi_plasadata.php";

$post = mysqli_query($con, "SELECT id, sts FROM tbl_diklatdetil WHERE sts = 3 ");
while($row = mysqli_fetch_assoc($post))
{
	$result[] = $row;
}
echo json_encode($result);
?>