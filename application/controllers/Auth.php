<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Login User";
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            echo $this->_login();
        }
    }
    public function register()
    {
        $this->form_validation->set_rules('fullname', 'fullname', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[5]|matches[confirm-password]');
        $this->form_validation->set_rules('confirm-password', 'password', 'required|trim|matches[password]');

        if ($this->form_validation->run() == false) {
            $data['title'] = "User Registration";
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/register');
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                "fullname" => htmlspecialchars($this->input->post('fullname', true)),
                "email" => htmlspecialchars($this->input->post('email', true)),
                "password" => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                "role_id" => 3,
                "is_active" => 1,
                "date_created" => time(),
            ];
            $this->db->insert('user', $data);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">
                    Registration success ...
            </div>'
            );
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata;
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert">
                Logout Success
        </div>'
        );
        redirect('auth');
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'name' => $user['fullname'],
                    'email' => $user['email'],
                    'is_active' => $user['is_actve'],
                    'role_id' => $user['role_id'],
                    'date_created' => $user['date_created'],
                ];
                $this->session->set_userdata($data);
                redirect('home');
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger" role="alert">
                        Email or Password Wrong !!
                </div>'
                );
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger" role="alert">
                    Email or Password Wrong !!
            </div>'
            );
            redirect('auth');
        }
    }
}
