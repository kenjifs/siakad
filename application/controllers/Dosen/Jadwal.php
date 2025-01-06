<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('JadwalMengajar_model');
        $this->load->library('session');

        // Cek apakah user yang login adalah dosen
        if ($this->session->userdata('role') != 'dosen') {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $dosen_id = $this->session->userdata('user_id');
        $data['title'] = 'Jadwal Mengajar';
        $data['jadwal'] = $this->JadwalMengajar_model->get_by_dosen($dosen_id);

        $this->load->view('layouts/main', array_merge($data, ['content' => 'dosen/jadwal']));
    }
}
