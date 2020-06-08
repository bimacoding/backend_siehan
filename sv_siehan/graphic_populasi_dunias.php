<?php 
header('Access-Control-Allow-Origin: *');

include_once "koneksi_plasadata.php";

$pop = mysqli_query($con, "SELECT tahun, wilayah FROM tbl_populasi GROUP BY wilayah ORDER BY jumlah DESC;") or die (mysqli_error());
		
while($row = mysqli_fetch_assoc($pop)){

	$subpop = mysqli_query($con, "SELECT tahun, wilayah, jumlah FROM tbl_populasi WHERE wilayah = '$row[wilayah]' GROUP BY tahun ORDER BY jumlah") or die (mysqli_error());
		
		while($sad = mysqli_fetch_assoc($subpop)){

				$result[$row['wilayah']][] =  array(
					'name' => $sad['tahun'],
					'y' => (double)$sad['jumlah'],
					'drilldown' => str_replace(" ","",strtolower($sad['tahun']."-".$sad['wilayah']))
				);

		}
}


$drillpops = mysqli_query($con, "SELECT a.wilayah AS wil , b.tahun AS th FROM (SELECT tahun FROM tbl_populasi GROUP BY tahun) AS b, (SELECT wilayah FROM tbl_populasi GROUP BY wilayah) AS a ORDER BY wilayah, tahun ASC") or die (mysqli_error());
while($dsc = mysqli_fetch_assoc($drillpops)){
	
	$subdrillpops = mysqli_query($con, "SELECT wilayah, tahun, (wanita*jumlah)/100 as wn, (pria*jumlah)/100 as pr FROM tbl_populasi WHERE tahun = '$dsc[th]' AND wilayah = '$dsc[wil]'  ORDER BY wilayah ASC");
	
	while ( $xsc = mysqli_fetch_assoc($subdrillpops)) {

		$datas[$dsc['wil']][$dsc['th']] = array(
			array(
				'name'=>'Pria',
				'y'   =>(int)$xsc['pr'],
			),
			array(
				'name'=>'Wanita',
				'y'   =>(int)$xsc['wn'],
			)
		);

	}
	
	$resultsx[] = array(
		'name' => 'Tahun '.$dsc['th'],
		'colorByPoint'=> true,
		'inverted' => false,
		'id'   => str_replace(" ","",strtolower($dsc['th']."-".$dsc['wil'])),
		'data' => $datas[$dsc['wil']][$dsc['th']],
		'stack'=> $dsc['th'],
	); 

}

$x['drillpop'] = $resultsx;
$bc = array_merge($result, $x);
echo json_encode($bc);
// echo json_encode($x);
?>