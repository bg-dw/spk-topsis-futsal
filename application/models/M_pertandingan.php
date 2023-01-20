<?php
class M_pertandingan extends CI_Model
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

    //menyimpan data kedalam database
    public function input($data, $table) //$data dan $table merupakan variable yang dikirim dari controller
    {
        $query = $this->db->insert($table, $data); //bagian ini merupakan query builder bawaan codeigniter
        return $query;
    }

    public function input_batch($data, $table)
    {
        $query = $this->db->insert_batch($table, $data); //insert banyak data dalam 1 kali eksekusi query
        return $query;
    }

    function update($where, $data, $table)
    {
        $this->db->where($where);
        $query = $this->db->update($table, $data);
        return $query;
    }

    function update_batch($where, $data, $table)
    {
        $query = $this->db->update_batch($table, $data, $where);
        return $query;
    }

    function delete($where, $table)
    {
        $this->db->where($where);
        $hasil = $this->db->delete($table);
        return $hasil;
    }

    function pertandingan_join_turnamen()
    {
        $this->db->select('tbl_pertandingan.*,tbl_turnamen.*');
        $this->db->from('tbl_pertandingan');
        $this->db->join('tbl_turnamen', 'tbl_pertandingan.id_turnamen=tbl_turnamen.id_turnamen');
        $query = $this->db->get(); //eksekusi query
        return $query; //mengembalikan nilai yang didapat
    }

    function get_pertandingan($where)
    {
        $this->db->select('tbl_pemain.*,tbl_master_tim.nama_tim');
        $this->db->from('tbl_pemain');
        $this->db->join('tbl_master_tim', 'tbl_pemain.id_tim=tbl_master_tim.id_tim');
        $this->db->where($where);
        $query = $this->db->get(); //eksekusi query
        return $query; //mengembalikan nilai yang didapat
    }

    function kriteria_join_turnamen($id, $pos)
    {
        $this->db->select('tbl_kriteria_turnamen.*,tbl_turnamen.*,tbl_master_kriteria.*');
        $this->db->from('tbl_kriteria_turnamen');
        $this->db->join('tbl_turnamen', 'tbl_kriteria_turnamen.id_turnamen=tbl_turnamen.id_turnamen');
        $this->db->join('tbl_master_kriteria', 'tbl_kriteria_turnamen.id_kriteria=tbl_master_kriteria.id_kriteria');
        $this->db->where('tbl_kriteria_turnamen.id_turnamen="' . $id . '" and tbl_master_kriteria.posisi_kriteria="' . $pos . '"');
        $query = $this->db->get(); //eksekusi query
        return $query; //mengembalikan nilai yang didapat
    }

    function detail_pertandingan($id)
    {
        $this->db->select('
        tbl_detail_pertandingan.*,
        tbl_pertandingan.id_pertandingan,
        tbl_pemain.*,
        tbl_master_tim.nama_tim,
        tbl_master_kriteria.nama_kriteria');
        $this->db->from('tbl_detail_pertandingan');
        $this->db->join('tbl_pertandingan', 'tbl_detail_pertandingan.id_pertandingan=tbl_pertandingan.id_pertandingan');
        $this->db->join('tbl_pemain', 'tbl_detail_pertandingan.id_pemain=tbl_pemain.id_pemain');
        $this->db->join('tbl_master_tim', 'tbl_detail_pertandingan.id_tim=tbl_master_tim.id_tim');
        $this->db->join('tbl_kriteria_turnamen', 'tbl_detail_pertandingan.id_kriteria_turnamen=tbl_kriteria_turnamen.id_kriteria_turnamen');
        $this->db->join('tbl_master_kriteria', 'tbl_kriteria_turnamen.id_kriteria=tbl_master_kriteria.id_kriteria');
        $this->db->where('tbl_detail_pertandingan.id_pertandingan="' . $id . '"');
        $query = $this->db->get(); //eksekusi query
        return $query; //mengembalikan nilai yang didapat
    }
}
