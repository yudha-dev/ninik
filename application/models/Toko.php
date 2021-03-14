<?php defined('BASEPATH') or exit('No direct script access allowed');

class Toko extends CI_Model
{
    private $_table = 'toko';
    //
    public function getAll()
    {
        $this->db->select('*');
        $this->db->join('wilayah', 'toko.id_wilayah = wilayah.id_wilayah');
        $this->db->where(['toko.aktif' => 1]);
        return $this->db->get($this->_table);
    }
    //
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
        $this->db->select('*');
        $this->db->join('wilayah', 'toko.id_wilayah = wilayah.id_wilayah');
        return $this->db->get_where($this->_table, ['id_toko' => $id]);
    }
    //update data
    public function update($data, $id)
    {
        // Update data user
        $this->db->where('id_toko', $id);
        $this->db->update($this->_table, $data);
    }
    //delete
    public function delete($id)
    {
        //Soft delete
        $this->db->where('id_toko', $id);
        $this->db->update($this->_table, ['aktif' => 0]);
    }
}
