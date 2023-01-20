<?php
defined('BASEPATH') or exit('No direct script access allowed');

class login extends CI_Controller
{
    function __construct()
    {
        //akan berjalan ketika controller login di jalankan
        parent::__construct();
        $this->load->model('M_login');
    }
    //halaman beranda login
    public function index()
    {
        if ($this->session->userdata('ses_login') == TRUE && $this->session->userdata('id') != '') {
            redirect('admin/dashboard/'); //mengarahkan ke halaman admin
        }
        $this->load->view('login/V_login');

        //menghancurkan/menghilangkan session yang sudah dibuat ketika login
        $this->session->sess_destroy();
    }

    //cek username dan password login
    public function auth()
    {
        $uname = $this->input->post('user');
        $pass = $this->input->post('pass');

        $query = $this->M_login->db_login($uname, $pass); //memanggil fungsi db_login dari model M_login dengan parameter $uname , $pass
        if ($query->num_rows() > 0) {
            $data = $query->row_array(); //mengambil data dengan cara membuatnya menjadi array
            $this->session->set_userdata('ses_login', TRUE); //memberikan nilai TRUE pada userdata login
            $this->session->set_userdata('user', $data['username']); //memberikan nilai yang di ambil dari databae pada userdata user
            $this->session->set_userdata('pass', $data['password']);
            $this->session->set_userdata('nama', $data['nama_user']);
            $this->session->set_userdata('id', $data['id_user']);
            redirect('admin/dashboard/');
        } else {
            $this->session->set_flashdata('warning', 'Username atau Password anda salah!'); //membuat flashdata dengan parameter warning
            redirect(base_url('login'));
        }
        redirect('login/');
    }

    //logout akun
    public function logout()
    {
        $this->session->sess_destroy(); //menghancurkan/menghilangkan session yang sudah dibuat ketika login
        redirect('login/');
    }
}
