<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_soalujian extends CI_Controller
{
    public function index()
    {
        $data['title'] = "Soal Ujian";

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('V_soalujian');
        $this->load->view('templates/footer');
    }
}
