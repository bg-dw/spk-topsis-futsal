<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    function __construct()
    {
        //akan berjalan ketika controller Beranda di jalankan
        parent::__construct();
        $this->load->model('M_dashboard');
        $this->load->model('M_user');

        if ($this->session->userdata('ses_login') == FALSE) {
            redirect(base_url('login/')); //mengarahkan ke halaman login
        }
    }
    public function index()
    {
        $data['content'] = 'admin/V_beranda';
        $data['tot_by_pos'] = $this->M_dashboard->count_pemain_by_pos()->result();
        $data['tot_us'] = $this->M_user->count_user()->row();
        $data['turnamen'] = $this->M_dashboard->get_last_turnamen()->row();
        $this->load->view('admin/Main', $data);
    }
}
