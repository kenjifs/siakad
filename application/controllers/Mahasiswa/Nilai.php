<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mahasiswa_model');
        if ($this->session->userdata('role') != 'mahasiswa') {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $mahasiswa_id = $this->session->userdata('mahasiswa_id');
        $data['title'] = 'Nilai Mahasiswa';
        $data['nilai'] = $this->Mahasiswa_model->get_nilai($mahasiswa_id);

        $this->load->view('layouts/main', array_merge($data, ['content' => 'mahasiswa/nilai']));
    }
}
