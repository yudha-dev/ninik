<?php defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Model
{
    private $_table = 'kategori';

    //select * from kategori
    public function getAll()
    {
        return $this->db->get_where($this->_table, ['aktif' => 1]);
    }
    //save data
    public function save($data)
    {
        //INSERT INTO kategori
        $this->db->insert($this->_table, $data);
        return $this->db->insert_id();
    }
    //edit data
    public function getById($id)
    {
        //GET edit data ke form
        return $this->db->get_where($this->_table, ['id_kategori' => $id]);
    }
    //update data
    public function update($data, $id)
    {
        // Update data user
        $this->db->where('id_kategori', $id);
        $this->db->update($this->_table, $data);
    }
    //delete
    public function delete($id)
    {
        //Soft delete
        $this->db->where('id_kategori', $id);
        $this->db->update($this->_table, ['aktif' => 0]);
    }
    //get satuan
    public function getSatuan($id_kat)
    {
        return $this->db->get_where($this->_table, ['id_kategori' => $id_kat]);
    }
}
