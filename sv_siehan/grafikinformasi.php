<?php 
header('Access-Control-Allow-Origin: *');

include_once "koneksi_plasadata.php";

$rs = mysqli_query($con, "SELECT kategori, COUNT(id) AS total FROM tbl_informasi GROUP BY kategori ORDER BY COUNT(id) DESC") or die (mysqli_error());
		
		while($row = mysqli_fetch_assoc($rs)){

		$result[] = array(

			'name' => $row['kategori'],
			'y'    => (int)$row['total']

		);
	}

echo json_encode($result);

?>