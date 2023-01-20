<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_pertandingan extends CI_Controller
{
    function __construct()
    {
        //akan berjalan ketika controller Beranda di jalankan
        parent::__construct();
        $this->load->model('M_turnamen');
        $this->load->model('M_club');
        $this->load->model('M_pertandingan');
        $this->load->model('M_kriteria');

        if ($this->session->userdata('ses_login') == FALSE) {
            redirect(base_url('login/')); //mengarahkan ke halaman login
        }
    }

    //halaman awal pertandingan
    public function index()
    {
        $data['content'] = 'admin/pertandingan/V_pertandingan'; //file dari folder views
        $data['club'] = $this->M_club->get_data('tbl_master_tim')->result();
        $data['turnamen'] = $this->M_turnamen->get_data('tbl_turnamen')->result();
        $data['pertandingan'] = $this->M_pertandingan->pertandingan_join_turnamen()->result();
        $this->load->view('admin/Main', $data);
    }

    //aksi tambah pertandingan
    public function ac_add_pertandingan()
    {
        $id = $this->input->post('id_turnamen');
        $tgl = $this->input->post('tgl');
        $timA = $this->input->post('tim_a');
        $timB = $this->input->post('tim_b');

        $waktu = explode(" ", $tgl);
        $data = array(
            'id_turnamen' => $id,
            'tim_satu' => $timA,
            'tim_dua' => $timB,
            'tgl_pertandingan' => date("Y-m-d", strtotime($waktu[0])),
            'jam_pertandingan' => $waktu[1]
        );

        $query = $this->M_pertandingan->input($data, 'tbl_pertandingan');
        if ($query) {
            $this->session->set_flashdata('success', ' Data Berhasil Ditambahkan!');
            redirect('admin/c_pertandingan/');
        } else {
            $this->session->set_flashdata('warning', ' Gagal Menambahkan Data!');
            redirect('admin/c_pertandingan/');
        }
    }

    //aksi update pertandingan
    public function ac_update_pertandingan()
    {
        $id = $this->input->post('id');
        $tgl = $this->input->post('tgl');
        $timA = $this->input->post('tim_a');
        $timB = $this->input->post('tim_b');

        $waktu = explode(" ", $tgl);
        $data = array(
            'tim_satu' => $timA,
            'tim_dua' => $timB,
            'tgl_pertandingan' => date("Y-m-d", strtotime($waktu[0])),
            'jam_pertandingan' => $waktu[1]
        );

        $where = array(
            'id_pertandingan' => $id
        );

        $query = $this->M_pertandingan->update($where, $data, 'tbl_pertandingan');
        if ($query) {
            $this->session->set_flashdata('success', ' Data Berhasil Diperbaharui!');
            redirect('admin/c_pertandingan/');
        } else {
            $this->session->set_flashdata('warning', ' Gagal Memperbaharui Data!');
            redirect('admin/c_pertandingan/');
        }
    }

    //aksi delete pertandingan
    public function ac_delete_pertandingan()
    {
        $id = $this->input->post('id');

        $where = array(
            'id_pertandingan' => $id
        );

        $query = $this->M_pertandingan->delete($where, 'tbl_pertandingan');
        if ($query) {
            $this->session->set_flashdata('success', ' Data Berhasil Dihapus!');
            redirect('admin/c_pertandingan/');
        } else {
            $this->session->set_flashdata('warning', ' Gagal Menghapus Data!');
            redirect('admin/c_pertandingan/');
        }
    }

    //halaman mulai pertandingan
    public function mulai($id_turnamen, $id_pertandingan, $id_tim_a, $id_tim_b)
    {
        $data['content'] = 'admin/pertandingan/V_mulai_pertandingan'; //file dari folder views
        $data['club'] = $this->M_club->get_data('tbl_master_tim')->result();
        $data['turnamen'] = $this->M_turnamen->get_data('tbl_turnamen')->result();
        $data['pertandingan'] = $this->M_pertandingan->pertandingan_join_turnamen()->result();
        $data['id_pertandingan'] = $id_pertandingan;
        $where_a = array(
            'tbl_pemain.id_tim' => $id_tim_a
        );
        $data['tim_a'] = $this->M_pertandingan->get_pertandingan($where_a)->result();
        $where_b = array(
            'tbl_pemain.id_tim' => $id_tim_b
        );
        $data['tim_b'] = $this->M_pertandingan->get_pertandingan($where_b)->result();
        $data['kriteria_non'] = $this->M_pertandingan->kriteria_join_turnamen($id_turnamen, "NON-GK")->result();
        $data['kriteria_gk'] = $this->M_pertandingan->kriteria_join_turnamen($id_turnamen, "GK")->result();
        $this->load->view('admin/Main', $data);
    }

    //aksi tambah statistik
    public function ac_add_statistik()
    {
        $id = $this->input->post('id_pertandingan');
        $skor_a = $this->input->post('skorA');
        $skor_b = $this->input->post('skorB');
        $id_pem = $this->input->post('id_pemain');
        $id_tim = $this->input->post('id_tim');
        $id_k = $this->input->post('id_kriteria');
        $nilai = $this->input->post('nilai');

        $arr = array(
            'id_pertandingan' => '',
            'id_pemain' => '',
            'id_tim' => '',
            'id_kriteria_turnamen' => '',
            'nilai' => ''
        ); //array dummy

        for ($i = 0; $i < count($id_pem); $i++) { //jumlah id_pemain x jumalh kriteria
            // echo $id_pem[$i] . "=";
            $isi = array(
                'id_pertandingan' => $id,
                'id_pemain' => $id_pem[$i],
                'id_tim' => $id_tim[$i],
                'id_kriteria_turnamen' => $id_k[$i],
                'nilai' => $nilai[$i]
            );
            array_push($arr, $isi); //menggabungkan array menjadi 2 dimensi
        }
        $data = array_filter($arr); //menghapus array tanpa isi(array dummy)

        $where = array(
            'id_pertandingan' => $id
        );
        $skor = array(
            'skor' => $skor_a . " - " . $skor_b
        );

        $this->M_pertandingan->update($where, $skor, 'tbl_pertandingan'); //update skor
        $query = $this->M_pertandingan->input_batch($data, 'tbl_detail_pertandingan');
        if ($query) {
            $this->session->set_flashdata('success', ' Data Berhasil Ditambahkan!');
            redirect('admin/c_pertandingan/daftar_detail_pertandingan/');
        } else {
            $this->session->set_flashdata('warning', ' Gagal Menambahkan Data!');
            redirect('admin/c_pertandingan/');
        }
    }

    //halaman detail pertandingan
    public function daftar_detail_pertandingan()
    {
        $data['content'] = 'admin/pertandingan/V_daftar_detail_pertandingan'; //file dari folder views
        $data['club'] = $this->M_club->get_data('tbl_master_tim')->result();
        $data['pertandingan'] = $this->M_pertandingan->pertandingan_join_turnamen()->result();
        $this->load->view('admin/Main', $data);
    }

    //halaman edit detail pertandingan
    public function edit_detail_pertandingan($id_turnamen, $id_pertandingan, $id_tim_a, $id_tim_b)
    {
        $data['content'] = 'admin/pertandingan/V_edit_detail_pertandingan'; //file dari folder views
        $data['id_pertandingan'] = $id_pertandingan;
        $where_a = array(
            'tbl_pemain.id_tim' => $id_tim_a
        );
        $data['tim_a'] = $this->M_pertandingan->get_pertandingan($where_a)->result();
        $where_b = array(
            'tbl_pemain.id_tim' => $id_tim_b
        );
        $data['tim_b'] = $this->M_pertandingan->get_pertandingan($where_b)->result();
        $data['kriteria_non'] = $this->M_pertandingan->kriteria_join_turnamen($id_turnamen, "NON-GK")->result();
        $data['kriteria_gk'] = $this->M_pertandingan->kriteria_join_turnamen($id_turnamen, "GK")->result();
        $data['detail'] = $this->M_pertandingan->detail_pertandingan($id_pertandingan)->result();
        $this->load->view('admin/Main', $data);
    }

    //aksi update statistik
    public function ac_update_statistik()
    {
        $id = $this->input->post('id_pertandingan');
        $id_detail = $this->input->post('id_detail');
        $skor_a = $this->input->post('skorA');
        $skor_b = $this->input->post('skorB');
        $nilai = $this->input->post('nilai');

        $arr = array(
            'id_detail_pertandingan' => '',
            'nilai' => ''
        ); //array dummy

        for ($i = 0; $i < count($id_detail); $i++) { //jumlah id_pemain x jumalh kriteria
            // echo $id_pem[$i] . "=";
            $isi = array(
                'id_detail_pertandingan' => $id_detail[$i],
                'nilai' => $nilai[$i]
            );
            array_push($arr, $isi); //menggabungkan array menjadi 2 dimensi
        }
        $data = array_filter($arr); //menghapus array tanpa isi(array dummy)

        $where = array(
            'id_pertandingan' => $id
        );
        $skor = array(
            'skor' => $skor_a . " - " . $skor_b
        );

        $this->M_pertandingan->update($where, $skor, 'tbl_pertandingan'); //update skor
        $query = $this->M_pertandingan->update_batch('id_detail_pertandingan', $data, 'tbl_detail_pertandingan');
        if ($query) {
            $this->session->set_flashdata('success', ' Data Berhasil Ditambahkan!');
            redirect('admin/c_pertandingan/daftar_detail_pertandingan/');
        } else {
            $this->session->set_flashdata('warning', ' Gagal Menambahkan Data!');
            redirect('admin/c_pertandingan/');
        }
    }

    //aksi delete detail pertandingan
    public function ac_delete_detail_pertandingan($id)
    {
        $where = array(
            'id_pertandingan' => $id
        );

        $query = $this->M_pertandingan->delete($where, 'tbl_pertandingan');
        if ($query) {
            $this->session->set_flashdata('success', ' Data Berhasil Dihapus!');
            redirect('admin/c_pertandingan/daftar_detail_pertandingan/');
        } else {
            $this->session->set_flashdata('warning', ' Gagal Menghapus Data!');
            redirect('admin/c_pertandingan/daftar_detail_pertandingan/');
        }
    }

    //halaman lihat detail pertandingan
    public function lihat_detail_pertandingan($id_turnamen, $id_pertandingan, $id_tim_a, $id_tim_b)
    {
        $data['content'] = 'admin/pertandingan/V_lihat_detail_pertandingan'; //file dari folder views
        $data['id_pertandingan'] = $id_pertandingan;
        $where_a = array(
            'tbl_pemain.id_tim' => $id_tim_a
        );
        $data['tim_a'] = $this->M_pertandingan->get_pertandingan($where_a)->result();
        $where_b = array(
            'tbl_pemain.id_tim' => $id_tim_b
        );
        $data['tim_b'] = $this->M_pertandingan->get_pertandingan($where_b)->result();
        $data['kriteria_non'] = $this->M_pertandingan->kriteria_join_turnamen($id_turnamen, "NON-GK")->result();
        $data['kriteria_gk'] = $this->M_pertandingan->kriteria_join_turnamen($id_turnamen, "GK")->result();
        $data['detail'] = $this->M_pertandingan->detail_pertandingan($id_pertandingan)->result();
        $this->load->view('admin/Main', $data);
    }
}
