<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_soalujian extends CI_Model
{
    public function get_data()
    {
        return $this->db->get('soalujian_tbl')->result_array();
    }

    public function proses_tambah_data()
    {
        $data = [
            "nama_matakuliah" => $this->input->post("nama_matakuliah"),
            "kode_matakuliah" => $this->input->post("kode_matakuliah"),
            "semester" => $this->input->post("semester"),
            "jenis_soal" => $this->input->post("jenis_soal")
        ];

        // Masukan data ke tabel
        $this->db->insert('soalujian_tbl', $data);
    }

    // Ambil data sesuai dengan id
    public function fetch_data($id_soalujian)
    {
        return $this->db->get_where('soalujian_tbl', ['id_soalujian' => $id_soalujian])->row_array();
    }

    // Proses update data
    public function proses_update_data($data, $table)
    {
        $data = [
            "nama_matakuliah" => $this->input->post('nama_matakuliah'),
            "kode_matakuliah" => $this->input->post('kode_matakuliah'),
            "semester" => $this->input->post('semester'),
            "jenis_soal" => $this->input->post('jenis_soal'),
            "dokumen" => $this->input->post('editfile')
        ];

        $this->db->where('id_soalujian', $this->input->post('id_soalujian'));
        $this->db->update('soalujian_tbl', $data);
    }

    public function delete_data($id_soalujian)
    {
        $this->db->where('id_soalujian', $id_soalujian);
        $this->db->delete('soalujian_tbl');
    }
}
