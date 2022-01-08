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
        $data['dokumentasirps'] = $this->M_dokumentasirps->get_data('dokumentasirps_tbl')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('V_dokumentasirps', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Data Dokumentasi RPS';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('V_tambahdata1');
        $this->load->view('templates/footer');
    }

    public function tambah_aksi()
    {
        // jalankan rules
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = array(
                'kode_matakuliah' => $this->input->post('kode_matakuliah'),
                'nama_matakuliah' => $this->input->post('nama_matakuliah'),
                'semester' => $this->input->post('semester'),
                'bobot_sks' => $this->input->post('bobot_sks'),
                'dokumen' => $this->input->post('dokumen')
            );

            // Kirim data ke model
            $this->M_dokumentasirps->insert_data($data, 'dokumentasirps_tbl');
            // flashdata
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data <strong>Berhasil</strong> Ditambahkan!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('c_dokumentasirps');
        }
    }

    public function add_data()
    {
        $this->_rules();

        $nama_matakuliah = $this->input->post('nama_matakuliah');
        $kode_matakuliah = $this->input->post('kode_matakuliah');
        $semester = $this->input->post('semester');
        $bobot_sks = $this->input->post('bobot_sks');
        $dokumen = $_FILES['dokumen'];
        if ($dokumen = '') {
            # code...
        } else {
            $config['upload_path']          = './data/rps/';
            $config['allowed_types']        = 'gif|jpg|jpeg|png|pdf|doc';
            // $config['max_size']             = 2048;
            // $config['max_width']            = 1024;
            // $config['max_height']           = 768;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('dokumen')) {
                echo "Gagal Tambah Data";
                die();
            } else {
                $dokumen = $this->upload->data('file_name');
            }
        }

        $data = array(
            'nama_matakuliah' => $nama_matakuliah,
            'kode_matakuliah' => $kode_matakuliah,
            'semester' => $semester,
            'bobot_sks' => $bobot_sks,
            'dokumen' => $dokumen
        );

        // Kirim data ke model
        $this->M_dokumentasirps->insert_data($data, 'dokumentasirps_tbl');
        // flashdata
        $this->session->set_flashdata('pesan', '<div class="alert alert-succes alert-dismissible fade show" role="alert">
        Data <strong>Berhasil</strong> Ditambahkan!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('C_dokumentasirps');
    }

    public function edit($id_dokumentasirps)
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data = array(
                'id_dokumentasirps' => $id_dokumentasirps,
                'nama_matakuliah' => $this->input->post('nama_matakuliah'),
                'kode_matakuliah' => $this->input->post('kode_matakuliah'),
                'semester' => $this->input->post('semester'),
                'bobot_sks' => $this->input->post('bobot_sks'),
                'dokumen' => $this->input->post('dokumen')
            );

            // Kirim data ke model
            $this->M_dokumentasirps->update_data($data, 'dokumentasirps_tbl');
            // flashdata
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            Data <strong>Berhasil</strong> Diubah!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('C_dokumentasirps');
        }
    }

    public function delete($id)
    {
        $where = array('id_dokumentasirps' => $id);

        // Kirim data ke model
        $this->M_dokumentasirps->delete($where, 'dokumentasirps_tbl');
        // flashdata
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Data <strong>Berhasil</strong> Dihapus!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('C_dokumentasirps');
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_matakuliah', 'Nama Matakuliah', 'required', array('required' => '%s Harus diisi !'));
        $this->form_validation->set_rules('kode_matakuliah', 'Kode Matakuliah', 'required', array('required' => '%s Harus diisi !'));
        $this->form_validation->set_rules('semester', 'Semester', 'required', array('required' => '%s Harus diisi !'));
        $this->form_validation->set_rules('bobot_sks', 'Bobot SKS', 'required', array('required' => '%s Harus diisi !'));
        // $this->form_validation->set_rules('dokument', 'Dokumen', 'required', array('required' => '%s Harus diisi !'));
    }
}
