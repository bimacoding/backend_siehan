<?php 
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once "koneksi_plasadata.php";
// {latLng: [41.90, 12.45], name: 'Vatican City', text:'coba dlu ya'},
$post = mysqli_query($con, "SELECT idcountry, code, negara, total, terdampak, meninggal, sembuh FROM tbl_covid19 WHERE  code!= '' AND flag = 1 ORDER BY total DESC");

while($row = mysqli_fetch_assoc($post)){

		$postx = mysqli_query($con, "SELECT * FROM tbl_covid19 WHERE idcountry = '$row[idcountry]' AND code!= '' AND flag = 1 ORDER BY total DESC");

		while($rowx = mysqli_fetch_assoc($postx)){
			$rr[$row['idcountry']] =  array((double)$rowx['lat'], (double)$rowx['long']);
		}

// $text = 'Total : '.$row[total].'<br>';
// $text .= 'Terdampak : '.$row[terdampak].'<br>';
// $text .= 'Sembuh : '.$row[sembuh].'<br>';
// $text .= 'Meninggal : '.$row[meninggal].'';
	$result[] = array(
		"code"=>$row['code'],
		"latLng"=> $rr[$row['idcountry']],
		"name"=> $row['negara'],
		// "text"=>$text,
		"totals"=>(double)$row['total'],
		"terdampak"=>(double)$row['terdampak'],
		"sembuh"=>(double)$row['sembuh'],
		"meninggal"=>(double)$row['meninggal']
	);	
}
echo json_encode($result);
// echo str_replace(array('"code"','"name"','"latLng"','"text"','"total"','"terdampak"','"sembuh"','"meninggal"'), array('code','name','latLng','text','total','terdampak','sembuh','meninggal'), $g);

?>
