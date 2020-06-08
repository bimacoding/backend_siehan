<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_api extends CI_Model {

	public function allDt($table)
    {
        $query = $this->db->get($table);
        return $query->result_array();
    }
	
	public function getDt(){
		$result = $this->db->select('*')
                   ->from('master_satker_xy')
                   ->where('kd_uo=24')
                   ->where('kd_satker=888888')
                   ->get();

		return $result->result_array(); 
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

    public function get_DatatablesTniad($dt)
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
        $options['draw']            = $dt['draw'];
        $options['recordsTotal']    = $rowCount;
        $options['recordsFiltered'] = $rowCount;
        $options['data']            = array();
        foreach ($list->result() as $row) {

            $tools  = "<center><a class='btn btn-success btn-xs' title='Edit Data' href='ubah_perstniad/".$row->row_id."'";
            $tools .="'><span class='fa fa-edit'></span></a>";
            $tools .="<a class='btn btn-danger btn-xs' title='Delete Data' href='ubah_perstniad/".$row->row_id."'";
            $tools .="' onclick='return confirm(\"Apa anda yakin untuk hapus Data ini?\")'><span class='fa fa-trash'></span></a></center>";
            
            $options['data'][] = array(
                                        $row->NRP,
                                        $row->NAMA,
                                        $row->JAB,
                                        $tools
                                      );
         
           // $rows = array();
           // for ($i=0; $i < $count_c; $i++) { 
           //     $rows[] = $row->$columnd[$i];
           // }
           // $options['data'][] = $rows;

         
         
        }
        // eksekusi json
        echo json_encode($options);
    }

}

/* End of file Model_api.php */
/* Location: ./application/models/Model_api.php */