<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Dosen_model');
        $this->load->library('session');

        // Cek apakah user yang login adalah dosen
        if ($this->session->userdata('role') != 'dosen') {
            redirect('auth/login');
        }
    }

    // Tampilkan profil dosen
    public function index()
    {
        $dosen_id = $this->session->userdata('user_id'); // Ambil ID dosen dari session
        $data['title'] = 'Profil Dosen';
        $data['dosen'] = $this->Dosen_model->get_by_id($dosen_id);

        $this->load->view('layouts/main', array_merge($data, ['content' => 'dosen/profile']));
    }

    // Update profil dosen
    public function update()
    {
        $dosen_id = $this->session->userdata('user_id'); // Ambil ID dosen dari session

        $update_data = [
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'no_telp' => $this->input->post('no_telp'),
            'alamat' => $this->input->post('alamat')
        ];

        if ($this->Dosen_model->update($dosen_id, $update_data)) {
            $this->session->set_flashdata('success', 'Profil berhasil diperbarui.');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui profil.');
        }

        redirect('dosen/profile');
    }
}
