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
        $mahasiswa_id = $this->session->userdata('user_id');
        $data['mahasiswa'] = $this->Mahasiswa_model->get_by_id($mahasiswa_id);
        $data['title'] = 'Profil Mahasiswa';
        $this->load->view('layouts/main', array_merge($data, ['content' => 'mahasiswa/profile']));
    }

    public function update()
    {
        $mahasiswa_id = $this->session->userdata('user_id');
        $update_data = [
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'alamat' => $this->input->post('alamat')
        ];

        $this->Mahasiswa_model->update($mahasiswa_id, $update_data);
        $this->session->set_flashdata('success', 'Profil berhasil diperbarui.');
        redirect('mahasiswa/profile');
    }
}
