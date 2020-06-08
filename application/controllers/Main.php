<?php 

defined('BASEPATH') OR exit('No direct script access allowed');



class Main extends CI_Controller {



	public function index()

	{

		if (isset($_POST['submit'])) {

			

			$jumlah= $this->model_utama->view('tbl_informasi')->num_rows();

			$config['base_url'] = base_url().'berita/index/';

			$config['total_rows'] = $jumlah;

			$config['per_page'] = 10; 	

			if ($this->uri->segment('3')==''){

				$dari = 0;

			}else{

				$dari = $this->uri->segment('3');

			}

			

			if (is_numeric($dari)) {

				if ($this->input->post('kata')!=''){

					$data['title'] = "Hasil Pencarian keyword : ".cetak($this->input->post('kata'));

					$data['berita'] = $this->model_utama->cari_berita(cetak($this->input->post('kata')));

				}else{

					$data['title'] = "Semua Berita";

					$data['berita'] = $this->model_utama->view_ordering_limit('tbl_informasi','id','DESC',$dari,$config['per_page']);

					$this->pagination->initialize($config);

				}

			}else{

				redirect('main');

			}

			$data['trending'] =$this->db->query("SELECT * FROM tbl_trending ORDER BY id DESC LIMIT 10");

			$this->template->load('siehan/template','siehan/berita',$data);



		}else{

			$data['title'] = 'Siehan';

			$data['trending'] =$this->db->query("SELECT * FROM tbl_trending ORDER BY id DESC LIMIT 10");

			$data['teroris'] =$this->db->query("SELECT * FROM tbl_informasi WHERE kategori = 'TERORISME' ORDER BY id DESC LIMIT 5");

			$data['cyber'] =$this->db->query("SELECT * FROM tbl_informasi WHERE kategori = 'CYBER' ORDER BY id DESC LIMIT 5");

			$data['penyakit'] =$this->db->query("SELECT * FROM tbl_informasi WHERE kategori = 'PENYAKIT' ORDER BY id DESC LIMIT 5");

			$this->template->load('siehan/template','siehan/home',$data);

		}

	}





}



/* End of file Main.php */

/* Location: ./application/controllers/Main.php */

