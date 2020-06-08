<?php 
class Model_app extends CI_model{

    public function save_log($param)
    {
      return $this->db->insert('tbl_log_activity', $param);
    }

    public function view($table){
        return $this->db->get($table);
    }

    public function insert($table,$data){
        return $this->db->insert($table, $data);
    }

    public function edit($table, $data){
        return $this->db->get_where($table, $data);
    }
 
    public function update($table, $data, $where){
        return $this->db->update($table, $data, $where); 
    }

    public function delete($table, $where){
        return $this->db->delete($table, $where);
    }

    public function view_where($table,$data){
        $this->db->where($data);
        return $this->db->get($table);
    }

    public function get_combo($table, $where, $field1, $field2){

         $this->db->select('*');
         $this->db->where($where);
         $this->db->group_by($field1);
         $fetched_records = $this->db->get($table);
         $row = $fetched_records->result_array();

         $data = array();
         foreach($row as $value){
            $data[] = array("id"=>$value[$field1], "teks"=>$value[$field2]);
         }
         return $data;
    }

    public function view_ordering_limit($table,$order,$ordering,$baris,$dari){
        $this->db->select('*');
        $this->db->order_by($order,$ordering);
        $this->db->limit($dari, $baris);
        return $this->db->get($table);
    }

    public function view_where_ordering_limit($table,$data,$order,$ordering,$baris,$dari){
        $this->db->select('*');
        $this->db->where($data);
        $this->db->order_by($order,$ordering);
        $this->db->limit($dari, $baris);
        return $this->db->get($table);
    }
    
    public function view_ordering($table,$order,$ordering){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->order_by($order,$ordering);
        return $this->db->get()->result_array();
    }

    public function view_where_ordering($table,$data,$order,$ordering){
        $this->db->where($data);
        $this->db->order_by($order,$ordering);
        $query = $this->db->get($table);
        return $query->result_array();
    }

