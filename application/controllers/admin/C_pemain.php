<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_pemain extends CI_Controller
{
    function __construct()
    {
        //akan berjalan ketika controller Beranda di jalankan
        parent::__construct();
        $this->load->model('M_club');
        $this->load->model('M_pemain');

        if ($this->session->userdata('ses_login') == FALSE) {
            redirect(base_url('login/')); //mengarahkan ke halaman login
        }
    }

    //halaman awal pemain
    public function index()
    {
        $data['content'] = 'admin/pemain/V_pemain';
        $data['club'] = $this->M_club->get_data('tbl_master_tim')->result();
        $data['pemain'] = $this->M_pemain->pemain_join_tim()->result();
        $this->load->view('admin/Main', $data);
    }

    //aksi tambah pemain
    public function ac_add_pemain()
    {
        $tim = $this->input->post('tim');
        $nama = $this->input->post('nama_pemain');
        $posisi = $this->input->post('posisi');
        $np = $this->input->post('nomor');

        $data = array(
            'id_tim' => $tim,
            'nama' => $nama,
            'posisi' => $posisi,
            'no_punggung' => $np
        );

        $query = $this->M_pemain->input($data, 'tbl_pemain');
        if ($query) {
            $this->session->set_flashdata('success', ' Data Berhasil Ditambahkan!');
            redirect('admin/c_pemain/');
        } else {
            $this->session->set_flashdata('warning', ' Gagal Menambahkan Data!');
            redirect('admin/c_pemain/');
        }
    }

    //aksi update pemain
    public function ac_update_pemain()
    {
        $id = $this->input->post('id');
        $tim = $this->input->post('tim');
        $nama = $this->input->post('nama_pemain');
        $posisi = $this->input->post('posisi');
        $np = $this->input->post('nomor');

        $where = array(
            'id_pemain' => $id
        );

        $data = array(
            'id_tim' => $tim,
            'nama' => $nama,
            'posisi' => $posisi,
            'no_punggung' => $np
        );

        $query = $this->M_pemain->update($where, $data, 'tbl_pemain');
        if ($query) {
            $this->session->set_flashdata('success', ' Data Berhasil Diperbaharui!');
            redirect('admin/c_pemain/');
        } else {
            $this->session->set_flashdata('warning', ' Gagal Memperbaharui Data!');
            redirect('admin/c_pemain/');
        }
    }

    //aksi delete pemain
    public function ac_delete_pemain()
    {
        $id = $this->input->post('id');

        $where = array(
            'id_pemain' => $id
        );

        $query = $this->M_pemain->delete($where, 'tbl_pemain');
        if ($query) {
            $this->session->set_flashdata('success', ' Data Berhasil Dihapus!');
            redirect('admin/c_pemain/');
        } else {
            $this->session->set_flashdata('warning', ' Gagal Menghapus Data!');
            redirect('admin/c_pemain/');
        }
    }
}
