<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
    }

    public function login()
    {
        if ($this->input->post()) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $this->load->model('User_model');
            $user = $this->User_model->get_by_username($username);

            if ($user) {
                if (password_verify($password, $user->password)) {
                    // Set session data
                    $session_data = [
                        'user_id' => $user->id,
                        'username' => $user->username,
                        'role' => $user->role,
                        'logged_in' => TRUE
                    ];
                    $this->session->set_userdata($session_data);

                    redirect('dashboard');
                } else {
                    $this->session->set_flashdata('error', 'Password salah!');
                    redirect('auth/login');
                }
            } else {
                $this->session->set_flashdata('error', 'Username tidak ditemukan!');
                redirect('auth/login');
            }
        }
        $this->load->view('auth/login');
    }


    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
