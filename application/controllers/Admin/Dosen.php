<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosen extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Dosen_model');
        $this->load->model('User_model');
    }

    // Menampilkan daftar dosen
    public function index()
    {
        $data['title'] = 'Daftar Dosen';
        $data['dosen'] = $this->Dosen_model->get_all();

        $this->load->view('layouts/main', array_merge($data, ['content' => 'admin/dosen/index']));
    }

    // Menambahkan dosen baru
    public function create()
    {
        if ($this->input->post()) {
            // Data Dosen
            $data = [
                'nidn' => $this->input->post('nidn'),
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'no_telp' => $this->input->post('no_telp'),
                'alamat' => $this->input->post('alamat'),
            ];

            // Insert ke tabel dosen
            $inserted = $this->Dosen_model->insert($data);

            // Jika berhasil, insert juga ke tabel users
            if ($inserted) {
                $user_data = [
                    'username' => $data['nidn'], // NIDN sebagai username
                    'password' => password_hash('pwd123', PASSWORD_DEFAULT), // Default password
                    'role' => 'dosen'
                ];
                $this->User_model->insert($user_data);

                $this->session->set_flashdata('success', 'Dosen berhasil ditambahkan.');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan dosen.');
            }
            redirect('admin/dosen');
        }

        $data['title'] = 'Tambah Dosen';
        $this->load->view('layouts/main', array_merge($data, ['content' => 'admin/dosen/create']));
    }


    public function edit($id)
    {
        $data['title'] = 'Edit Dosen';
        $data['dosen'] = $this->Dosen_model->get_by_id($id);

        if (!$data['dosen']) {
            $this->session->set_flashdata('error', 'Data dosen tidak ditemukan!');
            redirect('admin/dosen');
        }

        // Proses update jika form dikirim
        if ($this->input->post()) {
            $update_data = [
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'no_telp' => $this->input->post('no_telp'),
                'alamat' => $this->input->post('alamat'),
            ];

            $this->Dosen_model->update($id, $update_data);
            $this->session->set_flashdata('success', 'Data dosen berhasil diperbarui!');
            redirect('admin/dosen');
        }

        // Load view edit
        $this->load->view('layouts/main', array_merge($data, ['content' => 'admin/dosen/edit']));
    }


    // Menghapus dosen
    public function delete($id)
    {
        $this->Dosen_model->delete($id);
        $this->session->set_flashdata('success', 'Data dosen berhasil dihapus.');
        redirect('admin/dosen');
    }
}
