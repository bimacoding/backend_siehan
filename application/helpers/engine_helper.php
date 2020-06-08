<?php 
    function cek_session_akses($link,$id){
    	$ci = & get_instance();
    	$session = $ci->db->query("SELECT * FROM modul,users_modul WHERE modul.id_modul=users_modul.id_modul AND users_modul.id_session='$id' AND modul.link='$link'")->num_rows();
    	if ($session == '0' AND $ci->session->userdata('level') != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
    }

    function template(){
        $ci = & get_instance();
        $query = $ci->db->query("SELECT folder FROM templates where aktif='Y'");
        $tmp = $query->row_array();
        if ($query->num_rows()>=1){
            return $tmp['folder'];
        }else{
            return 'errors';
        }
    }

    function background(){
        $ci = & get_instance();
        $bg = $ci->db->query("SELECT gambar FROM background ORDER BY id_background DESC LIMIT 1")->row_array();
        return $bg['gambar'];
    }

    function logo(){
        $ci = & get_instance();
        $logo = $ci->db->query("SELECT logo FROM tbl_identitas WHERE id_identitas = 1 ORDER BY id_identitas LIMIT 1")->row_array();
        return base_url().'/assets/images/'.$logo['logo'];
    }

    function ticker()
    {
        $ci = & get_instance();
        $ticker = $ci->db->query("SELECT * FROM tbl_ticker WHERE aktif = 'Ya'")->result_array();
        return $ticker;
    }

    function banner()
    {
        $ci = & get_instance();
        $ticker = $ci->db->query("SELECT * FROM tbl_ticker WHERE aktif = 'Ya'")->result_array();
        return $ticker;
    }

    function title(){
        $ci = & get_instance();
        $title = $ci->db->query("SELECT nama_website FROM identitas ORDER BY id_identitas DESC LIMIT 1")->row_array();
        return $title['nama_website'];
    }

    function description(){
        $ci = & get_instance();
        $title = $ci->db->query("SELECT meta_deskripsi FROM identitas ORDER BY id_identitas DESC LIMIT 1")->row_array();
        return $title['meta_deskripsi'];
    }

    function keywords(){
        $ci = & get_instance();
        $title = $ci->db->query("SELECT meta_keyword FROM identitas ORDER BY id_identitas DESC LIMIT 1")->row_array();
        return $title['meta_keyword'];
    }

    function favicon(){
        $ci = & get_instance();
        $fav = $ci->db->query("SELECT favicon FROM tbl_identitas ORDER BY id_identitas DESC LIMIT 1")->row_array();
        return base_url().'/assets/images/'.$fav['favicon'];
    }

    function cek_session_admin(){
        $ci = & get_instance();
        $session = $ci->session->userdata('level');
        if ($session != 'Admin'){
            redirect(base_url());
        }
    }

    function cek_session_user(){
        $ci = & get_instance();
        $session = $ci->session->userdata('level');
        if ($session != 'inovator'){
            redirect(base_url());
        }
    }

    function news_manager_get()
    {
        $ci = & get_instance();

        $result = "";

        $no = 1;

        $qw = "SELECT tb_news FROM tbl_newscategory WHERE aktif = 'Ya'";

        $sql1 = $ci->db->query($qw);

        foreach ($sql1->result_array() as $r) {

            if($no > 1){ $result .= " UNION ALL ";}

            $result .= "select ";

            $field = "";

            $n = 1;

            $q = "SELECT COLUMN_NAME 
                  FROM INFORMATION_SCHEMA.COLUMNS
                  WHERE TABLE_SCHEMA = 'db_cms'
                  AND TABLE_NAME = '".$r['tb_news']."' ";

            $sql = $ci->db->query($q);

            foreach ($sql->result_array() as $rr) {

                if($n > 1){ $field .= ", ";}

                $field .= $rr['COLUMN_NAME'];

                $n++;

            }

            $result .= $field;
            
            $result .= ", '$r[tb_news]' as tblnm from $r[tb_news] ";

            $no++;

        }

        return $result;

    }