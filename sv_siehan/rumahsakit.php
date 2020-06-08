<?php 
header('Access-Control-Allow-Origin: *');
// header("Content-type: application/json");
header("Content-type: application/json; charset=utf-8");


include_once "koneksi_plasadata.php";

$post = mysqli_query($con, "SELECT * FROM `tbl_rumahsakit_detil` WHERE flag = 1 LIMIT 500") or die (mysqli_error($con));
$cek = mysqli_num_rows($post);
if ($cek >= 1) {
	while($row = mysqli_fetch_array($post)){

		$result[] = array(

						 'autono'=>$row['autono'],
						 'kd_prov'=>$row['kd_prov'],
						 'kode_prop'=>$row['kode_prop'],
						 'nama_prop'=> $row['nama_prop'],
						 'kode_rs'=> $row['kode_rs'],
						 'nama_rs'=> htmlentities($row['nama_rs']),
						 'alamat'=> htmlentities($row['alamat']),
						 'telp'=> $row['telp'],
						 'kelas'=> $row['kelas'],
						 'jenis_rs'=> $row['jenis_rs'],
						 'pemilik'=> $row['pemilik'],
						 'vvip'=> $row['vvip'],
						 'vip'=> $row['vip'],
						 'kls1'=> $row['kls1'],
						 'kls2'=> $row['kls2'],
						 'kls3'=> $row['kls3'],
						 'status_update'=>$row['status_update'],
						 'tahun'=>$row['tahun'],
						 'provinsi'=> $row['provinsi'],
						 'covid19'=> $row['covid19'],
						 'jml_dokter'=>(double)$row['jml_dokter'],
						 'jml_perawat'=>(double)$row['jml_perawat'],
						 'kor_long'=>(double)$row['kor_long'],
						 'kor_lat'=>(double)$row['kor_lat']
						 
					);
    
	}	

	echo json_encode($result);
	
}else{
	// mysqli_query($con, "UPDATE `tbl_rumahsakit_detil` SET flag = 1 WHERE flag = 0") or die (mysqli_error($con));
	echo $cek;
}




?>