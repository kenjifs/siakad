<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengumuman extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mahasiswa_model');
    }

    public function index()
    {
        $data['title'] = 'Pengumuman Terbaru';
        $data['pengumuman'] = $this->Mahasiswa_model->get_pengumuman();

        $this->load->view('layouts/main', array_merge($data, ['content' => 'mahasiswa/pengumuman']));
    }
}
