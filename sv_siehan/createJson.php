<?php  
 header('Access-Control-Allow-Origin: *');
 header('Content-Type: application/json');
include_once "koneksi_plasadata.php";
// {latLng: [41.90, 12.45], name: 'Vatican City', text:'coba dlu ya'},
$post = mysqli_query($con,"SELECT idcountry, code, negara, total, terdampak, meninggal, sembuh FROM tbl_covid19 WHERE flag = 1 ORDER BY total DESC");

while($row = mysqli_fetch_assoc($post)){

		$postx = mysqli_query($con,"SELECT * FROM tbl_covid19 WHERE idcountry = '$row[idcountry]' AND flag = 1 ORDER BY total DESC");

		while($rowx = mysqli_fetch_assoc($postx)){
			$rr[$row['idcountry']] =  array((double)$rowx['lat'], (double)$rowx['long']);
		}

	$result[] = array(
		"code"=>$row['code'],
		"latLng"=> $rr[$row['idcountry']],
		"name"=> $row['negara'],
		"totals"=>(double)$row['total'],
		"terdampak"=>(double)$row['terdampak'],
		"sembuh"=>(double)$row['sembuh'],
		"meninggal"=>(double)$row['meninggal']
	);	
}
$g = json_encode($result);
$this_dir = dirname(__FILE__);
$folder = $this_dir . '/';
$file = fopen($folder."corona.json","w");  
fwrite($file,$g);  
fclose($file);
echo file_get_contents($folder."corona.json");
 

?>  