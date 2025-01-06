<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Jadwal_model');
        $this->load->library('session');

        // Cek apakah user yang login adalah mahasiswa
        if ($this->session->userdata('role') != 'mahasiswa') {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $mahasiswa_id = $this->session->userdata('user_id');
        $data['title'] = 'Jadwal Kuliah';
        $data['jadwal'] = $this->Jadwal_model->get_by_mahasiswa($mahasiswa_id);

        $this->load->view('layouts/main', array_merge($data, ['content' => 'mahasiswa/jadwal']));
    }
}
