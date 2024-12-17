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
        if ($_POST) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $user = $this->Auth_model->login($username, $password);

            if ($user) {
                $this->session->set_userdata([
                    'id' => $user->id,
                    'username' => $user->username,
                    'role' => $user->role,
                    'logged_in' => true,
                ]);
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('error', 'Username atau password salah.');
                redirect('auth/login');
            }
        } else {
            $this->load->view('auth/login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
