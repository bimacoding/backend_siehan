<?php 

header('Access-Control-Allow-Origin: *');

include_once "koneksi_plasadata.php";

$regul 	 = mysqli_query($con, "SELECT * FROM tbl_files ORDER BY id") or die (mysqli_error());

while($r = mysqli_fetch_assoc($regul)){		


	$result['list'][] = array(
			'id' => $r['id'],
			'judul' => $r['judul'],
			'tentang' => $r['tentang'],
			'ket' => $r['ket'],
			'files' => $r['files']
					
	);
		

}

$files 	 = mysqli_query($con, "SELECT files FROM tbl_files ORDER BY id") or die (mysqli_error());

while($f = mysqli_fetch_assoc($files)){		


	$result['getfile'][] = array(

			'url' => 'http://plasadigital.com/sisfohanneg/sv_siehan/files/'.$f['files']
					
	);
		

}
	
echo json_encode($result);

?>