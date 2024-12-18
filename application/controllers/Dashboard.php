<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $role = $this->session->userdata('role');

        if ($role == 'admin') {
            $this->admin_dashboard();
        } elseif ($role == 'mahasiswa') {
            $this->mahasiswa_dashboard();
        } elseif ($role == 'dosen') {
            $this->dosen_dashboard();
        }
    }

    private function admin_dashboard()
    {
        // Data statistik untuk admin
        $data['title'] = 'Dashboard Admin';
        $data['jumlah_mahasiswa'] = $this->db->count_all('mahasiswa') ?? 0;
        $data['jumlah_dosen'] = $this->db->count_all('dosen') ?? 0;
        $data['jumlah_mata_kuliah'] = $this->db->count_all('mata_kuliah') ?? 0;

        // Oper data langsung ke layout dan content
        $this->load->view('layouts/main', $data + ['content' => 'dashboard/admin']);
    }


    private function mahasiswa_dashboard()
    {
        // Data jadwal kuliah dan pengumuman untuk mahasiswa
        $data['title'] = 'Dashboard Mahasiswa';
        $data['jadwal_kuliah'] = $this->db->get_where('jadwal_kuliah', [
            'mahasiswa_id' => $this->session->userdata('id')
        ])->result();
        $data['pengumuman'] = $this->db->get('pengumuman')->result();

        // Oper data langsung ke layout dan content
        $this->load->view('layouts/main', $data + ['content' => 'dashboard/mahasiswa']);
    }

    private function dosen_dashboard()
    {
        // Data jadwal mengajar dan tugas untuk dosen
        $data['title'] = 'Dashboard Dosen';
        // $data['jadwal_mengajar'] = $this->db->get_where('jadwal_mengajar', [
        //     'dosen_id' => $this->session->userdata('id')
        // ])->result();
        $data['pengumuman'] = $this->db->get('pengumuman')->result();

        // Oper data langsung ke layout dan content
        $this->load->view('layouts/main', $data + ['content' => 'dashboard/dosen']);
    }
}
