<?php 
header('Access-Control-Allow-Origin: *');

include_once "koneksi_plasadata.php";

$rs = mysqli_query($con, "SELECT wilayah, jumlah FROM tbl_nuklir ORDER BY jumlah DESC") or die (mysqli_error());
		
		while($row = mysqli_fetch_assoc($rs)){

		$result[] = array(

			'name' => $row['wilayah'],
			'y'    => (int)$row['jumlah']

		);
}

echo json_encode($result);
?>