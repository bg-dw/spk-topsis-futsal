<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_turnamen extends CI_Controller
{
    function __construct()
    {
        //akan berjalan ketika controller Beranda di jalankan
        parent::__construct();
        $this->load->model('M_turnamen');

        if ($this->session->userdata('ses_login') == FALSE) {
            redirect(base_url('login/')); //mengarahkan ke halaman login
        }
    }

    //halaman awal turnamen
    public function index()
    {
        $data['content'] = 'admin/turnamen/V_turnamen';
        $data['turnamen'] = $this->M_turnamen->get_data('tbl_turnamen')->result();
        $this->load->view('admin/Main', $data);
    }

    //aksi tambah turnamen
    public function ac_add_turnamen()
    {
        $nama = $this->input->post('nama_turnamen');
        $tgl = $this->input->post('tgl_turnamen');

        $data = array(
            'nama_turnamen' => $nama,
            'tgl_turnamen' => date("Y-m-d", strtotime($tgl)) //konversi tgl input k format tgl database(yyyy/mm/dd)
        );

        $query = $this->M_turnamen->input($data, 'tbl_turnamen');
        if ($query) {
            $this->session->set_flashdata('success', ' Data Berhasil Ditambahkan!');
            redirect('admin/c_turnamen/');
        } else {
            $this->session->set_flashdata('warning', ' Gagal Menambahkan Data!');
            redirect('admin/c_turnamen/');
        }
    }

    //aksi update turnamen
    public function ac_update_turnamen()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama_turnamen');
        $tgl = $this->input->post('tgl_turnamen');

        $where = array(
            'id_turnamen' => $id
        );

        $data = array(
            'nama_turnamen' => $nama,
            'tgl_turnamen' => date("Y-m-d", strtotime($tgl)) //konversi tgl input k format tgl database(yyyy/mm/dd)
        );

        $query = $this->M_turnamen->update($where, $data, 'tbl_turnamen');
        if ($query) {
            $this->session->set_flashdata('success', ' Data Berhasil Diperbaharui!');
            redirect('admin/c_turnamen/');
        } else {
            $this->session->set_flashdata('warning', ' Gagal Memperbaharui Data!');
            redirect('admin/c_turnamen/');
        }
    }

    //aksi delete turnamen
    public function ac_delete_turnamen()
    {
        $id = $this->input->post('id');

        $where = array(
            'id_turnamen' => $id
        );

        $query = $this->M_turnamen->delete($where, 'tbl_turnamen');
        if ($query) {
            $this->session->set_flashdata('success', ' Data Berhasil Dihapus!');
            redirect('admin/c_turnamen/');
        } else {
            $this->session->set_flashdata('warning', ' Gagal Menghapus Data!');
            redirect('admin/c_turnamen/');
        }
    }
}
