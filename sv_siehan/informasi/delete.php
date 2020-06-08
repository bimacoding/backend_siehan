<?php 
header('Access-Control-Allow-Origin: *');

include_once "../koneksi_plasadata.php";

$post = mysqli_query($con, "SELECT id, status FROM tbl_informasi WHERE status = 3 AND kategori != 'CYBER' ");
while($row = mysqli_fetch_assoc($post))
{
	$result[] = $row;
}
echo json_encode($result);
?>