<?php defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Model
{
    private $_table = 'barang';
    //
    public function getAll()
    {
        $this->db->select('*');
        $this->db->join('kategori', 'barang.id_kategori = kategori.id_kategori');
        $this->db->where(['barang.aktif' => 1]);
        return $this->db->get($this->_table);
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
        $this->db->select('*');
        $this->db->join('kategori', 'barang.id_kategori = kategori.id_kategori');
        return $this->db->get_where($this->_table, ['id_barang' => $id]);
    }
    //update data
    public function update($data, $id)
    {
        // Update data user
        $this->db->where('id_barang', $id);
        $this->db->update($this->_table, $data);
    }
    //delete
    public function delete($id)
    {
        //Soft delete
        $this->db->where('id_barang', $id);
        $this->db->update($this->_table, ['aktif' => 0]);
    }
}
