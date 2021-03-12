<?php defined('BASEPATH') or exit('No direct script access allowed');

class Wilayah extends CI_Model
{
    private $_table = 'wilayah';

    //select * from wilayah
    public function getAll()
    {
        return $this->db->get_where($this->_table, ['aktif' => 1]);
    }
    //save data
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
        return $this->db->get_where($this->_table, ['id_wilayah' => $id]);
    }
    //update data
    public function update($data, $id)
    {
        // Update data user
        $this->db->where('id_wilayah', $id);
        $this->db->update($this->_table, $data);
    }
    //delete
    public function delete($id)
    {
        //Soft delete
        $this->db->where('id_wilayah', $id);
        $this->db->update($this->_table, ['aktif' => 0]);
    }
}
