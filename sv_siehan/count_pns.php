<?php 
header('Access-Control-Allow-Origin: *');

include_once "koneksi_plasadata.php";

$allpns = mysqli_query($con, "SELECT COUNT(row_id) all_pns FROM tbl_pegawai");
while($row = mysqli_fetch_assoc($rs)){

		$result[] = $allpns;
}
echo json_encode($result);
?>