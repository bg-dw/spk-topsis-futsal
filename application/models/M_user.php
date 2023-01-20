<?php
class M_user extends CI_Model
{
    //mengambil data dari database
    function get_data($table)
    {
        $this->db->select('*'); //mengambil semua data
        $this->db->from($table); //dari table
        $query = $this->db->get(); //eksekusi query
        return $query; //mengembalikan nilai yang didapat
    }

    function count_user()
    {
        $this->db->select('count(nama_user) as tot_user');
        $this->db->from('tbl_user');
        $query = $this->db->get(); //eksekusi query
        return $query; //mengembalikan nilai yang didapat
    }
}
