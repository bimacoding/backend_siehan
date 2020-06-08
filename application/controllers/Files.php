<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Files extends CI_Controller {
 
 	public function index(){
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
				if (isset($_POST['sfile'])){
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

			$jumlah= $this->model_utama->view('tbl_files')->num_rows();
			$config['base_url'] = base_url().'document/index/';
			$config['total_rows'] = $jumlah;
			$config['per_page'] = 10;

			if ($this->uri->segment('3')==''){
				$dari = 0;
			}else{
				$dari = $this->uri->segment('3');
			}
			
			if (is_numeric($dari)) {
				if ($this->input->post('qfile')!=''){
					$data['title'] = "Hasil Pencarian keyword : ".cetak($this->input->post('qfile'));
					$data['document'] = $this->model_utama->cari_file(cetak($this->input->post('qfile')));
				}else{
					$data['title'] = "Semua Document";
					$data['document'] = $this->model_utama->view_join('tbl_files','tbl_doc_kat','id_doc_kat','tbl_files.id','DESC',$dari,$config['per_page']);
					$this->pagination->initialize($config);
				}
			}else{
				redirect('main');
			}

			$data['trending'] =$this->db->query("SELECT * FROM tbl_trending ORDER BY id DESC LIMIT 10");

			$this->template->load('siehan/template','siehan/document',$data);
		}

	}

	public function download($file)
	{
		$this->load->helper('download');
		force_download('assets/files/'.$file , NULL);
	}
 
 }
 
 /* End of file Files.php */
 /* Location: ./application/controllers/Files.php */