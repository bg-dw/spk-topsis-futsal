<?php
class M_login extends CI_Model
{
    function db_login($user, $pwd)
    {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $where = array('username' => $user, 'password' => $pwd);
        $this->db->where($where);
        $query = $this->db->get();
        return $query;
    }
}
