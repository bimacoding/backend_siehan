<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_wilayah extends CI_Model {
    function provinsi()
    {
        return $this->db->query("SELECT kd_prov, provinsi FROM tbl_wilayah GROUP BY kd_prov ORDER BY kd_prov ASC");
    }

    function kabupaten($kd_prov)
    {
        return $this->db->query("SELECT kd_kab, kabupaten FROM tbl_wilayah WHERE kd_prov = '".$kd_prov."' GROUP BY kd_kab ORDER BY kd_kab ASC");
    }
    function kecamatan($kd_kab)
    {
        return $this->db->query("SELECT kd_kec, kecamatan FROM tbl_wilayah WHERE kd_kab = '".$kd_kab."' GROUP BY kd_kec ORDER BY kd_kec ASC");
    }
}
/* End of file Model_wilayah.php */
/* Location: ./application/models/Model_wilayah.php */