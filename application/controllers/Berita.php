<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Berita extends CI_Controller {

 	public function index(){
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
	}

	public function detail(){
		
		$encryption_key = str_replace(array('-','_','~'), array('=','+','/'), $this->uri->segment(3));
		$id = $this->encryption->decrypt($encryption_key);
		$query = $this->model_utama->view_where_ordering_limit('tbl_informasi',array('id' => $id),'id','DESC',0,1);
		if ($query->num_rows()<=0){
			redirect('main');
		}else{
			$row = $query->row_array();
			$data['title'] = 'Detail Berita';
			$data['rows'] = $row;
		}
		$data['trending'] =$this->db->query("SELECT * FROM tbl_trending ORDER BY id DESC LIMIT 10");
		$this->template->load('siehan/template','siehan/detailberita',$data);
	}
 
 }
 
 /* End of berita Berita.php */
 /* Location: ./application/controllers/Berita.php */