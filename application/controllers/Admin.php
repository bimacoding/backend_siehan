<?php
/*
Nama File 		: Admin controller
Tanggal Buat 	: 21-jan-2021
Dibuat Oleh 	: Arif iik
Keterangan 		: 
*/
date_default_timezone_set('Asia/Jakarta');

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {


	function index()
	{
		redirect('administrator/home','refresh');
	}

	function home()
	{
		cek_session_admin();
		$this->template->load('administrator/template','administrator/admin-home');
	}

	function add_logo()
	{
		if (isset($_POST['submit'])) {
			$config['upload_path'] = 'assets/images/';
			$config['allowed_types'] = 'png';
			$config['max_size']  = '20000'; //Kb
			$this->load->library('upload', $config);
			$this->upload->do_upload('logo');
			$hasil = $this->upload->data();
			$data = array('logo'=>$hasil['file_name']);
			$where = array('id_identitas'=>1);
			$q = $this->model_app->update('tbl_identitas', $data, $where);

			if ($q) {
				redirect('administrator/identitaswebsite/berhasil','refresh');
			}else{
				redirect('administrator/identitaswebsite/gagal','refresh');

			}
			
		}
	}

	function identitaswebsite()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$config['upload_path'] = 'assets/images/';
			$config['allowed_types'] = 'gif|jpg|png|ico';
			$config['max_size']  = '1000'; //Kb
			$this->load->library('upload', $config);
			$this->upload->do_upload('g');
			$hasil = $this->upload->data();
			if ($hasil['file_name']=='') {
				$data = array(
								'nama_website'=>$this->db->escape_str($this->input->post('a')),
								'email'=>$this->db->escape_str($this->input->post('b')),
								'url'=>$this->db->escape_str($this->input->post('c')),
								'no_telp'=>$this->db->escape_str($this->input->post('d')),
								'meta_deskripsi'=>$this->db->escape_str($this->input->post('e')),
								'meta_keyword'=>$this->db->escape_str($this->input->post('f')),
								'maps'=>$this->db->escape_str($this->input->post('h'))
							  ); 
			}else{
				$data = array(
								'nama_website'=>$this->db->escape_str($this->input->post('a')),
								'email'=>$this->db->escape_str($this->input->post('b')),
								'url'=>$this->db->escape_str($this->input->post('c')),
								'no_telp'=>$this->db->escape_str($this->input->post('d')),
								'meta_deskripsi'=>$this->db->escape_str($this->input->post('e')),
								'meta_keyword'=>$this->db->escape_str($this->input->post('f')),
								'favicon'=>$hasil['file_name'],
								'maps'=>$this->db->escape_str($this->input->post('h'))
							  );
			}
			$where = array('id_identitas'=>$this->input->post('id'));
			$q = $this->model_app->update('tbl_identitas', $data, $where);
			if ($q) {
				redirect('administrator/identitaswebsite/berhasil','refresh');
			}else{
				redirect('administrator/identitaswebsite/gagal','refresh');
			}

		}else{
			$data = array(
							'title'=>'Setting Identitas',
							'row'=>$this->model_app->edit('tbl_identitas',array('id_identitas'=>1))->row_array()
						);
			$this->template->load('administrator/template','administrator/mod-identitas/identitas',$data);
		}
	}

	// controller halaman statis

	function statis()
	{
		cek_session_admin();
		$data['record'] = $this->model_app->view_ordering('tbl_statis','ordering','ASC');
		$this->template->load('administrator/template','administrator/mod-statis/statis',$data);
	}

	function tambah_statis()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$data = array(
						'ordering'=>$this->db->escape_str($this->input->post('a')),
						'nm_statis'=>$this->db->escape_str($this->input->post('b')),
						'seo_statis'=>$this->db->escape_str($this->input->post('b')),
						'des_statis'=>cetak($this->input->post('c')),
						'tgl_dibuat'=>date('Y-m-d'),
						'jam_dibuat'=>date('H:i:s'),
						'oleh'=>$this->session->userdata('username')
					);
			$q = $this->model_app->insert('tbl_statis',$data);
			if ($q) {
				redirect('administrator/statis/berhasil','refresh');
			}else{
				redirect('administrator/statis/gagal','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data Statis';
			$this->template->load('administrator/template','administrator/mod-statis/tambah_statis',$data);
		}
	}


	function ubah_statis()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$data = array(
						'ordering'=>$this->db->escape_str($this->input->post('a')),
						'nm_statis'=>$this->db->escape_str($this->input->post('b')),
						'seo_statis'=>$this->db->escape_str($this->input->post('b')),
						'des_statis'=>cetak($this->input->post('c')),
						'tgl_diubah'=>date('Y-m-d'),
						'jam_diubah'=>date('H:i:s'),
						'oleh'=>$this->session->userdata('username')
					);
			$where = array('id_statis'=>$this->input->post('id'));
			$q = $this->model_app->update('tbl_statis',$data, $where);
			if ($q) {
				redirect('administrator/statis/berhasil','refresh');
			}else{
				redirect('administrator/statis/gagal','refresh');
			}
		}else{
			$data = array(
						'title'=>'Tambah Data Statis',
						'row'=>$this->model_app->edit('tbl_statis',array('id_statis'=>$id))->row_array()
					);
			$this->template->load('administrator/template','administrator/mod-statis/ubah_statis',$data);
		}
	}

	function hapus_statis()
	{
		$id = array('id_statis'=>$this->uri->segment(3));
		$q = $this->model_app->delete('tbl_statis',$id);
		if ($q) {
			redirect('administrator/statis/berhasil','refresh');
		}else{
			redirect('administrator/statis/gagal','refresh');
		}
	}

	// end statis

	// manajemen users

	function users()
	{
		if ($this->session->userdata('level')=='Admin') {
			$data['record'] = $this->model_app->view_ordering('tbl_users','id_users','DESC');
			$this->template->load('administrator/template','administrator/mod_users/users',$data);
		}else{
			$this->load->view('administrator/admin-login');
		}
		
	}

	function tambah_users()
	{
		cek_session_admin();

		if (isset($_POST['submit'])) {
			$data 		= array(
								'kode_users'=> $this->mylibrary->kdauto('tbl_users','id_users','SIE-'),
								'nama' 		=> $this->db->escape_str($this->input->post('a')),
								'username'  => $this->db->escape_str($this->input->post('b')),
								'password' 	=> hash("sha512", md5($this->input->post('c'))),
								'alamat' 	=> cetak($this->input->post('d')),
								'email' 	=> $this->db->escape_str($this->input->post('e')),
								'no_telp' 	=> $this->db->escape_str($this->input->post('g')),
								'level' 	=> $this->db->escape_str($this->input->post('f')),
								'tgl_buat'=> date('Y-m-d H:i:s'),
								'blokir'    => 'Y'
						  );
			$this->model_app->insert('tbl_users',$data);
			redirect('administrator/users');
		}else{
			$data['title'] = 'Tamabah data users';
			$this->template->load('administrator/template','administrator/mod_users/tambah_users',$data);
		}
	}

	function ubah_users()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			if ($this->input->post('b')=='') {
				$data 		= array(
								'nama' 		=> $this->db->escape_str($this->input->post('a')),
								'username'  => $this->db->escape_str($this->input->post('b')),
								'alamat' 	=> cetak($this->input->post('d')),
								'email' 	=> $this->db->escape_str($this->input->post('e')),
								'no_telp' 	=> $this->db->escape_str($this->input->post('g')),
								'level' 	=> $this->db->escape_str($this->input->post('f'))
						       );
			}else{
				$data 		= array(
								'nama' 		=> $this->db->escape_str($this->input->post('a')),
								'username'  => $this->db->escape_str($this->input->post('b')),
								'password' 	=> hash("sha512", md5($this->input->post('c'))),
								'alamat' 	=> cetak($this->input->post('d')),
								'email' 	=> $this->db->escape_str($this->input->post('e')),
								'no_telp' 	=> $this->db->escape_str($this->input->post('g')),
								'level' 	=> $this->db->escape_str($this->input->post('f'))
						       );
			}
			
			$where = array('id_users' => $this->input->post('id'));
            $this->model_app->update('tbl_users', $data, $where);
            redirect('administrator/users/berhasil');
		}else{
			$data = array(
						'title'=> 'Ubah data users', 
						'rows' => $this->model_app->edit('tbl_users', array('id_users' => $id))->row_array()
					);
			$this->template->load('administrator/template','administrator/mod_users/ubah_users',$data);
		}
	}

	function hapus_users()
	{
		cek_session_admin();
		$id = array('id_users' => $this->uri->segment(3));
        $this->model_app->delete('tbl_users',$id);
		redirect('administrator/users');
	}

	function blokir_users()
	{
		cek_session_admin();
		$id    = array('id_users' => $this->uri->segment(3));
        $data  = array('blokir'   => 'Y');
        $this->model_app->update('tbl_users', $data, $id);
		redirect('administrator/users');
	}

	function aktif_users()
	{
		cek_session_admin();
		$id    = array('id_users' => $this->uri->segment(3));
        $data  = array('blokir'   => 'N');
        $this->model_app->update('tbl_users', $data, $id);
		redirect('administrator/users');
	}

	// # end manejen users

	function kategori()
	{
		cek_session_admin();
		$data['record'] = $this->model_app->view_ordering('tbl_kategori','id_kategori','DESC');
		$this->template->load('administrator/template','administrator/mod_kategori/kategori',$data);
	}

	function tambah_kategori()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$data = array( 
							'judul_kategori' => $this->db->escape_str($this->input->post('a')),
							'seo_kategori'   => seo_title($this->input->post('a'))
						 );
			$this->model_app->insert('tbl_kategori',$data);
			redirect('administrator/kategori','refresh');
		}else{
			$data['title'] = 'Tambah Data Kategori';
			$this->template->load('administrator/template','administrator/mod_kategori/tambah_kategori',$data);
		}
	}

	function ubah_kategori()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$data = array( 
							'judul_kategori' => $this->db->escape_str($this->input->post('a')),
							'seo_kategori'   => seo_title($this->input->post('b'))
						 );
			$where = array('id_kategori'=>$this->input->post('id'));
			$this->model_app->update('tbl_kategori',$data,$where);
			redirect('administrator/kategori','refresh');
		}else{
			$data= array(
							'title' => 'Ubah Kategori',
							'row'   => $this->model_app->edit('tbl_kategori', array('id_kategori'=>$id))->row_array()
						);
			$this->template->load('administrator/template','administrator/mod_kategori/ubah_kategori',$data);
		}
	}

	function hapus_kategori()
	{
		cek_session_admin();
		$id = array('id_kategori' => $this->uri->segment(3));
        $this->model_app->delete('tbl_kategori',$id);
		redirect('administrator/kategori');
	}

	// end kategori

	// controller doc kategori

	function doc_kat()
	{
		cek_session_admin();
		$data['record'] = $this->model_app->view_ordering('tbl_doc_kat','id_doc_kat','DESC');
		$this->template->load('administrator/template','administrator/mod_doc_kat/doc_kat',$data);
	}

	function tambah_doc_kat()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$data = array( 
							'nm_kat'    => $this->db->escape_str($this->input->post('a')),
							'seo_kat'   => seo_title($this->input->post('a')),
							'des_kat'   => cetak($this->input->post('b')),
							'dibuat'    => date('Y-m-d'),
							'oleh'      => $this->session->userdata('username')
						 );
			$this->model_app->insert('tbl_doc_kat',$data);
			redirect('administrator/doc_kat','refresh');
		}else{
			$data['title'] = 'Tambah Data Dokumen Kategori';
			$this->template->load('administrator/template','administrator/mod_doc_kat/tambah_doc_kat',$data);
		}
	}

	function ubah_doc_kat()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$data = array( 
							'nm_kat'    => $this->db->escape_str($this->input->post('a')),
							'seo_kat'   => seo_title($this->input->post('a')),
							'des_kat'   => cetak($this->input->post('b'))

						 );
			$where = array('id_doc_kat'=>$this->input->post('id'));
			$this->model_app->update('tbl_doc_kat',$data,$where);
			redirect('administrator/doc_kat','refresh');
		}else{
			$data= array(
							'title' => 'Ubah Dokumen Kategori',
							'row'   => $this->model_app->edit('tbl_doc_kat', array('id_doc_kat'=>$id))->row_array()
						);
			$this->template->load('administrator/template','administrator/mod_doc_kat/ubah_doc_kat',$data);
		}
	}

	function hapus_doc_kat()
	{
		cek_session_admin();
		$id = array('id_doc_kat' => $this->uri->segment(3));
        $this->model_app->delete('tbl_doc_kat',$id);
		redirect('administrator/doc_kat');
	}

	function doctype()
	{
		cek_session_admin();
		$data['record'] = $this->model_app->view_ordering('tbl_doctype','id_doctype','DESC');
		$this->template->load('administrator/template','administrator/mod_doctype/doctype',$data);
	}

	function tambah_doctype()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$data = array( 
							'nm_type'    => $this->db->escape_str(strtolower($this->input->post('a'))),
							'ket'   => cetak($this->input->post('b')),
							'dibuat'    => date('Y-m-d'),
							'oleh'      => $this->session->userdata('username')
						 );
			$this->model_app->insert('tbl_doctype',$data);
			redirect('administrator/doctype','refresh');
		}else{
			$data['title'] = 'Tambah Data Tipe Dokumen';
			$this->template->load('administrator/template','administrator/mod_doctype/tambah_doctype',$data);
		}
	}

	function ubah_doctype()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$data = array( 
							'nm_type'    => $this->db->escape_str(strtolower($this->input->post('a'))),
							'ket'        => cetak($this->input->post('b'))

						 );
			$where = array('id_doctype'=>$this->input->post('id'));
			$this->model_app->update('tbl_doctype',$data,$where);
			redirect('administrator/doctype','refresh');
		}else{
			$data= array(
							'title' => 'Ubah Tipe Dokumen',
							'row'   => $this->model_app->edit('tbl_doctype', array('id_doctype'=>$id))->row_array()
						);
			$this->template->load('administrator/template','administrator/mod_doctype/ubah_doctype',$data);
		}
	}

	function hapus_doctype()
	{
		cek_session_admin();
		$id = array('id_doctype' => $this->uri->segment(3));
        $this->model_app->delete('tbl_doctype',$id);
		redirect('administrator/doctype');
	}

	// end doc kategori

	// Controller Modul Menu Website

	function menuwebsite(){
		cek_session_admin();
		$data['record'] = $this->model_app->view_ordering('tbl_menu','urutan','ASC');
		$this->template->load('administrator/template','administrator/mod_menu/menu',$data);
	}

	function tambah_menuwebsite(){
		cek_session_admin();
		if (isset($_POST['submit'])){
			$data = array(
							'id_menu_type'=>$this->db->escape_str($this->input->post('tp')),
							'id_parent'=>$this->db->escape_str($this->input->post('b')),
                            'nama_menu'=>$this->db->escape_str($this->input->post('c')),
                            'link'=>$this->db->escape_str($this->input->post('a')),
                            'position'=>$this->db->escape_str($this->input->post('d')),
                            'urutan'=>$this->db->escape_str($this->input->post('e'))
                        );
			$this->model_app->insert('tbl_menu',$data);
			redirect('administrator/menuwebsite');
		}else{
			$proses = $this->model_app->view_where_ordering('tbl_menu', array('position' => 'Bottom'), 'id_menu','DESC');
			$data = array('record' => $proses);
			$this->template->load('administrator/template','administrator/mod_menu/view_menu_tambah',$data);
		}
	}

	function edit_menuwebsite(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$data = array(
							'id_menu_type'=>$this->db->escape_str($this->input->post('tp')),
							'id_parent'=>$this->db->escape_str($this->input->post('b')),
                            'nama_menu'=>$this->db->escape_str($this->input->post('c')),
                            'link'=>$this->db->escape_str($this->input->post('a')),
                            'position'=>$this->db->escape_str($this->input->post('d')),
                            'urutan'=>$this->db->escape_str($this->input->post('e')),
                            'aktif'=>$this->db->escape_str($this->input->post('f')));
			$where = array('id_menu' => $this->input->post('id'));
			$this->model_app->update('tbl_menu', $data, $where);
			redirect('administrator/menuwebsite');
		}else{
			$proses = $this->model_app->edit('tbl_menu', array('id_menu' => $id))->row_array();
			$data['rows'] = $proses;
			$this->template->load('administrator/template','administrator/mod_menu/view_menu_edit',$data);
		}
	}

	function delete_menuwebsite(){
        cek_session_admin();
		$id = array('id_menu' => $this->uri->segment(3));
		$this->model_app->delete('tbl_menu',$id);
		redirect('administrator/menuwebsite');
	}


	//  menu type manager 

	function menutype(){
		cek_session_admin();
		$data['record'] = $this->model_app->view_ordering('tbl_menu_type','id_menu_type','ASC');
		$this->template->load('administrator/template','administrator/mod_menu_type/menutype',$data);
	}

	function tambah_menutype(){
		cek_session_admin();
		if (isset($_POST['submit'])){
			$data = array(
							'nm_menutype'=>$this->db->escape_str($this->input->post('a')),
							'des_menutype'=>$this->db->escape_str($this->input->post('c')),
                            'type_menu'=>$this->db->escape_str($this->input->post('b')),
                            'dibuat'=>date('Y-m-d'),
                            'oleh'=>$this->session->userdata('username')
                        );
			$this->model_app->insert('tbl_menu_type',$data);
			redirect('administrator/menutype');
		}else{
			$proses = $this->model_app->view_ordering('tbl_menu_type','id_menu_type','DESC');
			$data = array('record' => $proses);
			$this->template->load('administrator/template','administrator/mod_menu_type/view_menutype_tambah',$data);
		}
	}

	function edit_menutype(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$data = array(
                            'nm_menutype'=>$this->db->escape_str($this->input->post('a')),
							'des_menutype'=>$this->db->escape_str($this->input->post('c')),
                            'type_menu'=>$this->db->escape_str($this->input->post('b'))
                        );
			$where = array('id_menu_type' => $this->input->post('id'));
			$this->model_app->update('tbl_menu_type', $data, $where);
			redirect('administrator/menutype');
		}else{
			$proses = $this->model_app->edit('tbl_menu_type', array('id_menu_type' => $id))->row_array();
			$data = array('rows' => $proses);
			$this->template->load('administrator/template','administrator/mod_menu_type/view_menutype_edit',$data);
		}
	}

	function delete_menutype(){
        cek_session_admin();
		$id = array('id_menu_type' => $this->uri->segment(3));
		$this->model_app->delete('tbl_menu_type',$id);
		redirect('administrator/menutype');
	}
	// controller master agama 

	function agama()
	{
		cek_session_admin();
		$data['record'] = $this->model_app->view_ordering('tbl_agama','ID_AGAMA','ASC');
		$this->template->load('administrator/template','administrator/mod_agama/agama',$data);
	}

	function tambah_agama()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$data = array(
							'KDAGAMA' => $this->db->escape_str($this->input->post('a')),
							'AGAMA' => $this->db->escape_str($this->input->post('b'))
						 );
			$q = $this->model_app->insert('tbl_agama',$data);
			if ($q) {
				redirect('administrator/agama/berhasil','refresh');
			}else{
				redirect('administrator/agama/gagal','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data Agama';
			$this->template->load('administrator/template','administrator/mod_agama/tambah_agama',$data); 
		}
	}

	function ubah_agama()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$data = array(
							'KDAGAMA' => $this->db->escape_str($this->input->post('a')),
							'AGAMA' => $this->db->escape_str($this->input->post('b'))
						 );
			$where = array('ID_AGAMA'=>$this->input->post('id'));
			$q = $this->model_app->update('tbl_agama',$data,$where);
			if ($q) {
				redirect('administrator/agama/berhasil','refresh');
			}else{
				redirect('administrator/agama/gagal','refresh');
			}
		}else{
			$data = array(
							'title' => 'Ubah Agama',
							'row'   => $this->model_app->edit('tbl_agama', array('ID_AGAMA'=>$id))->row_array()
						);
			$this->template->load('administrator/template','administrator/mod_agama/ubah_agama',$data); 
		}

	}

	function hapus_agama()
	{
		cek_session_admin();
		$id = array('ID_AGAMA'=>$this->uri->segment(3));
		$q = $this->model_app->delete('tbl_agama',$id);
		if ($q) {
				redirect('administrator/agama/berhasil','refresh');
		}else{
				redirect('administrator/agama/gagal','refresh');
		}

	}

	// end master agama

	//controller ticker
	function ticker()
	{
		cek_session_admin();
		$data['record'] = $this->model_app->view_ordering('tbl_ticker','id','ASC');
		$this->template->load('administrator/template','administrator/mod_ticker/ticker',$data);
	}

	function tambah_ticker()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			
			$data = array(
							'id_tick'=>$this->db->escape_Str($this->input->post('kt')),
							'nm_ticker'=> cetak($this->input->post('a')),
							'des_ticker'=> cetak($this->input->post('b')),
							'aktif' => cetak($this->input->post('c')),
							'dibuat'=>date('Y-m-d'),
							'oleh'=>$this->session->userdata('username')
							);
	
			$q = $this->model_app->insert('tbl_ticker',$data);
			if ($q) {
				redirect('administrator/ticker/berhasil','refresh');
			}else{
				redirect('administrator/ticker/gagal','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data Ticker';
			$this->template->load('administrator/template','administrator/mod_ticker/tambah_ticker',$data); 
		}

	
	}

	function ubah_ticker()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			
			$data = array(
							'id_tick'=>$this->db->escape_Str($this->input->post('kt')),
							'nm_ticker'=> cetak($this->input->post('a')),
							'des_ticker'=> cetak($this->input->post('b')),
							'aktif' => cetak($this->input->post('c'))
						 );
		
			$where = array('id'=>$this->input->post('id'));
			$q = $this->model_app->update('tbl_ticker',$data,$where);
			if ($q) {
				redirect('administrator/ticker/berhasil','refresh');
			}else{
				redirect('administrator/ticker/gagal','refresh');
			}
		}else{
			$data = array(
							'title' => 'Ubah Data Ticker',
							'row'   => $this->model_app->edit('tbl_ticker', array('id'=>$id))->row_array()
						);
			$this->template->load('administrator/template','administrator/mod_ticker/ubah_ticker',$data); 
		}

	}

	function hapus_ticker()
	{
		cek_session_admin();
		$id = array('id'=>$this->uri->segment(3));
		$q = $this->model_app->delete('tbl_ticker',$id);
		if ($q) {
				redirect('administrator/ticker/berhasil','refresh');
		}else{
				redirect('administrator/ticker/gagal','refresh');
		}
	}
	//end ticker

	//controller ticker kategori
	function ticker_kat()
	{
		cek_session_admin();
		$data['record'] = $this->model_app->view_ordering('tbl_ticker_kat','id_tick','ASC');
		$this->template->load('administrator/template','administrator/mod_ticker_kat/ticker_kat',$data);
	}

	function tambah_ticker_kat()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			
			$data = array(
							'nm_kat'=> cetak($this->input->post('a')),
							'seo_kat'=> seo_title($this->input->post('a')),
							'dibuat'=>date('Y-m-d'),
							'oleh'=>$this->session->userdata('username')
							);
	
			$q = $this->model_app->insert('tbl_ticker_kat',$data);
			if ($q) {
				redirect('administrator/ticker_kat/berhasil','refresh');
			}else{
				redirect('administrator/ticker_kat/gagal','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data Ticker Kategori';
			$this->load->library('template');
			$this->template->load('administrator/template','administrator/mod_ticker_kat/tambah_ticker_kat',$data); 
		}

	
	}

	function ubah_ticker_kat()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			
			$data = array(
							'nm_kat'=> cetak($this->input->post('a')),
							'seo_kat'=> seo_title($this->input->post('a'))
							);
		
			$where = array('id_tick'=>$this->input->post('id'));
			$q = $this->model_app->update('tbl_ticker_kat',$data,$where);
			if ($q) {
				redirect('administrator/ticker_kat/berhasil','refresh');
			}else{
				redirect('administrator/ticker_kat/gagal','refresh');
			}
		}else{
			$data = array(
							'title' => 'Ubah Data Ticker Kategori',
							'row'   => $this->model_app->edit('tbl_ticker_kat', array('id_tick'=>$id))->row_array()
						);
			$this->template->load('administrator/template','administrator/mod_ticker_kat/ubah_ticker_kat',$data); 
		}

	}

	function hapus_ticker_kat()
	{
		cek_session_admin();
		$id = array('id_tick'=>$this->uri->segment(3));
		$q = $this->model_app->delete('tbl_ticker_kat',$id);
		if ($q) {
				redirect('administrator/ticker_kat/berhasil','refresh');
		}else{
				redirect('administrator/ticker_kat/gagal','refresh');
		}
	}
	//end ticker kategori

	// controller agenda

	function agenda()
	{
		cek_session_admin();
		$data['record'] = $this->model_app->view_ordering('tbl_agenda','id', 'ASc');
		$this->template->load('administrator/template','administrator/mod_agenda/agenda',$data);
	}

	function tambah_agenda()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$data = array(
							'kategori'=> 'AGENDA',
							'sub_kat'=> $this->db->escape_str($this->input->post('a')),
							'judul'=> cetak($this->input->post('b')),
							'isi'=> cetak($this->input->post('c')),
							'keterangan'=>cetak($this->input->post('d')),
							'created_on'=>date('Y-m-d'),
							'created_by'=> $this->session->userdata('username'),
							'sumber'=>$this->db->escape_str($this->input->post('e')),
							'status'=>1
			             );
			$q = $this->model_app->insert('tbl_agenda',$data);
			if ($q) {
				redirect('administrator/agenda/berhasil','refresh');
			}else{
				redirect('administrator/agenda/gagal','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data Agenda';
			$this->template->load('administrator/template','administrator/mod_agenda/tambah_agenda',$data);
		}
	}

	function ubah_agenda()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$data = array(
							'sub_kat'=> $this->db->escape_str($this->input->post('a')),
							'judul'=> cetak($this->input->post('b')),
							'isi'=> cetak($this->input->post('c')),
							'keterangan'=>cetak($this->input->post('d')),
							'sumber'=>$this->db->escape_str($this->input->post('e'))
			             );
			$where = array('id'=> $this->input->post('id'));
			$q = $this->model_app->update('tbl_agenda',$data,$where);
			if ($q) {
				redirect('administrator/agenda/berhasil','refresh');
			}else{
				redirect('administrator/agenda/gagal','refresh');
			}
		}else{
			$data = array(
							'title' => 'Ubah Agenda',
							'row'   => $this->model_app->edit('tbl_agenda', array('id'=>$id))->row_array()
						);
			$this->template->load('administrator/template','administrator/mod_agenda/ubah_agenda',$data); 
		}
		
	}

	function hapus_agenda()
	{
		cek_session_admin();
		$id = array('id'=>$this->uri->segment(3));
		$q = $this->model_app->delete('tbl_agenda',$id);
		if ($q) {
			redirect('administrator/agenda/berhasil','refresh');
		}else{
			redirect('administrator/agenda/gagal','refresh');
		}

	}

	// end agenda

	// controller ancaman

	function ancaman()
	{
		cek_session_admin();
		$data['record'] = $this->model_app->view_ordering('tbl_ancaman','id', 'DESC');
		$this->template->load('administrator/template','administrator/mod_ancaman/ancaman',$data);
	}

	function tambah_ancaman()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$data = array(
							'kategori'=> $this->db->escape_str($this->input->post('a')),
							'judul'=> cetak($this->input->post('b')),
							'isi'=> cetak($this->input->post('c')),
							'keterangan'=>cetak($this->input->post('d')),
							'created_on'=>date('Y-m-d'),
							'created_by'=> $this->session->userdata('username'),
							'sumber'=>$this->db->escape_str($this->input->post('e')),
							'status'=>0
			             );
			$q = $this->model_app->insert('tbl_ancaman',$data);
			if ($q) {
				redirect('administrator/ancaman/berhasil','refresh');
			}else{
				redirect('administrator/ancaman/gagal','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data Ancaman';
			$this->template->load('administrator/template','administrator/mod_ancaman/tambah_ancaman',$data);
		}
	}

	function ubah_ancaman()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$data = array(
							'kategori'=> $this->db->escape_str($this->input->post('a')),
							'judul'=> cetak($this->input->post('b')),
							'isi'=> cetak($this->input->post('c')),
							'keterangan'=>cetak($this->input->post('d')),
							'sumber'=>$this->db->escape_str($this->input->post('e'))
			             );
			$where = array('id'=> $this->input->post('id'));
			$q = $this->model_app->update('tbl_ancaman',$data,$where);
			if ($q) {
				redirect('administrator/ancaman/berhasil','refresh');
			}else{
				redirect('administrator/ancaman/gagal','refresh');
			}
		}else{
			$data = array(
							'title' => 'Ubah Data Ancaman',
							'row'   => $this->model_app->edit('tbl_ancaman', array('id'=>$id))->row_array()
						);
			$this->template->load('administrator/template','administrator/mod_ancaman/ubah_ancaman',$data); 
		}
		
	}

	function hapus_ancaman()
	{
		cek_session_admin();
		$id = array('id'=>$this->uri->segment(3));
		$q = $this->model_app->delete('tbl_ancaman',$id);
		if ($q) {
			redirect('administrator/ancaman/berhasil','refresh');
		}else{
			redirect('administrator/ancaman/gagal','refresh');
		}

	}

	// end ancaman

	// controller industri

	function industri()
	{
		cek_session_admin();
		$data['record'] = $this->model_app->view_ordering('tbl_industri','id', 'DESC');
		$this->template->load('administrator/template','administrator/mod_industri/industri',$data);
	}

	function tambah_industri()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$data = array(
							'kategori'=> 'INDUSTRI',
							'judul'=> cetak($this->input->post('b')),
							'isi'=> cetak($this->input->post('c')),
							'keterangan'=>cetak($this->input->post('d')),
							'created_on'=>date('Y-m-d'),
							'created_by'=> $this->session->userdata('username'),
							'sumber'=>$this->db->escape_str($this->input->post('e')),
							'status'=>0
			             );
			$q = $this->model_app->insert('tbl_industri',$data);
			if ($q) {
				redirect('administrator/industri/berhasil','refresh');
			}else{
				redirect('administrator/industri/gagal','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data Industri';
			$this->template->load('administrator/template','administrator/mod_industri/tambah_industri',$data);
		}
	}

	function ubah_industri()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$data = array(
							'judul'=> cetak($this->input->post('b')),
							'isi'=> cetak($this->input->post('c')),
							'keterangan'=>cetak($this->input->post('d')),
							'sumber'=>$this->db->escape_str($this->input->post('e'))
			             );
			$where = array('id'=> $this->input->post('id'));
			$q = $this->model_app->update('tbl_industri',$data,$where);
			if ($q) {
				redirect('administrator/industri/berhasil','refresh');
			}else{
				redirect('administrator/industri/gagal','refresh');
			}
		}else{
			$data = array(
							'title' => 'Ubah Data Industri',
							'row'   => $this->model_app->edit('tbl_industri', array('id'=>$id))->row_array()
						);
			$this->template->load('administrator/template','administrator/mod_industri/ubah_industri',$data); 
		}
		
	}

	function hapus_industri()
	{
		cek_session_admin();
		$id = array('id'=>$this->uri->segment(3));
		$q = $this->model_app->delete('tbl_industri',$id);
		if ($q) {
			redirect('administrator/industri/berhasil','refresh');
		}else{
			redirect('administrator/industri/gagal','refresh');
		}

	}

	// end industri

	// controller trending

	function trending()
	{
		cek_session_admin();
		$data['record'] = $this->model_app->view_ordering('tbl_trending','id', 'DESC');
		$this->template->load('administrator/template','administrator/mod_trending/trending',$data);
	}

	function tambah_trending()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$data = array(
							'kategori'=> cetak($this->input->post('a')),
							'judul'=>  cetak($this->input->post('b')),
							'isi'=>  cetak($this->input->post('c')),
							'keterangan'=> cetak($this->input->post('d')),
							'created_on'=>date('Y-m-d'),
							'created_by'=> $this->session->userdata('username'),
							'sumber'=>$this->db->escape_str($this->input->post('e')),
							'status'=>0
			             );
			$q = $this->model_app->insert('tbl_trending',$data);
			if ($q) {
				redirect('administrator/trending/berhasil','refresh');
			}else{
				redirect('administrator/trending/gagal','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data Trending';
			$this->template->load('administrator/template','administrator/mod_trending/tambah_trending',$data);
		}
	}

	function ubah_trending()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$data = array(
							'kategori'=> cetak($this->input->post('a')),
							'judul'=> cetak($this->input->post('b')),
							'isi'=> cetak($this->input->post('c')),
							'keterangan'=>cetak($this->input->post('d')),
							'sumber'=>$this->db->escape_str($this->input->post('e'))
			             );
			$where = array('id'=> $this->input->post('id'));
			$q = $this->model_app->update('tbl_trending',$data,$where);
			if ($q) {
				redirect('administrator/trending/berhasil','refresh');
			}else{
				redirect('administrator/trending/gagal','refresh');
			}
		}else{
			$data = array(
							'title' => 'Ubah Data Trending',
							'row'   => $this->model_app->edit('tbl_trending', array('id'=>$id))->row_array()
						);
			$this->template->load('administrator/template','administrator/mod_trending/ubah_trending',$data); 
		}
		
	}

	function hapus_trending()
	{
		cek_session_admin();
		$id = array('id'=>$this->uri->segment(3));
		$q = $this->model_app->delete('tbl_trending',$id);
		if ($q) {
			redirect('administrator/trending/berhasil','refresh');
		}else{
			redirect('administrator/trending/gagal','refresh');
		}

	}
	// end trending

	// controller informasi

	function informasi()
	{
		cek_session_admin();
		$data['record'] = $this->model_app->view_ordering('tbl_informasi','id', 'DESC');
		$this->template->load('administrator/template','administrator/mod_informasi/informasi',$data);
	}

	function tambah_informasi()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$data = array(
							'kategori'=> $this->db->escape_str($this->input->post('a')),
							'judul'=>  cetak($this->input->post('b')),
							'isi'=>  cetak($this->input->post('c')),
							'keterangan'=> cetak($this->input->post('d')),
							'created_on'=>date('Y-m-d'),
							'created_by'=> $this->session->userdata('username'),
							'sumber'=>$this->db->escape_str($this->input->post('e')),
							'status'=>1
			             );
			$q = $this->model_app->insert('tbl_informasi',$data);
			if ($q) {
				redirect('administrator/informasi/berhasil','refresh');
			}else{
				redirect('administrator/informasi/gagal','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data Informasi';
			$this->template->load('administrator/template','administrator/mod_informasi/tambah_informasi',$data);
		}
	}

	function ubah_informasi()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$data = array(
							'kategori'=> $this->db->escape_str($this->input->post('a')),
							'judul'=> cetak($this->input->post('b')),
							'isi'=> cetak($this->input->post('c')),
							'keterangan'=>cetak($this->input->post('d')),
							'sumber'=>$this->db->escape_str($this->input->post('e')),
							'status'=>2
			             );
			$where = array('id'=> $this->input->post('id'));
			$q = $this->model_app->update('tbl_informasi',$data,$where);
			if ($q) {
				redirect('administrator/informasi/berhasil','refresh');
			}else{
				redirect('administrator/informasi/gagal','refresh');
			}
		}else{
			$data = array(
							'title' => 'Ubah Data Informasi',
							'row'   => $this->model_app->edit('tbl_informasi', array('id'=>$id))->row_array()
						);
			$this->template->load('administrator/template','administrator/mod_informasi/ubah_informasi',$data); 
		}
		
	}

	function hapus_informasi()
	{
		cek_session_admin();
		$id = array('id'=>$this->uri->segment(3));
		$q = $this->model_app->delete('tbl_informasi',$id);
		if ($q) {
			redirect('administrator/informasi/berhasil','refresh');
		}else{
			redirect('administrator/informasi/gagal','refresh');
		}

	}

	// end informasi

	// controller alut non-kemhan

	function alut_nonkemhan()
	{
		cek_session_admin();
		$data['record'] = $this->model_app->view_ordering('tbl_alutnonkemhan','id', 'DESC');
		$this->template->load('administrator/template','administrator/mod_alut_nonkemhan/alut_nonkemhan',$data);
	}

	function tambah_alut_nonkemhan()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$data = array(
							'kategori'=> 'Alutsista Non Kemhan',
							'judul'=>  cetak($this->input->post('b')),
							'isi'=>  cetak($this->input->post('c')),
							'keterangan'=> 0,
							'created_on'=>date('Y-m-d'),
							'created_by'=> $this->session->userdata('username'),
							'sumber'=>$this->db->escape_str($this->input->post('e'))
			             );
			$q = $this->model_app->insert('tbl_alutnonkemhan',$data);
			if ($q) {
				redirect('administrator/alut_nonkemhan/berhasil','refresh');
			}else{
				redirect('administrator/alut_nonkemhan/gagal','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data alut_nonkemhan';
			$this->template->load('administrator/template','administrator/mod_alut_nonkemhan/tambah_alut_nonkemhan',$data);
		}
	}

	function ubah_alut_nonkemhan()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$data = array(
							'kategori'=> 'Alutsista Non Kemhan',
							'judul'=> cetak($this->input->post('b')),
							'isi'=> cetak($this->input->post('c')),
							'sumber'=>$this->db->escape_str($this->input->post('e'))
			             );
			$where = array('id'=> $this->input->post('id'));
			$q = $this->model_app->update('tbl_alutnonkemhan',$data,$where);
			if ($q) {
				redirect('administrator/alut_nonkemhan/berhasil','refresh');
			}else{
				redirect('administrator/alut_nonkemhan/gagal','refresh');
			}
		}else{
			$data = array(
							'title' => 'Ubah Data alut_nonkemhan',
							'row'   => $this->model_app->edit('tbl_alutnonkemhan', array('id'=>$id))->row_array()
						);
			$this->template->load('administrator/template','administrator/mod_alut_nonkemhan/ubah_alut_nonkemhan',$data); 
		}
		
	}

	function hapus_alut_nonkemhan()
	{
		cek_session_admin();
		$id = array('id'=>$this->uri->segment(3));
		$q = $this->model_app->delete('tbl_alutnonkemhan',$id);
		if ($q) {
			redirect('administrator/alut_nonkemhan/berhasil','refresh');
		}else{
			redirect('administrator/alut_nonkemhan/gagal','refresh');
		}

	}

	// end alut nonkemhan

	// controller angkatan

	function angkatan()
	{
		cek_session_admin();
		$data['record'] = $this->model_app->view_ordering('tbl_angkatan','id','ASC');
		$this->template->load('administrator/template','administrator/mod_angkatan/angkatan',$data);
	}

	function tambah_angkatan()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$data = array(
							'nama_angkatan' => $this->db->escape_str($this->input->post('b'))
						 );
			$q = $this->model_app->insert('tbl_angkatan',$data);
			if ($q) {
				redirect('administrator/angkatan/berhasil','refresh');
			}else{
				redirect('administrator/angkatan/gagal','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data angkatan';
			$this->template->load('administrator/template','administrator/mod_angkatan/tambah_angkatan',$data); 
		}
	}

	function ubah_angkatan()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$data = array(
							'nama_angkatan' => $this->db->escape_str($this->input->post('b'))
						 );
			$where = array('id'=>$this->input->post('id'));
			$q = $this->model_app->update('tbl_angkatan',$data,$where);
			if ($q) {
				redirect('administrator/angkatan/berhasil','refresh');
			}else{
				redirect('administrator/angkatan/gagal','refresh');
			}
		}else{
			$data = array(
							'title' => 'Ubah angkatan',
							'row'   => $this->model_app->edit('tbl_angkatan', array('id'=>$id))->row_array()
						);
			$this->template->load('administrator/template','administrator/mod_angkatan/ubah_angkatan',$data); 
		}

	}

	function hapus_angkatan()
	{
		cek_session_admin();
		$id = array('id'=>$this->uri->segment(3));
		$q = $this->model_app->delete('tbl_angkatan',$id);
		if ($q) {
				redirect('administrator/angkatan/berhasil','refresh');
		}else{
				redirect('administrator/angkatan/gagal','refresh');
		}

	}

	// end angkatan

	// controller veteran

	function veteran()
	{
		cek_session_admin();
		$data['record'] = $this->model_app->view_ordering('tbl_veteran','id','ASC');
		$this->template->load('administrator/template','administrator/mod_veteran/veteran',$data);
	}

	function tambah_veteran()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$data = array(
							'urutan'=> $this->db->escape_str($this->input->post('a')),
							'wilayah'=> $this->db->escape_str($this->input->post('b')),
							'pusdik'=> $this->db->escape_str($this->input->post('c')),
							'jumlah'=> $this->db->escape_str($this->input->post('d')),
							'keterangan'=> '',
							'created_on'=>date('Y-m-d'),
							'created_by'=> $this->session->userdata('username'),
							'sumber'=> $this->db->escape_str($this->input->post('e'))
						 );
			$q = $this->model_app->insert('tbl_veteran',$data);
			if ($q) {
				redirect('administrator/veteran/berhasil','refresh');
			}else{
				redirect('administrator/veteran/gagal','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data veteran';
			$this->template->load('administrator/template','administrator/mod_veteran/tambah_veteran',$data); 
		}
	}

	function ubah_veteran()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$data = array(
							'urutan'=> $this->db->escape_str($this->input->post('a')),
							'wilayah'=> $this->db->escape_str($this->input->post('b')),
							'pusdik'=> $this->db->escape_str($this->input->post('c')),
							'jumlah'=> $this->db->escape_str($this->input->post('d')),
							'sumber'=> $this->db->escape_str($this->input->post('e'))
						 );
			$where = array('id'=>$this->input->post('id'));
			$q = $this->model_app->update('tbl_veteran',$data,$where);
			if ($q) {
				redirect('administrator/veteran/berhasil','refresh');
			}else{
				redirect('administrator/veteran/gagal','refresh');
			}
		}else{
			$data = array(
							'title' => 'Ubah veteran',
							'row'   => $this->model_app->edit('tbl_veteran', array('id'=>$id))->row_array()
						);
			$this->template->load('administrator/template','administrator/mod_veteran/ubah_veteran',$data); 
		}

	}

	function hapus_veteran()
	{
		cek_session_admin();
		$id = array('id'=>$this->uri->segment(3));
		$q = $this->model_app->delete('tbl_veteran',$id);
		if ($q) {
				redirect('administrator/veteran/berhasil','refresh');
		}else{
				redirect('administrator/veteran/gagal','refresh');
		}

	}

	// end veteran

	// controller Sekolah

	function sekolah()
	{
		cek_session_admin();
		$data['record'] = $this->model_app->view_ordering('tbl_sekolah','id','ASC');
		$this->template->load('administrator/template','administrator/mod_sekolah/sekolah',$data);
	}

	function tambah_sekolah()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$data = array(
							'wilayah'=> $this->db->escape_str($this->input->post('b')),
							'nourut'=> $this->db->escape_str($this->input->post('a')),
							'category'=> $this->db->escape_str($this->input->post('c')),
							'subcategory'=> $this->db->escape_str($this->input->post('d')),
							'jumlah'=> $this->db->escape_str($this->input->post('e'))
						 );
			$q = $this->model_app->insert('tbl_sekolah',$data);
			if ($q) {
				redirect('administrator/sekolah/berhasil','refresh');
			}else{
				redirect('administrator/sekolah/gagal','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data sekolah';
			$this->template->load('administrator/template','administrator/mod_sekolah/tambah_sekolah',$data); 
		}
	}

	function ubah_sekolah()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$data = array(
							'wilayah'=> $this->db->escape_str($this->input->post('b')),
							'nourut'=> $this->db->escape_str($this->input->post('a')),
							'category'=> $this->db->escape_str($this->input->post('c')),
							'subcategory'=> $this->db->escape_str($this->input->post('d')),
							'jumlah'=> $this->db->escape_str($this->input->post('e'))
						 );
			$where = array('id'=>$this->input->post('id'));
			$q = $this->model_app->update('tbl_sekolah',$data,$where);
			if ($q) {
				redirect('administrator/sekolah/berhasil','refresh');
			}else{
				redirect('administrator/sekolah/gagal','refresh');
			}
		}else{
			$data = array(
							'title' => 'Ubah Data Sekolah',
							'row'   => $this->model_app->edit('tbl_sekolah', array('id'=>$id))->row_array()
						);
			$this->template->load('administrator/template','administrator/mod_sekolah/ubah_sekolah',$data); 
		}

	}

	function hapus_sekolah()
	{
		cek_session_admin();
		$id = array('id'=>$this->uri->segment(3));
		$q = $this->model_app->delete('tbl_sekolah',$id);
		if ($q) {
				redirect('administrator/sekolah/berhasil','refresh');
		}else{
				redirect('administrator/sekolah/gagal','refresh');
		}

	}

	// end sekolah

	// controller teroris

	function teroris()
	{
		cek_session_admin();
		$data['record'] = $this->model_app->view_ordering('tbl_teroris','id','ASC');
		$this->template->load('administrator/template','administrator/mod_teroris/teroris',$data);
	}

	function tambah_teroris()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$data = array(
							'kategori'=> $this->db->escape_str($this->input->post('a')),
							'kondisi'=> $this->db->escape_str($this->input->post('b')),
							'nama'=>cetak($this->input->post('c')),
							'alias'=>cetak($this->input->post('d')),
							'tempatlahir'=>cetak($this->input->post('e')),
							'warganegara'=> $this->db->escape_str($this->input->post('f')),
							'alamat'=>cetak($this->input->post('g')),
							'keterangan'=>cetak($this->input->post('h'))
						 );
			$q = $this->model_app->insert('tbl_teroris',$data);
			if ($q) {
				redirect('administrator/teroris/berhasil','refresh');
			}else{
				redirect('administrator/teroris/gagal','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data teroris';
			$this->template->load('administrator/template','administrator/mod_teroris/tambah_teroris',$data); 
		}
	}

	function ubah_teroris()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$data = array(
							'kategori'=> $this->db->escape_str($this->input->post('a')),
							'kondisi'=> $this->db->escape_str($this->input->post('b')),
							'nama'=>cetak($this->input->post('c')),
							'alias'=>cetak($this->input->post('d')),
							'tempatlahir'=>cetak($this->input->post('e')),
							'warganegara'=> $this->db->escape_str($this->input->post('f')),
							'alamat'=>cetak($this->input->post('g')),
							'keterangan'=>cetak($this->input->post('h'))
						 );
			$where = array('id'=>$this->input->post('id'));
			$q = $this->model_app->update('tbl_teroris',$data,$where);
			if ($q) {
				redirect('administrator/teroris/berhasil','refresh');
			}else{
				redirect('administrator/teroris/gagal','refresh');
			}
		}else{
			$data = array(
							'title' => 'Ubah Data teroris',
							'row'   => $this->model_app->edit('tbl_teroris', array('id'=>$id))->row_array()
						);
			$this->template->load('administrator/template','administrator/mod_teroris/ubah_teroris',$data); 
		}

	}

	function hapus_teroris()
	{
		cek_session_admin();
		$id = array('id'=>$this->uri->segment(3));
		$q = $this->model_app->delete('tbl_teroris',$id);
		if ($q) {
				redirect('administrator/teroris/berhasil','refresh');
		}else{
				redirect('administrator/teroris/gagal','refresh');
		}

	}

	// end teroris

	// controller sertifikat

	function sertifikat()
	{
		cek_session_admin();
		$data['record'] = $this->model_app->view_ordering('tbl_sertifikat','id','ASC');
		$this->template->load('administrator/template','administrator/mod_sertifikat/sertifikat',$data);
	}

	function tambah_sertifikat()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$data = array(
							'tahun'=> $this->db->escape_str($this->input->post('c')),
							'kategori'=> $this->db->escape_str($this->input->post('a')),
							'wilayah'=> $this->db->escape_str($this->input->post('b')),
							'jumlah'=> $this->db->escape_str($this->input->post('d'))
						 );
			$q = $this->model_app->insert('tbl_sertifikat',$data);
			if ($q) {
				redirect('administrator/sertifikat/berhasil','refresh');
			}else{
				redirect('administrator/sertifikat/gagal','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data sertifikat';
			$this->template->load('administrator/template','administrator/mod_sertifikat/tambah_sertifikat',$data); 
		}
	}

	function ubah_sertifikat()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$data = array(
							'tahun'=> $this->db->escape_str($this->input->post('c')),
							'kategori'=> $this->db->escape_str($this->input->post('a')),
							'wilayah'=> $this->db->escape_str($this->input->post('b')),
							'jumlah'=> $this->db->escape_str($this->input->post('d'))
						 );
			$where = array('id'=>$this->input->post('id'));
			$q = $this->model_app->update('tbl_sertifikat',$data,$where);
			if ($q) {
				redirect('administrator/sertifikat/berhasil','refresh');
			}else{
				redirect('administrator/sertifikat/gagal','refresh');
			}
		}else{
			$data = array(
							'title' => 'Ubah Data sertifikat',
							'row'   => $this->model_app->edit('tbl_sertifikat', array('id'=>$id))->row_array()
						);
			$this->template->load('administrator/template','administrator/mod_sertifikat/ubah_sertifikat',$data); 
		}

	}

	function hapus_sertifikat()
	{
		cek_session_admin();
		$id = array('id'=>$this->uri->segment(3));
		$q = $this->model_app->delete('tbl_sertifikat',$id);
		if ($q) {
				redirect('administrator/sertifikat/berhasil','refresh');
		}else{
				redirect('administrator/sertifikat/gagal','refresh');
		}

	}
	// end sertifikat

	// controller master provinsi

	function provinsi()
	{
		cek_session_admin();
		$data['record'] = $this->model_app->view_ordering('tbl_provinsi','id','ASC');
		$this->template->load('administrator/template','administrator/mod_provinsi/provinsi',$data);
	}

	function tambah_provinsi()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$data = array(
							'provinsi'=> $this->db->escape_str($this->input->post('a')),
							'ibu_kota'=> $this->db->escape_str($this->input->post('b')),
							'thn_peresmian'=> $this->db->escape_str($this->input->post('c')),
							'luas'=> $this->db->escape_str($this->input->post('d'))
						 );
			$q = $this->model_app->insert('tbl_provinsi',$data);
			if ($q) {
				redirect('administrator/provinsi/berhasil','refresh');
			}else{
				redirect('administrator/provinsi/gagal','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data provinsi';
			$this->template->load('administrator/template','administrator/mod_provinsi/tambah_provinsi',$data); 
		}
	}

	function ubah_provinsi()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$data = array(
							'provinsi'=> $this->db->escape_str($this->input->post('a')),
							'ibu_kota'=> $this->db->escape_str($this->input->post('b')),
							'thn_peresmian'=> $this->db->escape_str($this->input->post('c')),
							'luas'=> $this->db->escape_str($this->input->post('d'))
						 );
			$where = array('id'=>$this->input->post('id'));
			$q = $this->model_app->update('tbl_provinsi',$data,$where);
			if ($q) {
				redirect('administrator/provinsi/berhasil','refresh');
			}else{
				redirect('administrator/provinsi/gagal','refresh');
			}
		}else{
			$data = array(
							'title' => 'Ubah Data provinsi',
							'row'   => $this->model_app->edit('tbl_provinsi', array('id'=>$id))->row_array()
						);
			$this->template->load('administrator/template','administrator/mod_provinsi/ubah_provinsi',$data); 
		}

	}

	function hapus_provinsi()
	{
		cek_session_admin();
		$id = array('id'=>$this->uri->segment(3));
		$q = $this->model_app->delete('tbl_provinsi',$id);
		if ($q) {
				redirect('administrator/provinsi/berhasil','refresh');
		}else{
				redirect('administrator/provinsi/gagal','refresh');
		}

	}

	// end provinsi

	// controller negara

	function negara()
	{
		cek_session_admin();
		$data['record'] = $this->model_app->view_ordering('tbl_negara','id','ASC');
		$this->template->load('administrator/template','administrator/mod_negara/negara',$data);
	}

	function tambah_negara()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$data = array(
							'kdwilayah'=> $this->db->escape_str($this->input->post('a')),
							'wilayah'=> $this->db->escape_str($this->input->post('b'))
						 );
			$q = $this->model_app->insert('tbl_negara',$data);
			if ($q) {
				redirect('administrator/negara/berhasil','refresh');
			}else{
				redirect('administrator/negara/gagal','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data negara';
			$this->template->load('administrator/template','administrator/mod_negara/tambah_negara',$data); 
		}
	}

	function ubah_negara()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$data = array(
							'kdwilayah'=> $this->db->escape_str($this->input->post('a')),
							'wilayah'=> $this->db->escape_str($this->input->post('b'))
						 );
			$where = array('id'=>$this->input->post('id'));
			$q = $this->model_app->update('tbl_negara',$data,$where);
			if ($q) {
				redirect('administrator/negara/berhasil','refresh');
			}else{
				redirect('administrator/negara/gagal','refresh');
			}
		}else{
			$data = array(
							'title' => 'Ubah Data negara',
							'row'   => $this->model_app->edit('tbl_negara', array('id'=>$id))->row_array()
						);
			$this->template->load('administrator/template','administrator/mod_negara/ubah_negara',$data); 
		}

	}

	function hapus_negara()
	{
		cek_session_admin();
		$id = array('id'=>$this->uri->segment(3));
		$q = $this->model_app->delete('tbl_negara',$id);
		if ($q) {
				redirect('administrator/negara/berhasil','refresh');
		}else{
				redirect('administrator/negara/gagal','refresh');
		}

	}

	// end negara

	// controller ibadah
	function ibadah()
	{
		cek_session_admin();
		$data['record'] = $this->model_app->view_ordering('tbl_ibadah','id','ASC');
		$this->template->load('administrator/template','administrator/mod_ibadah/ibadah',$data);
	}

	function tambah_ibadah()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$data = array(
							'wilayah'=> $this->db->escape_str($this->input->post('a')),
							'kategori'=> $this->db->escape_str($this->input->post('b')),
							'jumlah'=> $this->db->escape_str($this->input->post('c'))
						 );
			$q = $this->model_app->insert('tbl_ibadah',$data);
			if ($q) {
				redirect('administrator/ibadah/berhasil','refresh');
			}else{
				redirect('administrator/ibadah/gagal','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data ibadah';
			$this->template->load('administrator/template','administrator/mod_ibadah/tambah_ibadah',$data); 
		}
	}

	function ubah_ibadah()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$data = array(
							'wilayah'=> $this->db->escape_str($this->input->post('a')),
							'kategori'=> $this->db->escape_str($this->input->post('b')),
							'jumlah'=> $this->db->escape_str($this->input->post('c'))
						 );
			$where = array('id'=>$this->input->post('id'));
			$q = $this->model_app->update('tbl_ibadah',$data,$where);
			if ($q) {
				redirect('administrator/ibadah/berhasil','refresh');
			}else{
				redirect('administrator/ibadah/gagal','refresh');
			}
		}else{
			$data = array(
							'title' => 'Ubah Data ibadah',
							'row'   => $this->model_app->edit('tbl_ibadah', array('id'=>$id))->row_array()
						);
			$this->template->load('administrator/template','administrator/mod_ibadah/ubah_ibadah',$data); 
		}

	}

	function hapus_ibadah()
	{
		cek_session_admin();
		$id = array('id'=>$this->uri->segment(3));
		$q = $this->model_app->delete('tbl_ibadah',$id);
		if ($q) {
				redirect('administrator/ibadah/berhasil','refresh');
		}else{
				redirect('administrator/ibadah/gagal','refresh');
		}

	}

	// end ibadah

	// controller files

	function files()
	{
		cek_session_admin();
		$data['record'] = $this->model_app->view_ordering('tbl_files','id','ASC');
		$this->template->load('administrator/template','administrator/mod_files/files',$data);
	}

	function tambah_files()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$config['upload_path'] = 'assets/files/';
            $config['allowed_types'] = 'pdf|xls|xlsx|doc|docx|ppt|pptx|txt';
            $config['max_size'] = '20000'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('d');
            $hasil=$this->upload->data();

            if ($hasil['file_name']==''){
            	$data = array(
            					'id_doc_kat'=>cetak($this->input->post('kat')),
            					'id_doctype'=>cetak($this->input->post('type')),
            					'judul'=>cetak($this->input->post('a')),
                                'tentang'=>cetak($this->input->post('b')),
                                'ket'=>cetak($this->input->post('c'))
                            );
            }else{
            	$data = array(  
            					'id_doc_kat'=>cetak($this->input->post('kat')),
            					'id_doctype'=>cetak($this->input->post('type')),
            					'judul'=>cetak($this->input->post('a')),
                                'tentang'=>cetak($this->input->post('b')),
                                'ket'=>cetak($this->input->post('c')),
                                'files'=>$hasil['file_name']
                            );
            }
			$q = $this->model_app->insert('tbl_files',$data);
			if ($q) {
				redirect('administrator/files/berhasil','refresh');
			}else{
				redirect('administrator/files/gagal','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data files';
			$this->template->load('administrator/template','administrator/mod_files/tambah_files',$data); 
		}
	}

	function ubah_files()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$config['upload_path'] = 'assets/files/';
            $config['allowed_types'] = 'pdf|xls|xlsx|doc|docx|ppt|pptx|txt';
            $config['max_size'] = '20000'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('d');
            $hasil=$this->upload->data();

            if ($hasil['file_name']==''){
            	$data = array(
            					'id_doc_kat'=>cetak($this->input->post('kat')),
            					'id_doctype'=>cetak($this->input->post('type')),
            					'judul'=>cetak($this->input->post('a')),
                                'tentang'=>cetak($this->input->post('b')),
                                'ket'=>cetak($this->input->post('c'))
                            );
            }else{
            	$data = array(  
            					'id_doc_kat'=>cetak($this->input->post('kat')),
            					'id_doctype'=>cetak($this->input->post('type')),
            					'judul'=>cetak($this->input->post('a')),
                                'tentang'=>cetak($this->input->post('b')),
                                'ket'=>cetak($this->input->post('c')),
                                'files'=>$hasil['file_name']
                            );
            }
			$where = array('id'=>$this->input->post('id'));
			$q = $this->model_app->update('tbl_files',$data,$where);
			if ($q) {
				redirect('administrator/files/berhasil','refresh');
			}else{
				redirect('administrator/files/gagal','refresh');
			}
		}else{
			$data = array(
							'title' => 'Ubah Data files',
							'row'   => $this->model_app->edit('tbl_files', array('id'=>$id))->row_array()
						);
			$this->template->load('administrator/template','administrator/mod_files/ubah_files',$data); 
		}

	}

	function hapus_files()
	{
		cek_session_admin();
		$id = array('id'=>$this->uri->segment(3));
		$q = $this->model_app->delete('tbl_files',$id);
		if ($q) {
				redirect('administrator/files/berhasil','refresh');
		}else{
				redirect('administrator/files/gagal','refresh');
		}

	}

	function files_download($file)
	{
		$this->load->helper('download');
		force_download('assets/files/'.$file , NULL);
	}

	// end files

	// controller populasi

	function populasi()
	{
		cek_session_admin();
		$data['record'] = $this->model_app->view_ordering('tbl_populasi','id','ASC');
		$this->template->load('administrator/template','administrator/mod_populasi/populasi',$data);
	}

	function tambah_populasi()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$data = array(
							'urutan'=> $this->db->escape_str($this->input->post('a')),
							'tahun'=> $this->db->escape_str($this->input->post('b')),
							'wilayah'=> $this->db->escape_str($this->input->post('c')),
							'pria'=> $this->db->escape_str($this->input->post('d')),
							'wanita'=> $this->db->escape_str($this->input->post('e')),
							'jumlah'=> $this->db->escape_str($this->input->post('f')),
						 );
			$q = $this->model_app->insert('tbl_populasi',$data);
			if ($q) {
				redirect('administrator/populasi/berhasil','refresh');
			}else{
				redirect('administrator/populasi/gagal','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data populasi';
			$this->template->load('administrator/template','administrator/mod_populasi/tambah_populasi',$data); 
		}
	}

	function ubah_populasi()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$data = array(
							'urutan'=> $this->db->escape_str($this->input->post('a')),
							'tahun'=> $this->db->escape_str($this->input->post('b')),
							'wilayah'=> $this->db->escape_str($this->input->post('c')),
							'pria'=> $this->db->escape_str($this->input->post('d')),
							'wanita'=> $this->db->escape_str($this->input->post('e')),
							'jumlah'=> $this->db->escape_str($this->input->post('f'))
						 );
			$where = array('id'=>$this->input->post('id'));
			$q = $this->model_app->update('tbl_populasi',$data,$where);
			if ($q) {
				redirect('administrator/populasi/berhasil','refresh');
			}else{
				redirect('administrator/populasi/gagal','refresh');
			}
		}else{
			$data = array(
							'title' => 'Ubah Data populasi',
							'row'   => $this->model_app->edit('tbl_populasi', array('id'=>$id))->row_array()
						);
			$this->template->load('administrator/template','administrator/mod_populasi/ubah_populasi',$data); 
		}

	}

	function hapus_populasi()
	{
		cek_session_admin();
		$id = array('id'=>$this->uri->segment(3));
		$q = $this->model_app->delete('tbl_populasi',$id);
		if ($q) {
				redirect('administrator/populasi/berhasil','refresh');
		}else{
				redirect('administrator/populasi/gagal','refresh');
		}

	}

	// end populasi

	// controller cctv

	function cctv()
	{
		cek_session_admin();
		$data['record'] = $this->model_app->view_ordering('tbl_cctv','id_kat','ASC');
		$this->template->load('administrator/template','administrator/mod_cctv/cctv',$data);
	}

	function tambah_cctv()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$data = array(
							'nama'=> $this->db->escape_str($this->input->post('a')),
							'id_kat'=> $this->db->escape_str($this->input->post('b')),
							'kategori'=> $this->db->escape_str($this->input->post('c')),
							'link'=> $this->db->escape_str($this->input->post('d')),
							'sumber'=> $this->db->escape_str($this->input->post('e'))
						 );
			$q = $this->model_app->insert('tbl_cctv',$data);
			if ($q) {
				redirect('administrator/cctv/berhasil','refresh');
			}else{
				redirect('administrator/cctv/gagal','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data cctv';
			$this->template->load('administrator/template','administrator/mod_cctv/tambah_cctv',$data); 
		}
	}

	function ubah_cctv()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$data = array(
							'nama'=> $this->db->escape_str($this->input->post('a')),
							'id_kat'=> $this->db->escape_str($this->input->post('b')),
							'kategori'=> $this->db->escape_str($this->input->post('c')),
							'link'=> $this->db->escape_str($this->input->post('d')),
							'sumber'=> $this->db->escape_str($this->input->post('e'))
						 );
			$where = array('id'=>$this->input->post('id'));
			$q = $this->model_app->update('tbl_cctv',$data,$where);
			if ($q) {
				redirect('administrator/cctv/berhasil','refresh');
			}else{
				redirect('administrator/cctv/gagal','refresh');
			}
		}else{
			$data = array(
							'title' => 'Ubah Data cctv',
							'row'   => $this->model_app->edit('tbl_cctv', array('id'=>$id))->row_array()
						);
			$this->template->load('administrator/template','administrator/mod_cctv/ubah_cctv',$data); 
		}

	}

	function hapus_cctv()
	{
		cek_session_admin();
		$id = array('id'=>$this->uri->segment(3));
		$q = $this->model_app->delete('tbl_cctv',$id);
		if ($q) {
				redirect('administrator/cctv/berhasil','refresh');
		}else{
				redirect('administrator/cctv/gagal','refresh');
		}
	}

	// end cctv

	// contoller rumahsakit

	function rumahsakit()
	{
		cek_session_admin();
		$data['record'] = $this->model_app->view_ordering('tbl_rumahsakit','id','ASC');
		$this->template->load('administrator/template','administrator/mod_rumahsakit/rumahsakit',$data);
	}

	function tambah_rumahsakit()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$data = array(
							'kategori'=> $this->db->escape_str($this->input->post('a')),
							'nama'=> $this->db->escape_str($this->input->post('b')),
							'jumlah'=> $this->db->escape_str($this->input->post('c')),
							'keterangan'=> $this->db->escape_str($this->input->post('d')),
							'created_on'=> date('Y-m-d'),
							'created_by'=> $this->session->userdata('username'),
							'sumber'=> $this->db->escape_str($this->input->post('e'))
						 );
			$q = $this->model_app->insert('tbl_rumahsakit',$data);
			if ($q) {
				redirect('administrator/rumahsakit/berhasil','refresh');
			}else{
				redirect('administrator/rumahsakit/gagal','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data Rumas Sakit';
			$this->template->load('administrator/template','administrator/mod_rumahsakit/tambah_rumahsakit',$data); 
		}
	}

	function ubah_rumahsakit()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$data = array(
							'kategori'=> $this->db->escape_str($this->input->post('a')),
							'nama'=> $this->db->escape_str($this->input->post('b')),
							'jumlah'=> $this->db->escape_str($this->input->post('c')),
							'keterangan'=> $this->db->escape_str($this->input->post('d')),
							'sumber'=> $this->db->escape_str($this->input->post('e'))
						 );
			$where = array('id'=>$this->input->post('id'));
			$q = $this->model_app->update('tbl_rumahsakit',$data,$where);
			if ($q) {
				redirect('administrator/rumahsakit/berhasil','refresh');
			}else{
				redirect('administrator/rumahsakit/gagal','refresh');
			}
		}else{
			$data = array(
							'title' => 'Ubah Data Rumah Sakit',
							'row'   => $this->model_app->edit('tbl_rumahsakit', array('id'=>$id))->row_array()
						);
			$this->template->load('administrator/template','administrator/mod_rumahsakit/ubah_rumahsakit',$data); 
		}

	}

	function hapus_rumahsakit()
	{
		cek_session_admin();
		$id = array('id'=>$this->uri->segment(3));
		$q = $this->model_app->delete('tbl_rumahsakit',$id);
		if ($q) {
				redirect('administrator/rumahsakit/berhasil','refresh');
		}else{
				redirect('administrator/rumahsakit/gagal','refresh');
		}
	}


	// end rumah sakit

	// controller anggran 

	function anggaran()
	{
		cek_session_admin();
		$this->template->load('administrator/template','administrator/mod_anggaran/anggaran');
	}

	function tambah_anggaran()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$data = array(
							'thang'=> $this->db->escape_str($this->input->post('a')),
							'bulan'=> $this->db->escape_str($this->input->post('b')),
							'uo'=> $this->db->escape_str($this->input->post('c')),
							'kdsatker'=> $this->db->escape_str($this->input->post('d')),
							'urutan'=> $this->db->escape_str($this->input->post('e')),
							'nmsatker'=> $this->db->escape_str($this->input->post('f')),
							'pagu'=> $this->db->escape_str($this->input->post('g')),
							'realisasi'=> $this->db->escape_str($this->input->post('h')),
							'p_pegawai'=> $this->db->escape_str($this->input->post('i')),
							'r_pegawai'=> $this->db->escape_str($this->input->post('j')),
							'p_barang'=> $this->db->escape_str($this->input->post('k')),
							'r_barang'=> $this->db->escape_str($this->input->post('l')),
							'p_modal'=> $this->db->escape_str($this->input->post('m')),
							'r_modal'=> $this->db->escape_str($this->input->post('n'))
						 );
			$q = $this->model_app->insert('tbl_anggaran',$data);
			if ($q) {
				redirect('administrator/anggaran/berhasil','refresh');
			}else{
				redirect('administrator/anggaran/gagal','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data Anggaran';
			$this->template->load('administrator/template','administrator/mod_anggaran/tambah_anggaran',$data); 
		}
	}

	function ubah_anggaran()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$data = array(
							'thang'=> $this->db->escape_str($this->input->post('a')),
							'bulan'=> $this->db->escape_str($this->input->post('b')),
							'uo'=> $this->db->escape_str($this->input->post('c')),
							'kdsatker'=> $this->db->escape_str($this->input->post('d')),
							'urutan'=> $this->db->escape_str($this->input->post('e')),
							'nmsatker'=> $this->db->escape_str($this->input->post('f')),
							'pagu'=> $this->db->escape_str($this->input->post('g')),
							'realisasi'=> $this->db->escape_str($this->input->post('h')),
							'p_pegawai'=> $this->db->escape_str($this->input->post('i')),
							'r_pegawai'=> $this->db->escape_str($this->input->post('j')),
							'p_barang'=> $this->db->escape_str($this->input->post('k')),
							'r_barang'=> $this->db->escape_str($this->input->post('l')),
							'p_modal'=> $this->db->escape_str($this->input->post('m')),
							'r_modal'=> $this->db->escape_str($this->input->post('n'))
						 );
			$where = array('autono'=>$this->input->post('id'));
			$q = $this->model_app->update('tbl_anggaran',$data,$where);
			if ($q) {
				redirect('administrator/anggaran/berhasil','refresh');
			}else{
				redirect('administrator/anggaran/gagal','refresh');
			}
		}else{
			$data = array(
							'title' => 'Ubah Data Anggaran',
							'row'   => $this->model_app->edit('tbl_anggaran', array('autono'=>$id))->row_array()
						);
			$this->template->load('administrator/template','administrator/mod_anggaran/ubah_anggaran',$data); 
		}

	}

	function hapus_anggaran()
	{
		cek_session_admin();
		$id = array('autono'=>$this->uri->segment(3));
		$q = $this->model_app->delete('tbl_anggaran',$id);
		if ($q) {
				redirect('administrator/anggaran/berhasil','refresh');
		}else{
				redirect('administrator/anggaran/gagal','refresh');
		}
	}

	// end anggaran

	// controller anggarantotal 

	function anggarantotal()
	{
		cek_session_admin();
		$data['record'] = $this->model_app->view_ordering('tbl_anggarantotal','id','ASC');
		$this->template->load('administrator/template','administrator/mod_anggarantotal/anggarantotal',$data);
	}

	function tambah_anggarantotal()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$data = array(
							'urutan'=> $this->db->escape_str($this->input->post('a')),
							'tahun'=> $this->db->escape_str($this->input->post('b')),
							'uo'=> $this->db->escape_str($this->input->post('c')),
							'kdsatker'=> $this->db->escape_str($this->input->post('d')),
							'jumlah'=> $this->db->escape_str($this->input->post('e')),
							'keterangan'=> '',
							'created_on'=> date('Y-m-d'),
							'created_by'=> $this->session->userdata('username'),
							'sumber'=> $this->db->escape_str($this->input->post('f'))
						 );
			$q = $this->model_app->insert('tbl_anggarantotal',$data);
			if ($q) {
				redirect('administrator/anggarantotal/berhasil','refresh');
			}else{
				redirect('administrator/anggarantotal/gagal','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data Anggarantotal';
			$this->template->load('administrator/template','administrator/mod_anggarantotal/tambah_anggarantotal',$data); 
		}
	}

	function ubah_anggarantotal()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$data = array(
							'urutan'=> $this->db->escape_str($this->input->post('a')),
							'tahun'=> $this->db->escape_str($this->input->post('b')),
							'uo'=> $this->db->escape_str($this->input->post('c')),
							'kdsatker'=> $this->db->escape_str($this->input->post('d')),
							'jumlah'=> $this->db->escape_str($this->input->post('e')),
							'sumber'=> $this->db->escape_str($this->input->post('f'))
						 );
			$where = array('id'=>$this->input->post('id'));
			$q = $this->model_app->update('tbl_anggarantotal',$data,$where);
			if ($q) {
				redirect('administrator/anggarantotal/berhasil','refresh');
			}else{
				redirect('administrator/anggarantotal/gagal','refresh');
			}
		}else{
			$data = array(
							'title' => 'Ubah Data Anggarantotal',
							'row'   => $this->model_app->edit('tbl_anggarantotal', array('id'=>$id))->row_array()
						);
			$this->template->load('administrator/template','administrator/mod_anggarantotal/ubah_anggarantotal',$data); 
		}

	}

	function hapus_anggarantotal()
	{
		cek_session_admin();
		$id = array('id'=>$this->uri->segment(3));
		$q = $this->model_app->delete('tbl_anggarantotal',$id);
		if ($q) {
				redirect('administrator/anggarantotal/berhasil','refresh');
		}else{
				redirect('administrator/anggarantotal/gagal','refresh');
		}
	}

	// end anggaran

	// controller penca

	function penca()
	{
		cek_session_admin();
		$data['record'] = $this->model_app->view_ordering('tbl_penca','id','ASC');
		$this->template->load('administrator/template','administrator/mod_penca/penca',$data);
	}

	function tambah_penca()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$data = array(
							'uo'=> $this->db->escape_str($this->input->post('a')),
							'kotama'=> $this->db->escape_str($this->input->post('b')),
							'jumlah'=> $this->db->escape_str($this->input->post('c')),
							'created_on'=> date('Y-m-d'),
							'created_by'=> $this->session->userdata('username'),
							'sumber'=> $this->db->escape_str($this->input->post('d'))
						 );
			$q = $this->model_app->insert('tbl_penca',$data);
			if ($q) {
				redirect('administrator/penca/berhasil','refresh');
			}else{
				redirect('administrator/penca/gagal','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data penca';
			$this->template->load('administrator/template','administrator/mod_penca/tambah_penca',$data); 
		}
	}

	function ubah_penca()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$data = array(
							'uo'=> $this->db->escape_str($this->input->post('a')),
							'kotama'=> $this->db->escape_str($this->input->post('b')),
							'jumlah'=> $this->db->escape_str($this->input->post('c')),
							'sumber'=> $this->db->escape_str($this->input->post('d'))
						 );
			$where = array('id'=>$this->input->post('id'));
			$q = $this->model_app->update('tbl_penca',$data,$where);
			if ($q) {
				redirect('administrator/penca/berhasil','refresh');
			}else{
				redirect('administrator/penca/gagal','refresh');
			}
		}else{
			$data = array(
							'title' => 'Ubah Data penca',
							'row'   => $this->model_app->edit('tbl_penca', array('id'=>$id))->row_array()
						);
			$this->template->load('administrator/template','administrator/mod_penca/ubah_penca',$data); 
		}

	}

	function hapus_penca()
	{
		cek_session_admin();
		$id = array('id'=>$this->uri->segment(3));
		$q = $this->model_app->delete('tbl_penca',$id);
		if ($q) {
				redirect('administrator/penca/berhasil','refresh');
		}else{
				redirect('administrator/penca/gagal','refresh');
		}
	}

	// end penca

	// controller Belanegara

	function belanegara()
	{
		cek_session_admin();
		$data['record'] = $this->model_app->view_ordering('tbl_belanegara','id','ASC');
		$this->template->load('administrator/template','administrator/mod_belanegara/belanegara',$data);
	}

	function tambah_belanegara()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$data = array(
							'urutan'=> $this->db->escape_str($this->input->post('a')),
							'wilayah'=> $this->db->escape_str($this->input->post('b')),
							'pusdik'=> $this->db->escape_str($this->input->post('c')),
							'jumlah'=> $this->db->escape_str($this->input->post('d')),
							'keterangan'=> '',
							'created_on'=> date('Y-m-d'),
							'created_by'=> $this->session->userdata('username'),
							'sumber'=> $this->db->escape_str($this->input->post('e'))
						 );
			$q = $this->model_app->insert('tbl_belanegara',$data);
			if ($q) {
				redirect('administrator/belanegara/berhasil','refresh');
			}else{
				redirect('administrator/belanegara/gagal','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data belanegara';
			$this->template->load('administrator/template','administrator/mod_belanegara/tambah_belanegara',$data); 
		}
	}

	function ubah_belanegara()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$data = array(
							'urutan'=> $this->db->escape_str($this->input->post('a')),
							'wilayah'=> $this->db->escape_str($this->input->post('b')),
							'pusdik'=> $this->db->escape_str($this->input->post('c')),
							'jumlah'=> $this->db->escape_str($this->input->post('d')),
							'sumber'=> $this->db->escape_str($this->input->post('e'))
						 );
			$where = array('id'=>$this->input->post('id'));
			$q = $this->model_app->update('tbl_belanegara',$data,$where);
			if ($q) {
				redirect('administrator/belanegara/berhasil','refresh');
			}else{
				redirect('administrator/belanegara/gagal','refresh');
			}
		}else{
			$data = array(
							'title' => 'Ubah Data belanegara',
							'row'   => $this->model_app->edit('tbl_belanegara', array('id'=>$id))->row_array()
						);
			$this->template->load('administrator/template','administrator/mod_belanegara/ubah_belanegara',$data); 
		}

	}

	function hapus_belanegara()
	{
		cek_session_admin();
		$id = array('id'=>$this->uri->segment(3));
		$q = $this->model_app->delete('tbl_belanegara',$id);
		if ($q) {
				redirect('administrator/belanegara/berhasil','refresh');
		}else{
				redirect('administrator/belanegara/gagal','refresh');
		}
	}

	// end Belanegara

	// controller Nuklir

	function nuklir()
	{
		cek_session_admin();
		$data['record'] = $this->model_app->view_ordering('tbl_nuklir','id','ASC');
		$this->template->load('administrator/template','administrator/mod_nuklir/nuklir',$data);
	}

	function tambah_nuklir()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$data = array(
							'urutan'=> $this->db->escape_str($this->input->post('a')),
							'wilayah'=> $this->db->escape_str($this->input->post('b')),
							'pusdik'=> $this->db->escape_str($this->input->post('c')),
							'jumlah'=> $this->db->escape_str($this->input->post('d')),
							'keterangan'=> '',
							'created_on'=> date('Y-m-d'),
							'created_by'=> $this->session->userdata('username'),
							'sumber'=> $this->db->escape_str($this->input->post('e'))
						 );
			$q = $this->model_app->insert('tbl_nuklir',$data);
			if ($q) {
				redirect('administrator/nuklir/berhasil','refresh');
			}else{
				redirect('administrator/nuklir/gagal','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data nuklir';
			$this->template->load('administrator/template','administrator/mod_nuklir/tambah_nuklir',$data); 
		}
	
	}

	function ubah_nuklir()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$data = array(
							'urutan'=> $this->db->escape_str($this->input->post('a')),
							'wilayah'=> $this->db->escape_str($this->input->post('b')),
							'pusdik'=> $this->db->escape_str($this->input->post('c')),
							'jumlah'=> $this->db->escape_str($this->input->post('d')),
							'sumber'=> $this->db->escape_str($this->input->post('e'))
						 );
			$where = array('id'=>$this->input->post('id'));
			$q = $this->model_app->update('tbl_nuklir',$data,$where);
			if ($q) {
				redirect('administrator/nuklir/berhasil','refresh');
			}else{
				redirect('administrator/nuklir/gagal','refresh');
			}
		}else{
			$data = array(
							'title' => 'Ubah Data nuklir',
							'row'   => $this->model_app->edit('tbl_nuklir', array('id'=>$id))->row_array()
						);
			$this->template->load('administrator/template','administrator/mod_nuklir/ubah_nuklir',$data); 
		}

	}

	function hapus_nuklir()
	{
		cek_session_admin();
		$id = array('id'=>$this->uri->segment(3));
		$q = $this->model_app->delete('tbl_nuklir',$id);
		if ($q) {
				redirect('administrator/nuklir/berhasil','refresh');
		}else{
				redirect('administrator/belanegara/gagal','refresh');
		}
	}

	// end nuklir

	// Controller alut Matra

	function alutmatra()
	{
		cek_session_admin();
		$data['record'] = $this->model_app->view_ordering('tbl_alutmatra','id','ASC');
		$this->template->load('administrator/template','administrator/mod_alutmatra/alutmatra',$data);
	}

	function tambah_alutmatra()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$data = array(
							'urutan'=> $this->db->escape_str($this->input->post('a')),
							'matra' => $this->db->escape_str($this->input->post('b')),
							'satker'=> $this->db->escape_str($this->input->post('c')),
							'subsatker' => $this->db->escape_str($this->input->post('d')),
							'uraiansatker' => $this->db->escape_str($this->input->post('e')),
							'kategori' => $this->db->escape_str($this->input->post('f')),
							'subkategori' => $this->db->escape_str($this->input->post('g')),
							'sub2kategori' => $this->db->escape_str($this->input->post('h')),
							'sub3kategori'=> $this->db->escape_str($this->input->post('i')),
							'jenis'=> $this->db->escape_str($this->input->post('j')),
							'satuan'=> $this->db->escape_str($this->input->post('k')),
							'negara'=> $this->db->escape_str($this->input->post('l')),
							'tahun'=> $this->db->escape_str($this->input->post('m')),
							'jumlah'=> $this->db->escape_str($this->input->post('n')),
							'kondisi_s'=> $this->db->escape_str($this->input->post('o')),
							'kondisi_uss'=> $this->db->escape_str($this->input->post('p'))
							
						 );
			$q = $this->model_app->insert('tbl_alutmatra',$data);
			if ($q) {
				redirect('administrator/alutmatra/berhasil','refresh');
			}else{
				redirect('administrator/alutmatra/gagal','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data Alut Matra';
			$this->template->load('administrator/template','administrator/mod_alutmatra/tambah_alutmatra',$data); 
		}

	
	}

	function ubah_alutmatra()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$data = array(
							'urutan'=> $this->db->escape_str($this->input->post('a')),
							'matra'=> $this->db->escape_str($this->input->post('b')),
							'satker'=> $this->db->escape_str($this->input->post('c')),
							'subsatker'=> $this->db->escape_str($this->input->post('d')),
							'uraiansatker'=> $this->db->escape_str($this->input->post('e')),
							'kategori' => $this->db->escape_str($this->input->post('f')),
							'subkategori'=> $this->db->escape_str($this->input->post('g')),
							'sub2kategori'=> $this->db->escape_str($this->input->post('h')),
							'sub3kategori'=> $this->db->escape_str($this->input->post('i')),
							'jenis'=> $this->db->escape_str($this->input->post('j')),
							'satuan'=> $this->db->escape_str($this->input->post('k')),
							'negara'=> $this->db->escape_str($this->input->post('l')),
							'tahun'=> $this->db->escape_str($this->input->post('m')),
							'jumlah'=> $this->db->escape_str($this->input->post('n')),
							'kondisi_s'=> $this->db->escape_str($this->input->post('o')),
							'kondisi_uss'=> $this->db->escape_str($this->input->post('p'))
						 );
			$where = array('id'=>$this->input->post('id'));
			$q = $this->model_app->update('tbl_alutmatra',$data,$where);
			if ($q) {
				redirect('administrator/alutmatra/berhasil','refresh');
			}else{
				redirect('administrator/alutmatra/gagal','refresh');
			}
		}else{
			$data = array(
							'title' => 'Ubah Data Alut Matra',
							'row'   => $this->model_app->edit('tbl_alutmatra', array('id'=>$id))->row_array()
						);
			$this->template->load('administrator/template','administrator/mod_alutmatra/ubah_alutmatra',$data); 
		}

	}

	function hapus_alutmatra()
	{
		cek_session_admin();
		$id = array('id'=>$this->uri->segment(3));
		$q = $this->model_app->delete('tbl_alutmatra',$id);
		if ($q) {
				redirect('administrator/alutmatra/berhasil','refresh');
		}else{
				redirect('administrator/alutmatra/gagal','refresh');
		}
	}
