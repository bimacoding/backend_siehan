<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Model_ajax extends CI_Model {



	public function get_Datatables($datatables)

	{

		$columns = implode(', ', $datatables['col-display']) . ', ' . $datatables['id-table'];

        // $join = $datatables['join'];

        $sql  = "SELECT {$columns} FROM {$datatables['table']} ";

        $data = $this->db->query($sql);

        $rowCount = $data->num_rows();

        $data->free_result();

        // pengkondisian aksi seperti next, search dan limit

        $columnd = $datatables['col-display'];

        $count_c = count($columnd);

        // search

        $search = $datatables['search']['value'];

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

            $searchCol = $datatables['columns'][$i]['search']['value'];

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

        $sql .= " ORDER BY {$columnd[$datatables['order'][0]['column']]} {$datatables['order'][0]['dir']}";

        

        // limit

        $start  = $datatables['start'];

        $length = $datatables['length'];

        $sql .= " LIMIT {$start}, {$length}";

        

        $list = $this->db->query($sql);

        /**

         * convert to json

         */

        $no = 1; // untuk no urut

        $option['draw']            = $datatables['draw'];

        $option['recordsTotal']    = $rowCount;

        $option['recordsFiltered'] = $rowCount;

        $option['data']            = array();

        foreach ($list->result() as $row) {



            $tools = "<center><a class='btn btn-success btn-xs' title='Edit Data' href='".site_url('administrator/ubah_wilayah/'.$row->autono)."'";

            $tools .="'><span class='fa fa-edit'></span></a>";

            $tools .="<a class='btn btn-danger btn-xs' title='Delete Data' href='".site_url('administrator/hapus_wilayah/'.$row->autono)."'";

            $tools .="' onclick='return confirm(\"Apa anda yakin untuk hapus Data ini?\")'><span class='fa fa-trash'></span></a></center>";

            

            $option['data'][] = array(

                                        $row->autono,

						                $row->kode,

						                $row->provinsi,

						                $row->kabupaten,

						                $row->kecamatan,

						                $row->desa,

						                $row->kor_long,

						                $row->kor_lat,

						                $tools,

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


    public function get_lastupdate($datatables)

    {

        $columns = implode(', ', $datatables['col-display']) . ', ' . $datatables['id-table'];

        // $join = $datatables['join'];

        $sql  = "SELECT {$columns} FROM {$datatables['table']}";

        $sql1  = "SELECT {$columns} FROM {$datatables['table']} WHERE modified_on IS NOT NULL";

        $data = $this->db->query($sql1);

        $rowCount = $data->num_rows();

        $data->free_result();

        // pengkondisian aksi seperti next, search dan limit

        $columnd = $datatables['col-display'];

        $count_c = count($columnd);

        // search

        $search = $datatables['search']['value'];

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

            $searchCol = $datatables['columns'][$i]['search']['value'];

            if ($searchCol != '') {

                $where = $columnd[$i] . ' LIKE "%' . $searchCol . '%" ';

                break;

            }

        }

        /**

         * pengecekan Form pencarian

         * pencarian aktif jika ada karakter masuk pada kolom pencarian.

         */

        $sql .= " WHERE modified_on IS NOT NULL"; 

        // if ($where != '') {

        //     $sql .= " WHERE " . $where;

            

        // }

        

        // sorting

        $sql .= " ORDER BY {$columnd[$datatables['order'][0]['column']]} {$datatables['order'][0]['dir']}";

        

        // limit

        $start  = $datatables['start'];

        $length = $datatables['length'];

        $sql .= " LIMIT {$start}, {$length}";

        

        $list = $this->db->query($sql);

        /**

         * convert to json

         */

        $no = 1; // untuk no urut

        $option['draw']            = $datatables['draw'];

        $option['recordsTotal']    = $rowCount;

        $option['recordsFiltered'] = $rowCount;

        $option['data']            = array();

        foreach ($list->result() as $row) {

           

            $option['data'][] = array(

                                        $row->autono,

                                        $row->kode,

                                        $row->provinsi,

                                        $row->kabupaten,

                                        $row->kecamatan,

                                        $row->desa,

                                        $row->modified_by,

                                        $row->modified_on

                                      );

                  

        }

        // eksekusi json

        echo json_encode($option);

    }



    public function get_DatatablesGis($datatables)

    {

        $columns = implode(', ', $datatables['col-display']) . ', ' . $datatables['id-table'];

        // $join = $datatables['join'];

        $sql  = "SELECT {$columns} FROM {$datatables['table']} ";

        $data = $this->db->query($sql);

        $rowCount = $data->num_rows();

        $data->free_result();

        // pengkondisian aksi seperti next, search dan limit

        $columnd = $datatables['col-display'];

        $count_c = count($columnd);

        // search

        $search = $datatables['search']['value'];

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

            $searchCol = $datatables['columns'][$i]['search']['value'];

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

        $sql .= " ORDER BY {$columnd[$datatables['order'][0]['column']]} {$datatables['order'][0]['dir']}";

        

        // limit

        $start  = $datatables['start'];

        $length = $datatables['length'];

        $sql .= " LIMIT {$start}, {$length}";

        

        $list = $this->db->query($sql);

        /**

         * convert to json

         */

        $no = 1; // untuk no urut

        $option['draw']            = $datatables['draw'];

        $option['recordsTotal']    = $rowCount;

        $option['recordsFiltered'] = $rowCount;

        $option['data']            = array();

        foreach ($list->result() as $row) {



            $tools = "<center><a class='btn btn-success btn-xs' title='Edit Data' href='".site_url('administrator/ubah_gis/'.$row->gid)."'";

            $tools .="'><span class='fa fa-edit'></span></a>";

            $tools .="<a class='btn btn-danger btn-xs' title='Delete Data' href='".site_url('administrator/hapus_gis/'.$row->gid)."'";

            $tools .="' onclick='return confirm(\"Apa anda yakin untuk hapus Data ini?\")'><span class='fa fa-trash'></span></a></center>";

            

            $option['data'][] = array(

                                        $row->gid,

                                        $row->nama,

                                        $row->jns_satker,

                                        $row->lokasi,

                                        $row->kd_prop,

                                        $row->kd_kab,

                                        $row->kd_kec,

                                        $row->xcoord,

                                        $row->ycoord,

                                        $tools,

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

    public function get_DatatablesRs($datatables)

    {

        $columns = implode(', ', $datatables['col-display']) . ', ' . $datatables['id-table'];
        // $join = $datatables['join'];
        $sql  = "SELECT {$columns} FROM {$datatables['table']} ";
        $data = $this->db->query($sql);
        $rowCount = $data->num_rows();
        $data->free_result();
        // pengkondisian aksi seperti next, search dan limit
        $columnd = $datatables['col-display'];
        $count_c = count($columnd);
        // search
        $search = $datatables['search']['value'];
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
            $searchCol = $datatables['columns'][$i]['search']['value'];
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
        $sql .= " ORDER BY {$columnd[$datatables['order'][0]['column']]} {$datatables['order'][0]['dir']}";
        // limit
        $start  = $datatables['start'];
        $length = $datatables['length'];
        $sql .= " LIMIT {$start}, {$length}";
        $list = $this->db->query($sql);

        /**

         * convert to json

         */

        $no = 1; // untuk no urut
        $option['draw']            = $datatables['draw'];
        $option['recordsTotal']    = $rowCount;
        $option['recordsFiltered'] = $rowCount;
        $option['data']            = array();
        foreach ($list->result() as $row) {

            $tools = "<center><a class='btn btn-success btn-xs' title='Edit Data' href='".site_url('administrator/ubah_rs/'.$row->autono)."'";
            $tools .="'><span class='fa fa-edit'></span></a>";
            $tools .="<a class='btn btn-danger btn-xs' title='Delete Data' href='".site_url('administrator/hapus_rs/'.$row->autono)."'";
            $tools .="' onclick='return confirm(\"Apa anda yakin untuk hapus Data ini?\")'><span class='fa fa-trash'></span></a></center>";


            $option['data'][] = array(
                                        $row->autono,
                                        $row->nama_prop,
                                        $row->kode_rs,
                                        $row->nama_rs,
                                        $row->kelas,
                                        $row->jenis_rs,
                                        $row->pemilik,
                                        $row->kor_long,
                                        $row->kor_lat,
                                        $tools,
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

	



}



/* End of file Model_ajax.php */

/* Location: ./application/models/Model_ajax.php */ ?>