<?php
require APPPATH . 'libraries/REST_Controller.php';

class Api extends REST_Controller{


  public function __construct(){
    parent::__construct();
  }

  public function index_get(){
    $response['status']=200;
    $this->response($response);
    
  }

  public function agenda_get(){

    // testing response
    $result = '';
    $no =1;
    $res = $this->model_app->view('tbl_agenda');
    foreach ($res->result_array() as $key) {
        if($no > 1){ $result .= ",";}

         $result .= '("'.$key['id'].'","'.$key['judul'].'","'.$key['isi'].'","'.$key['keterangan'].'","'.$key['created_on'].'","'.$key['created_by'].'","'.$key['sumber'] .'","'.$key['kategori'].'","'.$key['sub_kat'].'")';

         $no++;
    }

    //tampilkan response
    $this->response($result);

  }

  public function trending_get()
  {
    $result = '';
    $no =1;
    $data = array('status'=>1);
    $res = $this->model_app->view_where('tbl_trending',$data);
    foreach ($res->result_array() as $key) {
        if($no > 1){ $result .= ",";}

         $result .= '("'.$key['id'].'","'.$key['judul'].'","'.$key['isi'].'","'.$key['keterangan'].'","'.$key['created_on'].'","'.$key['created_by'].'","'.$key['sumber'] .'","'.$key['kategori'].'")';

         $no++;
    }

    //tampilkan response
    $this->response($result);
  }

  public function informasi_get()
  {
    $result = '';
    $no =1;
    $data = array('status'=>1);
    $res = $this->model_app->view_where('tbl_informasi',$data);
    foreach ($res->result_array() as $key) {
        if($no > 1){ $result .= ",";}

         $result .= '("'.$key['id'].'","'.$key['judul'].'","'.$key['isi'].'","'.$key['keterangan'].'","'.$key['created_on'].'","'.$key['created_by'].'","'.$key['sumber'] .'","'.$key['kategori'].'")';

         $no++;
    }

    //tampilkan response
    $this->response($result);
  }

  public function ancaman_get()
  {
    $result = '';
    $no =1;
    $data = array('status'=>1);
    $res = $this->model_app->view_where('tbl_ancaman',$data);
    foreach ($res->result_array() as $key) {
        if($no > 1){ $result .= ",";}

         $result .= '("'.$key['id'].'","'.$key['judul'].'","'.$key['isi'].'","'.$key['keterangan'].'","'.$key['created_on'].'","'.$key['created_by'].'","'.$key['sumber'] .'","'.$key['kategori'].'")';

         $no++;
    }

    //tampilkan response
    $this->response($result);
  }

  public function industri_get()
  {
    $result = '';
    $no =1;
    $data = array('status'=>0);
    $res = $this->model_app->view_where('tbl_industri',$data);
    foreach ($res->result_array() as $key) {
        if($no > 1){ $result .= ",";}

         $result .= '("'.$key['id'].'","'.$key['judul'].'","'.$key['isi'].'","'.$key['keterangan'].'","'.$key['created_on'].'","'.$key['created_by'].'","'.$key['sumber'] .'","'.$key['kategori'].'")';

         $no++;
    }

    //tampilkan response
    $this->response($result);
  }

  // Controller API CCTV 

  public function cctv_get()
  {
    $result = '';
    $no =1;
    $res = $this->model_app->view('tbl_cctv');
    foreach ($res->result_array() as $key) {
        if($no > 1){ $result .= ",";}

         $result .= '("'.$key['id'].'","'.$key['nama'].'","'.$key['link'].'","'.$key['sumber'].'","'.$key['status'].'")';

         $no++;
    }

    //tampilkan response
    $this->response($result);
  }

  // controller API grafik personel dunia

  public function grafikanggarandunia_get()
  {

    error_reporting(0);
    $idxbgt = $this->db->query("SELECT benua, SUM(strength) AS total FROM tbl_countrystrength WHERE subcategory = 'Defense Budget' GROUP BY benua ORDER BY benua DESC");
    foreach($idxbgt->result_array() as $i){

      $result['idxbgt'][] = array(

          'name'    => $i['benua'],
          'y'       => floatval($i['total']),
          'drilldown' => str_replace(" ","",strtolower($i['benua']))
              
      );

    }   

    $drillngt = $this->db->query("SELECT benua FROM tbl_countrystrength GROUP BY benua");
    foreach($drillngt->result_array() as $d){   

        $sub = $this->db->query("SELECT negara, SUM(strength) AS totals FROM tbl_countrystrength WHERE benua = '$d[benua]' AND subcategory='Defense Budget' AND strength != 0 GROUP BY negara ORDER BY strength DESC");
        
        foreach($sub->result_array() as $s){ 

            $datasub[$d['benua']][] =  array(

              'name' => $s['negara'], 
              'y' => (double)$s['totals'],
              'drilldown' =>  str_replace(" ","",strtolower($s['negara']))

            );

        }

      $result['drillbgt'][] = array(

          'name' => $d['benua'],
          'id'   => str_replace(" ","",strtolower($d['benua'])),
          'data' => str_replace('"', '', $datasub[$d['benua']])
          
              
      );
        

    }

    $drillngts = $this->db->query("SELECT negara FROM tbl_countrystrength GROUP BY negara");
    foreach($drillngts->result_array() as $dx){   

        $subs = $this->db->query("SELECT subcategory, strength AS totalss FROM tbl_countrystrength WHERE negara = '$dx[negara]' ORDER BY strength DESC");
        
        foreach($subs->result_array() as $sx){

            $datasubs[$dx['negara']][] =  array($sx['subcategory'], (double)$sx['totalss']

            );

        }

      $result['drillngts'][] = array(

          'name' => $dx['negara'],
          'id'   => str_replace(" ","",strtolower($dx['negara'])),
          'data' => str_replace('"', '', $datasubs[$dx['negara']])
              
      );
        

    }


     $this->response($result);
  }

  // controller anggaran pertahun

  public function grafikanggarantahun_get()
  {
    $anggaranthn = $this->db->query("SELECT tahun, SUM(jumlah) AS total FROM tbl_anggarantotal GROUP BY tahun ORDER BY tahun ASC");
    foreach($anggaranthn->result_array() as $row){

        $result['anggaranthn'][] = array(

          'name' => $row['tahun'],
          'y'    => (int)$row['total'],
          'drilldown'  => str_replace(" ","",strtolower($row['tahun']))

        );
    }

    $drillanggaranthn = $this->db->query("SELECT tahun FROM tbl_anggarantotal GROUP BY tahun ORDER BY tahun ASC");
    foreach($drillanggaranthn->result_array() as $ag){

        $sub = $this->db->query("SELECT uo, jumlah FROM tbl_anggarantotal WHERE tahun='$ag[tahun]' ORDER BY urutan asc");
        
         foreach($sub->result_array() as $s){

            $datasub[$ag['tahun']][] =  array($s['uo'], (double)$s['jumlah']);

        }

        $result['drillanggaranthn'][] = array(

          'name'=>$ag['tahun'],
          'id'  =>str_replace(" ", "", strtolower($ag['tahun'])),
          'data'=>$datasub[$ag['tahun']]

        );
    }

    $this->response($result);
  }


}

?>
