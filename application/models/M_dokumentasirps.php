<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_dokumentasirps extends CI_Model
{
    public function get_data()
    {
        return $this->db->get('dokumentasirps_tbl')->result_array();
    }


    public function delete_file($id_dokumentasirps)
    {
        $this->db->where('id_dokumentasirps', $id_dokumentasirps);
        return $this->db->delete('dokumentasirps_tbl');
    }


    public function getDataById($id_dokumentasirps)
    {
        $this->db->where('id_dokumentasirps', $id_dokumentasirps);
        return $this->db->get('dokumentasirps_tbl');
    }


    public function update_file($id_dokumentasirps, $data)
    {
        $this->db->where('id_dokumentasirps', $id_dokumentasirps);
        return $this->db->update('dokumentasirps_tbl', $data);
    }
}
