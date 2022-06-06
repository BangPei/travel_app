<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function index()
    {
        $data['session'] = $this->session->userdata;
        $data['header'] = "List User";
        $data['title'] = "User";
        $data['users'] = $this->db->get('user')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('user/index');
        $this->load->view('templates/footer');
    }
}
