<?php defined('BASEPATH') or exit('No direct script access allowed');

class Sales extends CI_Model
{
    private $_table = 'user';

    //select * from kategori
    public function getAll()
    {
        return $this->db->get_where($this->_table, ['jabatan'   => 'sales', 'aktif' => 1]);
    }
    public function save($data)
    {
        //INSERT INTO wilayah
        $this->db->insert($this->_table, $data);
        return $this->db->insert_id();
    }
    //edit data
    public function getById($id)
    {
        //GET edit data ke form
        return $this->db->get_where($this->_table, ['id_user' => $id]);
    }
    //update data
    public function update($data, $id)
    {
        // Update data user
        $this->db->where('id_user', $id);
        $this->db->update($this->_table, $data);
    }
    //delete
    public function delete($id)
    {
        //Soft delete
        $this->db->where('id_user', $id);
        $this->db->update($this->_table, ['aktif' => 0]);
    }
}
