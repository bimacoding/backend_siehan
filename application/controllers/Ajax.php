<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Ajax extends CI_Controller {



	public function getProvinsi()

	{

	  $searchTerm = $this->input->post('searchTerm');

      $response = $this->model_app->getProvinsi('tbl_provinsi',$searchTerm);

      header('Content-type:application/json;charset=utf-8');

      echo json_encode($response);

	}



	public function getNegara()

	{

	  $searchTerm = $this->input->post('searchTerm');

      $response = $this->model_app->getNegara('tbl_negara',$searchTerm);

      header('Content-type:application/json;charset=utf-8');

      echo json_encode($response);

	}



	public function getWilayah()

	{

		/** AJAX Handle */

		if( $this->input->is_ajax_request() )  {

			/**

			 * Mengambil Parameter dan Perubahan nilai dari setiap 

 			 * aktifitas pada table

 			 *

			*/

			$datatables  = $_POST;

			$datatables['table']    = 'tbl_wilayah';

			$datatables['id-table'] = 'autono';

			

			/**

			 * Kolom yang ditampilkan

			 */

			$datatables['col-display'] = array(

			                "autono",

			                "kode",

			                "provinsi",

			                "kabupaten",

			                "kecamatan",

			                "desa",

			                "kor_long",

			                "kor_lat"

			             );

			/**

			* menggunakan table join

			*/

			// $datatables['join']    = 'INNER JOIN position ON position = id_position';

			$this->model_ajax->get_Datatables($datatables);

		}

		return;

    }





    public function getGis()

	{

		/** AJAX Handle */

		if( $this->input->is_ajax_request() )  {

			/**

			 * Mengambil Parameter dan Perubahan nilai dari setiap 

 			 * aktifitas pada table

 			 *

			*/

			$datatables  = $_POST;

			$datatables['table']    = 'master_satker_xy';

			$datatables['id-table'] = 'gid';

			

			/**

			 * Kolom yang ditampilkan

			 */

			$datatables['col-display'] = array(

			                "gid",

			                "nama" ,

			                "jns_satker",

			                "lokasi",

			                "kd_prop",

			                "kd_kab",

			                "kd_kec",

			                "xcoord",

							"ycoord"

			             );

			/**

			* menggunakan table join

			*/

			// $datatables['join']    = 'INNER JOIN position ON position = id_position';

			$this->model_ajax->get_DatatablesGis($datatables);

		}

		return;

    }


    public function last_update()

	{

		/** AJAX Handle */

		if( $this->input->is_ajax_request() )  {

			/**

			 * Mengambil Parameter dan Perubahan nilai dari setiap 

 			 * aktifitas pada table

 			 *

			*/

			$datatables  = $_POST;

			$datatables['table']    = 'tbl_wilayah';

			$datatables['id-table'] = 'autono';

			

			/**

			 * Kolom yang ditampilkan

			 */

			$datatables['col-display'] = array(

			                "autono",

			                "kode",

			                "provinsi",

			                "kabupaten",

			                "kecamatan",

			                "desa",

			                "modified_by",

			                "modified_on"

			             );

			/**

			* menggunakan table join

			*/

			// $datatables['join']    = 'INNER JOIN position ON position = id_position';

			$this->model_ajax->get_lastupdate($datatables);

		}

		return;

    }





	public function ajaxAnggaran()

	{

		$query = $this->db->query("SELECT SUM(pagu) as jml FROM tbl_anggaran WHERE thang = 2020 AND bulan = 12");

		foreach ($query->result_array() as $key) {

			if ($key['jml']!=0) {

				echo $this->mylibrary->format_rupiah($key['jml']);

			}else{

				echo '0';

			}

			

		}

	}

	



	// Json untuk personel

	

	public function ajaxPersonil()

	{

		$query = $this->db->query("SELECT SUM(pagu) as jml FROM tbl_anggaran WHERE thang = 2020 AND bulan = 12");

		foreach ($query->result_array() as $key) {

			if ($key['jml']!=0) {

				echo $this->mylibrary->format_rupiah($key['jml']);

			}else{

				echo '0';

			}

			

		}

	}


	public function getRs()

	{

		/** AJAX Handle */

		if( $this->input->is_ajax_request() )  {

			/**

			 * Mengambil Parameter dan Perubahan nilai dari setiap 

 			 * aktifitas pada table

 			 *

			*/

			$datatables  = $_POST;

			$datatables['table']    = 'tbl_rumahsakit_detil';

			$datatables['id-table'] = 'autono';

			

			/**

			 * Kolom yang ditampilkan

			 */

			$datatables['col-display'] = array(

			                "autono",

			                "nama_prop" ,

			                "kode_rs",

			                "nama_rs",

			                "kelas",

			                "jenis_rs",

			                "pemilik",

			                "kor_long",

							"kor_lat"

			             );

			/**

			* menggunakan table join

			*/

			// $datatables['join']    = 'INNER JOIN position ON position = id_position';

			$this->model_ajax->get_DatatablesRs($datatables);

		}

		return;

    }


    function get_kab()
    {
        $kd_kab=$this->input->post('kd_prov');
        $data=$this->model_app->kabupaten($kd_kab);
        echo json_encode($data);
    }

    function get_kec()
    {
        $kd_kec=$this->input->post('kd_kab');
        $data=$this->model_app->kecamatan($kd_kec);
        echo json_encode($data);
    }



}



/* End of file Halaman.php */

/* Location: ./application/controllers/Halaman.php */

