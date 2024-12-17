<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pembayaran_model');
    }

    // Menampilkan status pembayaran
    public function index()
    {
        $data['title'] = 'Status Pembayaran';
        $data['tagihan'] = $this->Pembayaran_model->get_all_tagihan();

        $this->load->view('layouts/main', array_merge($data, ['content' => 'admin/pembayaran/index']));
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Pembayaran';

        // Ambil detail tagihan berdasarkan ID
        $data['tagihan'] = $this->Pembayaran_model->get_by_id($id);

        // Ambil bukti pembayaran terkait
        $data['bukti'] = $this->Pembayaran_model->get_bukti_pembayaran($id);

        if (!$data['tagihan']) {
            $this->session->set_flashdata('error', 'Data tagihan tidak ditemukan.');
            redirect('admin/pembayaran');
        }

        $this->load->view('layouts/main', array_merge($data, ['content' => 'admin/pembayaran/detail']));
    }

    public function verifikasi($id)
    {
        // Ubah status pembayaran menjadi "lunas"
        $this->Pembayaran_model->update_status_pembayaran($id, 'lunas');
        $this->session->set_flashdata('success', 'Pembayaran berhasil diverifikasi menjadi lunas.');
        redirect('admin/pembayaran');
    }
}
