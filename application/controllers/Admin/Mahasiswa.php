<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mahasiswa_model');
        $this->load->model('User_model');
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
        if ($this->input->post()) {
            // Data Mahasiswa
            $data = [
                'nim' => $this->input->post('nim'),
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'no_telp' => $this->input->post('no_telp'),
                'alamat' => $this->input->post('alamat'),
            ];

            // Insert ke tabel mahasiswa
            $inserted = $this->Mahasiswa_model->insert($data);

            // Jika berhasil, insert juga ke tabel users
            if ($inserted) {
                $user_data = [
                    'username' => $data['nim'], // NIM sebagai username
                    'password' => password_hash('pwd123', PASSWORD_DEFAULT), // Default password
                    'role' => 'mahasiswa'
                ];
                $this->User_model->insert($user_data);

                $this->session->set_flashdata('success', 'Mahasiswa berhasil ditambahkan.');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan mahasiswa.');
            }
            redirect('admin/mahasiswa');
        }

        $data['title'] = 'Tambah Mahasiswa';
        $this->load->view('layouts/main', array_merge($data, ['content' => 'admin/mahasiswa/create']));
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
