<?php 

header('Access-Control-Allow-Origin: *');

include_once "koneksi_plasadata.php";

$disab = mysqli_query($con, "SELECT a.negara,b.subcategory_ind AS subcategory,SUM(a.strength) AS total FROM tbl_countrystrength a
									LEFT JOIN tbl_subcategory b ON a.subcategory = b.subcategory
									WHERE a.negara = 'Indonesia' AND a.category = 'MANPOWER'
									GROUP BY a.negara, a.subcategory
									ORDER BY SUM(a.strength) DESC") or die (mysqli_error());
		
		while($d = mysqli_fetch_assoc($disab)){

		$result['datakomcad'][] = array(

			'name' 		=> $d['subcategory'],
			'y'    		=> (double)$d['total']
		
		);
		
}

$tbelneg = mysqli_query($con, "SELECT 'Bela Negara' AS nama, SUM(jumlah) AS total FROM tbl_belanegara") or die (mysqli_error());
		
		while($tb = mysqli_fetch_assoc($tbelneg)){

		$result['totalbelneg'][] = array(

			'name' 		=> $tb['nama'],
			'y'    		=> (double)$tb['total']
		
		);
		

}

$belneg = mysqli_query($con, "SELECT wilayah, jumlah FROM tbl_belanegara ORDER BY wilayah") or die (mysqli_error());
		
		while($b = mysqli_fetch_assoc($belneg)){

		$result['belneg'][] = array(

			'name' 		=> $b['wilayah'],
			'data'      => array(
				(double)$b['jumlah']
				)
		
		);
		

}
	
echo json_encode($result);



?>
