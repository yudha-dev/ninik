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
}
