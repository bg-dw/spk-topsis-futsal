<?php
defined('BASEPATH') or exit('No direct script access allowed');

class About extends CI_Controller
{
    function __construct()
    {
        //akan berjalan ketika controller Beranda di jalankan
        parent::__construct();
    }
    public function index()
    {
        $data['content'] = 'admin/V_about';
        $this->load->view('admin/Main', $data);
    }
}
