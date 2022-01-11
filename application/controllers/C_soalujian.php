<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_soalujian extends CI_Controller
{
    public function index()
    {
        $data['title'] = "Soal Ujian";
        $data['soalujian'] = $this->M_soalujian->get_data();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('V_soalujian', $data, array('error' => ' '));
        $this->load->view('templates/footer');
    }

    // public function tambah_data()
    // {
    //     $data['title'] = "Tambah Data Soal Ujian";
    //     $data['soalujian'] = $this->M_soalujian->get_data();

    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/sidebar', $data);
    //     $this->load->view('V_tambahdata2', $data);
    //     $this->load->view('templates/footer');
    // }


    public function proses_tambah_data()
    {
        $config['upload_path']          = './data/soalujian/';
        $config['allowed_types']        = 'pdf|doc|docx|xls|xlsx';
        $config['max_size']             = 4096;     // 4mb
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            echo "Gagal Tambah Data";

            // $error = array('error' => $this->upload->display_errors());
            // $this->load->view('upload_form', $error);
        } else {
            $dokumen = $this->upload->data();
            $dokumen = $dokumen['file_name'];
            $nama_matakuliah = $this->input->post('nama_matakuliah', TRUE);
            $kode_matakuliah = $this->input->post('kode_matakuliah', TRUE);
            $semester = $this->input->post('semester', TRUE);
            $jenis_soal = $this->input->post('jenis_soal', TRUE);

            $data = array(
                'nama_matakuliah' => $nama_matakuliah,
                'kode_matakuliah' => $kode_matakuliah,
                'semester' => $semester,
                'jenis_soal' => $jenis_soal,
                'dokumen' => $dokumen
            );

            // insert ke database
            $this->db->insert('soalujian_tbl', $data);
            // Alert
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data <strong>Berhasil</strong> Ditambahkan!.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            redirect('C_soalujian');


            // $data = array('upload_data' => $this->upload->data());
            // $this->load->view('upload_success', $data);
        }
    }


    // public function edit_data($id_soalujian)
    // {
    //     $data['title'] = "Edit Data Soal Ujian";
    //     $data['soalujian'] = $this->M_soalujian->fetch_data($id_soalujian);

    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/sidebar', $data);
    //     $this->load->view('V_editdata2', $data);
    //     $this->load->view('templates/footer');
    // }


    public function proses_edit_data()
    {
        $id_soalujian = $this->input->post('id_soalujian');

        $config['upload_path']          = './data/soalujian/';
        $config['allowed_types']        = 'pdf|doc|docx|xls|xlsx';
        $config['max_size']             = 4096;     // 4mb
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('editfile')) {
            $nama_matakuliah = $this->input->post('nama_matakuliah1', TRUE);
            $kode_matakuliah = $this->input->post('kode_matakuliah1', TRUE);
            $semester = $this->input->post('semester1', TRUE);
            $jenis_soal = $this->input->post('jenis_soal1', TRUE);

            $data = array(
                'nama_matakuliah' => $nama_matakuliah,
                'kode_matakuliah' => $kode_matakuliah,
                'semester' => $semester,
                'jenis_soal' => $jenis_soal
            );

            // update data ke database
            $this->db->where('id_soalujian', $id_soalujian);
            $this->db->update('soalujian_tbl', $data);
            // $this->M_soalujian->proses_update_data($id_soalujian);
            // Alert
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            Data <strong>Berhasil</strong> Diubah!.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            redirect('C_soalujian');

            // $error = array('error' => $this->upload->display_errors());
            // $this->load->view('upload_form', $error);
        } else {
            $dokumen = $this->upload->data();
            $dokumen = $dokumen['file_name'];
            $nama_matakuliah = $this->input->post('nama_matakuliah1', TRUE);
            $kode_matakuliah = $this->input->post('kode_matakuliah1', TRUE);
            $semester = $this->input->post('semester1', TRUE);
            $jenis_soal = $this->input->post('jenis_soal1', TRUE);

            $data = array(
                'nama_matakuliah' => $nama_matakuliah,
                'kode_matakuliah' => $kode_matakuliah,
                'semester' => $semester,
                'jenis_soal' => $jenis_soal,
                'dokumen' => $dokumen
            );

            // update ke database
            $this->db->where('id_soalujian', $id_soalujian);
            $this->db->update('soalujian_tbl', $data);
            // $this->M_soalujian->proses_update_data($id);
            // Alert
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data <strong>Berhasil</strong> Diubah!.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            redirect('C_soalujian');


            // $data = array('upload_data' => $this->upload->data());
            // $this->load->view('upload_success', $data);
        }
    }


    // public function delete_data($id_soalujian)
    // {
    //     $this->M_soalujian->delete_data($id_soalujian);
    //     $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
    //     Data <strong>Berhasil</strong> Dihapus!.
    //     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //       <span aria-hidden="true">&times;</span>
    //     </button>
    //   </div>');

    //     redirect('C_soalujian');
    // }


    public function delete_file($id_soalujian)
    {
        $data = $this->M_soalujian->getDataById($id_soalujian)->row();
        $namafile = './data/soalujian/' . $data->dokumen;

        if (is_readable($namafile) && unlink($namafile)) {
            $delete = $this->M_soalujian->delete_file($id_soalujian);
            // alert
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data <strong>Berhasil</strong> Dihapus!.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');

            redirect('C_soalujian');
        } else {
            echo "Gagal Hapus Data";
        }

        redirect('C_soalujian');
    }
}
