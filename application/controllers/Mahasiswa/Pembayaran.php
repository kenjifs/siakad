<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tagihan_model');
        $this->load->model('Pembayaran_model');
        $this->load->library('upload');
        if ($this->session->userdata('role') != 'mahasiswa') {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $mahasiswa_id = $this->session->userdata('user_id');
        $data['title'] = 'Pembayaran Mahasiswa';
        $data['tagihan'] = $this->Tagihan_model->get_tagihan_by_mahasiswa($mahasiswa_id);

        $this->load->view('layouts/main', array_merge($data, ['content' => 'mahasiswa/pembayaran']));
    }

    public function upload_bukti()
    {
        $tagihan_id = $this->input->post('tagihan_id');

        // Konfigurasi upload file
        $config['upload_path']   = './uploads/bukti_pembayaran/';
        $config['allowed_types'] = 'jpg|jpeg|png|pdf';
        $config['max_size']      = 2048; // Maksimal 2MB
        $config['file_name']     = 'bukti_' . time();

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('bukti_pembayaran')) {
            $this->session->set_flashdata('error', $this->upload->display_errors());
        } else {
            $upload_data = $this->upload->data();
            $data = [
                'tagihan_id' => $tagihan_id,
                'bukti_pembayaran' => $upload_data['file_name']
            ];

            $this->Pembayaran_model->insert($data);
            $this->Tagihan_model->update_status($tagihan_id, 'menunggu verifikasi');
            $this->session->set_flashdata('success', 'Bukti pembayaran berhasil diunggah!');
        }

        redirect('mahasiswa/pembayaran');
    }
}
