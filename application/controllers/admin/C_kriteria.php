<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_kriteria extends CI_Controller
{
    function __construct()
    {
        //akan berjalan ketika controller Beranda di jalankan
        parent::__construct();
        $this->load->model('M_kriteria');
        $this->load->model('M_turnamen');

        if ($this->session->userdata('ses_login') == FALSE) {
            redirect(base_url('login/')); //mengarahkan ke halaman login
        }
    }

    //halaman awal kriteria
    public function index()
    {
        $data['content'] = 'admin/kriteria/V_kriteria';
        $data['kriteria'] = $this->M_kriteria->get_data('tbl_master_kriteria')->result();
        $data['turnamen'] = $this->M_turnamen->get_data('tbl_turnamen')->result();
        $this->load->view('admin/Main', $data);
    }

    //aksi tambah kriteria
    public function ac_add_kriteria()
    {
        $nama = $this->input->post('nama_kriteria');
        $pos = $this->input->post('posisi');
        $tipe = $this->input->post('tipe');

        $data = array(
            'nama_kriteria' => $nama,
            'posisi_kriteria' => $pos,
            'tipe_kriteria' => $tipe
        );

        $query = $this->M_kriteria->input($data, 'tbl_master_Kriteria');
        if ($query) {
            $this->session->set_flashdata('success', ' Data Berhasil Ditambahkan!');
            redirect('admin/c_kriteria/');
        } else {
            $this->session->set_flashdata('warning', ' Gagal Menambahkan Data!');
            redirect('admin/c_kriteria/');
        }
    }

    //aksi update kriteria
    public function ac_update_kriteria()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama_kriteria');
        $pos = $this->input->post('posisi');
        $tipe = $this->input->post('tipe');

        $where = array(
            'id_kriteria' => $id
        );

        $data = array(
            'nama_kriteria' => $nama,
            'posisi_kriteria' => $pos,
            'tipe_kriteria' => $tipe
        );

        $query = $this->M_kriteria->update($where, $data, 'tbl_master_kriteria');
        if ($query) {
            $this->session->set_flashdata('success', ' Data Berhasil Diperbaharui!');
            redirect('admin/c_kriteria/');
        } else {
            $this->session->set_flashdata('warning', ' Gagal Memperbaharui Data!');
            redirect('admin/c_kriteria/');
        }
    }

    //aksi delete kriteria
    public function ac_delete_kriteria()
    {
        $id = $this->input->post('id');

        $where = array(
            'id_kriteria' => $id
        );

        $query = $this->M_kriteria->delete($where, 'tbl_master_kriteria');
        if ($query) {
            $this->session->set_flashdata('success', ' Data Berhasil Dihapus!');
            redirect('admin/c_kriteria/');
        } else {
            $this->session->set_flashdata('warning', ' Gagal Menghapus Data!');
            redirect('admin/c_kriteria/');
        }
    }

    //halaman tambah kriteria turnamen
    public function add_turnamen_kriteria()
    {
        $data['content'] = 'admin/kriteria/V_add_turnamen_kriteria';
        $data['turnamen'] = $this->M_turnamen->get_data('tbl_turnamen')->result();

        $where = array(
            'posisi_kriteria' => 'GK'
        );
        $data['gk'] = $this->M_kriteria->get_where($where, 'tbl_master_kriteria')->result();

        $where2 = array(
            'posisi_kriteria' => 'NON-GK'
        );
        $data['non_gk'] = $this->M_kriteria->get_where($where2, 'tbl_master_kriteria')->result();
        $this->load->view('admin/Main', $data);
    }

    //aksi tambah kriteria turnamen
    public function ac_add_kt_turnamen()
    {
        $id_t = $this->input->post('id_turnamen');
        $kt_non = $this->input->post('kt-non');
        $bbt_non = $this->input->post('bbt-non');
        $kt_gk = $this->input->post('kt-gk');
        $bbt_gk = $this->input->post('bbt-gk');
        // var_dump($bbt_non);

        $arr = array(
            'id_turnamen' => '',
            'id_kriteria' => '',
            'bobot' => ''
        ); //array dummy

        if (count($kt_non) >= 2 && count($kt_gk) >= 2) {
            $id_k = array_merge($kt_non, $kt_gk); //menggabungkan array
            $bbt = array_filter(array_merge($bbt_non, $bbt_gk)); //menggabungkan array dan menghapus array dengan nilai 0
            $bobot = array_values($bbt); //reindex array

            for ($i = 0; $i < count($id_k); $i++) {
                $isi = array(
                    'id_turnamen' => $id_t,
                    'id_kriteria' => $id_k[$i],
                    'bobot' => $bobot[$i]
                );
                array_push($arr, $isi); //menggabungkan array menjadi 2 dimensi
            }
            $data = array_filter($arr); //menghapus array tanpa isi(array dummy)

            $query = $this->M_kriteria->input_batch($data, 'tbl_kriteria_turnamen');
            if ($query) {
                $this->session->set_flashdata('success', ' Data Berhasil Ditambahkan!');
                redirect('admin/c_kriteria/');
            } else {
                $this->session->set_flashdata('warning', ' Gagal Menambahkan Data!');
                redirect('admin/c_kriteria/add_turnamen_kriteria/');
            }
        } else {
            $this->session->set_flashdata('warning', ' Harap pilih minimal 2 kriteria, pada masing - masing Posisi!');
            redirect('admin/c_kriteria/add_turnamen_kriteria/');
        }
    }

    //halaman edit kriteria turnamen
    public function edit_turnamen_kriteria($id_turnamen)
    {
        $data['content'] = 'admin/kriteria/V_edit_turnamen_kriteria';

        $data['turnamen'] = $this->M_turnamen->get_data('tbl_turnamen')->result();
        $where = array(
            'posisi_kriteria' => 'GK'
        );
        $data['gk'] = $this->M_kriteria->get_where($where, 'tbl_master_kriteria')->result();

        $where2 = array(
            'posisi_kriteria' => 'NON-GK'
        );
        $data['non_gk'] = $this->M_kriteria->get_where($where2, 'tbl_master_kriteria')->result();

        $data['terpilih'] = $this->M_kriteria->kriteria_join_turnamen($id_turnamen)->result();

        $this->load->view('admin/Main', $data);
    }

    //aksi update kriteria turnamen
    public function ac_update_kt_turnamen()
    {
        $id_t = $this->input->post('id_turnamen');
        $kt_non = $this->input->post('kt-non');
        $bbt_non = $this->input->post('bbt-non');
        $kt_gk = $this->input->post('kt-gk');
        $bbt_gk = $this->input->post('bbt-gk');

        $arr = array(
            'id_turnamen' => '',
            'id_kriteria' => '',
            'bobot' => ''
        ); //array dummy

        if (count($kt_non) >= 2 && count($kt_gk) >= 2) {
            $id_k = array_merge($kt_non, $kt_gk); //menggabungkan array
            $bbt = array_filter(array_merge($bbt_non, $bbt_gk)); //menggabungkan array dan menghapus array dengan nilai 0
            $bobot = array_values($bbt); //reindex array

            for ($i = 0; $i < count($id_k); $i++) {
                $isi = array(
                    'id_turnamen' => $id_t,
                    'id_kriteria' => $id_k[$i],
                    'bobot' => $bobot[$i]
                );
                array_push($arr, $isi); //menggabungkan array menjadi 2 dimensi
            }
            $data = array_filter($arr); //menghapus array tanpa isi(array dummy)

            $where = array(
                'id_turnamen' => $id_t
            );

            $this->M_kriteria->delete($where, 'tbl_kriteria_turnamen');

            $query = $this->M_kriteria->input_batch($data, 'tbl_kriteria_turnamen');
            if ($query) {
                $this->session->set_flashdata('success', ' Data Berhasil Diperbaharui!');
                redirect('admin/c_kriteria/');
            } else {
                $this->session->set_flashdata('warning', ' Gagal Memperbaharui Data!');
                redirect('admin/c_kriteria/edit_turnamen_kriteria/' . $id_t);
            }
        } else {
            $this->session->set_flashdata('warning', ' Harap pilih minimal 2 kriteria, pada masing - masing Posisi!');
            redirect('admin/c_kriteria/edit_turnamen_kriteria/' . $id_t);
        }
    }

    //halaman view kriteria turnamen
    public function view_turnamen_kriteria($id_turnamen)
    {
        $data['content'] = 'admin/kriteria/V_view_turnamen_kriteria';

        $data['turnamen'] = $this->M_turnamen->get_data('tbl_turnamen')->result();
        $where = array(
            'posisi_kriteria' => 'GK'
        );
        $data['gk'] = $this->M_kriteria->get_where($where, 'tbl_master_kriteria')->result();

        $where2 = array(
            'posisi_kriteria' => 'NON-GK'
        );
        $data['non_gk'] = $this->M_kriteria->get_where($where2, 'tbl_master_kriteria')->result();

        $data['terpilih'] = $this->M_kriteria->kriteria_join_turnamen($id_turnamen)->result();

        $this->load->view('admin/Main', $data);
    }
}
