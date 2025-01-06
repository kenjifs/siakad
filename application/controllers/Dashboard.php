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
        $mahasiswa_id = $this->session->userdata('user_id'); // Ambil ID mahasiswa dari session
        if (!$mahasiswa_id) {
            show_error('ID mahasiswa tidak ditemukan di session.');
        }

        // Data untuk dashboard mahasiswa
        $data['title'] = 'Dashboard Mahasiswa';
        $data['jadwal_kuliah'] = $this->db->get_where('jadwal_kuliah', [
            'mahasiswa_id' => $mahasiswa_id
        ])->result();

        $data['pengumuman'] = $this->db->order_by('tanggal', 'DESC')->get('pengumuman')->result();

        // Ambil data nilai mahasiswa
        $this->load->model('Nilai_model');
        $data['nilai'] = $this->Nilai_model->get_by_mahasiswa($mahasiswa_id);

        // Oper data langsung ke layout dan content
        $this->load->view('layouts/main', $data + ['content' => 'dashboard/mahasiswa']);
    }


    private function dosen_dashboard()
    {
        $dosen_id = $this->session->userdata('user_id'); // Ambil ID dosen dari session
        if (!$dosen_id) {
            show_error('ID dosen tidak ditemukan di session.');
        }

        // Ambil data untuk dashboard dosen
        $this->load->model('Pengumuman_model');
        $this->load->model('JadwalMengajar_model');
        $this->load->model('Tugas_model');

        $data['title'] = 'Dashboard Dosen';
        $data['pengumuman'] = $this->Pengumuman_model->get_all(); // Ambil semua pengumuman
        $data['jadwal_mengajar'] = $this->JadwalMengajar_model->get_by_dosen($dosen_id); // Ambil jadwal mengajar
        $data['tugas'] = $this->Tugas_model->get_by_dosen($dosen_id); // Ambil tugas dosen

        // Tampilkan view
        $this->load->view('layouts/main', array_merge($data, ['content' => 'dashboard/dosen']));
    }
}
