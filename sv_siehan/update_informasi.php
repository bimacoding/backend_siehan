<?php 

header('Access-Control-Allow-Origin: *');

include_once "koneksi_plasadata.php";

$disab 	 = mysqli_query($con, "SELECT COUNT(id) AS jml_update FROM tbl_informasi WHERE status = 1") or die (mysqli_error());

while($d = mysqli_fetch_assoc($disab)){		

		$sub = mysqli_query($con, "SELECT * FROM tbl_informasi WHERE status = 1 ") or die (mysqli_error());
		
		while($s = mysqli_fetch_assoc($sub)){

				$datasub[] =  array(
									'id' => (double)$s['id'],
									'kategori' => $s['kategori'],
									'judul' => $s['judul'],
									'isi' => str_replace(array("\r","\n"),"",$s['isi']),
									'created_on' => $s['created_on'],
									'created_by' => $s['created_by'],
									'sumber' => $s['sumber']
								);

		}

	$result['informasi'][] = array(

			'jumlah' => (double)$d['jml_update'],
			'dataupdate' => $datasub
					
	);
		

}
	
echo json_encode($result);



?>