<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengumuman extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pengumuman_model');
        $this->load->library('session');

        // Cek apakah user yang login adalah dosen
        if ($this->session->userdata('role') != 'dosen') {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $data['title'] = 'Pengumuman';
        $data['pengumuman'] = $this->Pengumuman_model->get_all(); // Ambil semua pengumuman

        $this->load->view('layouts/main', array_merge($data, ['content' => 'dosen/pengumuman']));
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Pengumuman';
        $data['pengumuman'] = $this->Pengumuman_model->get_by_id($id);

        if (!$data['pengumuman']) {
            show_404(); // Jika pengumuman tidak ditemukan
        }

        $this->load->view('layouts/main', array_merge($data, ['content' => 'dosen/pengumuman_detail']));
    }
}
