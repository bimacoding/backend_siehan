<?php 

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once "koneksi_plasadata.php";

$kt  = "SELECT COUNT(*) AS jumlah,
		CASE
		WHEN pemilik = 'BUMN' THEN 'LAINNYA'
		WHEN pemilik = 'Organisasi Hindu' THEN 'LAINNYA'
		WHEN pemilik = 'Organisasi Islam ' THEN 'LAINNYA'
		WHEN pemilik = 'Organisasi Katholik' THEN 'LAINNYA'
		WHEN pemilik = 'Organisasi Protestan' THEN 'LAINNYA'
		WHEN pemilik = 'Organisasi Sosial' THEN 'LAINNYA'
		WHEN pemilik = 'Perorangan' THEN 'LAINNYA'
		WHEN pemilik = 'Perusahaan' THEN 'LAINNYA'
		WHEN pemilik = 'SWASTA/ LAINNYA' THEN 'LAINNYA'
		ELSE 'PEMERINTAH' 
		END AS kategori
		FROM `tbl_rumahsakit_detil` WHERE covid19 = 'Y' GROUP BY kategori ORDER BY kategori DESC";

$fils ="SELECT pemilik AS nama, COUNT(*) AS jumlah,
		CASE
		WHEN pemilik = 'BUMN' THEN 'LAINNYA'
		WHEN pemilik = 'Organisasi Hindu' THEN 'LAINNYA'
		WHEN pemilik = 'Organisasi Islam ' THEN 'LAINNYA'
		WHEN pemilik = 'Organisasi Katholik' THEN 'LAINNYA'
		WHEN pemilik = 'Organisasi Protestan' THEN 'LAINNYA'
		WHEN pemilik = 'Organisasi Sosial' THEN 'LAINNYA'
		WHEN pemilik = 'Perorangan' THEN 'LAINNYA'
		WHEN pemilik = 'Perusahaan' THEN 'LAINNYA'
		WHEN pemilik = 'SWASTA/ LAINNYA' THEN 'LAINNYA'
		ELSE 'PEMERINTAH' 
		END AS kategori
		FROM `tbl_rumahsakit_detil` 
		WHERE covid19 = 'Y' AND ('LAINNYA' = CASE
		WHEN pemilik = 'BUMN' THEN 'LAINNYA'
		WHEN pemilik = 'Organisasi Hindu' THEN 'LAINNYA'
		WHEN pemilik = 'Organisasi Islam ' THEN 'LAINNYA'
		WHEN pemilik = 'Organisasi Katholik' THEN 'LAINNYA'
		WHEN pemilik = 'Organisasi Protestan' THEN 'LAINNYA'
		WHEN pemilik = 'Organisasi Sosial' THEN 'LAINNYA'
		WHEN pemilik = 'Perorangan' THEN 'LAINNYA'
		WHEN pemilik = 'Perusahaan' THEN 'LAINNYA'
		WHEN pemilik = 'SWASTA/ LAINNYA' THEN 'LAINNYA'
		END)
		GROUP BY pemilik";

$filp ="SELECT pemilik AS nama, COUNT(*) AS jumlah,
		CASE
		WHEN pemilik = 'BUMN' THEN 'LAINNYA'
		WHEN pemilik = 'Organisasi Hindu' THEN 'LAINNYA'
		WHEN pemilik = 'Organisasi Islam ' THEN 'LAINNYA'
		WHEN pemilik = 'Organisasi Katholik' THEN 'LAINNYA'
		WHEN pemilik = 'Organisasi Protestan' THEN 'LAINNYA'
		WHEN pemilik = 'Organisasi Sosial' THEN 'LAINNYA'
		WHEN pemilik = 'Perorangan' THEN 'LAINNYA'
		WHEN pemilik = 'Perusahaan' THEN 'LAINNYA'
		WHEN pemilik = 'SWASTA/ LAINNYA' THEN 'LAINNYA'
		ELSE 'PEMERINTAH' 
		END AS kategori
		FROM `tbl_rumahsakit_detil` 
		WHERE covid19 = 'Y' AND  ('PEMERINTAH' = CASE
		WHEN pemilik = 'BUMN' THEN 'LAINNYA'
		WHEN pemilik = 'Organisasi Hindu' THEN 'LAINNYA'
		WHEN pemilik = 'Organisasi Islam ' THEN 'LAINNYA'
		WHEN pemilik = 'Organisasi Katholik' THEN 'LAINNYA'
		WHEN pemilik = 'Organisasi Protestan' THEN 'LAINNYA'
		WHEN pemilik = 'Organisasi Sosial' THEN 'LAINNYA'
		WHEN pemilik = 'Perorangan' THEN 'LAINNYA'
		WHEN pemilik = 'Perusahaan' THEN 'LAINNYA'
		WHEN pemilik = 'SWASTA/ LAINNYA' THEN 'LAINNYA'
		ELSE 'PEMERINTAH'
		END)
		GROUP BY pemilik";

$idxtanah = mysqli_query($con, $kt) or die (mysqli_error());
while($i = mysqli_fetch_assoc($idxtanah)){

	$result['idxrs'][] = array(

			'name' 		=> $i['kategori'],
			'y'   		=> (double)$i['jumlah'],
			'drilldown' => str_replace(" ","",strtolower($i['kategori']))
					
	);

}		

$drilltanah = mysqli_query($con, $kt) or die (mysqli_error());
while($d = mysqli_fetch_assoc($drilltanah)){

		if ($d['kategori']=='PEMERINTAH') {

			$sub = mysqli_query($con, $filp) or die (mysqli_error());
		
			while($s = mysqli_fetch_assoc($sub)){

					$datasub[$d['kategori']][] =  array($s['nama'], (double)$s['jumlah']);

			}

		}else{

			$sub = mysqli_query($con, $fils) or die (mysqli_error());
		
			while($s = mysqli_fetch_assoc($sub)){

					$datasub[$d['kategori']][] =  array($s['nama'], (double)$s['jumlah']);

			}
		}	

		

	$result['drillrs'][] = array(

			'name' => $d['kategori'],
			'id'   => str_replace(" ","",strtolower($d['kategori'])),
			'data' => str_replace('"', '', $datasub[$d['kategori']])
					
	);
		

}
	
echo json_encode($result);



?>