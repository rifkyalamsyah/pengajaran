<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_pengajaran extends CI_Controller
{
    function index()
    {
        $this->load->view('V_pengajaran');
    }
}