// end alut matra

	// controller GIS

		function gis()
	{
		cek_session_admin();
		$data['record'] = $this->model_app->view_ordering('master_satker_xy','gid','ASC');
		$this->template->load('administrator/template','administrator/mod_gis/gis',$data);
	}

	function tambah_gis()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {

			$data = array(
							'parent_id'=> $this->db->escape_str($this->input->post('a')),
							'treeview'=> $this->db->escape_str($this->input->post('b')),
							'tipe_org'=> $this->db->escape_str($this->input->post('c')),
							'kd_uo'=> $this->db->escape_str($this->input->post('d')),
							'parent_satker'=> $this->db->escape_str($this->input->post('f')),
							'kd_satker'=> $this->db->escape_str($this->input->post('g')),
							'kd_subsatker'=> $this->db->escape_str($this->input->post('h')),
							'kd_satker_Simak'=> $this->db->escape_str($this->input->post('i')),
							'nama'=> $this->db->escape_str($this->input->post('j')),
							'Lokasi'=> $this->db->escape_str($this->input->post('k')),
							'kd_kec'=> $this->db->escape_str($this->input->post('l')),
							'kd_kab'=> $this->db->escape_str($this->input->post('m')),
							'kd_prop'=> $this->db->escape_str($this->input->post('n')),
							'deskripsi'=> $this->db->escape_str($this->input->post('o')),
							'logo'=> $this->db->escape_str($this->input->post('p')),
							'simbol'=> $this->db->escape_str($this->input->post('q')),
							'foto_Satke'=> $this->db->escape_str($this->input->post('r')),
							'xcoord'=> $this->db->escape_str($this->input->post('s')),
							'ycoord'=> $this->db->escape_str($this->input->post('t')),
							'jns_satker'=> $this->db->escape_str($this->input->post('u')),
							'kd_pers'=> $this->db->escape_str($this->input->post('v')),
							'kd_smk'=> $this->db->escape_str($this->input->post('w')),
							'geom'=> $this->db->escape_str($this->input->post('x')),
							'pimpinan'=> $this->db->escape_str($this->input->post('y')),
							'jml_tni'=> $this->db->escape_str($this->input->post('z')),
							'jml_pns'=> $this->db->escape_str($this->input->post('pns')),
							'jml_satker'=> $this->db->escape_str($this->input->post('satker')),
							'jml_subsatker'=> $this->db->escape_str($this->input->post('subsatker')),
							'icon'=> $this->db->escape_str($this->input->post('icon')),
							'keterangan'=> $this->db->escape_str($this->input->post('ket'))

						);
		
			$q = $this->model_app->insert('master_satker_xy',$data);
			if ($q) {
				redirect('administrator/gis/berhasil','refresh');
			}else{
				redirect('administrator/gis/gagal','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data GIS';
			$this->template->load('administrator/template','administrator/mod_gis/tambah_gis',$data); 
		}

	
	}

	function ubah_gis()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
		
			$data = array(
							'parent_id'=> $this->db->escape_str($this->input->post('a')),
							'treeview'=> $this->db->escape_str($this->input->post('b')),
							'tipe_org'=> $this->db->escape_str($this->input->post('c')),
							'kd_uo'=> $this->db->escape_str($this->input->post('d')),
							'parent_satker'=> $this->db->escape_str($this->input->post('f')),
							'kd_satker'=> $this->db->escape_str($this->input->post('g')),
							'kd_subsatker'=> $this->db->escape_str($this->input->post('h')),
							'kd_satker_Simak'=> $this->db->escape_str($this->input->post('i')),
							'nama'=> $this->db->escape_str($this->input->post('j')),
							'Lokasi'=> $this->db->escape_str($this->input->post('k')),
							'kd_kec'=> $this->db->escape_str($this->input->post('l')),
							'kd_kab'=> $this->db->escape_str($this->input->post('m')),
							'kd_prop'=> $this->db->escape_str($this->input->post('n')),
							'deskripsi'=> $this->db->escape_str($this->input->post('o')),
							'logo'=> $this->db->escape_str($this->input->post('p')),
							'simbol'=> $this->db->escape_str($this->input->post('q')),
							'foto_Satke'=> $this->db->escape_str($this->input->post('r')),
							'xcoord'=> $this->db->escape_str($this->input->post('s')),
							'ycoord'=> $this->db->escape_str($this->input->post('t')),
							'jns_satker'=> $this->db->escape_str($this->input->post('u')),
							'kd_pers'=> $this->db->escape_str($this->input->post('v')),
							'kd_smk'=> $this->db->escape_str($this->input->post('w')),
							'geom'=> $this->db->escape_str($this->input->post('x')),
							'pimpinan'=> $this->db->escape_str($this->input->post('y')),
							'jml_tni'=> $this->db->escape_str($this->input->post('z')),
							'jml_pns'=> $this->db->escape_str($this->input->post('pns')),
							'jml_satker'=> $this->db->escape_str($this->input->post('satker')),
							'jml_subsatker'=> $this->db->escape_str($this->input->post('subsatker')),
							'icon'=> $this->db->escape_str($this->input->post('icon')),
							'keterangan'=> $this->db->escape_str($this->input->post('ket'))
						 );
		
			$where = array('gid'=>$this->input->post('id'));
			$q = $this->model_app->update('master_satker_xy',$data,$where);
			if ($q) {
				redirect('administrator/gis/berhasil','refresh');
			}else{
				redirect('administrator/gis/gagal','refresh');
			}
		}else{
			$data = array(
							'title' => 'Ubah Data GIS',
							'row'   => $this->model_app->edit('master_satker_xy', array('gid'=>$id))->row_array()
						);
			$this->template->load('administrator/template','administrator/mod_gis/ubah_gis',$data); 
		}

	}

	function hapus_gis()
	{
		cek_session_admin();
		$id = array('gid'=>$this->uri->segment(3));
		$q = $this->model_app->delete('master_satker_xy',$id);
		if ($q) {
				redirect('administrator/gis/berhasil','refresh');
		}else{
				redirect('administrator/gis/gagal','refresh');
		}
	}

	//end GIS

	// controller pangkat

	function pangkat()
	{
		cek_session_admin();
		$data['record'] = $this->model_app->view_ordering('tbl_pkt','row_id','ASC');
		$this->template->load('administrator/template','administrator/mod_pangkat/pangkat',$data);
	}

	function tambah_pangkat()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			
			$data = array(
							'kd_pkt'=> $this->db->escape_str($this->input->post('a')),
							'nm_pkt' => $this->db->escape_str($this->input->post('b')),
							'esl'=> $this->db->escape_str($this->input->post('c')),
							'gol'=> $this->db->escape_str($this->input->post('d')),
							'kd_gol'=> $this->db->escape_str($this->input->post('e')),
							'nama_gol'=> $this->db->escape_str($this->input->post('f'))
						 );
	
			$q = $this->model_app->insert('tbl_pkt',$data);
			if ($q) {
				redirect('administrator/pangkat/berhasil','refresh');
			}else{
				redirect('administrator/pangkat/gagal','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data Pangkat';
			$this->template->load('administrator/template','administrator/mod_pangkat/tambah_pangkat',$data); 
		}

	
	}

	function ubah_pangkat()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			
			$data = array(
							'kd_pkt'=> $this->db->escape_str($this->input->post('a')),
							'nm_pkt' => $this->db->escape_str($this->input->post('b')),
							'esl'=> $this->db->escape_str($this->input->post('c')),
							'gol'=> $this->db->escape_str($this->input->post('d')),
							'kd_gol'=> $this->db->escape_str($this->input->post('e')),
							'nama_gol'=> $this->db->escape_str($this->input->post('f'))
						 );
		
			$where = array('row_id'=>$this->input->post('id'));
			$q = $this->model_app->update('tbl_pkt',$data,$where);
			if ($q) {
				redirect('administrator/pangkat/berhasil','refresh');
			}else{
				redirect('administrator/pangkat/gagal','refresh');
			}
		}else{
			$data = array(
							'title' => 'Ubah Data Pangkat',
							'row'   => $this->model_app->edit('tbl_pkt', array('row_id'=>$id))->row_array()
						);
			$this->template->load('administrator/template','administrator/mod_pangkat/ubah_pangkat',$data); 
		}

	}

	function hapus_pangkat()
	{
		cek_session_admin();
		$id = array('row_id'=>$this->uri->segment(3));
		$q = $this->model_app->delete('tbl_pkt',$id);
		if ($q) {
				redirect('administrator/pangkat/berhasil','refresh');
		}else{
				redirect('administrator/pangkat/gagal','refresh');
		}
	}
	// end pangkat

	//controller trekapalut
		function trekapalut()
	{
		cek_session_admin();
		$data['record'] = $this->model_app->view_ordering('tbl_trekapalut','id','ASC');
		$this->template->load('administrator/template','administrator/mod_trekapalut/trekapalut',$data);
	}

	function tambah_trekapalut()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			
			$data = array(
							'matra'=> $this->db->escape_str($this->input->post('a')),
							'kategori' => $this->db->escape_str($this->input->post('b')),
							'subkategori'=> $this->db->escape_str($this->input->post('c')),
							'jenis'=> $this->db->escape_str($this->input->post('d')),
							'jumlah'=> $this->db->escape_str($this->input->post('e'))
						 );
	
			$q = $this->model_app->insert('tbl_trekapalut',$data);
			if ($q) {
				redirect('administrator/trekapalut/berhasil','refresh');
			}else{
				redirect('administrator/trekapalut/gagal','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data Trekapalut';
			$this->template->load('administrator/template','administrator/mod_trekapalut/tambah_trekapalut',$data); 
		}

	
	}

	function ubah_trekapalut()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			
			$data = array(
							'matra'=> $this->db->escape_str($this->input->post('a')),
							'kategori' => $this->db->escape_str($this->input->post('b')),
							'subkategori'=> $this->db->escape_str($this->input->post('c')),
							'jenis'=> $this->db->escape_str($this->input->post('d')),
							'jumlah'=> $this->db->escape_str($this->input->post('e'))
						 );
		
			$where = array('id'=>$this->input->post('id'));
			$q = $this->model_app->update('tbl_trekapalut',$data,$where);
			if ($q) {
				redirect('administrator/trekapalut/berhasil','refresh');
			}else{
				redirect('administrator/trekapalut/gagal','refresh');
			}
		}else{
			$data = array(
							'title' => 'Ubah Data Trekapalut',
							'row'   => $this->model_app->edit('tbl_trekapalut', array('id'=>$id))->row_array()
						);
			$this->template->load('administrator/template','administrator/mod_trekapalut/ubah_trekapalut',$data); 
		}

	}

	function hapus_trekapalut()
	{
		cek_session_admin();
		$id = array('id'=>$this->uri->segment(3));
		$q = $this->model_app->delete('tbl_trekapalut',$id);
		if ($q) {
				redirect('administrator/trekapalut/berhasil','refresh');
		}else{
				redirect('administrator/trekapalut/gagal','refresh');
		}
	}
	//end trekapalut

	//controller trekapalut tahun

	function trekapaluttahun()
	{
		cek_session_admin();
		$data['record'] = $this->model_app->view_ordering('tbl_trekapaluttahun','id','ASC');
		$this->template->load('administrator/template','administrator/mod_trekapaluttahun/trekapaluttahun',$data);
	}

	function tambah_trekapaluttahun()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			
			$data = array(
							'matra'=> $this->db->escape_str($this->input->post('a')),
							'tahun'=> $this->db->escape_str($this->input->post('b')),
							'kategori' => $this->db->escape_str($this->input->post('c')),
							'subkategori'=> $this->db->escape_str($this->input->post('d')),
							'jenis'=> $this->db->escape_str($this->input->post('e')),
							'jumlah'=> $this->db->escape_str($this->input->post('f'))
						 );
	
			$q = $this->model_app->insert('tbl_trekapaluttahun',$data);
			if ($q) {
				redirect('administrator/trekapaluttahun/berhasil','refresh');
			}else{
				redirect('administrator/trekapaluttahun/gagal','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data Trekapalut Tahun';
			$this->template->load('administrator/template','administrator/mod_trekapaluttahun/tambah_trekapaluttahun',$data); 
		}

	
	}

	function ubah_trekapaluttahun()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			
			$data = array(
							'matra'=> $this->db->escape_str($this->input->post('a')),
							'tahun'=> $this->db->escape_str($this->input->post('b')),
							'kategori' => $this->db->escape_str($this->input->post('c')),
							'subkategori'=> $this->db->escape_str($this->input->post('d')),
							'jenis'=> $this->db->escape_str($this->input->post('e')),
							'jumlah'=> $this->db->escape_str($this->input->post('f'))
						 );
		
			$where = array('id'=>$this->input->post('id'));
			$q = $this->model_app->update('tbl_trekapaluttahun',$data,$where);
			if ($q) {
				redirect('administrator/trekapaluttahun/berhasil','refresh');
			}else{
				redirect('administrator/trekapaluttahun/gagal','refresh');
			}
		}else{
			$data = array(
							'title' => 'Ubah Data Trekapalut Tahun',
							'row'   => $this->model_app->edit('tbl_trekapaluttahun', array('id'=>$id))->row_array()
						);
			$this->template->load('administrator/template','administrator/mod_trekapaluttahun/ubah_trekapaluttahun',$data); 
		}

	}

	function hapus_trekapaluttahun()
	{
		cek_session_admin();
		$id = array('id'=>$this->uri->segment(3));
		$q = $this->model_app->delete('tbl_trekapaluttahun',$id);
		if ($q) {
				redirect('administrator/trekapaluttahun/berhasil','refresh');
		}else{
				redirect('administrator/trekapaluttahun/gagal','refresh');
		}
	}

	//end trekapalut tahun

	// controller pensiun satker
	function pensiunsatker()
	{
		cek_session_admin();
		$data['record'] = $this->model_app->view_ordering('tbl_pers_r_pensiun_satker','autono','ASC');
		$this->template->load('administrator/template','administrator/mod_pensiunsatker/pensiunsatker',$data);
	}

	function tambah_pensiunsatker()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			
			$data = array(
							'kode_uo'=> $this->db->escape_str($this->input->post('a')),
							'nama_uo'=> $this->db->escape_str($this->input->post('b')),
							'kode_Satker' => $this->db->escape_str($this->input->post('c')),
							'nama_satker'=> $this->db->escape_str($this->input->post('d')),
							'tni'=> $this->db->escape_str($this->input->post('e')),
							'pns'=> $this->db->escape_str($this->input->post('f')),
							'blnadk'=> $this->db->escape_str($this->input->post('g')),
							'thnadk'=> $this->db->escape_str($this->input->post('h'))
						 );
	
			$q = $this->model_app->insert('tbl_pers_r_pensiun_satker',$data);
			if ($q) {
				redirect('administrator/pensiunsatker/berhasil','refresh');
			}else{
				redirect('administrator/pensiunsatker/gagal','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data Pensiun Satker';
			$this->template->load('administrator/template','administrator/mod_pensiunsatker/tambah_pensiunsatker',$data); 
		}

	
	}

	function ubah_pensiunsatker()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			
			$data = array(
							'kode_uo'=> $this->db->escape_str($this->input->post('a')),
							'nama_uo'=> $this->db->escape_str($this->input->post('b')),
							'kode_Satker' => $this->db->escape_str($this->input->post('c')),
							'nama_satker'=> $this->db->escape_str($this->input->post('d')),
							'tni'=> $this->db->escape_str($this->input->post('e')),
							'pns'=> $this->db->escape_str($this->input->post('f')),
							'blnadk'=> $this->db->escape_str($this->input->post('g')),
							'thnadk'=> $this->db->escape_str($this->input->post('h'))
						 );
		
			$where = array('autono'=>$this->input->post('id'));
			$q = $this->model_app->update('tbl_pers_r_pensiun_satker',$data,$where);
			if ($q) {
				redirect('administrator/pensiunsatker/berhasil','refresh');
			}else{
				redirect('administrator/pensiunsatker/gagal','refresh');
			}
		}else{
			$data = array(
							'title' => 'Ubah Data Pensiun Satker',
							'row'   => $this->model_app->edit('tbl_pers_r_pensiun_satker', array('autono'=>$id))->row_array()
						);
			$this->template->load('administrator/template','administrator/mod_pensiunsatker/ubah_pensiunsatker',$data); 
		}

	}

	function hapus_pensiunsatker()
	{
		cek_session_admin();
		$id = array('autono'=>$this->uri->segment(3));
		$q = $this->model_app->delete('tbl_pers_r_pensiun_satker',$id);
		if ($q) {
				redirect('administrator/pensiunsatker/berhasil','refresh');
		}else{
				redirect('administrator/pensiunsatker/gagal','refresh');
		}
	}
	//end pensiun satker

	//controller pensiun satker gol

		function pensiunsatkergol()
	{
		cek_session_admin();
		$data['record'] = $this->model_app->view_ordering('tbl_pers_r_pensiun_satker_gol','autono','ASC');
		$this->template->load('administrator/template','administrator/mod_pensiunsatkergol/pensiunsatkergol',$data);
	}

	function tambah_pensiunsatkergol()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			
			$data = array(
							'kode_uo'=> $this->db->escape_str($this->input->post('a')),
							'nama_uo'=> $this->db->escape_str($this->input->post('b')),
							'kode_Satker' => $this->db->escape_str($this->input->post('c')),
							'nama_satker'=> $this->db->escape_str($this->input->post('d')),
							'kode_gol'=> $this->db->escape_str($this->input->post('e')),
							'nama_gol'=> $this->db->escape_str($this->input->post('f')),
							'nama_gol_tni'=>$this->db->escape_str($this->input->post('g')),
							'tni'=> $this->db->escape_str($this->input->post('h')),
							'pns'=> $this->db->escape_str($this->input->post('i')),
							'blnadk'=> $this->db->escape_str($this->input->post('j')),
							'thnadk'=> $this->db->escape_str($this->input->post('k'))
						 );
	
			$q = $this->model_app->insert('tbl_pers_r_pensiun_satker_gol',$data);
			if ($q) {
				redirect('administrator/pensiunsatkergol/berhasil','refresh');
			}else{
				redirect('administrator/pensiunsatkergol/gagal','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data Pensiun Satker Golongan';
			$this->template->load('administrator/template','administrator/mod_pensiunsatkergol/tambah_pensiunsatkergol',$data); 
		}

	
	}

	function ubah_pensiunsatkergol()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			
			$data = array(
							'kode_uo'=> $this->db->escape_str($this->input->post('a')),
							'nama_uo'=> $this->db->escape_str($this->input->post('b')),
							'kode_Satker' => $this->db->escape_str($this->input->post('c')),
							'nama_satker'=> $this->db->escape_str($this->input->post('d')),
							'kode_gol'=> $this->db->escape_str($this->input->post('e')),
							'nama_gol'=> $this->db->escape_str($this->input->post('f')),
							'nama_gol_tni'=>$this->db->escape_str($this->input->post('g')),
							'tni'=> $this->db->escape_str($this->input->post('h')),
							'pns'=> $this->db->escape_str($this->input->post('i')),
							'blnadk'=> $this->db->escape_str($this->input->post('j')),
							'thnadk'=> $this->db->escape_str($this->input->post('k'))

						 );
		
			$where = array('autono'=>$this->input->post('id'));
			$q = $this->model_app->update('tbl_pers_r_pensiun_satker_gol',$data,$where);
			if ($q) {
				redirect('administrator/pensiunsatkergol/berhasil','refresh');
			}else{
				redirect('administrator/pensiunsatkergol/gagal','refresh');
			}
		}else{
			$data = array(
							'title' => 'Ubah Data Pensiun Satker Golongan',
							'row'   => $this->model_app->edit('tbl_pers_r_pensiun_satker_gol', array('autono'=>$id))->row_array()
						);
			$this->template->load('administrator/template','administrator/mod_pensiunsatkergol/ubah_pensiunsatkergol',$data); 
		}

	}

	function hapus_pensiunsatkergol()
	{
		cek_session_admin();
		$id = array('autono'=>$this->uri->segment(3));
		$q = $this->model_app->delete('tbl_pers_r_pensiun_satker_gol',$id);
		if ($q) {
				redirect('administrator/pensiunsatkergol/berhasil','refresh');
		}else{
				redirect('administrator/pensiunsatkergol/gagal','refresh');
		}
	}
	//end pensiun satker gol

	// controller satker
	function satker()
	{
		cek_session_admin();
		$data['record'] = $this->model_app->view_ordering('tbl_pers_r_satker','autono','ASC');
		$this->template->load('administrator/template','administrator/mod_satker/satker',$data);
	}

	function tambah_satker()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			
			$data = array(
							'kode_uo'=> $this->db->escape_str($this->input->post('a')),
							'nama_uo'=> $this->db->escape_str($this->input->post('b')),
							'kode_Satker' => $this->db->escape_str($this->input->post('c')),
							'nama_satker'=> $this->db->escape_str($this->input->post('d')),
							'tni'=> $this->db->escape_str($this->input->post('e')),
							'pns'=> $this->db->escape_str($this->input->post('f')),
							'blnadk'=> $this->db->escape_str($this->input->post('g')),
							'thnadk'=> $this->db->escape_str($this->input->post('h'))
						 );
	
			$q = $this->model_app->insert('tbl_pers_r_satker',$data);
			if ($q) {
				redirect('administrator/satker/berhasil','refresh');
			}else{
				redirect('administrator/satker/gagal','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data Satker ';
			$this->template->load('administrator/template','administrator/mod_satker/tambah_satker',$data); 
		}

	
	}

	function ubah_satker()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			
			$data = array(
							'kode_uo'=> $this->db->escape_str($this->input->post('a')),
							'nama_uo'=> $this->db->escape_str($this->input->post('b')),
							'kode_Satker' => $this->db->escape_str($this->input->post('c')),
							'nama_satker'=> $this->db->escape_str($this->input->post('d')),
							'tni'=> $this->db->escape_str($this->input->post('e')),
							'pns'=> $this->db->escape_str($this->input->post('f')),
							'blnadk'=> $this->db->escape_str($this->input->post('g')),
							'thnadk'=> $this->db->escape_str($this->input->post('h'))

						 );
		
			$where = array('autono'=>$this->input->post('id'));
			$q = $this->model_app->update('tbl_pers_r_satker',$data,$where);
			if ($q) {
				redirect('administrator/satker/berhasil','refresh');
			}else{
				redirect('administrator/satker/gagal','refresh');
			}
		}else{
			$data = array(
							'title' => 'Ubah Data Satker ',
							'row'   => $this->model_app->edit('tbl_pers_r_satker', array('autono'=>$id))->row_array()
						);
			$this->template->load('administrator/template','administrator/mod_satker/ubah_satker',$data); 
		}

	}

	function hapus_satker()
	{
		cek_session_admin();
		$id = array('autono'=>$this->uri->segment(3));
		$q = $this->model_app->delete('tbl_pers_r_satker',$id);
		if ($q) {
				redirect('administrator/satker/berhasil','refresh');
		}else{
				redirect('administrator/satker/gagal','refresh');
		}
	}

	//end satker

	//controller master satker
	function mastersatker()
	{
		cek_session_admin();
		$data['record'] = $this->model_app->view_ordering('master_Satker','id','ASC');
		$this->template->load('administrator/template','administrator/mod_mastersatker/mastersatker',$data);
	}

	function tambah_mastersatker()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			
			$data = array(
							'kd_uo'=> $this->db->escape_str($this->input->post('a')),
							'nm_uo'=> $this->db->escape_str($this->input->post('b')),
							'kd_kotama'=> $this->db->escape_str($this->input->post('c')),
							'nm_kotama' => $this->db->escape_Str($this->input->post('d')),
							'kd_Satker' => $this->db->escape_str($this->input->post('e')),
							'nm_satker'=> $this->db->escape_str($this->input->post('f')),
							'kd_subsatker'=> $this->db->escape_str($this->input->post('g')),
							'nm_subsatker'=> $this->db->escape_str($this->input->post('h')),
							'kd_satker_simak'=> $this->db->escape_str($this->input->post('i')),
							'alamat'=> $this->db->escape_str($this->input->post('j')),
							'keterangan'=>$this->db->escape_str($this->input->post('k')),
							'x_coord'=>$this->db->escape_str($this->input->post('l')),
							'y_coord'=>$this->db->escape_str($this->input->post('m')),
							'O'=>$this->db->escape_str($this->input->post('n')),
							'P'=>$this->db->escape_str($this->input->post('o')),
							'Q'=>$this->db->escape_str($this->input->post('p'))
						 );
	
			$q = $this->model_app->insert('master_Satker',$data);
			if ($q) {
				redirect('administrator/mastersatker/berhasil','refresh');
			}else{
				redirect('administrator/mastersatker/gagal','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data Master Satker ';
			$this->template->load('administrator/template','administrator/mod_mastersatker/tambah_mastersatker',$data); 
		}

	
	}

	function ubah_mastersatker()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			
			$data = array(
							'kd_uo'=> $this->db->escape_str($this->input->post('a')),
							'nm_uo'=> $this->db->escape_str($this->input->post('b')),
							'kd_kotama'=> $this->db->escape_str($this->input->post('c')),
							'nm_kotama' => $this->db->escape_Str($this->input->post('d')),
							'kd_Satker' => $this->db->escape_str($this->input->post('e')),
							'nm_satker'=> $this->db->escape_str($this->input->post('f')),
							'kd_subsatker'=> $this->db->escape_str($this->input->post('g')),
							'nm_subsatker'=> $this->db->escape_str($this->input->post('h')),
							'kd_satker_simak'=> $this->db->escape_str($this->input->post('i')),
							'alamat'=> $this->db->escape_str($this->input->post('j')),
							'keterangan'=>$this->db->escape_str($this->input->post('k')),
							'x_coord'=>$this->db->escape_str($this->input->post('l')),
							'y_coord'=>$this->db->escape_str($this->input->post('m')),
							'O'=>$this->db->escape_str($this->input->post('n')),
							'P'=>$this->db->escape_str($this->input->post('o')),
							'Q'=>$this->db->escape_str($this->input->post('p'))
						 );
		
			$where = array('id'=>$this->input->post('id'));
			$q = $this->model_app->update('master_satker',$data,$where);
			if ($q) {
				redirect('administrator/mastersatker/berhasil','refresh');
			}else{
				redirect('administrator/mastersatker/gagal','refresh');
			}
		}else{
			$data = array(
							'title' => 'Ubah Data Master Satker ',
							'row'   => $this->model_app->edit('master_satker', array('id'=>$id))->row_array()
						);
			$this->template->load('administrator/template','administrator/mod_mastersatker/ubah_mastersatker',$data); 
		}

	}

	function hapus_mastersatker()
	{
		cek_session_admin();
		$id = array('id'=>$this->uri->segment(3));
		$q = $this->model_app->delete('master_satker',$id);
		if ($q) {
				redirect('administrator/mastersatker/berhasil','refresh');
		}else{
				redirect('administrator/mastersatker/gagal','refresh');
		}
	}
	//end mastersatker

	//controller satker gol

	function satkergol()
	{
		cek_session_admin();
		$data['record'] = $this->model_app->view_ordering('tbl_pers_r_satker_gol','autono','ASC');
		$this->template->load('administrator/template','administrator/mod_satkergol/satkergol',$data);
	}

	function tambah_satkergol()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			
			$data = array(
							'kode_uo'=> $this->db->escape_str($this->input->post('a')),
							'nama_uo'=> $this->db->escape_str($this->input->post('b')),
							'kode_satker' => $this->db->escape_str($this->input->post('c')),
							'nama_satker'=> $this->db->escape_str($this->input->post('d')),
							'kode_gol'=> $this->db->escape_str($this->input->post('e')),
							'nama_gol'=> $this->db->escape_str($this->input->post('f')),
							'nama_gol_tni'=>$this->db->escape_str($this->input->post('g')),
							'tni'=>$this->db->escape_str($this->input->post('h')),
							'pns'=>$this->db->escape_str($this->input->post('i')),
							'blnadk'=>$this->db->escape_str($this->input->post('j')),
							'thnadk'=>$this->db->escape_str($this->input->post('k'))
						 );
	
			$q = $this->model_app->insert('tbl_pers_r_satker_gol',$data);
			if ($q) {
				redirect('administrator/satkergol/berhasil','refresh');
			}else{
				redirect('administrator/satkergol/gagal','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data Personel Satker Golongan ';
			$this->template->load('administrator/template','administrator/mod_satkergol/tambah_satkergol',$data); 
		}

	
	}

	function ubah_satkergol()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			
			$data = array(
							'kode_uo'=> $this->db->escape_str($this->input->post('a')),
							'nama_uo'=> $this->db->escape_str($this->input->post('b')),
							'kode_satker' => $this->db->escape_str($this->input->post('c')),
							'nama_satker'=> $this->db->escape_str($this->input->post('d')),
							'kode_gol'=> $this->db->escape_str($this->input->post('e')),
							'nama_gol'=> $this->db->escape_str($this->input->post('f')),
							'nama_gol_tni'=>$this->db->escape_str($this->input->post('g')),
							'tni'=>$this->db->escape_str($this->input->post('h')),
							'pns'=>$this->db->escape_str($this->input->post('i')),
							'blnadk'=>$this->db->escape_str($this->input->post('j')),
							'thnadk'=>$this->db->escape_str($this->input->post('k'))
						 );
		
			$where = array('autono'=>$this->input->post('id'));
			$q = $this->model_app->update('tbl_pers_r_satker_gol',$data,$where);
			if ($q) {
				redirect('administrator/satkergol/berhasil','refresh');
			}else{
				redirect('administrator/satkergol/gagal','refresh');
			}
		}else{
			$data = array(
							'title' => 'Ubah Data Personel Satker Golongan ',
							'row'   => $this->model_app->edit('tbl_pers_r_satker_gol', array('autono'=>$id))->row_array()
						);
			$this->template->load('administrator/template','administrator/mod_satkergol/ubah_satkergol',$data); 
		}

	}

	function hapus_satkergol()
	{
		cek_session_admin();
		$id = array('autono'=>$this->uri->segment(3));
		$q = $this->model_app->delete('tbl_pers_r_satker_gol',$id);
		if ($q) {
				redirect('administrator/satkergol/berhasil','refresh');
		}else{
				redirect('administrator/satkergol/gagal','refresh');
		}
	}
	//end satker gol

	// controller matra gol

		function matragol()
	{
		cek_session_admin();
		$data['record'] = $this->model_app->view_ordering('tbl_pers_r_matra_gol','autono','ASC');
		$this->template->load('administrator/template','administrator/mod_matragol/matragol',$data);
	}

	function tambah_matragol()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			
			$data = array(
							'kode_matra'=> $this->db->escape_str($this->input->post('a')),
							'nama_matra'=> $this->db->escape_str($this->input->post('b')),
							'kode_gol' => $this->db->escape_str($this->input->post('c')),
							'nama_gol'=> $this->db->escape_str($this->input->post('d')),
							'kdkelamin'=> $this->db->escape_str($this->input->post('e')),
							'kdagama'=> $this->db->escape_str($this->input->post('f')),
							'jml'=>$this->db->escape_str($this->input->post('g')),
							'blnadk'=>$this->db->escape_str($this->input->post('h')),
							'thnadk'=>$this->db->escape_str($this->input->post('i'))
							);
	
			$q = $this->model_app->insert('tbl_pers_r_matra_gol',$data);
			if ($q) {
				redirect('administrator/matragol/berhasil','refresh');
			}else{
				redirect('administrator/matragol/gagal','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data Personel Matra Golongan ';
			$this->template->load('administrator/template','administrator/mod_matragol/tambah_matragol',$data); 
		}

	
	}

	function ubah_matragol()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			
			$data = array(
							'kode_matra'=> $this->db->escape_str($this->input->post('a')),
							'nama_matra'=> $this->db->escape_str($this->input->post('b')),
							'kode_gol' => $this->db->escape_str($this->input->post('c')),
							'nama_gol'=> $this->db->escape_str($this->input->post('d')),
							'kdkelamin'=> $this->db->escape_str($this->input->post('e')),
							'kdagama'=> $this->db->escape_str($this->input->post('f')),
							'jml'=>$this->db->escape_str($this->input->post('g')),
							'blnadk'=>$this->db->escape_str($this->input->post('h')),
							'thnadk'=>$this->db->escape_str($this->input->post('i'))
							);
		
			$where = array('autono'=>$this->input->post('id'));
			$q = $this->model_app->update('tbl_pers_r_matra_gol',$data,$where);
			if ($q) {
				redirect('administrator/matragol/berhasil','refresh');
			}else{
				redirect('administrator/matragol/gagal','refresh');
			}
		}else{
			$data = array(
							'title' => 'Ubah Data Personel Matra Golongan ',
							'row'   => $this->model_app->edit('tbl_pers_r_matra_gol', array('autono'=>$id))->row_array()
						);
			$this->template->load('administrator/template','administrator/mod_matragol/ubah_matragol',$data); 
		}

	}

	function hapus_matragol()
	{
		cek_session_admin();
		$id = array('autono'=>$this->uri->segment(3));
		$q = $this->model_app->delete('tbl_pers_r_matra_gol',$id);
		if ($q) {
				redirect('administrator/matragol/berhasil','refresh');
		}else{
				redirect('administrator/matragol/gagal','refresh');
		}
	}
	//end matra gol

	//controller uo satker

	function uosatker()
	{
		cek_session_admin();
		$data['record'] = $this->model_app->view_ordering('tbl_uosatker','id','ASC');
		$this->template->load('administrator/template','administrator/mod_uosatker/uosatker',$data);
	}

	function tambah_uosatker()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			
			$data = array(
							'uo'=> $this->db->escape_str($this->input->post('a')),
							'satker'=> $this->db->escape_str($this->input->post('b')),
							'subsatker' => $this->db->escape_str($this->input->post('c')),
							'uraian'=> $this->db->escape_str($this->input->post('d')),
							'kode_satker'=> $this->db->escape_str($this->input->post('e')),
							'nama_uo'=> $this->db->escape_str($this->input->post('f')),
							'nama_satker'=>$this->db->escape_str($this->input->post('g')),
							'singkatan'=>$this->db->escape_str($this->input->post('h')),
							'sumber'=>$this->db->escape_str($this->input->post('i')),
							'created_on'=>date('Y-m-d'),
							'created_by'=>$this->session->userdata('username'),
							'status'=>1
							);
	
			$q = $this->model_app->insert('tbl_uosatker',$data);
			if ($q) {
				redirect('administrator/uosatker/berhasil','refresh');
			}else{
				redirect('administrator/uosatker/gagal','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data UO Satker ';
			$this->template->load('administrator/template','administrator/mod_uosatker/tambah_uosatker',$data); 
		}

	
	}

	function ubah_uosatker()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			
			$data = array(
							'uo'=> $this->db->escape_str($this->input->post('a')),
							'satker'=> $this->db->escape_str($this->input->post('b')),
							'subsatker' => $this->db->escape_str($this->input->post('c')),
							'uraian'=> $this->db->escape_str($this->input->post('d')),
							'kode_satker'=> $this->db->escape_str($this->input->post('e')),
							'nama_uo'=> $this->db->escape_str($this->input->post('f')),
							'nama_satker'=>$this->db->escape_str($this->input->post('g')),
							'singkatan'=>$this->db->escape_str($this->input->post('h')),
							'sumber'=>$this->db->escape_str($this->input->post('i')),
							'status'=>2
							);
		
			$where = array('id'=>$this->input->post('id'));
			$q = $this->model_app->update('tbl_uosatker',$data,$where);
			if ($q) {
				redirect('administrator/uosatker/berhasil','refresh');
			}else{
				redirect('administrator/uosatker/gagal','refresh');
			}
		}else{
			$data = array(
							'title' => 'Ubah Data UO Satker ',
							'row'   => $this->model_app->edit('tbl_uosatker', array('id'=>$id))->row_array()
						);
			$this->template->load('administrator/template','administrator/mod_uosatker/ubah_uosatker',$data); 
		}

	}

	function hapus_uosatker()
	{
		cek_session_admin();
		$id = array('id'=>$this->uri->segment(3));
		$q = $this->model_app->delete('tbl_uosatker',$id);
		if ($q) {
				redirect('administrator/uosatker/berhasil','refresh');
		}else{
				redirect('administrator/uosatker/gagal','refresh');
		}
	}
	//end uo satker

	// controller country stregth
	function kekuatan()
	{
		cek_session_admin();
		$data['record'] = $this->model_app->view_ordering('tbl_countrystrength','id','ASC');
		$this->template->load('administrator/template','administrator/mod_kekuatan/kekuatan',$data);
	}

	function tambah_kekuatan()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			
			$data = array(
							'benua'=> $this->db->escape_str($this->input->post('a')),
							'subbenua'=> $this->db->escape_str($this->input->post('b')),
							'negara' => $this->db->escape_str($this->input->post('c')),
							'category'=> $this->db->escape_str($this->input->post('d')),
							'subcategory'=> $this->db->escape_str($this->input->post('e')),
							'stregth'=> $this->db->escape_str($this->input->post('f'))
							
							);
	
			$q = $this->model_app->insert('tbl_countrystrength',$data);
			if ($q) {
				redirect('administrator/kekuatan/berhasil','refresh');
			}else{
				redirect('administrator/kekuatan/gagal','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data Country Strength ';
			$this->template->load('administrator/template','administrator/mod_kekuatan/tambah_kekuatan',$data); 
		}

	
	}

	function ubah_kekuatan()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			
			$data = array(
							'benua'=> $this->db->escape_str($this->input->post('a')),
							'subbenua'=> $this->db->escape_str($this->input->post('b')),
							'negara' => $this->db->escape_str($this->input->post('c')),
							'category'=> $this->db->escape_str($this->input->post('d')),
							'subcategory'=> $this->db->escape_str($this->input->post('e')),
							'stregth'=> $this->db->escape_str($this->input->post('f'))
							);
		
			$where = array('id'=>$this->input->post('id'));
			$q = $this->model_app->update('tbl_countrystrength',$data,$where);
			if ($q) {
				redirect('administrator/kekuatan/berhasil','refresh');
			}else{
				redirect('administrator/kekuatan/gagal','refresh');
			}
		}else{
			$data = array(
							'title' => 'Ubah Data Country Strength ',
							'row'   => $this->model_app->edit('tbl_countrystrength', array('id'=>$id))->row_array()
						);
			$this->template->load('administrator/template','administrator/mod_kekuatan/ubah_kekuatan',$data); 
		}

	}

	function hapus_kekuatan()
	{
		cek_session_admin();
		$id = array('id'=>$this->uri->segment(3));
		$q = $this->model_app->delete('tbl_countrystrength',$id);
		if ($q) {
				redirect('administrator/kekuatan/berhasil','refresh');
		}else{
				redirect('administrator/kekuatan/gagal','refresh');
		}
	}

	//end kekuatan

	// controller tanah

	function tanah()
	{
		cek_session_admin();
		$data['record'] = $this->model_app->view_ordering('tbl_tanah','autono','ASC');
		$this->template->load('administrator/template','administrator/mod_tanah/tanah',$data);
	}

	function tambah_tanah()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			
			$data = array(
							'kategori'=> $this->db->escape_str($this->input->post('a')),
							'uo'=> $this->db->escape_str($this->input->post('b')),
							'kotama' => $this->db->escape_str($this->input->post('c')),
							'nama'=> $this->db->escape_str($this->input->post('d')),
							'nilai'=> $this->db->escape_str($this->input->post('e')),
							'sumber'=> $this->db->escape_str($this->input->post('f')),
							'created_on'=>date('Y-m-d'),
							'created_by'=>$this->session->userdata('username')
							);
	
			$q = $this->model_app->insert('tbl_tanah',$data);
			if ($q) {
				redirect('administrator/tanah/berhasil','refresh');
			}else{
				redirect('administrator/tanah/gagal','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data Tanah ';
			$this->template->load('administrator/template','administrator/mod_tanah/tambah_tanah',$data); 
		}

	
	}

	function ubah_tanah()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			
			$data = array(
							'kategori'=> $this->db->escape_str($this->input->post('a')),
							'uo'=> $this->db->escape_str($this->input->post('b')),
							'kotama' => $this->db->escape_str($this->input->post('c')),
							'nama'=> $this->db->escape_str($this->input->post('d')),
							'nilai'=> $this->db->escape_str($this->input->post('e')),
							'sumber'=> $this->db->escape_str($this->input->post('f'))
							
							);
		
			$where = array('autono'=>$this->input->post('id'));
			$q = $this->model_app->update('tbl_tanah',$data,$where);
			if ($q) {
				redirect('administrator/tanah/berhasil','refresh');
			}else{
				redirect('administrator/tanah/gagal','refresh');
			}
		}else{
			$data = array(
							'title' => 'Ubah Data Tanah ',
							'row'   => $this->model_app->edit('tbl_tanah', array('autono'=>$id))->row_array()
						);
			$this->template->load('administrator/template','administrator/mod_tanah/ubah_tanah',$data); 
		}

	}

	function hapus_tanah()
	{
		cek_session_admin();
		$id = array('autono'=>$this->uri->segment(3));
		$q = $this->model_app->delete('tbl_tanah',$id);
		if ($q) {
				redirect('administrator/tanah/berhasil','refresh');
		}else{
				redirect('administrator/tanah/gagal','refresh');
		}
	}
	//end tanah

	//controller diklat detil

	function diklatdetil()
	{
		cek_session_admin();
		$data['record'] = $this->model_app->view_ordering('tbl_diklatdetil','id','ASC');
		$this->template->load('administrator/template','administrator/mod_diklatdetil/diklatdetil',$data);
	}

	function tambah_diklatdetil()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			
			$data = array(
							'matra'=> $this->db->escape_str($this->input->post('a')),
							'wilayah'=> $this->db->escape_str($this->input->post('b')),
							'subwilayah' => $this->db->escape_str($this->input->post('c')),
							'lokasi'=> $this->db->escape_str($this->input->post('d')),
							'luas'=> $this->db->escape_str($this->input->post('e')),
							'kategori'=> $this->db->escape_str($this->input->post('f')),
							'status'=>$this->db->escape_str($this->input->post('g')),
							'sts'=>1
							);
	
			$q = $this->model_app->insert('tbl_diklatdetil',$data);
			if ($q) {
				redirect('administrator/diklatdetil/berhasil','refresh');
			}else{
				redirect('administrator/diklatdetil/gagal','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data Diklat Detail ';
			$this->template->load('administrator/template','administrator/mod_diklatdetil/tambah_diklatdetil',$data); 
		}

	
	}

	function ubah_diklatdetil()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			
			$data = array(
							'matra'=> $this->db->escape_str($this->input->post('a')),
							'wilayah'=> $this->db->escape_str($this->input->post('b')),
							'subwilayah' => $this->db->escape_str($this->input->post('c')),
							'lokasi'=> $this->db->escape_str($this->input->post('d')),
							'luas'=> $this->db->escape_str($this->input->post('e')),
							'kategori'=> $this->db->escape_str($this->input->post('f')),
							'status'=>$this->db->escape_str($this->input->post('g')),
							'sts'=>2
							
							);
		
			$where = array('id'=>$this->input->post('id'));
			$q = $this->model_app->update('tbl_diklatdetil',$data,$where);
			if ($q) {
				redirect('administrator/diklatdetil/berhasil','refresh');
			}else{
				redirect('administrator/diklatdetil/gagal','refresh');
			}
		}else{
			$data = array(
							'title' => 'Ubah Data Diklat Detail ',
							'row'   => $this->model_app->edit('tbl_diklatdetil', array('id'=>$id))->row_array()
						);
			$this->template->load('administrator/template','administrator/mod_diklatdetil/ubah_diklatdetil',$data); 
		}

	}

	function hapus_diklatdetil()
	{
		cek_session_admin();
		$id = array('id'=>$this->uri->segment(3));
		$q = $this->model_app->delete('tbl_diklatdetil',$id);
		if ($q) {
				redirect('administrator/diklatdetil/berhasil','refresh');
		}else{
				redirect('administrator/diklatdetil/gagal','refresh');
		}
	}
	//end diklat detil

	// controller lingstra

	function lingstra()
	{
		cek_session_admin();
		$data['record'] = $this->model_app->view_ordering('tbl_lingstra','id','ASC');
		$this->template->load('administrator/template','administrator/mod_lingstra/lingstra',$data);
	}

	function tambah_lingstra()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			
			$data = array(
							'tahun'=> $this->db->escape_str($this->input->post('a')),
							'kategori'=> $this->db->escape_str($this->input->post('b')),
							'wilayah' => $this->db->escape_str($this->input->post('c')),
							'jenis'=> $this->db->escape_str($this->input->post('d')),
							'jumlah'=> $this->db->escape_str($this->input->post('e')),
							'status'=> 1
							);
	
			$q = $this->model_app->insert('tbl_lingstra',$data);
			if ($q) {
				redirect('administrator/lingstra/berhasil','refresh');
			}else{
				redirect('administrator/lingstra/gagal','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data Lingstra ';
			$this->template->load('administrator/template','administrator/mod_lingstra/tambah_lingstra',$data); 
		}

	
	}

	function ubah_lingstra()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			
			$data = array(
							'tahun'=> $this->db->escape_str($this->input->post('a')),
							'kategori'=> $this->db->escape_str($this->input->post('b')),
							'wilayah' => $this->db->escape_str($this->input->post('c')),
							'jenis'=> $this->db->escape_str($this->input->post('d')),
							'jumlah'=> $this->db->escape_str($this->input->post('e')),
							'status'=> 2
							
						);
		
			$where = array('id'=>$this->input->post('id'));
			$q = $this->model_app->update('tbl_lingstra',$data,$where);
			if ($q) {
				redirect('administrator/lingstra/berhasil','refresh');
			}else{
				redirect('administrator/lingstra/gagal','refresh');
			}
		}else{
			$data = array(
							'title' => 'Ubah Data Lingstra ',
							'row'   => $this->model_app->edit('tbl_lingstra', array('id'=>$id))->row_array()
						);
			$this->template->load('administrator/template','administrator/mod_lingstra/ubah_lingstra',$data); 
		}

	}

	function hapus_lingstra()
	{
		cek_session_admin();
		$id = array('id'=>$this->uri->segment(3));
		$q = $this->model_app->delete('tbl_lingstra',$id);
		if ($q) {
				redirect('administrator/lingstra/berhasil','refresh');
		}else{
				redirect('administrator/lingstra/gagal','refresh');
		}
	}
	//end lingstra

	//controller pensiun matra gol
	function pensiunmatragol()
	{
		cek_session_admin();
		$data['record'] = $this->model_app->view_ordering('tbl_pers_r_pensiun_matra_gol','autono','ASC');
		$this->template->load('administrator/template','administrator/mod_pensiunmatragol/pensiunmatragol',$data);
	}

	function tambah_pensiunmatragol()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			
			$data = array(
							'kode_matra'=> $this->db->escape_str($this->input->post('a')),
							'nama_matra'=> $this->db->escape_str($this->input->post('b')),
							'kode_gol' => $this->db->escape_str($this->input->post('c')),
							'nama_gol'=> $this->db->escape_str($this->input->post('d')),
							'jml'=> $this->db->escape_str($this->input->post('e')),
							'blnadk'=> $this->db->escape_str($this->input->post('f')),
							'thnadk'=>$this->db->escape_str($this->input->post('g'))
							);
	
			$q = $this->model_app->insert('tbl_pers_r_pensiun_matra_gol',$data);
			if ($q) {
				redirect('administrator/pensiunmatragol/berhasil','refresh');
			}else{
				redirect('administrator/pensiunmatragol/gagal','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data Personel Pensiun Matra Per Golongan ';
			$this->template->load('administrator/template','administrator/mod_pensiunmatragol/tambah_pensiunmatragol',$data); 
		}

	
	}

	function ubah_pensiunmatragol()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			
			$data = array(
							'kode_matra'=> $this->db->escape_str($this->input->post('a')),
							'nama_matra'=> $this->db->escape_str($this->input->post('b')),
							'kode_gol' => $this->db->escape_str($this->input->post('c')),
							'nama_gol'=> $this->db->escape_str($this->input->post('d')),
							'jml'=> $this->db->escape_str($this->input->post('e')),
							'blnadk'=> $this->db->escape_str($this->input->post('f')),
							'thnadk'=>$this->db->escape_str($this->input->post('g'))
							);
		
			$where = array('autono'=>$this->input->post('id'));
			$q = $this->model_app->update('tbl_pers_r_pensiun_matra_gol',$data,$where);
			if ($q) {
				redirect('administrator/pensiunmatragol/berhasil','refresh');
			}else{
				redirect('administrator/pensiunmatragol/gagal','refresh');
			}
		}else{
			$data = array(
							'title' => 'Ubah Data Personel Pensiun Matra Per Golongan ',
							'row'   => $this->model_app->edit('tbl_pers_r_pensiun_matra_gol', array('autono'=>$id))->row_array()
						);
			$this->template->load('administrator/template','administrator/mod_pensiunmatragol/ubah_pensiunmatragol',$data); 
		}

	}

	function hapus_pensiunmatragol()
	{
		cek_session_admin();
		$id = array('autono'=>$this->uri->segment(3));
		$q = $this->model_app->delete('tbl_pers_r_pensiun_matra_gol',$id);
		if ($q) {
				redirect('administrator/pensiunmatragol/berhasil','refresh');
		}else{
				redirect('administrator/lingstra/gagal','refresh');
		}
	}
	//end pensiun matra gol

	//controller pangkat per golongan
		function pangkatgol()
	{
		cek_session_admin();
		$data['record'] = $this->model_app->view_ordering('tbl_pers_gol_pangkat','autono','ASC');
		$this->template->load('administrator/template','administrator/mod_pangkatgol/pangkatgol',$data);
	}

	function tambah_pangakatgol()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			
			$data = array(
							'kdgol'=> $this->db->escape_str($this->input->post('a')),
							'nmgol'=> cetak($this->input->post('b')),
							'pns' => cetak($this->input->post('c')),
							'group_pns'=> $this->db->escape_str($this->input->post('d')),
							'group_tni'=> $this->db->escape_str($this->input->post('e')),
							'tni'=> $this->db->escape_str($this->input->post('f')),
							'ad'=>$this->db->escape_str($this->input->post('g')),
							'al'=>$this->db->escape_str($this->input->post('h')),
							'au'=>$this->db->escape_str($this->input->post('i')),
							'gaji'=>$this->db->escape_str($this->input->post('j'))
							);
	
			$q = $this->model_app->insert('tbl_pers_gol_pangkat',$data);
			if ($q) {
				redirect('administrator/pangkatgol/berhasil','refresh');
			}else{
				redirect('administrator/pangkatgol/gagal','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data Pangkat Personel Per Golongan ';
			$this->template->load('administrator/template','administrator/mod_pangkatgol/tambah_pangakatgol',$data); 
		}

	
	}

	function ubah_pangkatgol()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			
			$data = array(
							'kdgol'=> $this->db->escape_str($this->input->post('a')),
							'nmgol'=> cetak($this->input->post('b')),
							'pns' => cetak($this->input->post('c')),
							'group_pns'=> $this->db->escape_str($this->input->post('d')),
							'group_tni'=> $this->db->escape_str($this->input->post('e')),
							'tni'=> $this->db->escape_str($this->input->post('f')),
							'ad'=>$this->db->escape_str($this->input->post('g')),
							'al'=>$this->db->escape_str($this->input->post('h')),
							'au'=>$this->db->escape_str($this->input->post('i')),
							'gaji'=>$this->db->escape_str($this->input->post('j'))
							);
		
			$where = array('autono'=>$this->input->post('id'));
			$q = $this->model_app->update('tbl_pers_gol_pangkat',$data,$where);
			if ($q) {
				redirect('administrator/pangkatgol/berhasil','refresh');
			}else{
				redirect('administrator/pangkatgol/gagal','refresh');
			}
		}else{
			$data = array(
							'title' => 'Ubah Data Pangkat Personel Per Golongan ',
							'row'   => $this->model_app->edit('tbl_pers_gol_pangkat', array('autono'=>$id))->row_array()
						);
			$this->template->load('administrator/template','administrator/mod_pangkatgol/ubah_pangkatgol',$data); 
		}

	}

	function hapus_pangkatgol()
	{
		cek_session_admin();
		$id = array('autono'=>$this->uri->segment(3));
		$q = $this->model_app->delete('tbl_pers_gol_pangkat',$id);
		if ($q) {
				redirect('administrator/pangakatgol/berhasil','refresh');
		}else{
				redirect('administrator/pangakatgol/gagal','refresh');
		}
	}
	//end personel pangkat golongan

	// controller Personel TNI AU

	function tniau()
	{
		cek_session_admin();
		$data['record'] = $this->model_app->view_ordering('tbl_tniau','row_id','ASC');
		$this->template->load('administrator/template','administrator/mod_tniau/tniau',$data);
	}

	function tambah_tniau()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			
			$data = array(
							'NRP'=> cetak($this->input->post('a')),
							'NAMA'=> cetak($this->input->post('b')),
							'PKT' => cetak($this->input->post('c')),
							'KDPKT'=> cetak($this->input->post('d')),
							'TGLLAHIR'=> cetak($this->input->post('e')),
							'TMLAHIR'=> cetak($this->input->post('f')),
							'KODEJAB'=>$this->db->escape_str($this->input->post('g')),
							'JABBARU'=>cetak($this->input->post('h')),
							'SATUAN'=>cetak($this->input->post('i')),
							'KDSAT'=>$this->db->escape_str($this->input->post('j')),
							'KORP'=>$this->db->escape_str($this->input->post('k')),
							'MATRA'=>$this->db->escape_str($this->input->post('l'))
							);
	
			$q = $this->model_app->insert('tbl_tniau',$data);
			if ($q) {
				redirect('administrator/tniau/berhasil','refresh');
			}else{
				redirect('administrator/tniau/gagal','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data Personel TNI AU ';
			$this->template->load('administrator/template','administrator/mod_tniau/tambah_tniau',$data); 
		}

	
	}

	function ubah_tniau()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			
			$data = array(
							'NRP'=> cetak($this->input->post('a')),
							'NAMA'=> cetak($this->input->post('b')),
							'PKT' => cetak($this->input->post('c')),
							'KDPKT'=> cetak($this->input->post('d')),
							'TGLLAHIR'=> cetak($this->input->post('e')),
							'TMLAHIR'=> cetak($this->input->post('f')),
							'KODEJAB'=>$this->db->escape_str($this->input->post('g')),
							'JABBARU'=>cetak($this->input->post('h')),
							'SATUAN'=>cetak($this->input->post('i')),
							'KDSAT'=>$this->db->escape_str($this->input->post('j')),
							'KORP'=>$this->db->escape_str($this->input->post('k')),
							'MATRA'=>$this->db->escape_str($this->input->post('l'))
							);
		
			$where = array('row_id'=>$this->input->post('id'));
			$q = $this->model_app->update('tbl_tniau',$data,$where);
			if ($q) {
				redirect('administrator/tniau/berhasil','refresh');
			}else{
				redirect('administrator/tniau/gagal','refresh');
			}
		}else{
			$data = array(
							'title' => 'Ubah Data Personel TNI AU ',
							'row'   => $this->model_app->edit('tbl_tniau', array('row_id'=>$id))->row_array()
						);
			$this->template->load('administrator/template','administrator/mod_tniau/ubah_tniau',$data); 
		}

	}

	function hapus_tniau()
	{
		cek_session_admin();
		$id = array('row_id'=>$this->uri->segment(3));
		$q = $this->model_app->delete('tbl_tniau',$id);
		if ($q) {
				redirect('administrator/tniau/berhasil','refresh');
		}else{
				redirect('administrator/tniau/gagal','refresh');
		}
	}
	//end Personel TNI AU

	//controller TNI AL

	function perstnial()
	{
		cek_session_admin();
		$data['record'] = $this->model_app->view_ordering('tbl_tnial','row_id','ASC');
		$this->template->load('administrator/template','administrator/mod_perstnial/perstnial',$data);
	}

	function tambah_perstnial()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			
			$data = array(
							'NRP'=> cetak($this->input->post('a')),
							'NAMA'=> cetak($this->input->post('b')),
							'PKT' => $this->db->escape_str($this->input->post('c')),
							'KDPKT'=> $this->db->escape_str($this->input->post('d')),
							'KORPS'=> $this->db->escape_str($this->input->post('e')),
							'MATRA'=> $this->db->escape_str($this->input->post('f')),
							'TMLAHIR'=>$this->db->escape_str($this->input->post('g')),
							'TGLLAHIR'=>cetak($this->input->post('h')),
							'LAHIR'=>cetak($this->input->post('i')),
							'KOTAMA'=>$this->db->escape_str($this->input->post('j')),
							'SATMINKAL'=>cetak($this->input->post('k')),
							'SATMINKAL1'=>cetak($this->input->post('l')),
							'JABATAN'=>cetak($this->input->post('m'))
							);
	
			$q = $this->model_app->insert('tbl_tnial',$data);
			if ($q) {
				redirect('administrator/perstnial/berhasil','refresh');
			}else{
				redirect('administrator/perstnial/gagal','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data Personel TNI AL ';
			$this->template->load('administrator/template','administrator/mod_perstnial/tambah_perstnial',$data); 
		}

	
	}

	function ubah_perstnial()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			
			$data = array(
							'NRP'=> cetak($this->input->post('a')),
							'NAMA'=> cetak($this->input->post('b')),
							'PKT' => $this->db->escape_str($this->input->post('c')),
							'KDPKT'=> $this->db->escape_str($this->input->post('d')),
							'KORPS'=> $this->db->escape_str($this->input->post('e')),
							'MATRA'=> $this->db->escape_str($this->input->post('f')),
							'TMLAHIR'=>$this->db->escape_str($this->input->post('g')),
							'TGLLAHIR'=>cetak($this->input->post('h')),
							'LAHIR'=>cetak($this->input->post('i')),
							'KOTAMA'=>$this->db->escape_str($this->input->post('j')),
							'SATMINKAL'=>cetak($this->input->post('k')),
							'SATMINKAL1'=>cetak($this->input->post('l')),
							'JABATAN'=>cetak($this->input->post('m'))

							);
		
			$where = array('row_id'=>$this->input->post('id'));
			$q = $this->model_app->update('tbl_tnial',$data,$where);
			if ($q) {
				redirect('administrator/perstnial/berhasil','refresh');
			}else{
				redirect('administrator/perstnial/gagal','refresh');
			}
		}else{
			$data = array(
							'title' => 'Ubah Data Personel TNI AL ',
							'row'   => $this->model_app->edit('tbl_tnial', array('row_id'=>$id))->row_array()
						);
			$this->template->load('administrator/template','administrator/mod_perstnial/ubah_perstnial',$data); 
		}

	}

	function hapus_perstnial()
	{
		cek_session_admin();
		$id = array('row_id'=>$this->uri->segment(3));
		$q = $this->model_app->delete('tbl_tnial',$id);
		if ($q) {
				redirect('administrator/perstnial/berhasil','refresh');
		}else{
				redirect('administrator/perstnial/gagal','refresh');
		}
	}
		//end personel TNI AL

		// controller TNI AD 
		function perstniad()
	{
		cek_session_admin();
		$this->template->load('administrator/template','administrator/mod_perstniad/perstniad');
	}

	function tambah_perstniad()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			
			$data = array(
							'NRP'=> cetak($this->input->post('a')),
							'NAMA'=> cetak($this->input->post('b')),
							'PKT' => $this->db->escape_str($this->input->post('c')),
							'TPKT'=> $this->db->escape_str($this->input->post('d')),
							'CORP'=> $this->db->escape_str($this->input->post('e')),
							'KTMSMK'=> $this->db->escape_str($this->input->post('f')),
							'JAB'=>$this->db->escape_str($this->input->post('g')),
							'KDJAB'=>cetak($this->input->post('h')),
							'TJAB'=>cetak($this->input->post('i')),
							'LAHIR'=>cetak($this->input->post('j')),
							'KLAHIR'=>cetak($this->input->post('k')),
							'TKTDIKMA'=>$this->db->escape_str($this->input->post('l')),
							'TLMA'=>$this->db->escape_str($this->input->post('m')),
							'TKTTUK'=>$this->db->escape_str($this->input->post('n')),
							'TLTUK'=>$this->db->escape_str($this->input->post('o')),
							'TKTDUM'=>$this->db->escape_str($this->input->post('p')),
							'TLDUM'=>$this->db->escape_str($this->input->post('q')),
							'AGM'=>$this->db->escape_str($this->input->post('r')),
							'KTGR'=>$this->db->escape_str($this->input->post('s')),
							'TMTK'=>cetak($this->input->post('t')),
							'TMT_GOL'=>cetak($this->input->post('u')),
							'TABRI'=>cetak($this->input->post('v')),
							'KD_JABAR'=>$this->db->escape_str($this->input->post('w'))
							);
	
			$q = $this->model_app->insert('tbl_tniad',$data);
			if ($q) {
				redirect('administrator/perstniad/berhasil','refresh');
			}else{
				redirect('administrator/perstniad/gagal','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data Personel TNI AD ';
			$this->template->load('administrator/template','administrator/mod_perstniad/tambah_perstniad',$data); 
		}

	
	}

	function ubah_perstniad()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			
			$data = array(
							'NRP'=> cetak($this->input->post('a')),
							'NAMA'=> cetak($this->input->post('b')),
							'PKT' => $this->db->escape_str($this->input->post('c')),
							'TPKT'=> $this->db->escape_str($this->input->post('d')),
							'CORP'=> $this->db->escape_str($this->input->post('e')),
							'KTM'=> $this->db->escape_str($this->input->post('f')),
							'KDSMK'=>$this->db->escape_str($this->input->post('x')),
							'JAB'=>$this->db->escape_str($this->input->post('g')),
							'KDJAB'=>cetak($this->input->post('h')),
							'TJAB'=>cetak($this->input->post('i')),
							'LAHIR'=>cetak($this->input->post('j')),
							'KLAHIR'=>cetak($this->input->post('k')),
							'TKTDIKMA'=>$this->db->escape_str($this->input->post('l')),
							'TLMA'=>$this->db->escape_str($this->input->post('m')),
							'TKTTUK'=>$this->db->escape_str($this->input->post('n')),
							'TLTUK'=>$this->db->escape_str($this->input->post('o')),
							'TKTDUM'=>$this->db->escape_str($this->input->post('p')),
							'TLDUM'=>$this->db->escape_str($this->input->post('q')),
							'AGM'=>$this->db->escape_str($this->input->post('r')),
							'KTGR'=>$this->db->escape_str($this->input->post('s')),
							'TMTK'=>cetak($this->input->post('t')),
							'TMT_GOL'=>cetak($this->input->post('u')),
							'TABRI'=>cetak($this->input->post('v')),
							'KD_JABAR'=>$this->db->escape_str($this->input->post('w'))

							);
		
			$where = array('row_id'=>$this->input->post('id'));
			$q = $this->model_app->update('tbl_tniad',$data,$where);
			if ($q) {
				redirect('administrator/perstniad/berhasil','refresh');
			}else{
				redirect('administrator/perstniad/gagal','refresh');
			}
		}else{
			$data = array(
							'title' => 'Ubah Data Personel TNI AD ',
							'row'   => $this->model_app->edit('tbl_tniad', array('row_id'=>$id))->row_array()
						);
			$this->template->load('administrator/template','administrator/mod_perstniad/ubah_perstniad',$data); 
		}

	}

	function hapus_perstniad()
	{
		cek_session_admin();
		$id = array('row_id'=>$this->uri->segment(3));
		$q = $this->model_app->delete('tbl_tniad',$id);
		if ($q) {
				redirect('administrator/perstniad/berhasil','refresh');
		}else{
				redirect('administrator/perstniad/gagal','refresh');
		}
	}
	//end personel TNI AD

	// controller mabes TNI
	function mabestni()
	{
		cek_session_admin();
		$data['record'] = $this->model_app->view_ordering('tbl_mabestni','row_id','ASC');
		$this->template->load('administrator/template','administrator/mod_mabestni/mabestni',$data);
	}

	function tambah_mabestni()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			
			$data = array(
							'NAMA'=> cetak($this->input->post('a')),
							'NRP'=> cetak($this->input->post('b')),
							'PKT' => $this->db->escape_str($this->input->post('c')),
							'KD_PKT'=> $this->db->escape_str($this->input->post('d')),
							'KORPS'=> $this->db->escape_str($this->input->post('e')),
							'JABATAN'=> $this->db->escape_str($this->input->post('f')),
							'KOTAMA'=>$this->db->escape_str($this->input->post('g')),
							'SATMINKAL'=>cetak($this->input->post('h')),
							'MATRA'=>cetak($this->input->post('i')),
							// 'TGLLAHIR'=>cetak($this->input->post('j')),
							'LAHIR'=>cetak($this->input->post('k'))
							);
	
			$q = $this->model_app->insert('tbl_mabestni',$data);
			if ($q) {
				redirect('administrator/mabestni/berhasil','refresh');
			}else{
				redirect('administrator/mabestni/gagal','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data Personel Mabes TNI ';
			$this->template->load('administrator/template','administrator/mod_mabestni/tambah_mabestni',$data); 
		}

	
	}

	function ubah_mabestni()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			
			$data = array(
							'NAMA'=> cetak($this->input->post('a')),
							'NRP'=> cetak($this->input->post('b')),
							'PKT' => $this->db->escape_str($this->input->post('c')),
							'KD_PKT'=> $this->db->escape_str($this->input->post('d')),
							'KORPS'=> $this->db->escape_str($this->input->post('e')),
							'JABATAN'=> $this->db->escape_str($this->input->post('f')),
							'KOTAMA'=>$this->db->escape_str($this->input->post('g')),
							'SATMINKAL'=>cetak($this->input->post('h')),
							'MATRA'=>cetak($this->input->post('i')),
							// 'TGLAHIR'=>cetak($this->input->post('j')),
							'LAHIR'=>cetak($this->input->post('k'))

							);
		
			$where = array('row_id'=>$this->input->post('id'));
			$q = $this->model_app->update('tbl_mabestni',$data,$where);
			if ($q) {
				redirect('administrator/mabestni/berhasil','refresh');
			}else{
				redirect('administrator/mabestni/gagal','refresh');
			}
		}else{
			$data = array(
							'title' => 'Ubah Data Personel Mabes TNI',
							'row'   => $this->model_app->edit('tbl_mabestni', array('row_id'=>$id))->row_array()
						);
			$this->template->load('administrator/template','administrator/mod_mabestni/ubah_mabestni',$data); 
		}

	}

	function hapus_mabestni()
	{
		cek_session_admin();
		$id = array('row_id'=>$this->uri->segment(3));
		$q = $this->model_app->delete('tbl_mabestni',$id);
		if ($q) {
				redirect('administrator/mabestni/berhasil','refresh');
		}else{
				redirect('administrator/mabestni/gagal','refresh');
		}
	}
	//end Personel Mabes TNI

	//controller pegawai
	function pegawai()
	{
		cek_session_admin();
		$data['record'] = $this->model_app->view_ordering('tbl_pegawai','row_id','ASC');
		$this->template->load('administrator/template','administrator/mod_pegawai/pegawai',$data);
	}

	function tambah_pegawai()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			
			$data = array(
							'nip'=> cetak($this->input->post('a')),
							'nopeg'=> cetak($this->input->post('b')),
							'sk_nip' => $this->db->escape_str($this->input->post('c')),
							'ketnrp'=> $this->db->escape_str($this->input->post('d')),
							'kdkate'=> $this->db->escape_str($this->input->post('e')),
							'nama'=> $this->db->escape_str($this->input->post('f')),
							'gelar'=>$this->db->escape_str($this->input->post('g')),
							'jk'=>cetak($this->input->post('h')),
							'tmlahir'=>cetak($this->input->post('i')),
							'lahir'=>cetak($this->input->post('j')),
							'kdpkt'=>cetak($this->input->post('k')),
							'tmtpkt'=>cetak($this->input->post('l')),
							'cps'=>$this->db->escape_str($this->input->post('m')),
							'kdang'=>$this->db->escape_str($this->input->post('n')),
							'tmttni'=>cetak($this->input->post('o')),
							'tmtpkaw'=>cetak($this->input->post('p')),
							'sumberpa'=>$this->db->escape_str($this->input->post('r')),
							'tmtpagol3'=>cetak($this->input->post('s')),
							'idjab'=>$this->db->escape_str($this->input->post('t')),
							'jabatan'=>cetak($this->input->post('u')),
							'jabatan1'=>cetak($this->input->post('v')),
							'skep_jab'=>cetak($this->input->post('w')),
							'tglskjab'=>cetak($this->input->post('x')),
							'tmtjab'=>cetak($this->input->post('y')),
							'tbjab'=>cetak($this->input->post('z')),
							'kdjab'=>$this->db->escape_str($this->input->post('kdjab')),
							'esl'=>$this->db->escape_str($this->input->post('esl')),
							'ranking'=>$this->db->escape_str($this->input->post('ranking')),
							'grade'=>$this->db->escape_str($this->input->post('grade')),
							'tmtdephan'=>cetak($this->input->post('tmtdephan')),
							'kdsat'=>$this->db->escape_str($this->input->post('kdsat')),
							'kdsatker'=>$this->db->escape_str($this->input->post('kdsatker')),
							'agama'=>$this->db->escape_str($this->input->post('agama')),
							'status'=>$this->db->escape_str($this->input->post('status')),
							'kdsuku'=>$this->db->escape_str($this->input->post('kdduku')),
							'alrum_jkt1'=>cetak($this->input->post('alrum_jkt1')),
							'alrum_jkt2'=>cetak($this->input->post('alrum_jkt2')),
							'kdpos'=>$this->db->escape_str($this->input->post('kdpos')),
							'alrum_drh1'=>cetak($this->input->post('alrum_drh1')),
							'alrum_drh2'=>cetak($this->input->post('alrum_drh2')),
							'telpr'=>cetak($this->input->post('telpr')),
							'telpk'=>cetak($this->input->post('telpk')),
							'hp'=>cetak($this->input->post('hp')),
							'randis'=>cetak($this->input->post('randis')),
							'kta'=>cetak($this->input->post('kta')),
							'nolabel'=>cetak($this->input->post('nolabel')),
							'karpeg'=>cetak($this->input->post('karpeg')),
							'karasabri'=>cetak($this->input->post('karasabri')),
							'karis'=>cetak($this->input->post('karis')),
							'bpjs'=>cetak($this->input->post('bpjs')),
							'noreg'=>cetak($this->input->post('noreg')),
							'kpi'=>cetak($this->input->post('kpi')),
							'email'=>cetak($this->input->post('email')),
							'skpens'=>cetak($this->input->post('skpens')),
							'tmpensiun'=>cetak($this->input->post('tmpensiun')),
							'skep_pindah'=>cetak($this->input->post('skep_pindah')),
							'ket_pindah'=>cetak($this->input->post('ket_pindah')),
							'ket_bp'=>cetak($this->input->post('ket_bp')),
							'kbp'=>cetak($this->input->post('kbp')),
							'kpr'=>cetak($this->input->post('kpr')),
							'kpr_ok'=>cetak($this->input->post('kpr_ok')),
							'kpr_thn'=>cetak($this->input->post('kpr_thn')),
							'mkg_th'=>$this->db->escape_str($this->input->post('mkg_th')),
							'mkg_bl'=>$this->db->escape_str($this->input->post('mkg_bl')),
							'dikumti'=>$this->db->escape_str($this->input->post('dikumti')),
							'dikbangti'=>$this->db->escape_str($this->input->post('dikbangti')),
							'npwp'=>cetak($this->input->post('npwp')),
							'ktp'=>cetak($this->input->post('ktp')),
							'tgl_updt'=>cetak($this->input->post('tgl_updt')),
							'tgl_msk'=>cetak($this->input->post('tgl_msk')),
							'penempatan'=>cetak($this->input->post('penempatan')),
							'th_lusdik'=>cetak($this->input->post('th_lusdik')),
							'dik_tuk'=>cetak($this->input->post('dik_tuk')),
							'kdpsi'=>cetak($this->input->post('kdpsi')),
							'kdass'=>cetak($this->input->post('kdass')),
							'tunkin'=>cetak($this->input->post('tunkin')),
							'kdpurse'=>1
							);
	
			$q = $this->model_app->insert('tbl_pegawai',$data);
			if ($q) {
				redirect('administrator/pegawai/berhasil','refresh');
			}else{
				redirect('administrator/pegawai/gagal','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data Pegawai ';
			$this->template->load('administrator/template','administrator/mod_pegawai/tambah_pegawai',$data); 
		}

	
	}

	function ubah_pegawai()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			
			$data = array(
							'nip'=> cetak($this->input->post('a')),
							'nopeg'=> cetak($this->input->post('b')),
							'sk_nip' => $this->db->escape_str($this->input->post('c')),
							'ketnrp'=> $this->db->escape_str($this->input->post('d')),
							'kdkate'=> $this->db->escape_str($this->input->post('e')),
							'nama'=> $this->db->escape_str($this->input->post('f')),
							'gelar'=>$this->db->escape_str($this->input->post('g')),
							'jk'=>cetak($this->input->post('h')),
							'tmlahir'=>cetak($this->input->post('i')),
							'lahir'=>cetak($this->input->post('j')),
							'kdpkt'=>cetak($this->input->post('k')),
							'tmtpkt'=>cetak($this->input->post('l')),
							'cps'=>$this->db->escape_str($this->input->post('m')),
							'kdang'=>$this->db->escape_str($this->input->post('n')),
							'tmttni'=>cetak($this->input->post('o')),
							'tmtpkaw'=>cetak($this->input->post('p')),
							'sumberpa'=>$this->db->escape_str($this->input->post('r')),
							'tmtpagol3'=>cetak($this->input->post('s')),
							'idjab'=>$this->db->escape_str($this->input->post('t')),
							'jabatan'=>cetak($this->input->post('u')),
							'jabatan1'=>cetak($this->input->post('v')),
							'skep_jab'=>cetak($this->input->post('w')),
							'tglskjab'=>cetak($this->input->post('x')),
							'tmtjab'=>cetak($this->input->post('y')),
							'tbjab'=>cetak($this->input->post('z')),
							'kdjab'=>$this->db->escape_str($this->input->post('kdjab')),
							'esl'=>$this->db->escape_str($this->input->post('esl')),
							'ranking'=>$this->db->escape_str($this->input->post('ranking')),
							'grade'=>$this->db->escape_str($this->input->post('grade')),
							'tmtdephan'=>cetak($this->input->post('tmtdephan')),
							'kdsat'=>$this->db->escape_str($this->input->post('kdsat')),
							'kdsatker'=>$this->db->escape_str($this->input->post('kdsatker')),
							'agama'=>$this->db->escape_str($this->input->post('agama')),
							'status'=>$this->db->escape_str($this->input->post('status')),
							'kdsuku'=>$this->db->escape_str($this->input->post('kdduku')),
							'alrum_jkt1'=>cetak($this->input->post('alrum_jkt1')),
							'alrum_jkt2'=>cetak($this->input->post('alrum_jkt2')),
							'kdpos'=>$this->db->escape_str($this->input->post('kdpos')),
							'alrum_drh1'=>cetak($this->input->post('alrum_drh1')),
							'alrum_drh2'=>cetak($this->input->post('alrum_drh2')),
							'telpr'=>cetak($this->input->post('telpr')),
							'telpk'=>cetak($this->input->post('telpk')),
							'hp'=>cetak($this->input->post('hp')),
							'randis'=>cetak($this->input->post('randis')),
							'kta'=>cetak($this->input->post('kta')),
							'nolabel'=>cetak($this->input->post('nolabel')),
							'karpeg'=>cetak($this->input->post('karpeg')),
							'karasabri'=>cetak($this->input->post('karasabri')),
							'karis'=>cetak($this->input->post('karis')),
							'bpjs'=>cetak($this->input->post('bpjs')),
							'noreg'=>cetak($this->input->post('noreg')),
							'kpi'=>cetak($this->input->post('kpi')),
							'email'=>cetak($this->input->post('email')),
							'skpens'=>cetak($this->input->post('skpens')),
							'tmpensiun'=>cetak($this->input->post('tmpensiun')),
							'skep_pindah'=>cetak($this->input->post('skep_pindah')),
							'ket_pindah'=>cetak($this->input->post('ket_pindah')),
							'ket_bp'=>cetak($this->input->post('ket_bp')),
							'kbp'=>cetak($this->input->post('kbp')),
							'kpr'=>cetak($this->input->post('kpr')),
							'kpr_ok'=>cetak($this->input->post('kpr_ok')),
							'kpr_thn'=>cetak($this->input->post('kpr_thn')),
							'mkg_th'=>$this->db->escape_str($this->input->post('mkg_th')),
							'mkg_bl'=>$this->db->escape_str($this->input->post('mkg_bl')),
							'dikumti'=>$this->db->escape_str($this->input->post('dikumti')),
							'dikbangti'=>$this->db->escape_str($this->input->post('dikbangti')),
							'npwp'=>cetak($this->input->post('npwp')),
							'ktp'=>cetak($this->input->post('ktp')),
							'tgl_updt'=>cetak($this->input->post('tgl_updt')),
							'tgl_msk'=>cetak($this->input->post('tgl_msk')),
							'penempatan'=>cetak($this->input->post('penempatan')),
							'th_lusdik'=>cetak($this->input->post('th_lusdik')),
							'dik_tuk'=>cetak($this->input->post('dik_tuk')),
							'kdpsi'=>cetak($this->input->post('kdpsi')),
							'kdass'=>cetak($this->input->post('kdass')),
							'tunkin'=>cetak($this->input->post('tunkin')),
							'kdpurse'=>1

							);
		
			$where = array('row_id'=>$this->input->post('id'));
			$q = $this->model_app->update('tbl_pegawai',$data,$where);
			if ($q) {
				redirect('administrator/pegawai/berhasil','refresh');
			}else{
				redirect('administrator/pegawai/gagal','refresh');
			}
		}else{
			$data = array(
							'title' => 'Ubah Data Pegawai',
							'row'   => $this->model_app->edit('tbl_pegawai', array('row_id'=>$id))->row_array()
						);
			$this->template->load('administrator/template','administrator/mod_pegawai/ubah_pegawai',$data); 
		}

	}

	function hapus_pegawai()
	{
		cek_session_admin();
		$id = array('row_id'=>$this->uri->segment(3));
		$q = $this->model_app->delete('tbl_pegawai',$id);
		if ($q) {
				redirect('administrator/pegawai/berhasil','refresh');
		}else{
				redirect('administrator/pegawai/gagal','refresh');
		}
	}
	//end pegawai

	//controller alutmatra total
	function alutmatratotal()
	{
		cek_session_admin();
		$data['record'] = $this->model_app->view_ordering('tbl_alutmatra_total','id','ASC');
		$this->template->load('administrator/template','administrator/mod_alutmatratotal/alutmatratotal',$data);
	}

	function tambah_alutmatratotal()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			
			$data = array(
							'urutan'=> cetak($this->input->post('a')),
							'matra'=> cetak($this->input->post('b')),
							'kdsatker' => $this->db->escape_str($this->input->post('c')),
							'kdsubsatker'=> $this->db->escape_str($this->input->post('d')),
							'satker'=> cetak($this->input->post('e')),
							'lokasi'=> cetak($this->input->post('f')),
							'subsatker'=>cetak($this->input->post('g')),
							'uraiansatker'=>cetak($this->input->post('h')),
							'kategori'=>cetak($this->input->post('i')),
							'subkategori'=>cetak($this->input->post('j')),
							'sub2kategori'=>cetak($this->input->post('k')),
							'sub3kategori'=>cetak($this->input->post('l')),
							'jenis'=>cetak($this->input->post('m')),
							'satuan'=>cetak($this->input->post('n')),
							'negara'=>cetak($this->input->post('o')),
							'tahun'=>cetak($this->input->post('p')),
							'jumlah'=>cetak($this->input->post('q')),
							'kondisi_s'=>cetak($this->input->post('r')),
							'kondisi_uss'=>cetak($this->input->post('s'))
							);
	
			$q = $this->model_app->insert('tbl_alutmatra_total',$data);
			if ($q) {
				redirect('administrator/alutmatratotal/berhasil','refresh');
			}else{
				redirect('administrator/alutmatratotal/gagal','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data Alut Matra Total ';
			$this->template->load('administrator/template','administrator/mod_alutmatratotal/tambah_alutmatratotal',$data); 
		}

	
	}

	function ubah_alutmatratotal()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			
			$data = array(
							'urutan'=> cetak($this->input->post('a')),
							'matra'=> cetak($this->input->post('b')),
							'kdsatker' => $this->db->escape_str($this->input->post('c')),
							'kdsubsatker'=> $this->db->escape_str($this->input->post('d')),
							'satker'=> cetak($this->input->post('e')),
							'lokasi'=> cetak($this->input->post('f')),
							'subsatker'=>cetak($this->input->post('g')),
							'uraiansatker'=>cetak($this->input->post('h')),
							'kategori'=>cetak($this->input->post('i')),
							'subkategori'=>cetak($this->input->post('j')),
							'sub2kategori'=>cetak($this->input->post('k')),
							'sub3kategori'=>cetak($this->input->post('l')),
							'jenis'=>cetak($this->input->post('m')),
							'satuan'=>cetak($this->input->post('n')),
							'negara'=>cetak($this->input->post('o')),
							'jumlah'=>cetak($this->input->post('p')),
							'kondisi_s'=>cetak($this->input->post('q')),
							'kondisi_uss'=>cetak($this->input->post('r'))

							);
		
			$where = array('id'=>$this->input->post('id'));
			$q = $this->model_app->update('tbl_alutmatra_total',$data,$where);
			if ($q) {
				redirect('administrator/alutmatratotal/berhasil','refresh');
			}else{
				redirect('administrator/alutmatratotal/gagal','refresh');
			}
		}else{
			$data = array(
							'title' => 'Ubah Data Alut Matra Total',
							'row'   => $this->model_app->edit('tbl_alutmatra_total', array('id'=>$id))->row_array()
						);
			$this->template->load('administrator/template','administrator/mod_alutmatratotal/ubah_alutmatratotal',$data); 
		}

	}

	function hapus_alutmatratotal()
	{
		cek_session_admin();
		$id = array('id'=>$this->uri->segment(3));
		$q = $this->model_app->delete('tbl_alutmatra_total',$id);
		if ($q) {
				redirect('administrator/alutmatratotal/berhasil','refresh');
		}else{
				redirect('administrator/alutmatratotal/gagal','refresh');
		}
	}
	//end alut matra total

	//controller rekap personel
	function rekappers()
	{
		cek_session_admin();
		$data['record'] = $this->model_app->view_ordering('tbl_rekappers','id','ASC');
		$this->template->load('administrator/template','administrator/mod_rekappers/rekappers',$data);
	}

	function tambah_rekappers()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			
			$data = array(
							'uo'=> cetak($this->input->post('a')),
							'satker'=> cetak($this->input->post('b')),
							'subsatker' => $this->db->escape_str($this->input->post('c')),
							'kode_gol'=> $this->db->escape_str($this->input->post('d')),
							'singkatan'=> cetak($this->input->post('e')),
							'nama_gol'=> cetak($this->input->post('f')),
							'nama_matra'=>cetak($this->input->post('g')),
							'jumlah'=>cetak($this->input->post('h')),
							'status'=>1
							);
	
			$q = $this->model_app->insert('tbl_rekappers',$data);
			if ($q) {
				redirect('administrator/rekappers/berhasil','refresh');
			}else{
				redirect('administrator/rekappers/gagal','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data Rekap Personel ';
			$this->template->load('administrator/template','administrator/mod_rekappers/tambah_rekappers',$data); 
		}

	
	}

	function ubah_rekappers()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			
			$data = array(
							'uo'=> cetak($this->input->post('a')),
							'satker'=> cetak($this->input->post('b')),
							'subsatker' => $this->db->escape_str($this->input->post('c')),
							'kode_gol'=> $this->db->escape_str($this->input->post('d')),
							'singkatan'=> cetak($this->input->post('e')),
							'nama_gol'=> cetak($this->input->post('f')),
							'nama_matra'=>cetak($this->input->post('g')),
							'jumlah'=>cetak($this->input->post('h')),
							'status'=>2

							);
		
			$where = array('id'=>$this->input->post('id'));
			$q = $this->model_app->update('tbl_rekappers',$data,$where);
			if ($q) {
				redirect('administrator/rekappers/berhasil','refresh');
			}else{
				redirect('administrator/rekappers/gagal','refresh');
			}
		}else{
			$data = array(
							'title' => 'Ubah Data Rekap Personel',
							'row'   => $this->model_app->edit('tbl_rekappers', array('id'=>$id))->row_array()
						);
			$this->template->load('administrator/template','administrator/mod_rekappers/ubah_rekappers',$data); 
		}

	}

	function hapus_rekappers()
	{
		cek_session_admin();
		$id = array('id'=>$this->uri->segment(3));
		$q = $this->model_app->delete('tbl_rekappers',$id);
		if ($q) {
				redirect('administrator/rekappers/berhasil','refresh');
		}else{
				redirect('administrator/rekappers/gagal','refresh');
		}
	}
	//end Rekap Personel

	//controller tabel korp
		function korp()
	{
		cek_session_admin();
		$data['record'] = $this->model_app->view_ordering('t_korp','KDKORP','ASC');
		$this->template->load('administrator/template','administrator/mod_korp/korp',$data);
	}

	function tambah_korp()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			
			$data = array(
							'KDKORP'=>cetak($this->input->post('d')),
							'NMKORP'=> cetak($this->input->post('a')),
							'NMKORP2'=> cetak($this->input->post('b')),
							'_NullFlags' => cetak($this->input->post('c'))
							);
	
			$q = $this->model_app->insert('t_korp',$data);
			if ($q) {
				redirect('administrator/korp/berhasil','refresh');
			}else{
				redirect('administrator/korp/gagal','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data Korp ';
			$this->template->load('administrator/template','administrator/mod_korp/tambah_korp',$data); 
		}

	
	}

	function ubah_korp()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			
			$data = array(
							'KDKORP'=>cetak($this->input->post('d')),
							'NMKORP'=> cetak($this->input->post('a')),
							'NMKORP2'=> cetak($this->input->post('b')),
							'_NullFlags'=>cetak($this->input->post('c'))
							);
		
			$where = array('KDKORP'=>$this->input->post('id'));
			$q = $this->model_app->update('t_korp',$data,$where);
			if ($q) {
				redirect('administrator/korp/berhasil','refresh');
			}else{
				redirect('administrator/korp/gagal','refresh');
			}
		}else{
			$data = array(
							'title' => 'Ubah Data Korp',
							'row'   => $this->model_app->edit('t_korp', array('KDKORP'=>$id))->row_array()
						);
			$this->template->load('administrator/template','administrator/mod_korp/ubah_korp',$data); 
		}

	}

	function hapus_korp()
	{
		cek_session_admin();
		$id = array('KDKORP'=>$this->uri->segment(3));
		$q = $this->model_app->delete('t_korp',$id);
		if ($q) {
				redirect('administrator/korp/berhasil','refresh');
		}else{
				redirect('administrator/korp/gagal','refresh');
		}
	}
	//end korp

	//controller personel korp
	function perskorp()
	{
		cek_session_admin();
		$data['record'] = $this->model_app->view_ordering('tbl_pers_korp','KDKORP','ASC');
		$this->template->load('administrator/template','administrator/mod_perskorp/perskorp',$data);
	}

	function tambah_perskorp()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			
			$data = array(
							'KDKORP'=>cetak($this->input->post('e')),
							'KDKORP2'=> cetak($this->input->post('a')),
							'NMKORP'=> cetak($this->input->post('b')),
							'NMKORP2' => $this->db->escape_str($this->input->post('c')),
							'_NullFlags'=> $this->db->escape_str($this->input->post('d'))
							
							);
	
			$q = $this->model_app->insert('tbl_pers_korp',$data);
			if ($q) {
				redirect('administrator/perskorp/berhasil','refresh');
			}else{
				redirect('administrator/perskorp/gagal','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data Personel Korp ';
			$this->template->load('administrator/template','administrator/mod_perskorp/tambah_perskorp',$data); 
		}

	
	}

	function ubah_perskorp()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			
			$data = array(
							'KDKORP2'=> cetak($this->input->post('a')),
							'NMKORP'=> cetak($this->input->post('b')),
							'NMKORP2' => $this->db->escape_str($this->input->post('c')),
							'_NullFlags'=> $this->db->escape_str($this->input->post('d'))

							);
		
			$where = array('KDKORP'=>$this->input->post('id'));
			$q = $this->model_app->update('tbl_pers_korp',$data,$where);
			if ($q) {
				redirect('administrator/perskorp/berhasil','refresh');
			}else{
				redirect('administrator/perskorp/gagal','refresh');
			}
		}else{
			$data = array(
							'title' => 'Ubah Data Personel Korp',
							'row'   => $this->model_app->edit('tbl_pers_korp', array('KDKORP'=>$id))->row_array()
						);
			$this->template->load('administrator/template','administrator/mod_perskorp/ubah_perskorp',$data); 
		}

	}

	function hapus_perskorp()
	{
		cek_session_admin();
		$id = array('KDKORP'=>$this->uri->segment(3));
		$q = $this->model_app->delete('tbl_pers_korp',$id);
		if ($q) {
				redirect('administrator/perskorp/berhasil','refresh');
		}else{
				redirect('administrator/perskorp/gagal','refresh');
		}
	}
	//end personel korp

	// controller personel korp per golongan

	function perskorpgol()
	{
		cek_session_admin();
		$data['record'] = $this->model_app->view_ordering('tbl_pers_r_uo_korp_gol','autono','ASC');
		$this->template->load('administrator/template','administrator/mod_perskorpgol/perskorpgol',$data);
	}

	function tambah_perskorpgol()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			
			$data = array(
							'kode_uo'=> cetak($this->input->post('a')),
							'nama_uo'=> cetak($this->input->post('b')),
							'kode_korp' => $this->db->escape_str($this->input->post('c')),
							'nama_korp'=> $this->db->escape_str($this->input->post('d')),
							'jml'=> $this->db->escape_str($this->input->post('e')),
							'gaji'=> cetak($this->input->post('f')),
							'blnadk'=> $this->db->escape_str($this->input->post('g')),
							'thn'=> $this->db->escape_str($this->input->post('h')),
							'uuo'=> $this->db->escape_str($this->input->post('i')),
							'usatker'=> $this->db->escape_str($this->input->post('j')),
							'usubsatker'=> $this->db->escape_str($this->input->post('k')),
							'udetilsatker'=> $this->db->escape_str($this->input->post('l')),
							'singkatan'=> $this->db->escape_str($this->input->post('m'))
							
							);
	
			$q = $this->model_app->insert('tbl_pers_r_uo_korp_gol',$data);
			if ($q) {
				redirect('administrator/perskorpgol/berhasil','refresh');
			}else{
				redirect('administrator/perskorpgol/gagal','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data Personel Korp Per Golongan';
			$this->template->load('administrator/template','administrator/mod_perkorpgol/tambah_perskorpgol',$data); 
		}

	
	}

	function ubah_perskorpgol()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			
			$data = array(
							'kode_uo'=> cetak($this->input->post('a')),
							'nama_uo'=> cetak($this->input->post('b')),
							'kode_korp' => $this->db->escape_str($this->input->post('c')),
							'nama_korp'=> $this->db->escape_str($this->input->post('d')),
							'jml'=> $this->db->escape_str($this->input->post('e')),
							'gaji'=> cetak($this->input->post('f')),
							'blnadk'=> $this->db->escape_str($this->input->post('g')),
							'thn'=> $this->db->escape_str($this->input->post('h')),
							'uuo'=> $this->db->escape_str($this->input->post('i')),
							'usatker'=> $this->db->escape_str($this->input->post('j')),
							'usubsatker'=> $this->db->escape_str($this->input->post('k')),
							'udetilsatker'=> $this->db->escape_str($this->input->post('l')),
							'singkatan'=> $this->db->escape_str($this->input->post('m'))


							);
		
			$where = array('autono'=>$this->input->post('id'));
			$q = $this->model_app->update('tbl_r_uo_pers_korp_gol',$data,$where);
			if ($q) {
				redirect('administrator/perskorpgol/berhasil','refresh');
			}else{
				redirect('administrator/perskorpgol/gagal','refresh');
			}
		}else{
			$data = array(
							'title' => 'Ubah Data Personel Korp Golongan',
							'row'   => $this->model_app->edit('tbl_r_uo_pers_korp_gol', array('autono'=>$id))->row_array()
						);
			$this->template->load('administrator/template','administrator/mod_perskorp/ubah_perskorp',$data); 
		}

	}

	function hapus_perskorpgol()
	{
		cek_session_admin();
		$id = array('autono'=>$this->uri->segment(3));
		$q = $this->model_app->delete('tbl_persr_r_uo_korp_gol',$id);
		if ($q) {
				redirect('administrator/perskorpgol/berhasil','refresh');
		}else{
				redirect('administrator/perskorpgol/gagal','refresh');
		}
	}
	//end personel korp per golongan

	//controller sub category


	function subcategory()
	{
		cek_session_admin();
		$data['record'] = $this->model_app->view_ordering('tbl_subcategory','id','ASC');
		$this->template->load('administrator/template','administrator/mod_subcategory/subcategory',$data);
	}

	function tambah_subcategory()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			
			$data = array(
							'category'=> cetak($this->input->post('a')),
							'subcategory'=> cetak($this->input->post('b')),
							'subcategory_ind' => cetak($this->input->post('c'))
							);
	
			$q = $this->model_app->insert('tbl_subcategory',$data);
			if ($q) {
				redirect('administrator/subcategory/berhasil','refresh');
			}else{
				redirect('administrator/subcategory/gagal','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data Sub Kategori';
			$this->template->load('administrator/template','administrator/mod_subcategory/tambah_subcategory',$data); 
		}

	
	}

	function ubah_subcategory()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			
			$data = array(
							'category'=> cetak($this->input->post('a')),
							'subcategory'=> cetak($this->input->post('b')),
							'subcategory_ind'=>cetak($this->input->post('c'))
							);
		
			$where = array('id'=>$this->input->post('id'));
			$q = $this->model_app->update('tbl_subcategory',$data,$where);
			if ($q) {
				redirect('administrator/subcategory/berhasil','refresh');
			}else{
				redirect('administrator/subcategory/gagal','refresh');
			}
		}else{
			$data = array(
							'title' => 'Ubah Data Sub Kategori',
							'row'   => $this->model_app->edit('tbl_subcategory', array('id'=>$id))->row_array()
						);
			$this->template->load('administrator/template','administrator/mod_subcategory/ubah_subcategory',$data); 
		}

	}

	function hapus_subcategory()
	{
		cek_session_admin();
		$id = array('id'=>$this->uri->segment(3));
		$q = $this->model_app->delete('tbl_subcategory',$id);
		if ($q) {
				redirect('administrator/subcategory/berhasil','refresh');
		}else{
				redirect('administrator/subcategory/gagal','refresh');
		}
	}
	//end subcategory

	// news category

	function newscategory()
	{
		cek_session_admin();
		$data['record'] = $this->model_app->view_ordering('tbl_newscategory','id_newscat', 'DESC');
		$this->template->load('administrator/template','administrator/mod_newscategory/newscategory',$data);
	}

	function tambah_newscategory()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$data = array(
							'nm_news'=> $this->db->escape_str($this->input->post('a')),
							'tb_news'=> cetak($this->input->post('b')),
							'aktif'=> $this->db->escape_str($this->input->post('c')),
							'created_on'=>date('Y-m-d'),
							'created_by'=> $this->session->userdata('username')
			             );
			$q = $this->model_app->insert('tbl_newscategory',$data);
			if ($q) {
				redirect('administrator/newscategory/berhasil','refresh');
			}else{
				redirect('administrator/newscategory/gagal','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data News Category';
			$this->template->load('administrator/template','administrator/mod_newscategory/tambah_newscategory',$data);
		}
	}

	function ubah_newscategory()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$data = array(
							'nm_news'=> $this->db->escape_str($this->input->post('a')),
							'tb_news'=> cetak($this->input->post('b')),
							'aktif'=> $this->db->escape_str($this->input->post('c')),
							'created_on'=>date('Y-m-d'),
							'created_by'=> $this->session->userdata('username')
			             );
			$where = array('id_newscat'=> $this->input->post('id'));
			$q = $this->model_app->update('tbl_newscategory',$data,$where);
			if ($q) {
				redirect('administrator/newscategory/berhasil','refresh');
			}else{
				redirect('administrator/newscategory/gagal','refresh');
			}
		}else{
			$data = array(
							'title' => 'Ubah Data News Category',
							'row'   => $this->model_app->edit('tbl_newscategory', array('id_newscat'=>$id))->row_array()
						);
			$this->template->load('administrator/template','administrator/mod_newscategory/ubah_newscategory',$data); 
		}
		
	}

	function hapus_newscategory()
	{
		cek_session_admin();
		$id = array('id_newscat'=>$this->uri->segment(3));
		$q = $this->model_app->delete('tbl_newscategory',$id);
		if ($q) {
			redirect('administrator/newscategory/berhasil','refresh');
		}else{
			redirect('administrator/newscategory/gagal','refresh');
		}

	}


	function newsmanager()
	{
		$val = news_manager_get();
        $data['record'] = $this->db->query($val)->result_array();
        $this->template->load('administrator/template','administrator/mod_newsmanager/newsmanager',$data);
	}

	function tambah_newsmanager()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$data = array(
							'kategori'=>$this->db->escape_Str($this->input->post('b')),
							'judul'=>cetak($this->input->post('a')),
							'isi'=>cetak($this->input->post('c')),
							'keterangan'=>$this->db->escape_Str($this->input->post('d')),
							'sumber'=>$this->db->escape_Str($this->input->post('e')),
							'created_on'=>date('Y-m-d'),
							'created_by'=>$this->session->userdata('username'),
							'status'=>1
						);
			$q = $this->model_app->insert($this->input->post('tbl'), $data);
			if ($q) {
				redirect('administrator/newsmanager/berhasil','refresh');
			}else{
				redirect('administrator/newsmanager/gagal','refresh');
			}
		}else{
			$data['title'] = 'Add News';
			$this->template->load('administrator/template', 'administrator/mod_newsmanager/tambah_newsmanager',$data);
		}
	}

	function ubah_newsmanager()
	{
		cek_session_admin();
		$tb = $this->uri->segment(4);
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$data = array(
							'kategori'=>$this->db->escape_Str($this->input->post('b')),
							'judul'=>cetak($this->input->post('a')),
							'isi'=>cetak($this->input->post('c')),
							'keterangan'=>$this->db->escape_Str($this->input->post('d')),
							'sumber'=>$this->db->escape_Str($this->input->post('e')),
							'status'=>2
						);
			$where = array('id'=>$this->input->post('id'));
			$tbs = $this->input->post('tbl');
			$q = $this->model_app->update($tbs, $data, $where);
			if ($q) {
				redirect('administrator/newsmanager/berhasil','refresh');
			}else{
				redirect('administrator/newsmanager/gagal','refresh');
			}
		}else{
			$data = array(
						'title' => 'Edit News',
						'row'=> $this->model_app->edit($tb,array('id'=>$id))->row_array()
					);
			$this->template->load('administrator/template', 'administrator/mod_newsmanager/ubah_newsmanager',$data);
		}
	}

	function hapus_newsmanager()
	{
		cek_session_admin();
		$tb = $this->uri->segment(4);
		$id = array('id'=>$this->uri->segment(3));
		$q = $this->model_app->delete($tb,$id);
		if ($q) {
				redirect('administrator/newsmanager/berhasil','refresh');
		}else{
				redirect('administrator/newsmanager/gagal','refresh');
		}
	}

	function usergroup()
	{
		cek_session_admin();
		$data['record'] = $this->model_app->view_ordering('tbl_usergroup','id','DESC');
		$this->template->load('administrator/template','administrator/mod_usergroup/usergroup',$data);
	}

	function tambah_usergroup()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$data = array( 
							'nm_usergroup' => $this->db->escape_str($this->input->post('a'))
						 );
			$this->model_app->insert('tbl_usergroup',$data);
			redirect('administrator/usergroup','refresh');
		}else{
			$data['title'] = 'Tambah Data usergroup';
			$this->template->load('administrator/template','administrator/mod_usergroup/tambah_usergroup',$data);
		}
	}

	function ubah_usergroup()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$data = array( 
							'nm_usergroup' => $this->db->escape_str($this->input->post('a'))
						 );
			$where = array('id'=>$this->input->post('id'));
			$this->model_app->update('tbl_usergroup',$data,$where);
			redirect('administrator/usergroup','refresh');
		}else{
			$data= array(
							'title' => 'Ubah usergroup',
							'row'   => $this->model_app->edit('tbl_usergroup', array('id'=>$id))->row_array()
						);
			$this->template->load('administrator/template','administrator/mod_usergroup/ubah_usergroup',$data);
		}
	}

	function hapus_usergroup()
	{
		cek_session_admin();
		$id = array('id' => $this->uri->segment(3));
        $this->model_app->delete('tbl_usergroup',$id);
		redirect('administrator/usergroup');
	}
}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */