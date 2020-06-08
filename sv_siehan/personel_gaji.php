<?php 

header('Access-Control-Allow-Origin: *');

include_once "koneksi_plasadata.php";

$tbelneg = mysqli_query($con, "SELECT kode_gol, nama_gol, gaji FROM tbl_pers_r_uo_korp_gol 
WHERE nama_gol!='-' AND nama_matra!='PNS'
GROUP BY kode_gol 
ORDER BY kode_gol DESC") or die (mysqli_error());
		
		while($tb = mysqli_fetch_assoc($tbelneg)){
		if ($tb['nama_gol']=='Jenderal') {
				$nama = '****';
			}elseif ($tb['nama_gol']=='Letnan Jenderal') {
				$nama = '***';
			}elseif ($tb['nama_gol']=='Mayor Jenderal') {
				$nama = '**';
			}elseif ($tb['nama_gol']=='Brigadir Jenderal') {
				$nama = '*';
			}else{
				$nama = $tb['nama_gol'];
			}
		$result['persgaji'][] = array(
			
			'name' 		=> $nama,
			'y'    		=> (double)$tb['gaji']
		
		);
		

}
	
echo json_encode($result);



?>
