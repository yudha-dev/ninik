<?php defined('BASEPATH') or exit('No direct script access allowed');

class Keranjang extends CI_Model
{
    private $_table = 'keranjang';
    //
    public function getAll($id)
    {
        $this->db->select('*');
        $this->db->join('toko', 'keranjang.id_toko = toko.id_toko');
        $this->db->join('user', 'keranjang.id_user = user.id_user');
        $this->db->join('barang', 'keranjang.id_barang = barang.id_barang');
        return $this->db->get_where($this->_table, ['keranjang.id_user' => $id]);
    }
    //
    public function save($data)
    {
        //INSERT INTO wilayah
        $this->db->insert($this->_table, $data);
        return $this->db->insert_id();
    }
}
