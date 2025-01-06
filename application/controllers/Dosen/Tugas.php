<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tugas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tugas_model');
        $this->load->library('session');

        // Cek apakah user yang login adalah dosen
        if ($this->session->userdata('role') != 'dosen') {
            redirect('auth/login');
        }
    }

    // Tampilkan daftar tugas
    public function index()
    {
        $dosen_id = $this->session->userdata('user_id'); // ID dosen dari session
        $data['title'] = 'Daftar Tugas';
        $data['tugas'] = $this->Tugas_model->get_by_dosen($dosen_id);

        $this->load->view('layouts/main', array_merge($data, ['content' => 'dosen/tugas/index']));
    }

    // Tambah tugas baru
    public function create()
    {
        $data['title'] = 'Tambah Tugas';

        if ($this->input->post()) {
            $dosen_id = $this->session->userdata('user_id');
            $new_task = [
                'dosen_id' => $dosen_id,
                'mata_kuliah' => $this->input->post('mata_kuliah'),
                'judul' => $this->input->post('judul'),
                'deskripsi' => $this->input->post('deskripsi'),
                'deadline' => $this->input->post('deadline')
            ];

            if ($this->Tugas_model->insert($new_task)) {
                $this->session->set_flashdata('success', 'Tugas berhasil ditambahkan.');
                redirect('dosen/tugas');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan tugas.');
            }
        }

        $this->load->view('layouts/main', array_merge($data, ['content' => 'dosen/tugas/create']));
    }

    // Edit Tugas
    public function edit($id)
    {
        $data['title'] = 'Edit Tugas';
        $data['tugas'] = $this->Tugas_model->get_by_id($id); // Ambil data tugas berdasarkan ID

        if (!$data['tugas']) {
            show_404(); // Jika tugas tidak ditemukan
        }

        if ($this->input->post()) {
            $update_data = [
                'mata_kuliah' => $this->input->post('mata_kuliah'),
                'judul' => $this->input->post('judul'),
                'deskripsi' => $this->input->post('deskripsi'),
                'deadline' => $this->input->post('deadline')
            ];

            if ($this->Tugas_model->update($id, $update_data)) {
                $this->session->set_flashdata('success', 'Tugas berhasil diperbarui.');
                redirect('dosen/tugas');
            } else {
                $this->session->set_flashdata('error', 'Gagal memperbarui tugas.');
            }
        }

        $this->load->view('layouts/main', array_merge($data, ['content' => 'dosen/tugas/edit']));
    }


    // Hapus tugas
    public function delete($id)
    {
        if ($this->Tugas_model->delete($id)) {
            $this->session->set_flashdata('success', 'Tugas berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus tugas.');
        }
        redirect('dosen/tugas');
    }
}
