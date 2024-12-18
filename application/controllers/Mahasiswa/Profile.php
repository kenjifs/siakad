<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mahasiswa_model');
    }

    public function index()
    {
        $mahasiswa_id = $this->session->userdata('mahasiswa_id');
        $data['mahasiswa'] = $this->Mahasiswa_model->get_by_id($mahasiswa_id);
        $data['title'] = 'Profil Mahasiswa';
        $this->load->view('layouts/main', array_merge($data, ['content' => 'mahasiswa/profile']));
    }
}
