<?php 
/**
 * 
 */
class Frontend extends CI_Controller
{
	
	
	public function index()
	{
		$data['judul'] = 'Sistem Informasi Eksekutif Pertahanan';

		$this->load->view('frontend/template',$data);
		$this->load->view('frontend/frontend_header');
		$this->load->view('frontend/frontend_navbar');
		$this->load->view('frontend/frontend_home');
		$this->load->view('frontend/frontend_footer');
	}
}
