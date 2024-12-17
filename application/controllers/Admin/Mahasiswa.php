<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mahasiswa_model');
        if ($this->session->userdata('role') != 'admin') {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $data['title'] = 'Daftar Mahasiswa';
        $data['mahasiswa'] = $this->Mahasiswa_model->get_all();

        $this->load->view('layouts/main', [
            'content' => 'admin/mahasiswa/index',
            'data'    => $data
        ]);
    }


    public function create()
    {
        $data['title'] = 'Create Mahasiswa';
        if ($_POST) {
            $this->Mahasiswa_model->create($this->input->post());
            redirect('admin/mahasiswa');
        }
        $this->load->view('layouts/main', ['content' => 'admin/mahasiswa/create', 'data' => $data]);
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Mahasiswa';
        if ($_POST) {
            $this->Mahasiswa_model->update($id, $this->input->post());
            redirect('admin/mahasiswa');
        }
        $data['mahasiswa'] = $this->Mahasiswa_model->get_by_id($id);
        $this->load->view('layouts/main', [
            'content' => 'admin/mahasiswa/edit',
            'data' => $data
        ]);
    }

    public function delete($id)
    {
        $this->Mahasiswa_model->delete($id);
        redirect('admin/mahasiswa');
    }
}
