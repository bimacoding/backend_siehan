<?php 

header('Access-Control-Allow-Origin: *');

include_once "koneksi_plasadata.php";

$cctv = mysqli_query($con, "SELECT id_kat, kategori FROM tbl_cctv GROUP BY kategori, id_kat ORDER BY kategori DESC") or die (mysqli_error());
while($a = mysqli_fetch_assoc($cctv)){

		$sub = mysqli_query($con, "SELECT id, nama, link FROM tbl_cctv WHERE kategori='$a[kategori]' ORDER BY nama ASC") or die (mysqli_error());
		
		while($s = mysqli_fetch_assoc($sub)){

				$datacctv[$a['kategori']][] =  array('idlinks'=>$s['id'],'nama'=>$s['nama'], 'links'=>$s['link']);

		}

		$result[] = array(

			'id'=>$a['id_kat'],
			'name'=>$a['kategori'],
			'data'=>$datacctv[$a['kategori']]

		);
}
	
echo json_encode($result);