<?php 

header('Access-Control-Allow-Origin: *');

include_once "koneksi_plasadata.php";

$trending = mysqli_query($con, "SELECT kategori FROM tbl_trending WHERE created_on BETWEEN '2020-01-01' AND '2020-12-31' ") or die (mysqli_error());
		
while($t = mysqli_fetch_assoc($trending)){

	echo $t['kategori']. " ";
		
}
?>