<?php 
header('Access-Control-Allow-Origin: *');

include_once "koneksi_plasadata.php";

$kat = $_POST['kat'];

if($kat == 'sertifikat'){

$ser = mysqli_query($con, "SELECT wilayah, jumlah FROM tbl_sertifikat WHERE kategori = 'SERTIFIKAT'") or die (mysqli_error());
		
		while($a = mysqli_fetch_assoc($ser)){

		$result['indxs'][] = array(

			'name' => $a['wilayah'],
			'y'    => (double)$a['jumlah']

		);

		
}
	echo json_encode($result);

}
elseif($kat == 'b_sertifikat'){

$nonser = mysqli_query($con, "SELECT wilayah, jumlah FROM tbl_sertifikat WHERE kategori = 'BELUM BERSERTIFIKAT'") or die (mysqli_error());
		
		while($a = mysqli_fetch_assoc($nonser)){

		$result['indxb'][] = array(

			'name' => $a['wilayah'],
			'y'    => (double)$a['jumlah']

		);

	}

	echo json_encode($result);

}

?>