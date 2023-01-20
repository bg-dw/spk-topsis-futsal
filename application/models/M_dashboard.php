<?php
class M_dashboard extends CI_Model
{
    //mengambil data dari database
    function get_data($table)
    {
        $this->db->select('*'); //mengambil semua data
        $this->db->from($table); //dari table
        $query = $this->db->get(); //eksekusi query
        return $query; //mengembalikan nilai yang didapat
    }

    function count_pemain_by_pos()
    {
        $this->db->select('posisi,count(nama) as tot_by');
        $this->db->from('tbl_pemain');
        $this->db->group_by('posisi');
        $query = $this->db->get(); //eksekusi query
        return $query; //mengembalikan nilai yang didapat
    }

    function get_last_turnamen()
    {
        $this->db->select('*');
        $this->db->from('tbl_turnamen');
        $this->db->order_by('id_turnamen', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get(); //eksekusi query
        return $query; //mengembalikan nilai yang didapat
    }
}
