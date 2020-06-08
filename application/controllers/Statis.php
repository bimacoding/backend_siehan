<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statis extends CI_Controller {

	public function index()
	{
		$seo = $this->uri->segment(3);
		if ($seo == '') {
			$data['base_url'] = base_url().'berita/index/';
			$data['title'] = 'Content Management System KEMHAN RI';
			$data['trending'] =$this->db->query("SELECT * FROM tbl_trending ORDER BY id DESC LIMIT 10");
			$this->template->load('siehan/template','siehan/detailstatis',$data);
		}else{
			$query = $this->model_utama->view_where_ordering_limit('tbl_statis',array('seo_statis' => $seo),'id_statis','DESC',0,1);
			if ($query->num_rows()<=0){
				redirect('main');
			}else{
				$row = $query->row_array();
				$data['base_url'] = base_url().'berita/index/';
				$data['title'] = $row['nm_statis'];
				$data['rows'] = $row;
			}
			$data['trending'] =$this->db->query("SELECT * FROM tbl_trending ORDER BY id DESC LIMIT 10");
			$this->template->load('siehan/template','siehan/detailstatis',$data);
		}

	}

}

/* End of file Statis.php */
/* Location: ./application/controllers/Statis.php */ ?>