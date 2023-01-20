<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_club extends CI_Controller
{
    function __construct()
    {
        //akan berjalan ketika controller Beranda di jalankan
        parent::__construct();
        $this->load->model('M_club');

        if ($this->session->userdata('ses_login') == FALSE) {
            redirect(base_url('login/')); //mengarahkan ke halaman login
        }
    }

    //halaman awal club
    public function index()
    {
        $data['content'] = 'admin/club/V_club';
        $data['club'] = $this->M_club->get_data('tbl_master_tim')->result();
        $this->load->view('admin/Main', $data);
    }

    //aksi tambah club
    public function ac_add_club()
    {
        $nama = $this->input->post('nama_club');
        $pj = $this->input->post('pj');
        $nomor = $this->input->post('telp');

        $data = array(
            'nama_tim' => $nama,
            'penanggung_jawab' => $pj,
            'no_telp' => $nomor
        );

        $query = $this->M_club->input($data, 'tbl_master_tim');
        if ($query) {
            $this->session->set_flashdata('success', ' Data Berhasil Ditambahkan!');
            redirect('admin/c_club/');
        } else {
            $this->session->set_flashdata('warning', ' Gagal Menambahkan Data!');
            redirect('admin/c_club/');
        }
    }

    //aksi update club
    public function ac_update_club()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama_club');
        $pj = $this->input->post('pj');
        $nomor = $this->input->post('telp');

        $where = array(
            'id_tim' => $id
        );

        $data = array(
            'nama_tim' => $nama,
            'penanggung_jawab' => $pj,
            'no_telp' => $nomor
        );

        $query = $this->M_club->update($where, $data, 'tbl_master_tim');
        if ($query) {
            $this->session->set_flashdata('success', ' Data Berhasil Diperbaharui!');
            redirect('admin/c_club/');
        } else {
            $this->session->set_flashdata('warning', ' Gagal Memperbaharui Data!');
            redirect('admin/c_club/');
        }
    }

    //aksi delete club
    public function ac_delete_club()
    {
        $id = $this->input->post('id');

        $where = array(
            'id_tim' => $id
        );

        $query = $this->M_club->delete($where, 'tbl_master_tim');
        if ($query) {
            $this->session->set_flashdata('success', ' Data Berhasil Dihapus!');
            redirect('admin/c_club/');
        } else {
            $this->session->set_flashdata('warning', ' Gagal Menghapus Data!');
            redirect('admin/c_club/');
        }
    }
}
