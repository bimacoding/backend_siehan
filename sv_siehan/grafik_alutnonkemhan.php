<?php 
header('Access-Control-Allow-Origin: *');

include_once "koneksi_plasadata.php";

$rs = mysqli_query($con, "SELECT judul, keterangan FROM tbl_alutnonkemhan ORDER BY keterangan DESC") or die (mysqli_error());
		
		while($row = mysqli_fetch_assoc($rs)){

		$result[] = array(

			'name' => $row['judul'],
			'y'    => (int)$row['keterangan']

		);
}

echo json_encode($result);
?>