    public function view_join_one($table1,$table2,$field,$order,$ordering){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1.'.'.$field.'='.$table2.'.'.$field);
        $this->db->order_by($order,$ordering);
        return $this->db->get()->result_array();
    }

    public function view_join_where($table1,$table2,$field,$where,$order,$ordering){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1.'.'.$field.'='.$table2.'.'.$field);
        $this->db->where($where);
        $this->db->order_by($order,$ordering);
        return $this->db->get()->result_array();
    }

    public function getProvinsi($table,$searchTerm="")
    {
        // Fetch users
         $this->db->select('*');
         $this->db->where("provinsi like '%".$searchTerm."%' ");
         $fetched_records = $this->db->get($table);
         $provinsi = $fetched_records->result_array();

         // Initialize Array with fetched data
         $data = array();
         foreach($provinsi as $prov){
            $data[] = array("id"=>$prov['provinsi'], "text"=>$prov['provinsi']);
         }
         return $data;
    }


    public function get_kabedit($id)
    {
        $query = $this->db->query("SELECT b.`kd_kab`, b.`kabupaten` FROM master_satker_xy a LEFT JOIN tbl_wilayah b ON a.`kd_prop` = b.`kd_prov` WHERE a.gid = $id AND kabupaten IS NOT NULL GROUP BY b.`kabupaten`");
        $data = array();
        foreach ($query->result_array() as $row)
        {
            $data[] = array("id"=>$row['kd_kab'], "teks"=>$row['kabupaten']);
        }
        return $data;
    }

    public function get_kecedit($id)
    {
        $query = $this->db->query("SELECT b.`kd_kec`, b.`kecamatan` FROM master_satker_xy a  LEFT JOIN tbl_wilayah b ON a.`kd_prop` = b.`kd_prov` AND a.`kd_kab` = b.`kd_kab` WHERE a.`gid` = $id AND kecamatan IS NOT NULL GROUP BY b.`kecamatan`");
        $data = array();
        foreach ($query->result_array() as $row)
        {
            $data[] = array("id"=>$row['kd_kec'], "teks"=>$row['kecamatan']);
        }
        return $data;
    }

    public function getNegara($table,$searchTerm="")
    {
        // Fetch users
         $this->db->select('*');
         $this->db->where("wilayah like '%".$searchTerm."%' ");
         $fetched_records = $this->db->get($table);
         $negara = $fetched_records->result_array();

         // Initialize Array with fetched data
         $data = array();
         foreach($negara as $neg){
            $data[] = array("id"=>$neg['kdwilayah'], "text"=>$neg['wilayah']);
         }
         return $data;
    }

    public function get_Datatables($dt)
    {
        $columns = implode(', ', $dt['col-display']) . ', ' . $dt['id-table'];
        // $join = $dt['join'];
        $sql  = "SELECT {$columns} FROM {$dt['table']} ";
        $data = $this->db->query($sql);
        $rowCount = $data->num_rows();
        $data->free_result();
        // pengkondisian aksi seperti next, search dan limit
        $columnd = $dt['col-display'];
        $count_c = count($columnd);
        // search
        $search = $dt['search']['value'];
        /**
         * Search Global
         * pencarian global pada pojok kanan atas
         */
        $where = '';
        if ($search != '') {   
            for ($i=0; $i < $count_c ; $i++) {
                $where .= $columnd[$i] .' LIKE "%'. $search .'%"';
                
                if ($i < $count_c - 1) {
                    $where .= ' OR ';
                }
            }
        }
        
        /**
         * Search Individual Kolom
         * pencarian dibawah kolom
         */
        for ($i=0; $i < $count_c; $i++) { 
            $searchCol = $dt['columns'][$i]['search']['value'];
            if ($searchCol != '') {
                $where = $columnd[$i] . ' LIKE "%' . $searchCol . '%" ';
                break;
            }
        }
        /**
         * pengecekan Form pencarian
         * pencarian aktif jika ada karakter masuk pada kolom pencarian.
         */
        if ($where != '') {
            $sql .= " WHERE " . $where;
            
        }
        
        // sorting
        $sql .= " ORDER BY {$columnd[$dt['order'][0]['column']]} {$dt['order'][0]['dir']}";
        
        // limit
        $start  = $dt['start'];
        $length = $dt['length'];
        $sql .= " LIMIT {$start}, {$length}";
        
        $list = $this->db->query($sql);
        /**
         * convert to json
         */
        $no = 1; // untuk no urut
        $option['draw']            = $dt['draw'];
        $option['recordsTotal']    = $rowCount;
        $option['recordsFiltered'] = $rowCount;
        $option['data']            = array();
        foreach ($list->result() as $row) {

            $tools = "<center><a class='btn btn-success btn-xs' title='Edit Data' href='ubah_anggaran/".$row->autono."'";
            $tools .="'><span class='fa fa-edit'></span></a>";
            $tools .="<a class='btn btn-danger btn-xs' title='Delete Data' href='ubah_anggaran/".$row->autono."'";
            $tools .="' onclick='return confirm(\"Apa anda yakin untuk hapus Data ini?\")'><span class='fa fa-trash'></span></a></center>";
            
            $option['data'][] = array(
                                        $no++,
                                        $row->thang,
                                        $row->bulan,
                                        $row->uo,
                                        $row->nmsatker,
                                        $this->mylibrary->format_rupiah($row->pagu),
                                        $this->mylibrary->format_rupiah($row->realisasi),
                                        $this->mylibrary->format_rupiah($row->p_pegawai),
                                        $this->mylibrary->format_rupiah($row->r_pegawai),
                                        $this->mylibrary->format_rupiah($row->p_barang),
                                        $this->mylibrary->format_rupiah($row->r_barang),
                                        $this->mylibrary->format_rupiah($row->p_modal),
                                        $this->mylibrary->format_rupiah($row->r_modal),
                                        $tools
                                      );
         
           // $rows = array();
           // for ($i=0; $i < $count_c; $i++) { 
           //     $rows[] = $row->$columnd[$i];
           // }
           // $option['data'][] = $rows;

         
         
        }
        // eksekusi json
        echo json_encode($option);
    }


    public function cek_login($username,$passlain,$table){
        return $this->db->query("SELECT * FROM $table where username='".$this->db->escape_str($username)."' AND password='".$this->db->escape_str($passlain)."' AND blokir='N'");
    }

    public function cek_login_users($username,$password,$table){
        return $this->db->query("SELECT * FROM $table where username='".$this->db->escape_str($username)."' AND password='".$this->db->escape_str($password)."'");
    }

    function grafik_kunjungan(){
        return $this->db->query("SELECT count(*) as jumlah, tanggal FROM statistik GROUP BY tanggal ORDER BY tanggal DESC LIMIT 10");
    }

    public function provinsi()
    {
        return $this->db->query("SELECT kd_prov, provinsi FROM tbl_wilayah GROUP BY kd_prov ORDER BY kd_prov ASC");
    }

    public function kabupaten($kd_prov)
    {
        return $this->db->query("SELECT kd_kab, kabupaten FROM tbl_wilayah WHERE kd_prov = '".$kd_prov."' GROUP BY kd_kab ORDER BY kd_kab ASC")->result();
    }
    public function kecamatan($kd_kab)
    {
        return $this->db->query("SELECT kd_kec, kecamatan FROM tbl_wilayah WHERE kd_kab = '".$kd_kab."' GROUP BY kd_kec ORDER BY kd_kec ASC")->result();
    }

}