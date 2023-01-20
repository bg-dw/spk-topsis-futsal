<?php
class M_kriteria extends CI_Model
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

    function delete($where, $table)
    {
        $this->db->where($where);
        $hasil = $this->db->delete($table);
        return $hasil;
    }

    function kriteria_join_turnamen($id)
    {
        $this->db->select('tbl_kriteria_turnamen.*,tbl_turnamen.*');
        $this->db->from('tbl_kriteria_turnamen');
        $this->db->join('tbl_turnamen', 'tbl_kriteria_turnamen.id_turnamen=tbl_turnamen.id_turnamen');
        $this->db->where('tbl_kriteria_turnamen.id_turnamen', $id);
        $query = $this->db->get(); //eksekusi query
        return $query; //mengembalikan nilai yang didapat
    }
}
