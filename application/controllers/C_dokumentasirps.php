<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_dokumentasirps extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_dokumentasirps');
    }

    public function index()
    {
        $data['title'] = "Dokumentasi RPS";
        $data['dokumentasirps'] = $this->M_dokumentasirps->get_data();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('V_dokumentasirps', $data);
        $this->load->view('templates/footer');
    }


    public function tambah_data()
    {
        $config['upload_path']          = './data/rps/';
        $config['allowed_types']        = 'pdf|doc|docx|xls|xlsx';
        $config['max_size']             = 4096;     // 4mb
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            echo "Gagal Tambah Data";
        } else {
            $dokumen = $this->upload->data();
            $dokumen = $dokumen['file_name'];
            $nama_matakuliah = $this->input->post('nama_matakuliah', TRUE);
            $kode_matakuliah = $this->input->post('kode_matakuliah', TRUE);
            $semester = $this->input->post('semester', TRUE);
            $bobot_sks = $this->input->post('bobot_sks', TRUE);

            $data = array(
                'nama_matakuliah' => $nama_matakuliah,
                'kode_matakuliah' => $kode_matakuliah,
                'semester' => $semester,
                'bobot_sks' => $bobot_sks,
                'dokumen' => $dokumen
            );

            // insert ke database
            $this->db->insert('dokumentasirps_tbl', $data);
            // Alert
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data <strong>Berhasil</strong> Ditambahkan!.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            redirect('C_dokumentasirps');
        }
    }


    public function delete_data($id_dokumentasirps)
    {
        $data = $this->M_dokumentasirps->getDataById($id_dokumentasirps)->row();
        $namafile = './data/rps/' . $data->dokumen;

        if (is_readable($namafile) && unlink($namafile)) {
            $delete = $this->M_dokumentasirps->delete_file($id_dokumentasirps);
            // alert
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data <strong>Berhasil</strong> Dihapus!.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');

            redirect('C_dokumentasirps');
        } else {
            echo "Gagal Hapus Data";
        }

        redirect('C_dokumentasirps');
    }


    public function edit_data()
    {
        $id_dokumentasirps = $this->input->post('id_dokumentasirps');

        $data = $this->M_dokumentasirps->getDataById($id_dokumentasirps)->row();
        $namafile = './data/rps/' . $data->dokumen;

        $config['upload_path']          = './data/rps/';
        $config['allowed_types']        = 'pdf|doc|docx|xls|xlsx';
        $config['max_size']             = 4096;     // 4mb
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('editfile')) {
            $nama_matakuliah = $this->input->post('nama_matakuliah1', TRUE);
            $kode_matakuliah = $this->input->post('kode_matakuliah1', TRUE);
            $semester = $this->input->post('semester1', TRUE);
            $bobot_sks = $this->input->post('bobot_sks1', TRUE);

            $data = array(
                'nama_matakuliah' => $nama_matakuliah,
                'kode_matakuliah' => $kode_matakuliah,
                'semester' => $semester,
                'bobot_sks' => $bobot_sks
            );

            $this->db->where('id_dokumentasirps', $id_dokumentasirps);
            $this->db->update('dokumentasirps_tbl', $data);

            // Alert
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                Data <strong>Berhasil</strong> Diubah!.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            redirect('C_dokumentasirps');
        } else {
            if (is_readable($namafile) && unlink($namafile)) {
                $dokumen = $this->upload->data();
                $dokumen = $dokumen['file_name'];

                $nama_matakuliah = $this->input->post('nama_matakuliah1', TRUE);
                $kode_matakuliah = $this->input->post('kode_matakuliah1', TRUE);
                $semester = $this->input->post('semester1', TRUE);
                $bobot_sks = $this->input->post('bobot_sks1', TRUE);

                $data = array(
                    'nama_matakuliah' => $nama_matakuliah,
                    'kode_matakuliah' => $kode_matakuliah,
                    'semester' => $semester,
                    'bobot_sks' => $bobot_sks,
                    'dokumen' => $dokumen
                );

                // update ke database
                $update = $this->M_dokumentasirps->update_file($id_dokumentasirps, $data);

                if ($update) {
                    // Alert
                    $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            Data <strong>Berhasil</strong> Diubah!.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

                    redirect('C_dokumentasirps');
                } else {
                    echo "Gagal Update";
                }
            } else {
                echo "Gagal Edit Data";
            }
        }
    }
}
