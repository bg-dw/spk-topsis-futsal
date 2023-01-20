<?php
class M_perangkingan extends CI_Model
{
    //mengambil data dari database
    function get_data($table)
    {
        $this->db->select('*'); //mengambil semua data
        $this->db->from($table); //dari table
        $query = $this->db->get(); //eksekusi query
        return $query; //mengembalikan nilai yang didapat
    }

    //mengambil data berdasarkakn kondisi
    function get_where($where, $table)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where); //kondisi yang diinginkan
        $query = $this->db->get();
        return $query;
    }
    function pemain_statistik($id, $pos)
    {
        $this->db->query('SET SESSION sql_mode = ""'); //disable sql_mode=only_full_group_by
        $this->db->select('tbl_pemain.id_pemain,tbl_pemain.nama,tbl_pemain.no_punggung,tbl_master_tim.nama_tim');
        $this->db->from('tbl_detail_pertandingan');
        $this->db->join('tbl_pemain', 'tbl_detail_pertandingan.id_pemain=tbl_pemain.id_pemain');
        $this->db->join('tbl_master_tim', 'tbl_detail_pertandingan.id_tim=tbl_master_tim.id_tim');
        $this->db->join('tbl_kriteria_turnamen', 'tbl_detail_pertandingan.id_kriteria_turnamen=tbl_kriteria_turnamen.id_kriteria_turnamen');
        $this->db->join('tbl_master_kriteria', 'tbl_kriteria_turnamen.id_kriteria=tbl_master_kriteria.id_kriteria');
        $this->db->where('tbl_kriteria_turnamen.id_turnamen="' . $id . '"');
        $this->db->where('tbl_master_kriteria.posisi_kriteria="' . $pos . '"');
        $this->db->group_by('tbl_detail_pertandingan.id_pemain');
        $query = $this->db->get(); //eksekusi query
        return $query; //mengembalikan nilai yang didapat
    }

    function get_statistik($id, $pos)
    {
        $this->db->select('
        tbl_pemain.id_pemain,tbl_pemain.nama,
        tbl_master_kriteria.*,
        tbl_kriteria_turnamen.bobot,
        tbl_detail_pertandingan.nilai');
        $this->db->from('tbl_detail_pertandingan');
        // $this->db->join('tbl_pertandingan', 'tbl_detail_pertandingan.id_pertandingan=tbl_pertandingan.id_pertandingan');
        $this->db->join('tbl_pemain', 'tbl_detail_pertandingan.id_pemain=tbl_pemain.id_pemain');
        // $this->db->join('tbl_master_tim', 'tbl_detail_pertandingan.id_tim=tbl_master_tim.id_tim');
        $this->db->join('tbl_kriteria_turnamen', 'tbl_detail_pertandingan.id_kriteria_turnamen=tbl_kriteria_turnamen.id_kriteria_turnamen');
        $this->db->join('tbl_master_kriteria', 'tbl_kriteria_turnamen.id_kriteria=tbl_master_kriteria.id_kriteria');
        $this->db->where('tbl_kriteria_turnamen.id_turnamen="' . $id . '"');
        $this->db->where('tbl_master_kriteria.posisi_kriteria="' . $pos . '"');
        $query = $this->db->get(); //eksekusi query
        return $query; //mengembalikan nilai yang didapat
    }
}
