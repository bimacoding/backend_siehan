<?php 
header('Access-Control-Allow-Origin: *');

include_once "koneksi_plasadata.php";

$rs = mysqli_query($con, "SELECT COUNT(a.PKT) AS total, IF(a.PKT BETWEEN 11 AND 45, 'PNS', 'TNI AD') AS nama, IF(a.PKT BETWEEN 11 AND 45, '4', '1') AS matra FROM tbl_tniad a  
							WHERE a.`PKT` IS NOT NULL AND ((a.`PKT` BETWEEN 11 AND 45 ) OR (a.`PKT` BETWEEN 51 AND 98 ))
							GROUP BY a.`PKT` BETWEEN 11 AND 45 , a.`PKT` BETWEEN 51 AND 98") or die (mysqli_error());		
		while($row = mysqli_fetch_assoc($rs)){

		$result[] = array(

			'name' => $row['nama'],
			'jml'    => $row['total'],
			'idname'  => str_replace(" ","",strtolower($row['nama']))

		);
}
echo json_encode($result);


?>

